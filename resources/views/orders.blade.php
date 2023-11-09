<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container col-md-8">
        <h2 class=" mt-10">View Purchase Orders</h2>
    
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
                <label for="distributor">PO Number</label>
                <select class="form-control" id="po" name="po">
                    <option>Choose...</option>
                    <!-- Add distributor options dynamically -->
                </select>
                
            </div>
            <div class="form-group col-md-2">
                <label for="type">date</label>
                <select class="form-control" id="date" name="date">
                    <option>Choose...</option>
                    <!-- Add type options dynamically -->
                </select>
            </div>
        </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Region</th>
                        <th>Territory</th>
                        <th>Distributor </th>
                        <th>PO Number </th>
                        <th> Date</th>
                        <th>Total amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)
                    <tr>
                        <td><label type="text" class="form-control" name="region">{{$item->region}}</td>
                        <td><label type="text" class="form-control" name="Territory">{{$item->territory}}</td>
                        <td><label type="text" class="form-control" name="Distributor" id='unit_price'>{{$item->destributor}}</td>
                        <td><label type="text" class="form-control" name="PO">{{$item->id}}</td>
                        <td><input type="text" class="form-control" id="date" name="date" >{{$item->created_at}}</td>
                        <td><label type="text" class="form-control" id="price" name="total_price[]">{{$item->id}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>


    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
