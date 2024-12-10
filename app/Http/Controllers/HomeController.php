<?php  

namespace App\Http\Controllers;  

use App\Models\Book;  
use Illuminate\Http\Request;  

class HomeController extends Controller  
{  
    public function index()  
    {  
        // Ambil buku-buku yang merupakan new release  
        $newReleases = Book::where('is_new_release', true)->get();  
        
        // Ambil buku-buku yang merupakan bestseller  
        $bestSellers = Book::where('is_best_seller', true)->get();  

        // Kirim variabel ke view  
        return view('home.index', [  
            'newReleases' => $newReleases,  
            'bestSellers' => $bestSellers  
        ]);  
        
        // ATAU bisa juga dengan compact()  
        // return view('home.index', compact('newReleases', 'bestSellers'));  
    }  
    public function show($id)  
    {  
        // Mencari buku berdasarkan ID  
        $book = Book::findOrFail($id);  
        
        // Mengembalikan view detail buku dengan data buku  
        return view('books.show', compact('book'));  
    }  
}