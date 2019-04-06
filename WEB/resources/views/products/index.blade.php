@include('navbar')
<div class='container'>
{!! Form::open(['action' => 'productsscon@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}

    <br>
    <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Icon</th>
        <th scope="col">Name</th>
      </tr>
    </thead>
    <tbody>
    @isset($products)
    
    @foreach ($products as $product)
            <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>
            <img src="/images/{{ $product->icon_name }}" class="img-rounded" style="width:10%">
            </td>
            <td>{{ $product->name }}</td>
          </tr>      
    @endforeach
@endisset
</div>