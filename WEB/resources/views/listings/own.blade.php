@include('navbar')

@isset($listings)
        
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
                        Προϊόν: <strong> {{$listing->product->name}} </strong>
                        </div>
                        <br>
                         <p>Ημερομηνία Παραγωγής:<br />
                        {{$listing->production_date}}<br />
                        Ημερομηνία Λήξης:<br />
                        {{$listing->end_of_auction}}<br />
                        Προέλευση:<br />
                        {{$listing->areacode->name}}
                    </p>
                    </div>
                       
                    
                    </div>
                    <div class="col-sm">
                        <div class="row-sm">
                            <p class="font-weight-bold w-25 "  > Τρέχουσα Τιμή: {{$listing->bid}} € <br />
                            Ποσότητα: {{ $listing->amount}}Kg  <br />
                            Τιμή κιλού: {{ number_format($listing->bid/$listing->amount,5)}} € <br /> 
                            
                            @if($listing->sold==1)
                                @isset($mode)
                                    @if($mode=="buyer")
                                    Τέλος Δημοπρασίας
                                    <button type="button" class="btn btn-info">Πληρωμή</button>
                                    @endif
                                    @if($mode=="seller")
                                    Πωλήθηκε
                                    @endif
                                @endisset
                            @else
                                Δημοπρασία σε εξέλιξη
                            @endif
                            </p>  
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endisset