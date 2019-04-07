@include('navbar')

@isset($listings)
<br> 
    @foreach ($listings as $listing)
      <div class="container">  
          <div class="jumbotron" style="background">
            <div class="row">
                <div class="col-sm-3">
                    
                    <div class="img-responsive">
                        <img src="/images/{{ $listing->product->icon_name }}" class="img-rounded" style="width:100%">
                    </div>
                    <br></br>
                </div>

                <div class="col-sm-4">
                    <div class="text-justify">
                        <div class="text-justify">
                        <p> Προϊόν:  {{$listing->product->name}}<br />
                        <br>
                        Ημερομηνία Παραγωγής:<br />
                        {{$listing->production_date}}<br />
                        Ημερομηνία Λήξης:<br />
                        {{$listing->end_of_auction}}<br />
                        Προέλευση:<br />
                        {{$listing->areacode->name}}
                        </p>
                        </div>
                    </div> 
                       
                    
                    </div>
                    <div class="col-sm">
                        <div class="row-sm">
                            <p> 
                            Τρέχουσα Τιμή: {{$listing->bid}} € <br />
                            Τιμή Εξαγοράς: {{$listing->buyout}} € <br />
                            Ποσότητα: {{ $listing->amount}}Kg <br />
                            Τιμή Κιλού: {{ number_format($listing->bid/$listing->amount,5)}} € <br />
                            @if($listing->buyer_id!=Auth::user()->id)
                            {!! Form::open(array('action' => 'listingscon@bid')) !!}
                            <input type="hidden" value="{{$listing->id}}" name="listing_id">
                            {!! Form::number('bid_amount', null, ['class' => 'form-control','step' => '0.1']) !!}
                            <br>
                            {!! Form::submit('Bid', ['class' => 'btn btn-info']) !!}
                            {!! Form::open(array('action' => 'listingscon@bid')) !!}
                            <input type="hidden" value="{{$listing->id}}" name="listing_id">
                            <input type="hidden" value="{{$listing->buyout}}" name="bid_amount">
                            {!! Form::submit('Buyout', ['class' => 'btn btn-info btn-danger']) !!}
                            {!! Form::close() !!} 
                            {!! Form::close() !!}
                            @else
                                Είσαι ο υψηλότερος πλειοδότης
                            @endif
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endisset