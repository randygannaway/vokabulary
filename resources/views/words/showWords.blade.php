@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">The words you 've searched for</div>
                <div class="panel-body">
                <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="list-group">
                            @foreach ($words as $word)
                                <span class="label label-default" id="translation">{{ $word->word }}</span>

                                <li class="list-group-item clearfix" id="word">
                                    {{ $word->translation }}
                                    <a href="{{ route('delete', ['word_id' => $word->id ]) }}" class="btn btn-danger pull-right">delete</a>
                                </li>
                                
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <a href={{ url('/home') }}>Back to Dashboard</a>
            </div>
        </div>
    </div>
</div>
@endsection
