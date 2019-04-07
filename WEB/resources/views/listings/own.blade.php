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
                            <p class="font-weight-bold "  > Product:  {{$listing->product->name}} </p>
                        </div>
                         <p class="font-weight-bold .text-danger"  >Production Date:<br />
                        {{$listing->production_date}}<br />
                        Expire Date:<br />
                        {{$listing->end_of_auction}}<br />
                        Origin:<br />
                        {{$listing->areacode->name}}
                    </p>
                    </div>
                       
                    
                    </div>
                    <div class="col-sm">
                        <div class="row-sm">
                            <p class="font-weight-bold w-25 "  > Current Price: {{$listing->bid}} € <br />
                            Amount: {{ $listing->amount}}Kg  <br />
                            Price per unit: {{ number_format($listing->bid/$listing->amount,5)}} € <br /> 
                            
                            @if($listing->sold==1)
                                @isset($mode)
                                    @if($mode=="buyer")
                                    Auction Finished
                                    <button type="button" class="btn btn-info">Pay</button>
                                    @endif
                                    @if($mode=="seller")
                                    Product Sold
                                    @endif
                                @endisset
                            @else
                                Auction in progress
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