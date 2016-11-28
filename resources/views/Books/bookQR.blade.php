@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-1 col-sm-10">
            
                
            @if (count($book) > 0)

                <div ">
                    <div class="panel-heading">
                         Book      
                    </div>

                    <div class="table-responsive">
                        <table class="table Book-table">
                            <thead>
                                <th>Name</th>
                                <th>Author</th>
                                <th>Publisher</th>
                                
                                
                            </thead>
                            <tbody>
                                
                                    <tr>
                                        <td class="table-text"><div>{{ $book->name }}</a></div></td> 
                                        <td class="table-text"><div>{{ $book->author }}</div></td>
                                        <td class="table-date"><div>{{ $book->publisher }}</div></td>
                                                                          
                                    </tr>

                               
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="{{url('user/'.$user->id.'/book/'.$book->id)}}" class="btn btn-info" role="button">Issue Book</a>
            @endif

        </div>
    </div>

@endsection