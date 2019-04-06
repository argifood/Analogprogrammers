{!! Form::open(['route' => 'listings.store']) !!}

<div class="form-group">
    {!! Form::label('bid', 'Bid') !!}
    {!! Form::text('bid', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('buyout', 'Buyout') !!}
    {!! Form::text('buyout', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('amount', 'Amount') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('buyout', 'Buyout') !!}
    {!! Form::text('buyout', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('quality', 'Quality') !!}
    {!! Form::text('quality', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
        {!! Form::Label('product', 'Product:') !!}
        {!! Form::select('product_id', $products, null, ['class' => 'form-control']) !!}
</div>

</div>
<div class="form-group">
{{ Form::label('production_date', 'Production date:') }}
{{ Form::date('production_date', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
{{ Form::label('end_of_auction', 'End of auction:') }}
{{ Form::date('end_of_auction', null, ['class' => 'form-control']) }}
</div>

{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}
