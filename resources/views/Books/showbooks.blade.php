@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-1 col-sm-10">
            
                
            @if (count($books) > 0)

                <div >
                    <div class="panel-heading">
                        Current books       (Click on book Name to add tests related to book)
                    </div>

                    <div class="table-responsive">

                        <table class="table  book-table">
                            <thead>
                                <th>Name</th>
                                <th>Author</th>
                                <th>Publisher</th>
                                <th>Total Available</th>
                                 @if(Auth::check() && Auth::user()->isAdmin())
                                <th>&nbsp;</th>
                                @endif
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td class="table-text"><div>{{ $book->name }}</div></td> 
                                        <td class="table-text"><div>{{ $book->author }}</div></td>
                                        <td class="table-text"><div>{{ $book->publisher }}</div></td>
                                        <td class="table-text"><div>{{ $book->available_no }}</div></td>
                                                                               
                                       
                                        @if(Auth::check() && Auth::user()->isAdmin())
                                        <!-- book Delete Button -->
                                        <td>
                                            <form action="{{url('book/' . $book->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-book-{{ $book->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                        @endif 

                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            
    </div>
@endsection
