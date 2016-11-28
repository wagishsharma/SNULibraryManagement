@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    
        <div class="col-md-10 col-md-offset-1">
            <div >
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    
                     @if(Auth::check())
                    Hello , {{Auth::user()->name}} </br>
                    
                     @endif
                    @include('flash::message')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
