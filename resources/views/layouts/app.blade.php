<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Professional Task Manager') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --primary: #0a66c2;
            --primary-dark: #004182;
            --primary-light: #70b5f9;
            --secondary: #eef3f8;
            --accent: #5e5e5e;
            --light: #f8f9fa;
            --dark: #1d2226;
            --border: #d0d8dc;
            --success: #0a8c46;
            --warning: #e7a33e;
            --danger: #d93025;
            --card-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            --hover-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        
        body {
            background-color: #f5f7fa;
            font-family: 'Figtree', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            color: var(--dark);
            line-height: 1.6;
        }
        
        /* Navigation */
        .nav-container {
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .nav-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .nav-logo {
            color: var(--primary);
            font-weight: 700;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
        }
        
        .nav-logo svg {
            margin-right: 8px;
        }
        
        .nav-link {
            color: var(--accent);
            font-weight: 500;
            padding: 12px 16px;
            border-radius: 4px;
            transition: var(--transition);
            display: flex;
            align-items: center;
        }
        
        .nav-link:hover, .nav-link.active {
            color: var(--primary);
            background-color: rgba(10, 102, 194, 0.08);
            text-decoration: none;
        }
        
        .nav-link i {
            margin-right: 8px;
            font-size: 1.1rem;
        }
        
        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.9rem;
        }
        
        /* Main Content */
        .app-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }
        
        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border);
        }
        
        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin: 0;
        }
        
        .header-actions {
            display: flex;
            gap: 12px;
        }
        
        /* Cards */
        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: var(--card-shadow);
            border: 1px solid var(--border);
            transition: var(--transition);
            overflow: hidden;
            margin-bottom: 25px;
        }
        
        .card:hover {
            box-shadow: var(--hover-shadow);
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid var(--border);
            font-weight: 600;
            padding: 18px 24px;
            font-size: 1.25rem;
            color: var(--primary-dark);
        }
        
        .card-body {
            padding: 24px;
        }
        
        /* Buttons */
        .btn {
            border-radius: 24px;
            padding: 10px 20px;
            font-weight: 600;
            transition: var(--transition);
            border: 1px solid transparent;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 0.95rem;
        }
        
        .btn-sm {
            padding: 8px 16px;
            font-size: 0.85rem;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 2px 6px rgba(10, 102, 194, 0.3);
        }
        
        .btn-outline-primary {
            color: var(--primary);
            border-color: var(--primary);
            background-color: transparent;
        }
        
        .btn-outline-primary:hover {
            background-color: rgba(10, 102, 194, 0.08);
            color: var(--primary);
        }
        
        .btn-danger {
            background-color: var(--danger);
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #b3261e;
        }
        
        .btn i {
            margin-right: 8px;
        }
        
        /* Forms */
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark);
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border);
            border-radius: 4px;
            font-size: 1rem;
            transition: var(--transition);
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(10, 102, 194, 0.2);
            outline: none;
        }
        
        .form-check {
            display: flex;
            align-items: center;
        }
        
        .form-check-input {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
        
        /* Alerts */
        .alert {
            padding: 14px 18px;
            border-radius: 4px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            border-left: 4px solid transparent;
        }
        
        .alert-success {
            background-color: #d1e7dd;
            color: var(--success);
            border-left-color: var(--success);
        }
        
        .alert i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        /* Task List */
        .task-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 24px;
            border-bottom: 1px solid var(--border);
            transition: var(--transition);
        }
        
        .task-item:last-child {
            border-bottom: none;
        }
        
        .task-item:hover {
            background-color: #f9fbfd;
        }
        
        .task-info {
            flex: 1;
        }
        
        .task-title {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--primary-dark);
            margin-bottom: 5px;
        }
        
        .task-description {
            color: var(--accent);
            font-size: 0.95rem;
            margin-bottom: 8px;
        }
        
        .task-meta {
            display: flex;
            gap: 15px;
            font-size: 0.85rem;
            color: var(--accent);
        }
        
        .task-actions {
            display: flex;
            gap: 10px;
        }
        
        /* Status Badge */
        .status-badge {
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .badge-completed {
            background-color: #e6f7ee;
            color: var(--success);
        }
        
        .badge-pending {
            background-color: #fff8e1;
            color: var(--warning);
        }
        
        .status-badge:hover {
            transform: scale(1.05);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--accent);
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 15px;
            color: #d0d8dc;
        }
        
        .empty-state h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: var(--primary-dark);
        }
        
        .empty-state p {
            margin-bottom: 20px;
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in {
            animation: fadeIn 0.4s ease-out forwards;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .header-actions {
                width: 100%;
                flex-wrap: wrap;
            }
            
            .task-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .task-actions {
                width: 100%;
                justify-content: flex-end;
            }
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main>
            <div class="app-container">
                @yield('content')
            </div>
        </main>
    </div>
    
    <script>
        // Add fade-in animation to alerts and cards
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.alert, .card').forEach(el => {
                el.classList.add('fade-in');
            });
        });
    </script>
</body>
</html>