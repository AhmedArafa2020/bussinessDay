<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class JournalController extends Controller
{
    public function index(): View
    {
        $featuredPost = Post::query()
            ->published()
            ->where('is_featured', true)
            ->latest('published_at')
            ->first();

        if (! $featuredPost) {
            $featuredPost = Post::query()
                ->published()
                ->latest('published_at')
                ->first();
        }

        $posts = Post::query()
            ->published()
            ->when(
                $featuredPost,
                fn ($query) => $query->whereKeyNot(
                    $featuredPost->getKey()
                )
            )
            ->latest('published_at')
            ->get();

        return view('frontend.journal.index', [
            'featuredPost' => $featuredPost,
            'posts' => $posts,
        ]);
    }

    public function show(Post $post): View
    {
        abort_unless(
            $post->is_published
            && $post->published_at
            && $post->published_at->lte(now()),
            404
        );

        return view('frontend.journal.article', [
            'post' => $post,
        ]);
    }
}
