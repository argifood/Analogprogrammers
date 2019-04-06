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
                         <p class="font-weight-bold .text-danger"  >Production Date</p>
                        {{$listing->production_date}}
                        <br></br>
                        <p class="font-weight-bold .text-danger"  >Expire Date</p>
                        {{$listing->end_of_auction}}
                    </div>
                        <br></br>
                       
                    
                    </div>
                    <div class="col-sm">
                        <div class="row-sm">
                            <p class="font-weight-bold w-25 "  > Current Price: {{$listing->bid}} € </p>
                            <p class="font-weight-bold w-25 "  > Amount: {{ $listing->amount}}Kg </p>
                            <p class="font-weight-bold w-25 "  > Price per unit: {{ number_format($listing->bid/$listing->amount,5)}} € </p>  
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endisset