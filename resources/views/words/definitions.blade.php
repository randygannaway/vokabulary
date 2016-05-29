@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">The top definition</div>
                <div class="panel-body">
                    <div class="row">
		    <div class="col-md-2">
                        
                        <p>{{ $word }}</p>
                        <p>{{ $english }}</p> 
                        
                    </div>
                    <div class="col-md-10">
                        <p>If you would like to save this definition to a list, click on the link below.</p>
                        <form method="POST" action='/saved'>

                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="hidden" name="definition" value="{{ $english }}"/>
                            <input type="hidden" name="word" value="{{ $word }}"/>
                                @foreach ($lists as $lists)                                
                                    <button type="submit" class="btn btn-primary" name="list_id" value="{{ $lists->list_id }}">{{ $lists->list_name }}</button>
                                @endforeach

                        </form>
		    </div>
		    </div>
		    <div clas="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-10">
			    <h2>Or you can...</h2>
			    @include('../lists/newlist');
			</div>
		    </div>

                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
