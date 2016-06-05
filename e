
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">                        
                
                        
                            
<!--                             Display current lists -->

                            


<div class="col-md-6 col-md-ofset-1">
<div class="list-group">
            @foreach ($lists as $lists)   
                <li class="list-group-item clearfix" id="word">
                    <a href="{{ route('flashcards', ['list_id' => $lists->list_id ]) }}" type="submit" class="btn btn-primary" role="button">{{ $lists->list_name }}</a>
                </li>
            
            @endforeach
</div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
