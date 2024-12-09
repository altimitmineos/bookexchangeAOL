<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable =[
        'Title',
        'PublicationDate',
        'Author',
        'ISBN',
        'Publisher',
        'PrintWeight',
        'PrintWidth',
        'PrintLeigth',
        'Page',
        'Category_Id',
        'Format_Id',
        'Stock',
        'Image'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'Category_Id');
    }

    public function readers(){
        return $this->belongsToMany(Reader::class);
    }
}