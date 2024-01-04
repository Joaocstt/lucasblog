<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * @property mixed|string $title
 */

class Category extends Model
{
    use HasFactory;

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

        $count = Category::query()
            ->where('slug', $slug)
            ->when($this->id, fn($query) => $query->where('id', '!=', $this->id))
            ->count();

        if($count > 0){
            return $slug . '-' . $count + 1;
        }

        return $slug;

    }


    public function post(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }


}
