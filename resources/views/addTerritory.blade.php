
<!DOCTYPE html>
<html>
<head>
    <title>Add Zone</title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>ADD TERRITORY</h2>
        <form method="POST" action="{{ route('territory.store') }}">
            @csrf <!-- CSRF protection -->
            
            <div class="form-group col-md-3">
                <label for="zone">Zone:</label>
                <select class="form-control" id="zone" name="zone">
                    @foreach ($znr as $item)
                    <option>{{$item->zone}}</option>
                    @endforeach
                    
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="region">Region:</label>
                <select class="form-control" id="region" name="region">
                    @foreach ($znr as $item)
                    <option>{{$item->region_name}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group col-md-4">
                <label for="territory_code">Territory Code:</label>
                <input type="text" class="form-control" id="territory_code" name="territory_code" value="Automatically" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="territory_name">Territory Name:</label>
                <input type="text" class="form-control" id="territory_name" name="territory_name" placeholder="Ex. TERRITORY 1">
            </div>
            <button type="submit" class="btn btn-success">SAVE</button>

        </form>
        @if($errors->has('territory_name'))
        <div class="alert alert-danger">
            {{ $errors->first('territory_name') }}
        </div>
        @endif
    </div>
    

    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
