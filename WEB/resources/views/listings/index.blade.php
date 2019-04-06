@isset($listings)
    @foreach ($listings as $listing)
        {{ $listing->id }}
        {{$listing->end_of_auction}}
        {{$listing->product->name}}
        {{$listing->bid}}
        {!! Form::open(array('action' => 'listingscon@bid')) !!}
        <input type="hidden" value="{{$listing->id}}" name="listing_id">
        {!! Form::number('bid_amount', null, ['class' => 'form-control','step' => '0.1']) !!}
        <br>
        {!! Form::submit('Bid', ['class' => 'btn btn-info']) !!}
        {!! Form::close() !!}
        {!! Form::open(array('action' => 'listingscon@bid')) !!}
        <input type="hidden" value="{{$listing->id}}" name="listing_id">
        <input type="hidden" value="{{$listing->buyout}}" name="bid_amount">
        {!! Form::submit('Buyout', ['class' => 'btn btn-info']) !!}
        {!! Form::close() !!}
        <br>
    @endforeach
@endisset