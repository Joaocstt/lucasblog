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
            $user = Auth::user();
            $users = User::query()->count();
            $posts = Post::query()->count();
            $pendentPosts = Post::query()->where('status','draft')->count();
            $categories = Category::query()->count();

            return Inertia::render('Admin/Dashboard', [
                'user' => $user,
                'users' => $users,
                'posts' => $posts,
                'categories' => $categories,
                'pendentPosts' => $pendentPosts
            ]);

        }

        return redirect()->route('admin.login');
    }
}
