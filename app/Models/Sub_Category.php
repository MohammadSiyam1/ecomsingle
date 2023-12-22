<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'sub_category_name',
        'Category_id',
        'category_name',
        'slug',
    ];
}
