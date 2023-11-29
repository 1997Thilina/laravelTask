<!DOCTYPE html>
<html>
<head>
    <title>View Purchase Orders</title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container col-md-8">
        <h2 class="mt-10">View Purchase Orders</h2>
    
        <form class="col-md-12" method="POST" action="{{ route('purchase.order.store') }}">
            @csrf <!-- CSRF protection -->
            <div class="form-row">
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
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="poNumber">PO Number</label>
                    <input type="text" name="poNumber" id="poNumber" placeholder="type here">
                </div>
                <div class="form-group col-md-3">
                    <label for="dateFROM">FROM</label>
                    <input type="date" class="form-control" id="dateFROM" name="dateFROM">
                </div>
                <div class="form-group col-md-3">
                    <label for="dateTO">TO</label>
                    <input type="date" class="form-control" id="dateTO" name="dateTO">
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </div>
        </form>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Region</th>
                    <th>Territory</th>
                    <th>Distributor</th>
                    <th>PO Number</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Total amount</th>
                    <th>View PO</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($order as $item)
                <tr>
                    <td>{{ $item->region }}</td>
                    <td>{{ $item->territory }}</td>
                    <td>{{ $item->destributor }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->id }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
