<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory, Sluggable;

    protected  $fillable  = [
        'image',
        'thumbail',
        'name',
        'slug',
        'content',
        'child_category',
        'status'
    ];

    public function items()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function subCatagory()
    {
        return $this->hasOne(Catagory::class, 'id', 'child_category');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
