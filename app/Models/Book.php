<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Book extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;
    protected $fillable=[
        'author_id',
        'category_id',
        'title',
        'description',
        'published_at',
        'book_image',
        'pages',
        'quantity'

    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function borrowers()
    {
        return $this->belongsToMany(User::class, 'borrowings', 'book_id', 'user_id')
            ->withPivot('expiration_date')
            ->withTimestamps();
    }
}
