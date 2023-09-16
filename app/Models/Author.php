<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory ;
    protected $fillable=[
        'name',
        'Biography',
        'birth_date',
        'death_date'

    ];
    public function books(){
        $this->hasMany(Book::class);
    }
}
