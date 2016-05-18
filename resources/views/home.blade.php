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
                                        <label for="wordSearch">Find a word</label>
                                        <input type="text" id="wordSearch" name="word" class="form-control"></input>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Define</button>
                                    </div>
                                </form>
                            </div>
                        
<!--                             Form to create a new list -->
                            
                            <div class="col-md-6 col-md-ofset-1">
                                <form method="POST" action='/newlist/store'>
                                    <div class="form-group">
                                        <label for="wordSearch">Create a new list</label>
                                        <input type="text" name="list_name" class="form-control"></input>   
                                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="col-md-6">
                                <h3>View the words in an existing list</h3>
                            </div>
                            <div class="col-md-6">
                                <h3>Recently saved words</h3>
                            </div>
                            
<!--                             Display current lists -->

                            <div class="col-md-6 col-md-ofset-1">
                                <div class="list-group">
                                            @foreach ($lists as $lists)   
                                                <li class="list-group-item clearfix" id="word">
                                                    <a href="/words/{{ $lists->list_id }}" type="submit" class="btn btn-primary" role="button">{{ $lists->list_name }}</a>
                                                    <a href="{{ route('deleteList', ['list_id' => $lists->list_id ]) }}" class="pull-right"><span class="glyphicon glyphicon-trash" title="DELETE" onclick="return confirm('Delete the list {{ $lists->list_name }}?')"></span></a>
                                                </li>
                                            
                                            @endforeach
                                </div>
                            </div>
                            
                            
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

