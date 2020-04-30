<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'price', 'location', 'image', 'stock', 'category_id'];

    public function categories()
    {
        // id - column name of the foreign table
        // category_id - column name of the local table
        return $this->hasOne('App\Category','id', 'category_id'); 
    }
}
