@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-1 col-sm-10">
            
                
            @if (count($books) > 0)

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
                                <th>Total Available</th>
                                
                                
                            </thead>
                            <tbody>
                                
                                    <tr>
                                        <td class="table-text"><div>{{ $books->name }}</a></div></td> 
                                        <td class="table-text"><div>{{ $books->author }}</div></td>
                                        <td class="table-date"><div>{{ $books->publisher }}</div></td>
                                        <td class="table-date"><div>{{ $books->available_no }}</div></td>
                                                                          
                                    </tr>

                               
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($books->available_no > 0 && $user->book_count>0)
                    @if(Auth::Check() && ! Auth::user()->isAdmin())
                    
                    @endif
                    @if(Auth::Check() &&  Auth::user()->isAdmin())
                        @if (count($books) > 0)
                   
                        <div class="table-responsive">
                            <table class="table task-table">
                                <thead>
                                    <th>User Name</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                

                                    @foreach ($books->users as $user )
                                   
                                        <tr>
                                            <td class="table-text"><div>{{ $user->name }}</div></td>

                                            <!-- Book Delete Button -->
                                            <td>
                                               
                                                  <a href=" {{url('user/' . $user->id.'/book/'.$books->id.'/delete')}}" class="btn btn-danger" role="button">Return Book</a>    
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>    
                         @endif
                    @else()
                    <a href="{{url('user/'.$user->id.'/book/'.$books->id)}}" class="btn btn-info" role="button">Issue Book</a>     
                    @endif
                
                                   
                @else 
               
                    @if($book->available_no <= 0)
                    Book not Avaiable
                   
                    
                    @else
                     Max Book limit (5) reached ! You cannot issue more books.
                    @endif
                @endif
                
            @endif

        </div>
    </div>

@endsection