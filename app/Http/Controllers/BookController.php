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

        public function storeBook(Request $request)
        {
            $request->validate([
                'Title' => 'required|unique:books,Title',
                'PublicationDate' => 'required|date',
                'Author' => 'required|min:5',
                'ISBN' => 'required|digits:13|integer',
                'Publisher' => 'required|min:5',
                'PrintWeight' => 'required|numeric|gt:0.01',
                'PrintWidth' => 'required|numeric|gt:0.01',
                'PrintLength' => 'required|numeric|gt:0.01',
                'Page' => 'required|integer|gt:15',
                'Cost' => 'required|numeric|gt:15',
                'Stock' => 'required|integer|gt:0',
                'Image' => 'required|mimes:png,jpg,jpeg',
                'Category_Id' => 'required|exists:categories,id',
                'Format_Id' => 'required|exists:formats,id', // Ensure Format_Id exists in formats table
            ]);

            $imageName = time().'.'.$request->Image->extension();
            $request->Image->move(public_path('images'), $imageName);

            Book::create([
                'Title' => $request->Title,
                'PublicationDate' => $request->PublicationDate,
                'Author' => $request->Author,
                'ISBN' => $request->ISBN,
                'Publisher' => $request->Publisher,
                'PrintWeight' => $request->PrintWeight,
                'PrintWidth' => $request->PrintWidth,
                'PrintLength' => $request->PrintLength,
                'Page' => $request->Page,
                'Category_Id' => $request->Category_Id,
                'Format_Id' => $request->Format_Id, // Add Format_Id here
                'Cost' => $request->Cost,
                'Stock' => $request->Stock,
                'Image' => $imageName
            ]);

            return redirect()->route('home-admin');
        }


    public function showCollection(){

        $books = Book::orderBy('Title');

        if(request()->has('search')){
            $books = $books->where('Title', 'like', '%'.request()->get('search', '').'%');
        }

        return view('admin.home', ['books'=>$books->paginate(5)] );
    } //ADMIN - SHOW COLECTION

    public function showBook($id){
        $book = Book::findOrFail($id);
        return view('admin.bookdetail', compact('book') );
    }

    public function showBookUser($id){
        $book = Book::findOrFail($id);
        return view('user.bookdetailUser', compact('book') );
    }
    public function showBookGuest($id){
        $book = Book::findOrFail($id);
        return view('guest.bookdetailGuest', compact('book') );
    }

    public function indexuser(){
    $currentYear = Carbon::now()->year;

    // Fetch books released in the current year
    $newReleases = Book::whereYear('PublicationDate', $currentYear)->get();

    // Fetch books not in the current year's release
    $bestSellers = Book::whereYear('PublicationDate', '<', $currentYear)->get();

    return view('user.homepageuser', compact('newReleases', 'bestSellers'));
    }

    public function userSearch(){

        $books = Book::orderBy('Title');

        if(request()->has('search')){
            $books = Book::where('Title', 'LIKE', '%'.request()->get('search', '').'%');
        }

        return view('user.searchpageuser', ['books'=>$books->paginate(5)]);
    }


    public function indexguest(){
        $currentYear = Carbon::now()->year;

        // Fetch books released in the current year
        $newReleases = Book::whereYear('PublicationDate', $currentYear)->get();

        // Fetch books not in the current year's release
        $bestSellers = Book::whereYear('PublicationDate', '<', $currentYear)->get();

        return view('guest.homepageguest', compact('newReleases', 'bestSellers'));
    }

    public function guestSearch(){

        $books = Book::orderBy('Title');

        if(request()->has('search')){
            $books = Book::where('Title', 'LIKE', '%'.request()->get('search', '').'%');
        }

        return view('guest.searchpageguest', ['books'=>$books->paginate(5)]);
    }

    public function userCategory($category_id=0){

        $books = Book::orderBy('Title');

        if($category_id >= 1){
            $books = Book::where('Category_Id', $category_id);
        }
        $categories = category::all();

        $datas=[
            'books'=>$books->paginate(5),
            'categories'=>$categories
        ];

        return view('user.categorypageuser', $datas);
    }

    public function guestCategory($category_id=0){

        $books = Book::orderBy('Title');

        if($category_id >= 1){
            $books = Book::where('Category_Id', $category_id);
        }
        $categories = category::all();

        $datas=[
            'books'=>$books->paginate(5),
            'categories'=>$categories
        ];

        return view('guest.categorypageguest', $datas);
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
            'Title' => 'min:5',
                'PublicationDate' => 'nullable|date',
                'Author' => 'required|min:5',
                'ISBN' => 'required|digits:13|integer',
                'Publisher' => 'required|min:5',
                'PrintWeight' => 'required|numeric|gt:0.01',
                'PrintWidth' => 'required|numeric|gt:0.01',
                'PrintLength' => 'required|numeric|gt:0.01',
                'Page' => 'required|integer|gt:15',
                'Cost' => 'required|numeric|gt:15',
                'Stock' => 'required|integer|gt:0',
                'Image' => 'nullable|mimes:png,jpg,jpeg',
                'Category_Id' => 'required|exists:categories,id',
                'Format_Id' => 'required|exists:formats,id', // Ensure Format_Id exists in formats table
        ]);

        $imageName = time().'.'.$request->Image->extension();
        $request->Image->move(public_path('images'), $imageName);

        Book::findOrFail($id)->update([
            'Title' => $request->Title,
                'PublicationDate' => $request->PublicationDate,
                'Author' => $request->Author,
                'ISBN' => $request->ISBN,
                'Publisher' => $request->Publisher,
                'PrintWeight' => $request->PrintWeight,
                'PrintWidth' => $request->PrintWidth,
                'PrintLength' => $request->PrintLength,
                'Page' => $request->Page,
                'Category_Id' => $request->Category_Id,
                'Format_Id' => $request->Format_Id, // Add Format_Id here
                'Cost' => $request->Cost,
                'Stock' => $request->Stock,
                'Image' => $imageName
        ]);
        $book->save();
        return redirect('home-admin');
    }

    public function delete($id){
        Book::destroy($id);
        return redirect('home-admin');
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
