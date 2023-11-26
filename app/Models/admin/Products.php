<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'detail', 'image', 'cate_id'];

    public function cate() {
        return $this->belongsTo(Categories::class);
    }

    public function comment() {
        return $this->hasMany(Comments::class);
    }
}
