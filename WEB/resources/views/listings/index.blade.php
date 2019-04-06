@include('navbar')

@isset($listings)
        
    @foreach ($listings as $listing)
      <div class="container">  
        <div class="row">
            <div class="col-sm-3">
                {{ $listing->id }}
                {{$listing->end_of_auction}}
                <br></br>
                <div class="text-justify">
                    {{$listing->product->name}}
                    {{$listing->bid}}
                </div>
                <div class="img-responsive">
                    <img src="/images/{{ $listing->product->icon_name }}" class="img-rounded" style="width:100%">
                </div>
                <br></br>

                <div class="col-sm">
                    
                    {!! Form::open(array('action' => 'listingscon@bid')) !!}
                    <input type="hidden" value="{{$listing->id}}" name="listing_id">
                    {!! Form::number('bid_amount', null, ['class' => 'form-control','step' => '0.1']) !!}
                    <br>
                    {!! Form::submit('Bid', ['class' => 'btn btn-info']) !!}
                    {!! Form::close() !!}
                </div>  

                
                {!! Form::open(array('action' => 'listingscon@bid')) !!}
                <input type="hidden" value="{{$listing->id}}" name="listing_id">
                <input type="hidden" value="{{$listing->buyout}}" name="bid_amount">
                {!! Form::submit('Buyout', ['class' => 'btn btn-info']) !!}
                {!! Form::close() !!}
                <br>
            </div>
        </div>
    </div>
    @endforeach
@endisset