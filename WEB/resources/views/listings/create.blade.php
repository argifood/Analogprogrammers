@include('navbar')
<br>
{!! Form::open(['route' => 'listings.store']) !!}
<div class="container">
    <div class="row">
        <div class="col-sm">
<div class="form-group">
    {!! Form::label('bid', 'Τιμή Έναρξης') !!}
    {!! Form::text('bid', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class="col-sm">
<div class="form-group">
    {!! Form::label('buyout', 'Εξαγορά') !!}
    {!! Form::text('buyout', null, ['class' => 'form-control']) !!}
</div>
</div>
</div>
<div class="row">
<div class="col-sm">
<div class="form-group">
    {!! Form::label('amount', 'Ποσότητα (Kg)') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class="col-sm">

<div class="form-group">
    {!! Form::label('quality', 'Ποιότητα') !!}
    {!! Form::select('quality', array('1' => 'Μέτρια', '2' => 'Καλή', '3' => 'Εξαιρετική'), null, ['class' => 'form-control']) !!}
</div>
</div>
</div>
<div class="row">
<div class="col-sm">
<div class="form-group">
        {!! Form::Label('product', 'Προϊόν:') !!}
        {!! Form::select('product_id', $products, null, ['class' => 'form-control']) !!}
</div>
</div>
<div class="col-sm">
<div class="form-group">
    {!! Form::Label('areacode_id', 'Τοποθεσία:') !!}
    {!! Form::select('areacode_id', $areacodes, null, ['class' => 'form-control']) !!}
</div>
</div>
</div>
<div class="row">
<div class="col-sm">
<div class="form-group">
{{ Form::label('production_date', 'Ημερομηνία Παραγωγής:') }}
{{ Form::date('production_date', null, ['class' => 'form-control']) }}
</div>
</div>
<div class="col-sm">
<div class="form-group">
{{ Form::label('end_of_auction', 'Τέλος Δημοπρασίας:') }}
{{ Form::date('end_of_auction', null, ['class' => 'form-control']) }}
</div>
</div>
</div>

{!! Form::submit('Αποστολή', ['class' => 'btn btn-info']) !!}

{!! Form::close() !!}
