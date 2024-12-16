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
        'PrintLength',
        'Page',
        'Cost',
        'Category_Id',
        'Format_Id',
        'Stock',
        'Image'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'Category_Id');
    }

    public function format()
    {
        return $this->belongsTo(Format::class, 'Formats_Id');
    }

    public function readers(){
        return $this->belongsToMany(Reader::class);
    }

    public function cartItems()
    {
    return $this->hasMany(CartItem::class, 'book_id');
    }

}
