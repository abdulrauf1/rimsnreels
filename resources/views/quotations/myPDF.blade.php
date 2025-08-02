<!DOCTYPE html>
<html>
<head>
    <title>{{$client}} - {{$date}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>
    <h6 class="text-end">{{$date}}</h6>
    <div class="container-fluid border border-3">
        <h1 class="text-center">{{ $title }}</h1>
    
        
                <div class="card" style="font-size:14px;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">                    
                    <div class="text-center">
                        <img src="{{ $logo }}" class="mt-1 img-fluid" style="width:60px;height:60px;">
                    </div>                    
                    <div class="card-body">
                        <h5 class="card-title">{{$user}}</h5>
                        <p class="card-text"><small class="text-body-secondary">{{$email}}</small></p>
                        <p class="card-text">{{$address}}</p>
                        
                    </div>                                          
                </div>
        
        
        <table class="table table-bordered" style="font-size: 12px;">
            <tr>
                <th>Description</th>
                <th>Qty</th>
                <th>Unit</th>
                <th>Rate</th>
                <th>Price</th>
            </tr>
            @foreach($products as $prod)
                <tr>
                    <td>{{ $prod->description }}</td>
                    <td>{{ $prod->qty }}</td>
                    <td>{{ $prod->unit }}</td>
                    <td>{{ $prod->rate }}</td>
                    <td>{{ $prod->qty * $prod->rate  }}</td>
                </tr>
            @endforeach
            <tr>
                <th colspan="4">SubTotal</th>
                <th>{{$subTotal}}</th>
            </tr>
            <tr>
                <td colspan="4">Machinery And Labour</td>
                <td>{{($subTotal/100)*60}}</td>
            </tr>
            <tr>
                <th colspan="4">TOTAL Ex Vat</th>
                <th>{{$subTotal + (($subTotal/100)*60)}}</th>
            </tr>
            <tr>
                <th colspan="4">Total Incl Vat</th>
                <th>{{(($subTotal + (($subTotal/100)*60)) + ($subTotal + (($subTotal/100)*60))/100 * 13.5)}}</th>
            </tr>
        </table>
  
        <table class="table table-bordered" style="font-size: 12px;">
            <tr>
                
                <th>Additional Costs</th>
                <th>Amount</th>
            </tr>
            @foreach($costs as $cost)
            <tr>
                <td>{{ $cost->costFor }}</td>
                <td>{{ $cost->amount  }}</td>
            </tr>
            @endforeach
        </table>
        <table class="table table-bordered" style="font-size: 12px;">
            <tr>
                
                <th>Total</th>
                
                    <th>{{$costTotal + (($subTotal + (($subTotal/100)*60)) + ($subTotal + (($subTotal/100)*60))/100 * 13.5)}}</th>
                
            </tr>
            
        </table>
    </div>
    
    
</body>
</html>
