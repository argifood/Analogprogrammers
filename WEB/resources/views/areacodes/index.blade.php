{!! Form::open(['action' => 'areacodecon@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

    @isset($areacodes)
    @foreach ($areacodes as $areacode)
        {{$areacode->id}}
        {{$areacode->name}}
        <br>
    @endforeach
@endisset