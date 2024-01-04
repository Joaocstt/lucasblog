<?php

namespace App\Models\Blog;

use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id', 'subtitle', 'content', 'category_id', 'image'];

    public function title(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) =>  [
                'title' => $value,
                'slug' => $this->normalizeSlug($value),
            ]
        );
    }

    private function normalizeSlug(string $value): string
    {
        $slug = Str::slug($value);
        $count = Post::query()
            ->where('slug', $slug)
            ->when($this->id, fn($query) => $query->where('id', '!=', $this->id))
            ->count();
        if($count > 0){
            return $slug . '-' . $count + 1;
        }
        return $slug;
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
