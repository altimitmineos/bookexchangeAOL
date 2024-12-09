<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    use HasFactory;
    protected $fillable = [
        'FormatName',
    ];

    public function books(){
        return $this->hasMany(Book::class);
    }
}
