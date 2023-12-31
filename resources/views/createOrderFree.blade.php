<!DOCTYPE html>
<html>
<head>
    <title>Place Purchase Order</title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
    <div class="container col-md-11">
        <h2 class=" mt-10">Place Purchase Order</h2>
    
        <form method="POST" action="{{ route('freeOrder.store') }}" id="freeOrderForm">
            @csrf <!-- CSRF protection -->
            <div  class="form-row">
            
            
            <div class="form-group col-md-2">
                <label for="distributor">Customer Name</label>
                <select class="ch col-md-12" id="customer_name" name="customer_name" required>
                    <option value="" disabled selected>Select Name</option>
                    <@foreach ($user as $item)
                    @if($item->role !== 'admin')
                    <option>{{$item->name}}</option>
                    @endif
                @endforeach
                   
                </select>
            </div>

            {{-- <div class="col-md-4">
                <label for="distributor">Customer Name</label>

                <select class="ch col-md-8" id="customer_name" name="customer_name">>
                    
                    <option value="" disabled selected>Select</option>
                    
                    <option value="" disabled selected>Select Name</option>
                    <@foreach ($user as $item)
                    @if($item->role !== 'admin')
                    <option>{{$item->name}}</option>
                    @endif
                    <!-- Add distributor options dynamically -->
                </select>
            </div> --}}
            
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
            <div>
                @if(session('success'))
                    <span id="flash_message" class="alert alert-success">
                    {{ session('success') }}
                    </span>
                @endif
            </div>
            
        </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>PRODUCT NAME</th>
                        <th>PRODUCT CODE</th>
                        <th>PRICE</th>
                        <th>AVAILABLE QUANTITY</th>
                        <th>QUANTITY</th>
                        <th> </th>
                        <th>FREE</th>
                        <th>DISCOUNT %</th>
                        
                        <th> </th>
                        <th> </th>
                        <th>REMAINING QUANTITY</th>
                        <th>AMOUNT</th>
                        <th>FINAL AMOUNT</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($query as $item )
                    
               
                    <tr>
                        <td><label type="text" class="form-control" name="product_name[]">{{$item->sku_name}}</td>
                        <td><label type="text" class="form-control" name="product_code[]">{{$item->id}}</td>
                        <td><label type="text" class="form-control" name="price[]" id='unit_price'>{{$item->dPrice}}</td>
                        {{-- <td><input type="number" class="form-control" id="en_qty" name="en_qty[]" placeholder="type here" min={{$item->lower_limit}} max={{$item->upper_limit}}></td> --}}
                        <td><label type="text" class="form-control" id="skuQuantity" name="">{{$item->skuQuantity}}</td>
                        
                        <div>
                            <td><input type="number" class="form-control" id="en_qty" name="en_qty[]" placeholder="type here" max="{{$item->skuQuantity}}" ></td>
                            <td><span id="mym1" ></span></td>
                        </div>
                        

                       
                        @if (is_null($item->free_quantity))
                        <td><label type="text" class="form-control" id="free_qty" >NoOffer</td>
                        @else
                        <td><label type="text" class="form-control" id="free_qty" ></td>
                        @endif

                        @if (is_null($item->discount))
                        <td><label type="text" class="form-control" id="discount" >NoDiscount</td>
                            <input type="hidden" id='discount_value' name='discount_value[]' value="">
                            <td><label hidden="hidden" id="discount_js"  >0</td>
                            <td><label hidden="hidden" id="discountLowerLimit_js"  >0</td>
                        @else
                        
                        <td><label type="text" class="form-control" id="discount" > {{ $item->discount}}</td>
                            <input type="hidden" id='discount_value' name='discount_value[]' value="">
                            <td><label hidden="hidden" id="discount_js"  >{{ $item->discount}}</td>
                            <td><label hidden="hidden" id="discountLowerLimit_js"  >{{ $item->lower_limit_dis}}</td>
                         @endif

                         <td><label type="text" class="form-control" id="remaining_skuQuantity" name=""></td>
                        <td><label type="text" class="form-control" id="price0"  name=''></td>  
                        <td><label type="text" class="form-control" id="price"  name=''></td>

                         @if (is_null($item->free_quantity))
                         <td><label hidden="hidden" id="free_qty_js"  >0</td>
                            <td><label hidden="hidden" id="type"  >Flat</td>
                            <td><label hidden="hidden" id="per_qty"  >0</td>
    
                            <td><label hidden="hidden" id="lower_limit"  >0 </td>
                            <td><label hidden="hidden" id="upper_limit"  >0</td>
                         @else
                         
                         

                        <td><label hidden="hidden" id="free_qty_js"  >{{ $item->free_quantity}}</td>
                        <td><label hidden="hidden" id="type"  >{{ $item->type}}</td>
                        <td><label hidden="hidden" id="per_qty"  >{{ $item->purchase_quantity}}</td>

                        <td><label hidden="hidden" id="lower_limit"  >{{$item->lower_limit}} </td>
                        <td><label hidden="hidden" id="upper_limit"  >{{$item->upper_limit}}</td>
                         @endif

                        <input type="hidden" name="free_qty[]" id='free_qty1' >
                        {{-- <td><label type="text" class="form-control" id="free_qty" name="free_qty[]"></td> --}}
                        
                            
                        <input type="hidden" name="product_name[]" value="{{ $item->sku_name }}">
                        <input type="hidden" name="product_code[]" value="{{ $item->id }}">
                        <input type="hidden" name="price[]" value="{{ $item->dPrice }}">
                        {{-- <input type="hidden" name="free_qty[]" > --}}
                        <input type="hidden" id="amount" name="amount[]">
                        <input type="hidden" id="remainingQuantity" name="remainingQuantity[]" > 
               
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
            const displayLabel3 = parentRow.querySelector('#discount');
            const displayLabel4 = parentRow.querySelector('#price0'); 
            const displayLabel5 = parentRow.querySelector('#discount_value');
            const displayLabel6 = parentRow.querySelector('#remaining_skuQuantity'); 
            const displayLabel7 = parentRow.querySelector('#mym1'); 
            const displayLabel8 = parentRow.querySelector('#remainingQuantity');

            // Get the current unit price value
            const unitPriceValue = parentRow.querySelector('#unit_price').textContent;
            const freeQtyValue = parentRow.querySelector('#free_qty_js').textContent;
            const type = parentRow.querySelector('#type').textContent;
            const perQty = parentRow.querySelector('#per_qty').textContent;
            const lowerLimit = parentRow.querySelector('#lower_limit').textContent;
            const upperLimit = parentRow.querySelector('#upper_limit').textContent;
            const discount = parentRow.querySelector('#discount_js').textContent;
            const discountLowerLimit = parentRow.querySelector('#discountLowerLimit_js').textContent;
            const skuQuantity = parentRow.querySelector('#skuQuantity').textContent;  
            

            const inputValue = targetInput.value; // Get the current entry quantity
            const unitValue = parseFloat(unitPriceValue); // Parse the unit price value
            const freeValue = parseFloat(freeQtyValue);
            const purchaseValue = parseFloat(perQty);

            const lowerValue = parseFloat(lowerLimit);
            const upperValue = parseFloat(upperLimit);
            const discountValue = parseFloat(discount);
            const discountLimitValue = parseFloat(discountLowerLimit);
            const skuQuantityValue = parseFloat(skuQuantity);

            const units = parseFloat(inputValue);
            let integerValue;
            let discVal;
            var freeq ;

            //integerValue0 = unitValue * units;
            integerValue = unitValue * units;
            integerValue0 =integerValue;
            discVal = 0;

            if ( units>=discountLimitValue){
                if(discountValue != 0){
                    //console.log('hi');
                    integerValue0 = unitValue * units;
                    integerValue = integerValue0 - integerValue0* discountValue/100;
                    discVal = discountValue;

                }

            }
           
            displayLabel3.textContent = discVal;
            displayLabel5.value= JSON.stringify(discVal);
            console.log(discVal);
            
            

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
            displayLabel4.textContent = integerValue0.toFixed(2);

            /////////////Remaining quantity/////////////////////////////////////////////////////

            let remainingQValue = skuQuantityValue-(units + freeq);
            
         
            if(units+freeq> skuQuantityValue){
                //console.log('high');
                remainingQValue = 0;
                displayLabel7.style.display = 'block';
                displayLabel7.textContent = 'not enough stock';
                
                displayLabel7.style.color = 'red';
                
            }else{
                
                displayLabel7.textContent = '';
                displayLabel7.style.display = 'none';
            }
            
            //console.log(remainingQValue);
            displayLabel6.textContent = remainingQValue;
            displayLabel8.value = JSON.stringify(remainingQValue);

            ///////////////////////////////////////////////////////////////////////////////////
            

            const myInput = parentRow.querySelector('#amount');
            myInput.value = JSON.stringify(integerValue);

            const myfree = parentRow.querySelector('#free_qty1');
            //myfree = document.getElementById('free_qty1');
            myfree.value = JSON.stringify(freeq);

            totalSum = 0;
            inputFields.forEach((inputField) => {
                const parentRow = inputField.closest('tr');
                const unitPriceValue = parentRow.querySelector('#unit_price').textContent;
                const discount1 = parentRow.querySelector('#discount_js').textContent;
                const discountLowerLimit1 = parentRow.querySelector('#discountLowerLimit_js').textContent;
                const units = parseFloat(inputField.value) || 0;
                const unitValue = parseFloat(unitPriceValue);
                const discountValue1 = parseFloat(discount1);
                const discountLimitValue1 = parseFloat(discountLowerLimit1);
                //console.log(unitValue);
                let integerValue1 = unitValue * units;
                let integerValue2=0;

                if ( units>=discountLimitValue1){
                if(discountValue1 != 0){
                    //console.log('hi');
                    integerValue2 = unitValue * units;
                    integerValue1 = integerValue2 - integerValue2* discountValue1/100;
                    

                }

                }

                totalSum += integerValue1;
                 
                //totalSum += unitValue;
            });
            //console.log('Total Sum:', totalSum);
            const displayTotal=document.getElementById('total_amount');
            //const displayTotalValue=document.getElementById('total_amount_value');
            displayTotal.textContent = totalSum;
            //displayTotalValue.value= totalSum;

        });
        
        }
    
    </script>
    <script>
        
        setTimeout(function() {
            document.getElementById('flash_message').style.display = 'none';
        }, 2000);
    </script>

    <script>
        $(document).ready(function() {
            $('.ch').select2({width: 'resolve'});
        });
    </script>
    

    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>