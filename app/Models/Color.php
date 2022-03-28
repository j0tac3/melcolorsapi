<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'category_id',
        'code',
        'desc_en',
        'desc_es',
        'hex_code',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function userColor(){
        return $this->hasMany(Usercolor::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}