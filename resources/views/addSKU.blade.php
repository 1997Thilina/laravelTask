
<!DOCTYPE html>
<html>
<head>
    <title>Add SKU</title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <div class="row col-md-12 ">
    <div class="col-md-8">
        <h2>Add SKU</h2>
        <div>
            @if(session('success'))
                <span id="flash_message" class="alert alert-success">
                {{ session('success') }}
                </span>
            @endif
        </div>
        <form method="POST" action="{{ route('sku.store') }}">
            @csrf
            <div class="form-group col-md-4">
                <label for="sku_id">SKU ID</label>
                <input type="text" class="form-control" id="sku_id" value="{{ $sku->max('id')+1}}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="sku_name">SKU Name</label>
                <input type="text" class="form-control" id="sku_name" name="sku_name" value="" required >
            </div>
            <div class="form-group col-md-4">
                <label for="mrp">MRP</label>
                <input type="text" class="form-control" name="mrp" id="mrp" required>
            </div>
            <div class="form-group col-md-4">
                <label for="distributor_price">Distributor Price</label>
                <input type="text" class="form-control" name="dPrice" id="distributor_price" required>
            </div>
            
            <div class="form-group col-md-4">
                    <div class="form-row">
                    <div class="form-group col-md-8">
                    <label for="weight_volume">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="weight_volume" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="gender">Select:</label>
                    <select class="form-control" id="wov" name="wov" required>
                        <option value="" disabled selected>Select</option>
                        <option value="weight">Weight</option>
                        <option value="volume">Volume</option>
                    </select>
                </div>
                 </div>
            </div>
                
            
            {{-- <div class="form-group col-md-4">
                <label for="mrp">Stock Availability</label>
                <input type="text" class="form-control" name="stock" id="stock" required>
            </div> --}}
            
            <button type="submit" class="btn btn-success">Save</button>
        </form>

    </div>

    <div class="container col-md-4">
        <div>
            <label for="" class="mb-2 mt-2">Or</label>
        </div>
        <div >
            <form  method="POST" enctype="multipart/form-data" action="{{route('csv.import')}}"  >
                @csrf
                <input  class="form-group col-md-10" type="file" name="csv_file" accept=".csv">
                <button type="submit" class="btn btn-success">Import CSV</button>
            </form>
            <a href="{{route('get.sampleCsv')}}">Download Column Structure as CSV</a>
        </div>
    </div>
</div>
</div>
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
