<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TaskPro - Professional Task Management</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /* Core styles */
                :root {
                    --linkedin-blue: #0a66c2;
                    --linkedin-dark-blue: #004182;
                    --linkedin-light-blue: #70b5f9;
                    --linkedin-white: #ffffff;
                    --linkedin-light-gray: #eef3f8;
                    --linkedin-gray: #e0e0e0;
                    --linkedin-dark-gray: #666666;
                    --linkedin-black: #000000;
                    --linkedin-success: #0a8c46;
                }
                
                body {
                    font-family: 'Figtree', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
                    background-color: var(--linkedin-light-gray);
                    color: var(--linkedin-black);
                    line-height: 1.6;
                }
                
                .welcome-container {
                    min-height: 100vh;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    padding: 2rem;
                }
                
                .welcome-card {
                    background-color: var(--linkedin-white);
                    border-radius: 12px;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                    width: 100%;
                    max-width: 420px;
                    overflow: hidden;
                }
                
                .welcome-header {
                    background-color: var(--linkedin-blue);
                    color: var(--linkedin-white);
                    padding: 2rem;
                    text-align: center;
                }
                
                .welcome-logo {
                    font-weight: 700;
                    font-size: 1.75rem;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 0.5rem;
                }
                
                .welcome-body {
                    padding: 2rem;
                }
                
                .welcome-title {
                    font-size: 1.5rem;
                    font-weight: 600;
                    margin-bottom: 1rem;
                    color: var(--linkedin-dark-blue);
                    text-align: center;
                }
                
                .welcome-text {
                    color: var(--linkedin-dark-gray);
                    text-align: center;
                    margin-bottom: 1.5rem;
                }
                
                .btn {
                    display: inline-block;
                    padding: 0.75rem 1.5rem;
                    border-radius: 24px;
                    font-weight: 600;
                    text-align: center;
                    transition: all 0.3s ease;
                    border: 1px solid transparent;
                }
                
                .btn-primary {
                    background-color: var(--linkedin-blue);
                    color: var(--linkedin-white);
                    width: 100%;
                }
                
                .btn-primary:hover {
                    background-color: var(--linkedin-dark-blue);
                    transform: translateY(-2px);
                }
                
                .btn-outline {
                    background-color: transparent;
                    border-color: var(--linkedin-blue);
                    color: var(--linkedin-blue);
                    width: 100%;
                }
                
                .btn-outline:hover {
                    background-color: rgba(10, 102, 194, 0.08);
                }
                
                .nav-links {
                    display: flex;
                    justify-content: flex-end;
                    gap: 1rem;
                    width: 100%;
                    max-width: 1200px;
                    padding: 1rem;
                    position: absolute;
                    top: 0;
                }
                
                .nav-link {
                    color: var(--linkedin-blue);
                    font-weight: 500;
                    padding: 0.5rem 1rem;
                }
                
                .nav-link:hover {
                    text-decoration: underline;
                }
                
                .feature-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                    gap: 2rem;
                    max-width: 1200px;
                    margin: 3rem auto;
                }
                
                .feature-card {
                    background-color: var(--linkedin-white);
                    border-radius: 8px;
                    padding: 1.5rem;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
                    transition: all 0.3s ease;
                    text-align: center;
                }
                
                .feature-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                }
                
                .feature-icon {
                    font-size: 2.5rem;
                    color: var(--linkedin-blue);
                    margin-bottom: 1rem;
                }
                
                .feature-title {
                    font-weight: 600;
                    margin-bottom: 0.5rem;
                    color: var(--linkedin-dark-blue);
                }
                
                .feature-text {
                    color: var(--linkedin-dark-gray);
                }
            </style>
        @endif
    </head>
    <body>
        <div class="nav-links">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    @endif
                @endauth
            @endif
        </div>
        
        <div class="welcome-container">
            <div class="welcome-card">
                <div class="welcome-header">
                    <div class="welcome-logo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                        TaskPro
                    </div>
                </div>
                
                <div class="welcome-body">
                    <h1 class="welcome-title">Professional Task Management</h1>
                    <p class="welcome-text">Organize your work and boost productivity</p>
                    
                    <div class="space-y-3">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
                                
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline">Register</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-check2-circle"></i>
                    </div>
                    <h3 class="feature-title">Task Management</h3>
                    <p class="feature-text">Create, organize, and prioritize your tasks efficiently</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-clock"></i>
                    </div>
                    <h3 class="feature-title">Time Tracking</h3>
                    <p class="feature-text">Monitor your progress and improve time management</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-bar-chart"></i>
                    </div>
                    <h3 class="feature-title">Progress Insights</h3>
                    <p class="feature-text">Gain valuable insights into your productivity patterns</p>
                </div>
            </div>
        </div>
    </body>
</html>