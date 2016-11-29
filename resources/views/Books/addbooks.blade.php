@extends('layouts.app')

@section('content')
<div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div >
                <div class="panel-heading">
                    Add Book
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New book Form -->
                    <form action="{{ url('book') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- book Name -->
                        <div class="form-group">
                            <label for="book-name" class="col-sm-3 control-label">Name</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="book-name" class="form-control" value="{{ old('receipt') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book-author" class="col-sm-3 control-label">Author</label>

                            <div class="col-sm-6">
                                <input type="text" name="author" id="book-author" class="form-control" value="{{ old('receipt') }}">
                            </div>
                        </div>
                        
                       
                        <div class="form-group">
                            <label for="book-publisher" class="col-sm-3 control-label">Publisher</label>

                            <div class="col-sm-6">
                                <input type="text" name="publisher" id="book-publisher" class="form-control" value="{{ old('receipt') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book-available_no" class="col-sm-3 control-label">Total Available</label>

                            <div class="col-sm-6">
                                <input type="text" name="available_no" id="book-available_no" class="form-control" value="{{ old('receipt') }}">
                            </div>
                        </div>
                         

                        <!-- Add book Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Book
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            
        </div>
    </div>
@endsection
