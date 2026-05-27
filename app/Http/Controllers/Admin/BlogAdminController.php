<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogAdminController extends Controller
{
    public function dashboard()
    {
        $totalBlogs      = Blog::count();
        $publishedBlogs  = Blog::where('is_published', true)->count();
        $totalCategories = Category::count();
        $recentBlogs     = Blog::with('category')->latest()->take(5)->get();

        return view('admin.dashboard', compact('totalBlogs', 'publishedBlogs', 'totalCategories', 'recentBlogs'));
    }

    public function index()
    {
        $blogs = Blog::with('category')->latest()->paginate(15);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'             => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string', 'max:500'],
            'content'           => ['required', 'string'],
            'category_id'       => ['required', 'exists:categories,id'],
            'published_at'      => ['required', 'date'],
            'is_published'      => ['boolean'],
            'image'             => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ]);

        $validated['slug']         = Str::slug($validated['title']);
        $validated['is_published'] = $request->boolean('is_published', true);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog post created successfully!');
    }

    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title'             => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string', 'max:500'],
            'content'           => ['required', 'string'],
            'category_id'       => ['required', 'exists:categories,id'],
            'published_at'      => ['required', 'date'],
            'is_published'      => ['boolean'],
            'image'             => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ]);

        $validated['is_published'] = $request->boolean('is_published', true);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $validated['image'] = $request->file('image')->store('blogs', 'public');
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog post updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog post deleted successfully!');
    }
}
