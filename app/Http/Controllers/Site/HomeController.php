<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Psy\Util\Str;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::query()->get();
        $postsLatest = Post::query()->where('status', 'published')->with('author')->latest()->take(4)->get();

        $allPosts = Post::query()->where('status', 'published')->with('author')->latest()->get();
        $postsNotRecent = $allPosts->skip(4);

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemsPerPage = 6;
        $postsForCurrentPage = $postsNotRecent->forPage($currentPage, $itemsPerPage);
        $postsNotRecent = new LengthAwarePaginator($postsForCurrentPage, $postsNotRecent
            ->count(), $itemsPerPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);

        $truncatedTitles = [];
        $truncatedSubTitles = [];

        foreach ($postsLatest as $post) {
            $truncatedTitles[$post->id] = \Illuminate\Support\Str::limit($post->title, 70);
            $truncatedSubTitles[$post->id] = \Illuminate\Support\Str::limit($post->subtitle, 90);
        }

        foreach ($postsNotRecent as $post) {
            $truncatedTitles[$post->id] = \Illuminate\Support\Str::limit($post->title, 70);
            $truncatedSubTitles[$post->id] = \Illuminate\Support\Str::limit($post->subtitle, 90);
        }

        return view('site.home', [
            'categories' => $categories,
            'postsLatest' => $postsLatest,
            'truncatedTitles' => $truncatedTitles,
            'truncatedSubTitles' => $truncatedSubTitles,
            'postsNotRecent' => $postsNotRecent,
        ]);
    }

    public function about()
    {
        return view('site.about');
    }

    public function showPosts(string $slug)
    {
        $category = Category::query()->where('slug', $slug)->firstOrFail();
        $categories = Category::query()->get();
        $posts = Post::query()->where('category_id', $category->id)->where('status', 'published')->with(['author','category'])->paginate(6);
        $truncatedTitles = [];
        $truncatedSubTitles = [];

        foreach ($posts as $post) {
            $truncatedTitles[$post->id] = \Illuminate\Support\Str::limit($post->title, 120);
            $truncatedSubTitles[$post->id] = \Illuminate\Support\Str::limit($post->subtitle, 100);
        }
        return view('site.pages.posts', [
            'category' => $category,
            'categories' => $categories,
            'posts' => $posts,
            'truncatedTitles' => $truncatedTitles,
            'truncatedSubTitles' => $truncatedSubTitles,
        ]);
    }

}
