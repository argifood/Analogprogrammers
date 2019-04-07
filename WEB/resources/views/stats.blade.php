@include('navbar')

<script>
var totalamount = [];
var minprice = [];
var maxprice = [];
var meanprice = [];
var product = [];

@foreach ($stats as $stat)
totalamount.push({!! $stat->totalamount !!});
minprice.push({!! $stat->minprice !!});
maxprice.push({!! $stat->maxprice !!});
meanprice.push({!! $stat->meanprice !!});
var obj = JSON.parse('{!! $stat->product !!}');
product.push(obj['name']);
@endforeach

</script> 
<body>
<div class="container"  id='Graph' >              
<script> 
var trace1 = {
x: product,
y: totalamount,
type: 'bar',
name: 'totalamount',
};
var trace2 = {
x: product,
y: minprice,
type: 'bar',
name: 'minprice',
};
var trace3 = {
x: product,
y: maxprice,
type: 'bar',
name: 'maxprice',
};
var trace4 = {
    x: product,
    y: meanprice,
    type: 'bar',
    name: 'meanprice',
    };
var data = [trace1, trace2, trace3, trace4];
var layout ={barmode: 'group'};
Plotly.newPlot('Graph', data, layout);
</script> 
</div>
</body>
