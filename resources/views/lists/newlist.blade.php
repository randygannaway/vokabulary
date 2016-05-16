@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="/newlist">Create a new list</a>
                </div>
                    <div class="panel-body">
                        <h3>Name the new list</h3>
                        <div class="col-md-6 col-md-ofset-1">
                            <form method="POST" action='/newlist/store'>
                                <div class="form-group">
                                    <textarea name="list_name" class="form-control"></textarea>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6 col-md-ofset-1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

