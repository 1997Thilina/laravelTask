<!DOCTYPE html>
<html>
<head>
    <title>Add Individual Purchase Order</title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container col-md-8">
        <h2 class=" mt-10">Add Individual Purchase Order</h2>
    
        <form method="POST" action="{{ route('purchase.order.store') }}">
            @csrf <!-- CSRF protection -->
            <div  class="form-row">
            <div class="form-group col-md-2">
                <label for="zone">Zone</label>
                <select class="form-control" id="zone" name="zone">
                    @foreach ($t as $item)
                        <option>{{$item->zone}}</option>
                    @endforeach
                    <!-- Add zone options dynamically -->
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="region">Region</label>
                <select class="form-control" id="region" name="region">
                    @foreach ($t as $item)
                        <option>{{$item->region}}</option>
                    @endforeach
                    <!-- Add region options dynamically -->
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="territory">Territory</label>
                <select class="form-control" id="territory" name="territory">
                    @foreach ($t as $item)
                        <option>{{$item->territory_name}}</option>
                    @endforeach
                    <!-- Add territory options dynamically -->
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="distributor">Distributor</label>
                <select class="form-control" id="distributor" name="distributor">
                    <option value="distributor 1">distributor 1</option>
                    <option value="distributor 2">distributor 2</option>
                    <option value="distributor 3">distributor 3</option>
                    {{-- @foreach ($zones as $item)
                        <option>{{$item->zone_long_description}}</option>
                    @endforeach --}}
                    <!-- Add distributor options dynamically -->
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="type">remark</label>
                <input type="text" class="form-control" id="remark" name="remark" value="{{ old('remark') }}" placeholder="type here">
            </div>
        </div>
        <div  class="form-row">
            <div class="form-group col-md-2">
                <label for="zone">Date</label>
                <select class="form-control" id="date" >
                    <option>Automatically</option>
                    <!-- Add zone options dynamically -->
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="region">PO NO</label>
                <select class="form-control" id="po_no" >
                    <option>Automatically</option>
                    <!-- Add region options dynamically -->
                </select>
            </div>
            
        </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>SKU CODE</th>
                        <th>SKU NAME</th>
                        <th>UNIT PRICE</th>
                        <th>AVG QTY</th>
                        <th>ENTRY QTY</th>
                        <th>UNITS</th>
                        <th>TOTAL PRICE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sku as $item)
                        
                    <tr>
                        <td><label type="text" class="form-control" name="sku_code[]">{{$item->id}}</td>
                        <td><label type="text" class="form-control" name="sku_name[]">{{$item->sku_name}}</td>
                        <td><label type="text" class="form-control" name="unit_price[]" id='unit_price'>{{$item->mrp}}</td>
                        <td><label type="text" class="form-control" name="avg_qty[]">{{$item->quantity}}</td>
                        <td><input type="text" class="form-control" id="en_qty" name="entry_qty[]" placeholder="type here"></td>
                        <td><label type="text" class="form-control" id="qty" name="units[]"></td>
                        <td><label type="text" class="form-control" id="price" name='amount'></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

        <script>
            const inputFields = document.querySelectorAll('#en_qty');

            for (const inputField of inputFields) {
            inputField.addEventListener('input', function (event) {
                const targetInput = event.target; 
                const parentRow = targetInput.closest('tr'); 
                const displayLabel1 = parentRow.querySelector('#qty'); 
                const displayLabel2 = parentRow.querySelector('#price'); 

                // Get the current unit price value
                const unitPriceValue = parentRow.querySelector('#unit_price').textContent;
                const inputValue = targetInput.value; // Get the current entry quantity
                const unitValue = parseFloat(unitPriceValue); // Parse the unit price value

                // Calculate the total price
                const units = parseFloat(inputValue);
                const integerValue = unitValue * units;

                displayLabel1.textContent = units;
                displayLabel2.textContent = integerValue.toFixed(2); 
            });
            }
        </script>

    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
