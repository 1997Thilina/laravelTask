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
                    <option>Choose...</option>
                    <!-- Add zone options dynamically -->
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="region">Region</label>
                <select class="form-control" id="region" name="region">
                    <option>Choose...</option>
                    <!-- Add region options dynamically -->
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="territory">Territory</label>
                <select class="form-control" id="territory" name="territory">
                    <option>Choose...</option>
                    <!-- Add territory options dynamically -->
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="distributor">Distributor</label>
                <select class="form-control" id="distributor" name="distributor">
                    <option>Choose...</option>
                    <!-- Add distributor options dynamically -->
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="type">Type</label>
                <select class="form-control" id="type" name="type">
                    <option>Choose...</option>
                    <!-- Add type options dynamically -->
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
                    <tr>
                        <td><label type="text" class="form-control" name="sku_code[]"></td>
                        <td><label type="text" class="form-control" name="sku_name[]"></td>
                        <td><label type="text" class="form-control" name="unit_price[]" id='unit_price'>10</td>
                        <td><label type="text" class="form-control" name="avg_qty[]"></td>
                        <td><input type="text" class="form-control" id="en_qty" name="entry_qty[]" placeholder="type here"></td>
                        <td><label type="text" class="form-control" id="qty" name="units[]"></td>
                        <td><label type="text" class="form-control" id="price" name="total_price[]"></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <script>
        const inputField = document.getElementById('en_qty');
        const inputField2 = document.getElementById('unit_price');
        

        const displayLabel1 = document.getElementById('qty');
        const displayLabel2 = document.getElementById('price');

        inputField.addEventListener('input', function () {
            const labelValue = inputField2.textContent;
            const inputValue = inputField.textContent;
            const unitValue = parseFloat(labelValue);
            
            const units = parseFloat(inputField.value);
            const integerValue = unitValue*units;
       
            displayLabel1.textContent = inputField.value;
            displayLabel2.textContent =  integerValue;
            
        });
    </script>

    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
