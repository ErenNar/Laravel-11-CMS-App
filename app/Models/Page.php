<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, Sluggable;

    protected   $fillable = [
        "SubId",
        "PageTitle",
        "PageSubTitle",
        "PageContent",
        "PageImage",
        "Status",
        "IsMenu",
        "SelectPage",
        "Slug",
        "MetaTitle",
        "MetaDescription",
        "MetaKeywords",
        "Order"
    ];


    public function subPages()
    {
        return $this->hasOne(Page::class, 'id', 'SubId');
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
