<!DOCTYPE html>
<html>
<head>
    <title>Place Purchase Order</title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container col-md-8">
        <h2 class=" mt-10">Place Purchase Order</h2>
    
        <form method="POST" action="{{ route('freeOrder.store') }}">
            @csrf <!-- CSRF protection -->
            <div  class="form-row">
            
            
            <div class="form-group col-md-2">
                <label for="distributor">Customer Name</label>
                <select class="form-control" id="customer_name" name="customer_name">
                    <@foreach ($user as $item)
                    @if($item->role !== 'admin')
                    <option>{{$item->name}}</option>
                    @endif
                @endforeach
                   
                </select>
            </div>
            
        </div>
        <div  class="form-row">
            
            <div class="form-group col-md-2">
                <label for="region">PO NO</label>
                <select class="form-control" id="po_no" >
                    <option>{{$order->max('bulk_id')+1}}</option>
                    <!-- Add region options dynamically -->
                </select>
                <input type="hidden" name="bulk_id" value="{{ $order->max('bulk_id')+1}}">

            </div>
            {{-- <td><label hidden="hidden" id="bulk"  >{{ $item->max(bulk_id)+1}}</td> --}}
            
        </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>PRODUCT NAME</th>
                        <th>PRODUCT CODE</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>FREE</th>
                        <th>AMOUNT</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($free_define as $item )
                    
               
                    <tr>
                        <td><label type="text" class="form-control" name="product_name[]">{{$item->product}}</td>
                        <td><label type="text" class="form-control" name="product_code[]">{{$item->sku_id}}</td>
                        <td><label type="text" class="form-control" name="price[]" id='unit_price'>{{$item->unit_price}}</td>
                        {{-- <td><input type="number" class="form-control" id="en_qty" name="en_qty[]" placeholder="type here" min={{$item->lower_limit}} max={{$item->upper_limit}}></td> --}}
                        <td><input type="number" class="form-control" id="en_qty" name="en_qty[]" placeholder="type here" ></td>
                       
                        <td><label type="text" class="form-control" id="free_qty" > </td>
                        <td><label hidden="hidden" id="free_qty_js"  >{{ $item->free_quantity}}</td>
                        <td><label hidden="hidden" id="type"  >{{ $item->type}}</td>
                        <td><label hidden="hidden" id="per_qty"  >{{ $item->purchase_quantity}}</td>

                        <td><label hidden="hidden" id="lower_limit"  >{{$item->lower_limit}} </td>
                        <td><label hidden="hidden" id="upper_limit"  >{{$item->upper_limit}}</td>

                        <input type="hidden" name="free_qty[]" id='free_qty1' >
                        {{-- <td><label type="text" class="form-control" id="free_qty" name="free_qty[]"></td> --}}
                        <td><label type="text" class="form-control" id="price"  name=''></td>
                            
                        <input type="hidden" name="product_name[]" value="{{ $item->product }}">
                        <input type="hidden" name="product_code[]" value="{{ $item->sku_id }}">
                        <input type="hidden" name="price[]" value="{{ $item->unit_price }}">
                        {{-- <input type="hidden" name="free_qty[]" > --}}
                        <input type="hidden" id="amount" name="amount[]">
               
                    </tr>
                    
                    @endforeach
             
                    
                </tbody>
            </table>
            <div class="form-row" >
                <div class="col-md-2 mb-3">
                    <label for="distributor">total_amount :</label>
                </div>
                <div class="col-md-2 mb-3">
                    <label  id="total_amount"></label>
                </div>
                <div class="col-md-4 mb-3">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>

            </div>
  
        </form>
    </div>
    <script>
        const inputFields = document.querySelectorAll('#en_qty');
        //const displayLabel1=document.getElementById('total_amount');
        

        for (const inputField of inputFields) {
           
        inputField.addEventListener('input', function (event) {
            const targetInput = event.target; 
            const parentRow = targetInput.closest('tr'); 
            const displayLabel1 = parentRow.querySelector('#free_qty'); 
            const displayLabel2 = parentRow.querySelector('#price'); 

            // Get the current unit price value
            const unitPriceValue = parentRow.querySelector('#unit_price').textContent;
            const freeQtyValue = parentRow.querySelector('#free_qty_js').textContent;
            const type = parentRow.querySelector('#type').textContent;
            const perQty = parentRow.querySelector('#per_qty').textContent;
            const lowerLimit = parentRow.querySelector('#lower_limit').textContent;
            const upperLimit = parentRow.querySelector('#upper_limit').textContent;

            const inputValue = targetInput.value; // Get the current entry quantity
            const unitValue = parseFloat(unitPriceValue); // Parse the unit price value
            const freeValue = parseFloat(freeQtyValue);
            const purchaseValue = parseFloat(perQty);

            const lowerValue = parseFloat(lowerLimit);
            const upperValue = parseFloat(upperLimit);

            const units = parseFloat(inputValue);
            const integerValue = unitValue * units;
            var freeq ;
           
            

            if(type=='Multiple'){
                var freeq = Math.round(freeValue*units/purchaseValue);
                
   
            }else{
                var freeq = Math.round(freeValue);
            }
            

            if(units>=lowerLimit && units<= upperLimit){
                displayLabel1.textContent = freeq;
                //break;

            }
            else{
                freeq=0
                displayLabel1.textContent = freeq;
            }
            displayLabel2.textContent = integerValue.toFixed(2);
            

            const myInput = parentRow.querySelector('#amount');
            myInput.value = JSON.stringify(integerValue);

            const myfree = parentRow.querySelector('#free_qty1');
            //myfree = document.getElementById('free_qty1');
            myfree.value = JSON.stringify(freeq);

            totalSum = 0;
            inputFields.forEach((inputField) => {
                const parentRow = inputField.closest('tr');
                const unitPriceValue = parentRow.querySelector('#unit_price').textContent;
                const units = parseFloat(inputField.value) || 0;
                const unitValue = parseFloat(unitPriceValue);
                totalSum += unitValue * units;
            });
            //console.log('Total Sum:', totalSum);
            const displayTotal=document.getElementById('total_amount');
            displayTotal.textContent = totalSum;

        });
        
        }
    </script>
  

    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
