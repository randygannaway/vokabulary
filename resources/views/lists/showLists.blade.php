@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Your Lists</div>
                <div class="panel-body">
                    @foreach ($lists as $lists)
                        <div class="list-group">
                           <a href="{{ route('words', ['list_id' => $lists->list_id])
                           }}">
                           {{ $lists->list_name}}</a>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
