

<div class="col-md-6 col-md-ofset-1">
    <h4>These are the lists you've made</h4>
        <div class="list-group">
                    @foreach ($lists as $lists)   
                        <li class="list-group-item clearfix" id="word">
                            <a href="/words/{{ $lists->list_id }}" type="submit" class="btn btn-primary" role="button">{{ $lists->list_name }}</a>
                            <a href="{{ route('deleteList', ['list_id' => $lists->list_id ]) }}" class="pull-right"><span class="glyphicon glyphicon-trash" title="DELETE" onclick="return confirm('Delete the list {{ $lists->list_name }}?')"></span></a>
                        </li>
                    
                    @endforeach
        </div>
</div>
