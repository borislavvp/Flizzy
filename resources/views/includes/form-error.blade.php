@if(count($errors)>0)

    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                @if($error == 'The role id field is required.')
                    <li>The role field is required.</li>
                @elseif($error == 'The is active field is required.')
                    <li>The status field is required.</li>
                @else
                    <li>{{$error}}</li>
                @endif
            @endforeach
        </ul>
    </div>

@endif