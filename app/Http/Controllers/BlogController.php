<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::withCount(['blogs' => fn($q) => $q->where('is_published', true)])->get();

        $blogs = Blog::with('category')
            ->published()
            ->byCategory($request->category)
            ->byDate($request->date)
            ->search($request->search)
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        $latestBlogs = Blog::with('category')->published()->latest('published_at')->take(5)->get();

        return view('blogs.index', compact('blogs', 'categories', 'latestBlogs'));
    }

    public function show(string $slug)
    {
        $blog = Blog::with('category')->where('slug', $slug)->published()->firstOrFail();

        $related = Blog::with('category')
            ->published()
            ->where('category_id', $blog->category_id)
            ->where('id', '!=', $blog->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('blogs.show', compact('blog', 'related'));
    }

    public function filter(Request $request)
    {
        $blogs = Blog::with('category')
            ->published()
            ->byCategory($request->category)
            ->byDate($request->date)
            ->search($request->search)
            ->orderBy('published_at', 'desc')
            ->paginate(9);

        $html = '';
        foreach ($blogs as $blog) {
            $html .= view('blogs.partials.card', compact('blog'))->render();
        }

        return response()->json([
            'html'        => $html,
            'total'       => $blogs->total(),
            'hasMore'     => $blogs->hasMorePages(),
            'currentPage' => $blogs->currentPage(),
            'lastPage'    => $blogs->lastPage(),
        ]);
    }
}
