<!DOCTYPE html>
<html>
<head>
    <title>Stock Maintaince</title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container col-md-8">
    <div class="mt-4">
        <h2>Stock Maintaince</h2>
    </div>
    <div>
        @if(session('success'))
            <span id="flash_message" class="alert alert-success">
            {{ session('success') }}
            </span>
        @endif
    </div>
    <form method="POST" action="{{route('add.viewStockMaintaince')}}">
        @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>SKU CODE</th>
                        <th>SKU NAME</th>
                        <th>IN STOCK</th>
                        <th>ADD STOCK</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sku as $item)
                        
                    <tr>
                        <td><label type="text" class="form-control" name="sku_code[]">{{$item->id}}</td>
                        <td><label type="text" class="form-control" name="sku_name[]">{{$item->sku_name}}</td>
                        <td><label type="text" class="form-control" id="avlQuantity" name="avlQuantity">{{$item->quantity}}</td>
                        <td><input type="number" class="form-control" id="en_qty"  placeholder="type here"></td>
                        <input type="hidden" name="total_qty[]" id='total_qty1' >
                        <input type="hidden" name="product_id[]" id='product_id' value="{{ $item->id }}" >
                        
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
                

                // Get the current unit price value
                const avlQuantity = parentRow.querySelector('#avlQuantity').textContent;
                const sendToatalQuantity = parentRow.querySelector('#total_qty1');
                const inputValue = targetInput.value; // Get the current entry quantity
                const avlQuantityValue = parseFloat(avlQuantity); // Parse the unit price value

                // Calculate the total price
                const addedValue = parseFloat(inputValue);
                const integerValue = addedValue + avlQuantityValue;
                sendToatalQuantity.value= JSON.stringify(integerValue);

             
            });
            }
        </script>
        <script>
        
            setTimeout(function() {
                document.getElementById('flash_message').style.display = 'none';
            }, 2000);
        </script>

    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
