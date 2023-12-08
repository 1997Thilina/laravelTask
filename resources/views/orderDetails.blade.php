<!DOCTYPE html>
<html>
<head>
    <title>View Purchase Orders</title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
</head>
<body>
    <button onclick="downloadPdf()">Download PDF</button>
    
    <div id="pdfContent" class="container col-md-10">
        @php
            $bulkId = request('bulk_id');
            $cName = request('c_Name');
            $amount = request('amount');
            // echo $cName;
            // echo $amount;
        @endphp
        <h2 class="mt-10">Order Details</h2>
       
        <div> 
            <label for="cName">Customer Name : </label> 
            <label id="cName">{{$cName}}</label>
        </div>
        <div> 
            <label for="cName">PO Number : </label> 
            <label id="cName">{{$bulkId}}</label>
        </div>
    
        
        
        <table class="table">
            <thead>
                <tr>
                    {{-- <th>Region</th> --}}
                    {{-- <th>Territory</th> --}}
                    {{-- <th>Customer</th> --}}
                    <th>product</th>
                    <th>product Code</th>
                    <th>price</th>
                    {{-- <th>PO Number</th> --}}
                    
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
                    {{-- <td><label type="text" class="form-control" name="price[]" id='unit_price'>{{$item->customer_name}}</td> --}}
                    
                    <td><label type="text" class="form-control" name="product_name[]">{{$item->product_name}}</td>
                    <td><label type="text" class="form-control" name="product_code[]">{{$item->product_code}}</td>
                    <td><label type="text" class="form-control" name="price[]" id='unit_price'>{{$item->price}}</td>

                    {{-- <td><label type="text" class="form-control" name="product_name[]">{{$item->bulk_id}}</td> --}}
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
        <div style="margin-left: 85%" > 
            {{-- <div class="form-row"> --}}
                <label for="cName" class="ol-md-5 ">Total amount:  </label> 
                <label class=" "></label>
                <label id="cName" class="form-control col-md-5 ">{{$amount}}</label>
            {{-- </div> --}}
        </div> 
    </div>
    <script>
        
        function downloadPdf() {
            var element = document.getElementById('pdfContent');
            var options = {
            //margin: 10,  // Set margins (in mm)
            filename: 'Invoice_PO_'+bulk_id_Value+'.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a3', orientation: 'portrait' }
            
        };

        html2pdf(element, options);
        // setTimeout(() => { 
        //     history.go(-1);   
        // }, 1500);
        
            //html2pdf(element);
        }

        let downValue = getRequestParam('downVal');
        const requestValue = getRequestParam('down');
        const bulk_id_Value = getRequestParam('bulk_id');
        
        

        // Add an event listener when the DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Check if the request value is present and has a specific value
            if (requestValue && requestValue === 'true') {
                
                //alert('Event Triggered!' + requestValue);
                var element = document.getElementById('pdfContent');
                var options = {
                //margin: 10,  // Set margins (in mm)
                filename: 'Invoice_PO_'+bulk_id_Value+'.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a3', orientation: 'portrait' }
                }
                html2pdf(element, options);
                 //downValue=downValue+1;
                console.log('downV  ' +downValue.toString());

                localStorage.setItem('triggerEvent', 'true');
                localStorage.setItem('myParameter', downValue);
                setTimeout(() => { 
                    
                    history.go(-1);   
                }, 1000);
            }
        });

        function getRequestParam(param) {
        const urlSearchParams = new URLSearchParams(window.location.search);
        return urlSearchParams.get(param);
        }

    </script>
    

    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
