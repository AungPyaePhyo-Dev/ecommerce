<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCat extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'image', 'category_id' ];

    public function cat() {
        return $this->belongsTo(CAtegory::class);
    }
}
