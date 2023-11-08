<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <div class="row">
            <div class="col-md-3">
                <a href="{{ route('zone') }}" class="btn btn-primary btn-lg btn-block">Button 1</a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('user.add') }}" class="btn btn-success btn-lg btn-block">Button 2</a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('region') }}" class="btn btn-info btn-lg btn-block">Button 3</a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('territory') }}" class="btn btn-warning btn-lg btn-block">Button 4</a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('order.create') }}" class="btn btn-danger btn-lg btn-block">Button 5</a>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
