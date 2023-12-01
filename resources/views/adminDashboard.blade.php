<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <!-- Add Bootstrap CSS (if not already included) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
    
        <div class="py-6">
            <div class="max-w-2xl mx-auto sm:px-2 lg:px-4 ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in as ADMIN!") }}
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h2>Admin Dashboard</h2>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <a href="{{ route('view.zone') }}" class="btn btn-primary btn-lg btn-block">ADD ZONE</a>
                </div>
                <div class="col-md-3 mb-3">
                    <a href="{{ route('view.addUser') }}" class="btn btn-success btn-lg btn-block"> ADD USER</a>
                </div>
                <div class="col-md-3 mb-3">
                    <a href="{{ route('region') }}" class="btn btn-info btn-lg btn-block"> ADD REGION</a>
                </div>
                <div class="col-md-3 mb-3">
                    <a href="{{ route('territory') }}" class="btn btn-warning btn-lg btn-block"> ADD TERRITORY</a>
                </div>
                <div class="col-md-3 mb-3">
                    <a href=" {{ route('freeOrder.view') }}" class="btn btn-danger btn-lg btn-block">ADD ORDER </a>
                </div>
                <div class="col-md-3 mb-3">
                    <a href="{{ route('view.sku') }}" class="btn btn-danger btn-lg btn-block">ADD SKU </a>
                </div> 
                <div class="col-md-3 mb-3">
                    <a href="{{ route('view.defineFree') }}" class="btn btn-danger btn-lg btn-block">DEFINE FREE ISSUE </a>
                </div>
                <div class="col-md-3 mb-3">
                    <a href="{{ route('view.defineDiscount') }}" class="btn btn-danger btn-lg btn-block">DEFINE DISCOUNTS </a>
                </div>
                <div class="col-md-3 mb-3">
                    <a href="{{ route('order.view') }}" class="btn btn-danger btn-lg btn-block">VIEW ORDERS  </a>
                </div>
            </div> 
        </div>
    </x-app-layout>
    

    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
