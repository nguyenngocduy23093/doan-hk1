<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f6f6f6; }

        .sidebar {
            height: 100vh;
            background-color: #b30000;
            padding-top: 20px;
            position: fixed;
            width: 230px;
            color: white;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px 15px;
            margin: 5px 0;
            text-decoration: none;
            border-radius: 8px;
        }

        .sidebar a:hover, .sidebar .active {
            background: #ff4d4d;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h4 class="text-center fw-bold">ADMIN PANEL</h4>

        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.users.index') }}" class="active">Users</a>

        <a href="{{ route('admin.properties.index') }}">Properties</a>
        <a href="{{ route('admin.inquiries.index') }}">Inquiries</a>
        <a href="{{ route('admin.feedback.index') }}">Feedback</a>

        <a href="{{ route('admin.logout') }}">Logout</a>
    </div>

    <!-- CONTENT -->
    <div class="content">
        @yield('content')
    </div>

</body>
</html>
