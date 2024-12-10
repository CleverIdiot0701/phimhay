<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function Category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function Country() {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function Genre() {
        return $this->belongsTo(Genre::class, 'genre_id');
        
    }

}
