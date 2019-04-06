@include('navbar')

@isset($listings)
    @foreach ($listings as $listing)
        {{$listing->id}}
        {{$listing->end_of_auction}}
        {{$listing->product->name}}
        <br>
    @endforeach
@endisset