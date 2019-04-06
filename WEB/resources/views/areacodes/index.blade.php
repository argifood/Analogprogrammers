@include('navbar')
<div class='container'>
{!! Form::open(['action' => 'areacodecon@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    <br>
    
    <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
      </tr>
    </thead>
    <tbody>
    @isset($areacodes)
    
    @foreach ($areacodes as $areacode)
            <tr>
            <th scope="row">{{ $areacode->id }}</th>
            <td>{{ $areacode->name }}</td>
          </tr>      
    @endforeach
@endisset
        </div>