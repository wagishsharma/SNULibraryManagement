<?php

function printQRCode($url, $size = 100) {
    return '<img src="http://chart.apis.google.com/chart?chs=' . $size . 'x' . $size . '&cht=qr&chl=' . urlencode($url) . '" >';
}
?> 
@extends('layouts.app')

@section('content')
  <!-- Bootstrap Boilerplate... -->

   
    @if (count($books) > 0)
        <div >
            <div class="panel-heading">
          Welcome {{ Auth::user()->name }}
            </div>

            <div class="table-responsive">
                <table class="table task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Book Name</th>
                        <th>QR Code</th>
                        <th>URL</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <!-- book Name -->
                                <td class="table-text">
                                    <div>{{ $book->name }}</div>
                                </td>
                                
                                <!-- book QR-->
                                
                                <td  class="img-fluid" alt="Responsive image">
                                    <div><?php $url = url('book/'.$book->id );
                                    echo printQRCode($url); 

                                    ?></div>
                                </td>

                                <!-- book URL-->
                                <td class="table-text">
                                <a href="{{$url}}" class="btn btn-primary btn-lg " role="button" >{{$url}}</a>
                                </td>
                                <!-- Delete Button -->
                                <td>
                                    <form action="{{ url('book/'.$book->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection