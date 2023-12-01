<!DOCTYPE html>
<html>
<head>
    <title>View Purchase Orders</title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container col-md-12">
        @php
            $bulkId = request('bulk_id');
            //echo $bulkId
        @endphp
        <h2 class="mt-10">View Order Details</h2>
    
        
        
        <table class="table">
            <thead>
                <tr>
                    {{-- <th>Region</th> --}}
                    {{-- <th>Territory</th> --}}
                    <th>Customer</th>
                    <th>product</th>
                    <th>product Code</th>
                    <th>price</th>
                    <th>PO Number</th>
                    
                    <th>Quantity</th>
                    <th>free Quantity</th>
                    <th>Discount %</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>amount</th>

                    

                </tr>
            </thead>
            <tbody id="tableBody">
                @foreach ($resultDetails as $item)
                @if ($item->bulk_id == $bulkId )
                @php
                    // Convert the timestamp to a Carbon instance
                    $createdAt = \Carbon\Carbon::parse($item->date);

                    // Separate date and time
                    $date = $createdAt->toDateString(); // Format: Y-m-d
                    $time = $createdAt->toTimeString(); // Format: H:i:s
                @endphp
                <tr>
                    {{-- <td><label type="text" class="form-control" name="product_name[]">{{$item->region}}</td> --}}
                    {{-- <td><label type="text" class="form-control" name="product_code[]">{{$item->territory_name}}</td> --}}
                    <td><label type="text" class="form-control" name="price[]" id='unit_price'>{{$item->customer_name}}</td>
                    
                    <td><label type="text" class="form-control" name="product_name[]">{{$item->product_name}}</td>
                    <td><label type="text" class="form-control" name="product_code[]">{{$item->product_code}}</td>
                    <td><label type="text" class="form-control" name="price[]" id='unit_price'>{{$item->price}}</td>

                    <td><label type="text" class="form-control" name="product_name[]">{{$item->bulk_id}}</td>
                    <td><label type="text" class="form-control" name="product_code[]">{{$item->en_qty}}</td>
                    <td><label type="text" class="form-control" name="price[]" id='unit_price'>{{$item->free_qty}}</td>
                        <td><label type="text" class="form-control" name="price[]" id='unit_price'>{{$item->discount}}</td>
                
                    <td><label type="text" class="form-control" name="product_name[]">{{$date}}</td>
                    <td><label type="text" class="form-control" name="product_code[]">{{$time}}</td>
                    <td><label type="text" class="form-control" name="price[]" id='unit_price'>{{$item->amount}}</td>
                </tr>
                
                @endif
                    
                @endforeach
                
            </tbody>
        </table>
        
    </div>
    

    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
