<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Book;

class BookController extends Controller
{
    protected $books;
    public function __construct()
    {
         $this->middleware('admin', ['only' => [
            'create',
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
        return view('books.showbooks', [
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
        return view('books.addbooks');

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

        return view('books.bookQR',compact('book')); 

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

}
