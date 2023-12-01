
<!DOCTYPE html>
<html>
<head>
    <title>Add Zone</title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>ADD REGION</h2>
        <form method="POST" action="{{ route('region.store') }}">
            @csrf <!-- CSRF protection -->
            <div class="form-group col-md-4">
                <label for="zone">Zone:</label>
                <select class="form-control" id="zone" name="zone">
             
                    @foreach ($zones as $item)
                        <option>{{$item->zone_long_description}}</option>
                    @endforeach
                    
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="tr_id"> Region Code:</label>
                <input type="text" class="form-control" id="tr_id" name='region_code' value="{{ $znr->max('id')+1}}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="region_name">Region Name:</label>
                <input type="text" class="form-control" id="region_name" name="region_name" placeholder="Ex. REGION 1">
            </div>
            <button type="submit" class="btn btn-success">SAVE</button>
        </form>
    </div>
    
    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
