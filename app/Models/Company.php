<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc',
        'short_desc'
    ];

    protected $table = 'companys';

    public function category(){
        return $this->hasMany(Category::class);
    }
}
