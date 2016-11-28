<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Book;
use DB;
use App\User;


class BookController extends Controller
{
    protected $books;
    public function __construct()
    {
         $this->middleware('admin', ['only' => [
            'create',
        ]]);
         $this->middleware('auth', ['only' => [
            'show',
        ]]);
         $this->books =Book::all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Books.showbooks', [
            'books' => $this->books,
            //forUser($request->user()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Books.addbooks');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $this->validate($request, [
            'name' => 'required|max:255','publisher'=>'required|max:255', 'author'=>'required|max:255']);
         $book =  $request->user()->books()->create([
            'name' => $request->name,'author'=>$request->author,'publisher' => $request->publisher,
        ]);
         return redirect('book');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $book = Book::find($id);
        if(Auth::check())
        {
            $user =Auth::user();
           // dd($user);
        }
      
        return view('Books.bookQR',compact('book','user')); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Book $book)
    {
        

        $book->delete();

        return back();
    }
    public function showQR()
    {
        //
         //$this->books=book::all();
     
         return view('showQR', [
            'books' => $this->books,
            //forUser($request->user()),
        ]);
        
    }
    public function storeBook($id, $book_id)
    {
        
       // dd($request->all());
        $user = User::find($id);
        if(!(DB::table('book_user')->where('user_id', $user->id)->where('book_id', $book_id)->count()))
        {
            $user->book_count = $user->book_count - 1 ;
        $user->books()->attach($book_id);
        $user->save();
         //return redirect('');
        return redirect('home');
        }
         flash('You have already issued this book.');
        return redirect('home');
        
        
    }


}
