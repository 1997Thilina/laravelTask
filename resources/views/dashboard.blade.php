<!DOCTYPE html>
<html>
<head>
    <title></title>
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
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>
    <div class="container">
        <h2>User Dashboard</h2>
        <div class="row">
            <div class="col-md-3">
                <a href=" {{ route('order.add') }}" class="btn btn-danger btn-lg btn-block">ADD ORDER </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('order.view') }}" class="btn btn-danger btn-lg btn-block">VIEW ORDERS  </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('freeOrder.view') }}" class="btn btn-danger btn-lg btn-block">PLACE FREE ISSUED ORDERS  </a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</x-app-layout>
