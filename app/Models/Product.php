<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = [
        "name",
        "image",
        "category_id",
        "short_text",
        "price",
        "size",
        "color",
        "quantity",
        "status",
        "content"
    ];
    public function category(){
      return  $this->hasOne(Catagory::class,'id','category_id');

    }
      /*
    public function category(){
      return  $this->hasOne(Catagory::class,'id','category_id');

    }
    public function subCatagory()
    {
        return $this->hasMany(Catagory::class, 'child_category' ,'category_id' );
    }
    */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
