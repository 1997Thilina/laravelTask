
<!DOCTYPE html>
<html>
<head>
    <title>Add Zone</title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container" style="align-items: center">
        <h2>Add Zone</h2>
        <form method="POST" action="{{ route('zone.store') }}">
            @csrf <!-- CSRF protection -->
            {{-- <div class="form-group col-md-4">
                <select id="zone_code" class="form-control @error('zone_code') is-invalid @enderror" name="zone_code" value="{{ old('zone_code') }}" autocomplete="zone_code">
                    <option value="auto">{{ $zone->max('id')+1}}</option>
                </select>
            </div> --}}
            <div class="form-group col-md-4">
                <label for="zone_code">ZONE ID</label>
                <input type="text" class="form-control" id="zone_code" value="{{ $zone->max('id')+1}}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="zone_long_description">Zone Long Description:</label>
                <input type="text" class="form-control" id="zone_long_description" name="zone_long_description" value="{{ old('zone_long_description') }}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="short_description">Short Description:</label>
                <input type="text" class="form-control" id="short_description" name="short_description" value="{{ old('short_description') }}" required>
            </div>
            <button style="margin-left: 20px" type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
