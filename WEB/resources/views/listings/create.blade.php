@include('navbar')
<br>
{!! Form::open(['route' => 'listings.store']) !!}
<div class="container">
    <div class="row">
        <div class="col-sm">
<div class="form-group">
    {!! Form::label('bid', 'Starting bid') !!}
    {!! Form::text('bid', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class="col-sm">
<div class="form-group">
    {!! Form::label('buyout', 'Buyout') !!}
    {!! Form::text('buyout', null, ['class' => 'form-control']) !!}
</div>
</div>
</div>
<div class="row">
<div class="col-sm">
<div class="form-group">
    {!! Form::label('amount', 'Amount (Kg)') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class="col-sm">

<div class="form-group">
    {!! Form::label('quality', 'Quality') !!}
    {!! Form::select('quality', array('1' => 'Bad', '2' => 'Mediocre', '3' => 'Good'), null, ['class' => 'form-control']) !!}
</div>
</div>
</div>
<div class="row">
<div class="col-sm">
<div class="form-group">
        {!! Form::Label('product', 'Product:') !!}
        {!! Form::select('product_id', $products, null, ['class' => 'form-control']) !!}
</div>
</div>
<div class="col-sm">
<div class="form-group">
    {!! Form::Label('areacode_id', 'Location:') !!}
    {!! Form::select('areacode_id', $areacodes, null, ['class' => 'form-control']) !!}
</div>
</div>
</div>
<div class="row">
<div class="col-sm">
<div class="form-group">
{{ Form::label('production_date', 'Production date:') }}
{{ Form::date('production_date', null, ['class' => 'form-control']) }}
</div>
</div>
<div class="col-sm">
<div class="form-group">
{{ Form::label('end_of_auction', 'End of auction:') }}
{{ Form::date('end_of_auction', null, ['class' => 'form-control']) }}
</div>
</div>
</div>

{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}
