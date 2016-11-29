@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    
        <div class="col-md-10 col-md-offset-1">
            <div >
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    
                     @if(Auth::check())
                        Hello , {{Auth::user()->name}} </br> </br> </br>
                        @if($user->book_count<5 )
                        <p>  Your issued books are : </br> </br>
                        @foreach ($books as $book)
                            {{$book->name}} </br>
                        @endforeach

                        </p>
                        </br>
                        </br>
                        @endif 
                        You can issue {{$user->book_count}} more books 
                     @endif
                    
                    @include('flash::message')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
