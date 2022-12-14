<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // protected $table = 'categories';

    // kolom yang boleh di isi oleh user
    protected $fillable = [
        'name',
        'status'
    ];

    public function products()
    {
        // return $this->hasMany(Product::class, 'category_id', 'id');
        return $this->hasMany(Product::class);
    }
}
