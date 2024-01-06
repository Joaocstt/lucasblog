<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if(Auth::user()) {
            $total = User::query()->count();
            $posts = Post::query()->count();
            $pendentPosts = Post::query()->where('status','draft')->count();
            $postsPublished = Post::query()->where('status','published')->count();
            $categories = Category::query()->count();

            return Inertia::render('Admin/Blog/User/Dashboard', [
                'users' => $total,
                'posts' => $posts,
                'pendentPosts' => $pendentPosts,
                'categories' => $categories,
                'postsPublished' => $postsPublished
            ]);
        }

        return redirect()->route('admin.login');
    }
}
