<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Book;
use App\Models\Reader;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function createBook(){
        $categories = Category::all();
        return view('CreateBook', compact('categories'));
    }

    public function storeBook (Request $request){
        
        $request->validate([
            'Title'=> 'required|unique:books,Title,except,id',
            'PubDate'=> 'required',
            'Author'=> 'required|min:5',
            'ISBN'=> 'required|min:13|integer',
            'Publisher'=> 'required|min:5',
            'PrintWeight'=> 'required|integer|gt:15',
            'PrintWidth'=> 'required|integer|gt:15',
            'PrintLength'=> 'required|integer|gt:15',
            'Page'=> 'required|integer|gt:15',
            'Stock'=> 'required|integer|gt:0',
            'Image'=> 'required|mimes:png,jpg,jpeg'
        ]);

        $extension = $request->file('Image')->getClientOriginalExtension();
        $fileName = $request->Title.'_'.$request->Author.'.'.$extension;
        $request->file('Image')->storeAs('/public/image', $fileName);
        Book::create([
            'Title'=> $request->Title,
            'PublicationDate'=> $request->PubDate,
            'Author'=> $request->Author,
            'ISBN'=> $request->ISBN,
            'Publisher'=> $request->Publisher,
            'PrintWeight'=> $request->PrintWeight,
            'PrintWidth'=> $request->PrintWidth,
            'PrintLength'=> $request->PrintLength,
            'Page'=> $request->Page,
            'Category_Id'=> $request->CategoryName,
            'Format_Id'=> $request->FormatName,
            'Stock'=> $request->Stock,
            'Image'=> $fileName
        ]);
        return redirect('/');
    }

    public function show(){
        $books = Book::all(); //ambil semua data yang ada di model book
        return view('admin', compact('books') ); //kita mau tampilin data books ini di page Admin, kemudian data yang disimpen di books di passing ke page Admin
    }

    public function showCollection(){
        $books = Book::all(); //ambil semua data yang ada di model book
        return view('home', compact('books') ); //kita mau tampilin data books ini di page Admin, kemudian data yang disimpen di books di passing ke page Admin
    }

    public function showBook($id){
        $book = Book::findOrFail($id);
        return view('bookdetail', compact('book') );
    }

    public function showPayment($id){
        $book = Book::findOrFail($id);
        return view('payment', compact('book') );
    }

    public function edit($id){
        $categories = Category::all();
        $book = Book::findOrFail($id);
        return view('editbook', compact('book'), compact('categories') );
    }

    public function update (Request $request, $id){
               
        $request->validate([
            'Title'=> 'required',
            'PubDate'=> 'required',
            'Author'=> 'required|min:5',
            'ISBN'=> 'required|min:13|integer',
            'Publisher'=> 'required|min:5',
            'PrintWeight'=> 'required|integer|gt:15',
            'PrintWidth'=> 'required|integer|gt:15',
            'PrintLength'=> 'required|integer|gt:15',
            'Page'=> 'required|integer|gt:15',
            'Stock'=> 'required|integer|gt:5',
            'Image'=> 'required|mimes:png,jpg'
        ]);

        $extension = $request->file('Image')->getClientOriginalExtension();
        $fileName = $request->Title.'_'.$request->Author.'.'.$extension;
        $request->file('Image')->storeAs('/public/image', $fileName);
        
        Book::findOrFail($id)->update([
            'Title'=> $request->Title,
            'PublicationDate'=> $request->PubDate,
            'Author'=> $request->Author,
            'ISBN'=> $request->ISBN,
            'Publisher'=> $request->Publisher,
            'PrintWeight'=> $request->PrintWeight,
            'PrintWidth'=> $request->PrintWidth,
            'PrintLength'=> $request->PrintLength,
            'Page'=> $request->Page,
            'Category_Id'=> $request->CategoryName,
            'Format_Id'=> $request->FormatName,
            'Stock'=> $request->Stock,
            'Image'=> $fileName
        ]);
        return redirect('/');
    }
    
    // public function updateStock($id){
    //     Book::findOrFail($id)->update([
    //         'Stock'=> $stock-1,
    //     ]);
    //     return redirect('/collection');
    // }


    public function delete($id){
        Book::destroy($id);
        return redirect('/');
    }


    //API
    public function getBook(){
        $books = Book::all();
        return $books; 
    }

    public function addBook (Request $request){
        $extension = $request->file('Image')->getClientOriginalExtension();
        $fileName = $request->Title.'_'.$request->Author.'.'.$extension;
        $request->file('Image')->storeAs('/public/image', $fileName);
        Book::create([
            'Title'=> $request->Title,
            'PublicationDate'=> $request->PubDate,
            'Author'=> $request->Author,
            'ISBN'=> $request->ISBN,
            'Publisher'=> $request->Publisher,
            'PrintWeight'=> $request->PrintWeight,
            'PrintWidth'=> $request->PrintWidth,
            'PrintLength'=> $request->PrintLength,
            'Page'=> $request->Page,
            'Category_Id'=> $request->CategoryName,
            'Format_Id'=> $request->FormatName,
            'Stock'=> $request->Stock,
            'Image'=> $fileName
        ]);

        return response()->json(["success" => 200]);
    }

    public function updateBook (Request $request, $id){
        $extension = $request->file('Image')->getClientOriginalExtension();
        $fileName = $request->Title.'_'.$request->Author.'.'.$extension;
        $request->file('Image')->storeAs('/public/image', $fileName);
        
        Book::findOrFail($id)->update([
            'Title'=> $request->Title,
            'PublicationDate'=> $request->PubDate,
            'Author'=> $request->Author,
            'ISBN'=> $request->ISBN,
            'Publisher'=> $request->Publisher,
            'PrintWeight'=> $request->PrintWeight,
            'PrintWidth'=> $request->PrintWidth,
            'PrintLength'=> $request->PrintLength,
            'Page'=> $request->Page,
            'Category_Id'=> $request->CategoryName,
            'Format_Id'=> $request->FormatName,
            'Stock'=> $request->Stock,
            'Image'=> $fileName
        ]);

        return response()->json(["success" => 200]);
    }

    public function removeBook($id){
        Book::destroy($id);
        return response()->json(["success" => 200]);
    }

}