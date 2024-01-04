<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Post\StoreRequest;
use App\Http\Requests\Admin\Blog\Post\UpdateRequest;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class PostController extends Controller
{

    public function index(Request $request)
    {
        $query = Post::query()->with(['author','category']);

        if ($request->has('category')) {
            $query->where('category_id', $request->get('category'));
            $category_filter = Post::query()->with(['author','category'])->where('category_id', $request->get('category'))->first();
        }

        $posts = $query->paginate(7);
        $categories = Category::all();

        foreach ($posts as $post) {
            $post->image_url = asset('storage/' . $post->image);
            $post->formatted_date = $post->created_at->format('d/m/Y');
            $post->title = Str::limit($post->title, 130);

        }

        return Inertia::render('Admin/Blog/Post/List', [
            'posts' => $posts,
            'categories' => $categories,
            'category_filter' => $category_filter ?? null,
        ]);
    }

    public function create()
    {
        $categories = Category::query()->orderBy('title', 'ASC')->get();
        return Inertia::render('Admin/Blog/Post/Manager', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $post = new Post();
        $post->title = $request->get('title');
        $post->user_id = Auth::user()->id;
        $post->subtitle = $request->get('subtitle');
        $post->content = $request->get('content');
        $post->category_id = $request->get('category_id');

        if($request->hasFile('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $post->image = $request->file('image')->storeAs('posts', $post->slug . '.' . $extension);
        }

        $post->save();

        return redirect()->route('admin.blog.posts.show', [$post->id, $post->slug]);

    }

    public function show(string $id, string $slug)
    {
        $posts = Post::query()->with(['author','category'])->findOrFail($id);
        $categories = Category::query()->where('slug', $slug);

        $posts->image_url = asset('storage/' . $posts->image);


        return Inertia::render('Admin/Blog/Post/DetailPost', compact('posts', 'categories'));

    }


    public function edit(string $id)
    {
        $posts = Post::query()->with('category')->findOrFail($id);
        $categories = Category::All();

        $posts->image_url = asset('storage/' . $posts->image);

        return Inertia::render('Admin/Blog/Post/EditPost', compact('posts', 'categories'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $post = Post::query()->where('id', $id)->firstOrFail();

        $post->title = $request->get('title');
        $post->user_id = Auth::user()->id;
        $post->subtitle = $request->get('subtitle');
        $post->content = $request->get('content');
        $post->category_id = $request->get('category_id');

        if($request->hasFile('image')){
            Storage::delete('posts/' . $post->image);
            $extension = $request->file('image')->getClientOriginalExtension();
            $post->image = $request->file('image')->storeAs('posts', $post->slug . '.' . $extension);
        }

        $post->save();

        return redirect()->route('admin.blog.posts.show', [$post->id, $post->slug]);
    }

    public function publish(string $id)
    {
        $post = Post::query()->findOrFail($id);
        if($post->status == 'published'){
            $post->status = 'draft';
            $post->save();
            return redirect()->route('admin.blog.posts.show', [$post->id, $post->slug]);
        }

         $post->status = 'published';
         $post->save();

        return redirect()->route('admin.blog.posts.show', [$post->id, $post->slug]);
    }


    public function destroy(string $id)
    {
        $post = Post::query()->where('id', $id)->firstOrFail();

        Storage::delete('posts/' . $post->image);

        $post->delete();

        return redirect()->route('admin.blog.posts.index');
    }
}
