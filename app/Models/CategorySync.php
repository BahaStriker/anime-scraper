<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySync extends Model
{
    use HasFactory;

    protected $table = "anime_category";
    protected $guarded = [];
}
