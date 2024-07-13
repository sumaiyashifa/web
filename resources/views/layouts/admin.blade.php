<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/styles/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            flex-direction: column;
            background: linear-gradient(45deg, #f5f5f5fd, #80a661);
            /* #9dd06dfd */
            font-family: Arial, Helvetica, sans-serif;
            padding: 0;
            height: 100%;
            /* Full height */
            overflow: hidden;
            /* No overflow on body */
        }

        .navbar {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

        }

        #wrapper {
            display: flex;
            height: 100%;
            overflow: hidden;
            /* Prevent overflow */
            margin-left: 2% !important;
        }

        /* Static Sidebar */
        .side-nav {
            background-color: rgba(117, 152, 89, 0.8);
            width: 250px;
            height: 100vh;
            /* Full height */
            position: fixed;
            /* Fixed position */
            overflow-y: auto;
            /* Scrollable sidebar */
            border-radius: 1rem;
        }

        /* Scrollable Main Content */
        .container-fluid {
            margin-left: 250px;
            /* Offset by the width of the sidebar */
            width: calc(100% - 250px);
            /* Remaining width */
            height: 100vh;
            /* Full viewport height */
            overflow-y: auto;
            /* Enables vertical scrolling */
            position: relative;
            border-radius: 1rem;
        }

        .nav-link {
            color: white;
            margin: 10px 20px;
            border-radius: 5px;
        }

        .side-nav .nav-link:hover {
            background-color: #788f58;
        }

        .side-nav .nav-link.active {
            background-color: #788f58;
            ;
            /* padding-left: 2px; */
            left: -2%;
        }

        .card {
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .card-body {
            text-align: center;
            position: relative;
        }

        .badge-warning {
            background-color: #f39c12;
        }
    </style>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar header-top fixed-top navbar-expand-lg "style="background-color: rgba(117, 152, 89, 0.8);">
            <div class="container">
                <a class="navbar-brand" href="#" style="color: white">FreelanceHub</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav ml-auto d-md-flex align-items-center">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admins.dashboard') ? 'active' : '' }}"
                                href="{{ route('admins.dashboard') }}" style="color: white">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">
                                {{ Auth::guard('admin')->user()->name }}
                            </a>
                            <div class="dropdown-menu"  aria-labelledby="navbarDropdown">
                                <form action="{{ route('logoutadmin') }}" method="POST" class="d-flex" role="search">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-success " type="submit"style="margin-left: 7px">Logout</button>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item">
                            <img src="{{ asset('asset/images/person_2.jpg') }}" class="rounded-circle" alt="Profile"
                                style="width: 40px; height: 40px; margin-right: 10px;">
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell"></i>
                                <span class="badge badge-warning" id="notificationCount">0</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                                <a class="dropdown-item" href="#">No new notifications</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="side-nav p-3">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admins.dashboard') ? 'active' : '' }}"
                        href="{{ route('admins.dashboard') }}">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('view.admins') ? 'active' : '' }}"
                        href="{{ route('view.admins') }}">
                        <i class="fas fa-user-shield"></i> Admins
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('display.catagories') ? 'active' : '' }}"
                        href="{{ route('display.catagories') }}">
                        <i class="fas fa-list-alt"></i> Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('display.jobs') ? 'active' : '' }}"
                        href="{{ route('display.jobs') }}">
                        <i class="fas fa-briefcase"></i> Jobs
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('display.apps') ? 'active' : '' }}"
                        href="{{ route('display.apps') }}">
                        <i class="fas fa-file-alt"></i> Applications
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('ab') ? 'active' : '' }}" href="{{ route('ab') }}">
                        <i class="fas fa-check-circle"></i> Submitted Work
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('display.contacts') ? 'active' : '' }}"
                        href="{{ route('display.contacts') }}">
                        <i class="fas fa-envelope"></i> Messages
                    </a>
                </li>
            </ul>
        </div>
        <div class="container-fluid">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function updateNotifications() {
            $.ajax({
                url: '/fetch-notifications',
                method: 'GET',
                success: function(response) {
                    if (response.totalNotifications > 0) {
                        $('#notificationCount').text(response.totalNotifications);
                    } else {
                        $('#notificationCount').text('0');
                    }
                }
            });
        }

        setInterval(updateNotifications, 60000);
    </script>
</body>

</html>
