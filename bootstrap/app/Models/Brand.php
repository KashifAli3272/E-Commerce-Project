<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ["brand_name","description",
    "image","created_at","updated_at","status",];


}
