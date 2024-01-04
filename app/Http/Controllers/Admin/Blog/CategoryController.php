<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\Category\StoreRequest;
use App\Http\Requests\Admin\Blog\Category\UpdateRequest;
use App\Models\Blog\Category;
use Inertia\Inertia;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::query()->withCount('post')->orderBy('title', 'ASC')->get();

        Return Inertia::render('Admin/Blog/Category/Category' , compact('categories', 'categories'));
    }

    public function create()
    {
        Return Inertia::render('Admin/Blog/Category/Manager');
    }

    public function store(StoreRequest $request)
    {
        $category = new Category();
        $category->title = $request->get('title');
        $category->save();

        return redirect()->route('admin.blog.categories.index');

    }

    public function edit(string $id)
    {
        $category = Category::query()->where('id', $id)->firstOrFail();

        return Inertia::render('Admin/Blog/Category/Manager', compact('category'));
    }

    public function update(UpdateRequest $request, string $id)
    {
        $category = Category::query()->where('id', $id)->firstOrFail();

        $category->title = $request->get('title');
        $category->save();

        return redirect()->route('admin.blog.categories.index');
    }

    public function destroy(string $id)
    {
        $category = Category::query()->where('id', $id)->firstOrFail();

        $category->delete();

        return redirect()->route('admin.blog.categories.index');
    }
}
