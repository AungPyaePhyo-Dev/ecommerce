<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'image' ];

    public function subcats() {
        return $this->hasMany(SubCat::class);
    }
}
