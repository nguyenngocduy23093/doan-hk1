<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f5f6fa;
        }
        .sidebar {
            width: 240px;
            background: #b60000;
            min-height: 100vh;
            position: fixed;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            font-weight: 500;
        }
        .sidebar a:hover {
            background: rgba(255,255,255,0.2);
        }
        .active-side {
            background: rgba(255,255,255,0.35);
            font-weight: bold;
        }
        .content-wrapper {
            margin-left: 240px;
            padding: 20px;
        }
        .card-shadow {
            border-radius: 12px;
            box-shadow: 0 5px 12px rgba(0,0,0,0.08);
        }
    </style>

</head>
<body>

    {{-- Sidebar --}}
    <div class="sidebar">
        <h4 class="px-3 fw-bold">🏢 Admin</h4>
        <a href="{{ url('admin/dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active-side' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a href="{{ url('admin/dashboard/properties') }}" class="{{ request()->is('admin/dashboard/properties*') ? 'active-side' : '' }}">
            <i class="bi bi-building"></i> Properties
        </a>
        <a href="{{ url('admin/dashboard/users') }}" class="{{ request()->is('admin/dashboard/users*') ? 'active-side' : '' }}">
            <i class="bi bi-people"></i> Users
        </a>
        <a href="{{ url('admin/dashboard/inquiries') }}" class="{{ request()->is('admin/dashboard/inquiries*') ? 'active-side' : '' }}">
            <i class="bi bi-chat-left-dots"></i> Inquiries
        </a>
        <a href="{{ url('admin/dashboard/feedback') }}" class="{{ request()->is('admin/dashboard/feedback*') ? 'active-side' : '' }}">
            <i class="bi bi-star"></i> Feedback
        </a>
    </div>

    {{-- Content --}}
    <div class="content-wrapper">
        @yield('content')
    </div>

</body>
</html>
