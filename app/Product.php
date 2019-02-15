<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'title', 'description', 'category_id', 'status','price', 'url_image', 'ref', 'code', 'size'
    ];

    public function scopePublished($query){
        return $query->where('status', 'published');
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
