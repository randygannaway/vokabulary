
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
