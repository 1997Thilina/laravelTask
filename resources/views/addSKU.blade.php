
<!DOCTYPE html>
<html>
<head>
    <title>Add SKU</title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container" style="align-items: center">
        <h2>Add SKU</h2>
        <form>
            <div class="form-group col-md-4">
                <label for="sku_id">SKU ID</label>
                <input type="text" class="form-control" id="sku_id" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="sku_name">SKU Name</label>
                <input type="text" class="form-control" id="sku_name" value="Main Product Name/auto" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="mrp">MRP</label>
                <input type="text" class="form-control" id="mrp">
            </div>
            <div class="form-group col-md-4">
                <label for="distributor_price">Distributor Price</label>
                <input type="text" class="form-control" id="distributor_price">
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="weight_volume">Weight/Volume</label>
                    <input type="text" class="form-control" id="weight_volume">
                </div>
                <div class="form-group col-md-1">
                    <label for="gender">Select:</label>
                    <select class="form-control" id="wov" name="wov" required>
                        <option value="weight">Weight</option>
                        <option value="volume">Volume</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-success">Save</button>
        </form>
        
    </div>

    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
