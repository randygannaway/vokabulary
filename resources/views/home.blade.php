@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">                        
                
<!--                             Form to lookup the translation of a word -->
                        
                            <div class="col-md-6 col-md-ofset-1">
                                <form method="POST" action='/words/definitions'>
                                    <div class="form-group">
                                        <label for="wordSearch">Find the translation of a Spanish word</label>
                                        <input type="text" id="wordSearch" name="word" class="form-control"></input>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Define</button>
					@if ('message')
					    <?php echo Session::get('message'); ?>
					@endif
                                    </div>
                                </form>
                            </div>          
<!--                             Form to create a new list -->

    @include('lists.newlist')

                            
<!--                             Display current lists -->

    @include('lists.showLists')                            
                            
<!--                              Display recent searches -->

                            <div class="col-md-6 col-md-ofset-1">
                                <div class="list-group">
                                    @foreach ($words as $word)
                                         <li class="list-group-item clearfix" id="word">{{ $word->word }}</li>
                                    @endforeach
                                </div>
                            </div>
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

