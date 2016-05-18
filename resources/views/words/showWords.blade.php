@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">The words you 've searched for
                </div>
                <div class="panel-body">
                <div class="col-md-3">
                </div>
                    <div class="col-md-6">
                        <div class="list-group">
                            @foreach ($words as $word)
                                <span class="label label-default" id="translation">{{ $word->word }}</span>

                                <li class="list-group-item clearfix" id="word">
                                    {{ $word->translation }}
                                    <a href="{{ route('deleteWord', ['word_id' => $word->id ]) }}" class="pull-right"><span class="glyphicon glyphicon-trash" title="DELETE"></span></a>
                                    
                                    <a href="{{ route('move', ['word_id' => $word->id, 'word' => $word->word, 'translation' => $word->translation ]) }}" class="pull-right"><span class="glyphicon glyphicon-move" title="MOVE"></span></a>
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
