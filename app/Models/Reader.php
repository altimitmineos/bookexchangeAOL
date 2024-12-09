<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;

    protected $fillable =[
        'ReaderName',
        'ReaderEmail',
        'Address',
        'Shipping',
        'PaymentMethod'
    ];
    
    public function books(){
        return $this->belongsToMany(Book::class, 'book_reader', 'Reader_Id', 'Book_Id');
    }
}