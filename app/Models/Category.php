<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc',
        'short_desc'
    ];

    protected $table = 'categorys';

    public function color(){
        return $this->hasMany(Color::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
