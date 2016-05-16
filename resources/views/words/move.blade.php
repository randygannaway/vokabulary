@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">The top definition</div>
                <div class="panel-body">
                    <div class="col-md-2">
                        
                        <p>{{ $word }}</p>
                        <p>{{ $translation }}</p> 
                        
                    </div>
                    <div class="col-md-10">
                        <p>Click to move this word to a new list.</p>
                        <form method="POST" action='/update'>

                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="hidden" name="definition" value="{{ $translation }}"/>
                            <input type="hidden" name="word_id" value="{{ $word_id }}"/>
                                @foreach ($lists as $lists)                                
                                    <button type="submit" class="btn btn-primary" name="list_id" value="{{ $lists->list_id }}">{{ $lists->list_name }}</button>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

