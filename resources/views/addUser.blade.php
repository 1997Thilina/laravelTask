<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <style>
        .custom-container {
            max-width: 40%;
        }
    </style>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class=" container col-md-8 ">
        <h2>Add User</h2>
        <form method="POST" action="{{ route('addUser.store') }}" class="needs-validation" novalidate>
            @csrf <!-- CSRF protection -->
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="nic">NIC:</label>
                    <input type="text" class="form-control" id="nic" name="nic" value="{{ old('nic') }}" required>
                </div>
                <div class="form-group col-6">
                    <label for="address">Address:</label>
                    <textarea class="form-control" id="address" name="address" required>{{ old('address') }}</textarea>
                </div>
                <div class="form-group col-md-3">
                    <label for="mobile">Mobile:</label>
                    <input type="tel" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') }}" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="gender">Gender:</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="territory">Territory:</label>
                    <select class="form-control" id="territory" name="territory" required>
                        <option value="T1">T1</option>
                        <option value="T2">T2</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <!-- Add Bootstrap JavaScript and jQuery (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>