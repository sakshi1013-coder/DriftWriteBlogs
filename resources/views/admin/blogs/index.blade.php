@extends('admin.layouts.dashboard')
@section('page-title', 'Blog Posts')

@section('content')
<div class="admin-card">
    <div class="card-header">
        <h2 class="card-title">All Blog Posts <span class="count-badge">{{ $blogs->total() }}</span></h2>
        <a href="{{ route('admin.blogs.create') }}" class="btn-primary-sm">+ New Post</a>
    </div>

    <div class="table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $i => $blog)
                <tr>
                    <td class="table-num">{{ $blogs->firstItem() + $i }}</td>
                    <td>
                        <p class="table-blog-title">{{ Str::limit($blog->title, 60) }}</p>
                        <p class="table-blog-slug">/blog/{{ $blog->slug }}</p>
                    </td>
                    <td>
                        <span class="table-badge" style="background: {{ $blog->category->color }}22; color: {{ $blog->category->color }}">
                            {{ $blog->category->name }}
                        </span>
                    </td>
                    <td>
                        @if($blog->is_published)
                            <span class="status-badge status-published">Published</span>
                        @else
                            <span class="status-badge status-draft">Draft</span>
                        @endif
                    </td>
                    <td class="table-date">{{ $blog->published_at->format('d M Y') }}</td>
                    <td>
                        <div class="table-actions">
                            <a href="{{ route('blogs.show', $blog->slug) }}" target="_blank" class="action-btn action-view" title="View Live">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="15" height="15">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                            </a>
                            <a href="{{ route('admin.blogs.edit', $blog) }}" class="action-btn action-edit" title="Edit">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="15" height="15">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                </svg>
                            </a>
                            <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="delete-form">
                                @csrf @method('DELETE')
                                <button type="submit" class="action-btn action-delete" title="Delete"
                                    onclick="return confirm('Are you sure you want to delete this post? This cannot be undone.')">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="15" height="15">
                                        <polyline points="3 6 5 6 21 6"/>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="table-empty">
                        <div class="empty-state-sm">
                            <span>📝</span>
                            <p>No blog posts yet. <a href="{{ route('admin.blogs.create') }}">Create one now!</a></p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{ $blogs->links() }}
    </div>
</div>
@endsection
