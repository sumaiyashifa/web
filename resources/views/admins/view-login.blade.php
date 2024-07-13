<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/styles/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            /* background: linear-gradient(135deg, #9dd06dfd, #80a661); */
            font-family: Arial, Helvetica, sans-serif;
        }
        .card {
            width: 500px;
            max-width: 600px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(26, 108, 40, 0.703);
            border-radius: 10px;
            background: rgba(210, 222, 186, 0.8); /* Transparent background */
            backdrop-filter: blur(10px); /* Blur effect */
        }
        .form-control {
            border-radius: 50px;
        }
        .btn {
            border-radius: 50px;
            width: 100%;
        }
        .card-title {
            text-align: center;
        }
        
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            background: url('{{ asset('asset/images/hero_1.jpg') }}') no-repeat center center;
            background-size: cover;
            opacity: 0.5; /* Adjust the opacity as needed */
        }
    </style>
</head>
<body>
    <div class="background-image"></div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mt-5">Login</h5>
            <form method="POST" action="{{ route('check.login') }}">
                @csrf
                <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" required/>
                </div>
                <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" class="form-control" placeholder="Password" required/>
                </div>
                <button type="submit" class="btn btn-primary mb-4" style="background-color: green">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
