<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Format;
use App\Models\Book;
use App\Models\Reader;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookController extends Controller
{
    //
    public function createBook(){
        $categories = Category::all();
        $formats = Format::all();
        return view('admin.createbook', compact('categories', 'formats'));
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
        return view('admin.admin', compact('books') ); //kita mau tampilin data books ini di page Admin, kemudian data yang disimpen di books di passing ke page Admin
    }

    public function showCollection(){
        $books = Book::all(); //ambil semua data yang ada di model book
        return view('admin.home', compact('books') ); //kita mau tampilin data books ini di page Admin, kemudian data yang disimpen di books di passing ke page Admin
    }

    public function showBook($id){
        $book = Book::findOrFail($id);
        return view('admin.bookdetail', compact('book') );
    }

    public function indexuser(){
    $currentYear = Carbon::now()->year;

    // Fetch books released in the current year
    $newReleases = Book::whereYear('PublicationDate', $currentYear)->get();

    // Fetch books not in the current year's release
    $bestSellers = Book::whereYear('PublicationDate', '<', $currentYear)->get();

    return view('user.homepageuser', compact('newReleases', 'bestSellers'));
    }

    public function indexguest(){
        $currentYear = Carbon::now()->year;

        // Fetch books released in the current year
        $newReleases = Book::whereYear('PublicationDate', $currentYear)->get();

        // Fetch books not in the current year's release
        $bestSellers = Book::whereYear('PublicationDate', '<', $currentYear)->get();

        return view('guest.homepageguest', compact('newReleases', 'bestSellers'));
        }


    public function showPayment($id){
        $book = Book::findOrFail($id);
        return view('admin.payment', compact('book') );
    }

    public function edit($id){
        $categories = Category::all();
        $book = Book::findOrFail($id);
        $formats = Format::all();
        return view('admin.editbook', compact('book', 'categories' , 'formats'));
    }

    public function update (Request $request, $id){

        $request->validate([
            'Title'=> 'required|unique:books,Title,except,id',
            'PubDate'=> 'required',
            'Author'=> 'required|min:5',
            'ISBN'=> 'required|min:13|integer',
            'Publisher'=> 'required|min:5',
            'PrintWeight'=> 'required|min:3',
            'PrintWidth'=> 'required|min:3',
            'PrintLength'=> 'required|min:3',
            'Page'=> 'required|integer|gt:15',
            'Stock'=> 'required|integer|gt:0',
            'Image'=> 'required|mimes:png,jpg,jpeg'
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
        return redirect('/dashboard');
    }

    public function delete($id){
        Book::destroy($id);
        return redirect('/dashboard');
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
