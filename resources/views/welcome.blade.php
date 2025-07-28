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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <style>
            /* Core variables */
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
                --transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            }
            
            /* Smooth scrolling */
            html {
                scroll-behavior: smooth;
            }
            
            body {
                font-family: 'Figtree', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
                background: linear-gradient(135deg, #f5f7fa 0%, #eef3f8 100%);
                color: var(--linkedin-black);
                line-height: 1.6;
                margin: 0;
                padding: 0;
                overflow-x: hidden;
                position: relative;
            }
            
            /* Animated background */
            .animated-bg {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                overflow: hidden;
            }
            
            .animated-bg div {
                position: absolute;
                border-radius: 50%;
                background: rgba(10, 102, 194, 0.05);
                animation: float 12s infinite linear;
            }
            
            .animated-bg div:nth-child(1) {
                width: 300px;
                height: 300px;
                top: 10%;
                left: 10%;
                animation-duration: 20s;
            }
            
            .animated-bg div:nth-child(2) {
                width: 200px;
                height: 200px;
                top: 60%;
                left: 80%;
                animation-duration: 15s;
                animation-delay: 2s;
            }
            
            .animated-bg div:nth-child(3) {
                width: 150px;
                height: 150px;
                top: 30%;
                left: 70%;
                animation-duration: 18s;
                animation-delay: 4s;
            }
            
            .animated-bg div:nth-child(4) {
                width: 250px;
                height: 250px;
                top: 70%;
                left: 20%;
                animation-duration: 22s;
                animation-delay: 1s;
            }
            
            @keyframes float {
                0% {
                    transform: translate(0, 0) rotate(0deg);
                }
                25% {
                    transform: translate(20px, 40px) rotate(90deg);
                }
                50% {
                    transform: translate(40px, 0px) rotate(180deg);
                }
                75% {
                    transform: translate(20px, -40px) rotate(270deg);
                }
                100% {
                    transform: translate(0, 0) rotate(360deg);
                }
            }
            
            /* Navigation */
            .nav-container {
                display: flex;
                justify-content: flex-end;
                gap: 1rem;
                width: 100%;
                max-width: 1200px;
                padding: 1.5rem;
                position: fixed;
                top: 0;
                z-index: 100;
            }
            
            .nav-link {
                color: var(--linkedin-blue);
                font-weight: 600;
                padding: 0.75rem 1.25rem;
                border-radius: 50px;
                text-decoration: none;
                transition: var(--transition);
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(10px);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            }
            
            .nav-link:hover {
                background: var(--linkedin-blue);
                color: var(--linkedin-white);
                transform: translateY(-3px);
                box-shadow: 0 6px 15px rgba(10, 102, 194, 0.3);
            }
            
            /* Main container */
            .welcome-container {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 2rem;
                position: relative;
                z-index: 10;
            }
            
            /* Hero section */
            .hero-content {
                text-align: center;
                max-width: 800px;
                margin: 0 auto 3rem;
                padding: 2rem;
                border-radius: 20px;
                background: rgba(255, 255, 255, 0.85);
                backdrop-filter: blur(10px);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
                transition: var(--transition);
            }
            
            .hero-content:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
            }
            
            .welcome-logo {
                font-weight: 700;
                font-size: 2.5rem;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
                color: var(--linkedin-blue);
                margin-bottom: 1.5rem;
            }
            
            .welcome-title {
                font-size: 2.8rem;
                font-weight: 700;
                margin-bottom: 1.5rem;
                color: var(--linkedin-dark-blue);
                line-height: 1.2;
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            }
            
            .welcome-subtitle {
                font-size: 1.8rem;
                font-weight: 600;
                margin-bottom: 1rem;
                color: var(--linkedin-dark-blue);
                background: linear-gradient(90deg, var(--linkedin-blue), var(--linkedin-dark-blue));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            
            .welcome-text {
                color: var(--linkedin-dark-gray);
                font-size: 1.2rem;
                max-width: 700px;
                margin: 0 auto 2rem;
                line-height: 1.8;
            }
            
            .btn-container {
                display: flex;
                justify-content: center;
                gap: 1.5rem;
                flex-wrap: wrap;
                margin-top: 2rem;
            }
            
            .btn {
                display: inline-block;
                padding: 1rem 2.5rem;
                border-radius: 50px;
                font-weight: 600;
                text-align: center;
                transition: var(--transition);
                border: 2px solid transparent;
                font-size: 1.1rem;
                cursor: pointer;
                min-width: 200px;
            }
            
            .btn-primary {
                background: linear-gradient(135deg, var(--linkedin-blue), var(--linkedin-dark-blue));
                color: var(--linkedin-white);
                box-shadow: 0 6px 15px rgba(10, 102, 194, 0.3);
            }
            
            .btn-primary:hover {
                transform: translateY(-5px) scale(1.05);
                box-shadow: 0 10px 25px rgba(10, 102, 194, 0.4);
            }
            
            .btn-outline {
                background-color: transparent;
                border-color: var(--linkedin-blue);
                color: var(--linkedin-blue);
                box-shadow: 0 4px 15px rgba(10, 102, 194, 0.1);
            }
            
            .btn-outline:hover {
                background-color: rgba(10, 102, 194, 0.08);
                transform: translateY(-5px);
                box-shadow: 0 8px 20px rgba(10, 102, 194, 0.2);
            }
            
            /* Features section */
            .features-section {
                padding: 5rem 2rem;
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(10px);
                border-radius: 20px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
                max-width: 1200px;
                margin: 2rem auto;
                width: 100%;
            }
            
            .section-title {
                text-align: center;
                font-size: 2.5rem;
                font-weight: 700;
                margin-bottom: 3rem;
                color: var(--linkedin-dark-blue);
                position: relative;
            }
            
            .section-title:after {
                content: '';
                display: block;
                width: 80px;
                height: 4px;
                background: linear-gradient(90deg, var(--linkedin-blue), var(--linkedin-dark-blue));
                margin: 1rem auto 0;
                border-radius: 2px;
            }
            
            .feature-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 2.5rem;
                max-width: 1200px;
                margin: 0 auto;
            }
            
            .feature-card {
                background: var(--linkedin-white);
                border-radius: 16px;
                padding: 2.5rem 2rem;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
                transition: var(--transition);
                text-align: center;
                position: relative;
                overflow: hidden;
                transform: translateY(0);
            }
            
            .feature-card:before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 5px;
                background: linear-gradient(90deg, var(--linkedin-blue), var(--linkedin-dark-blue));
                transform: scaleX(0);
                transform-origin: left;
                transition: transform 0.5s ease;
            }
            
            .feature-card:hover {
                transform: translateY(-15px);
                box-shadow: 0 15px 35px rgba(10, 102, 194, 0.2);
            }
            
            .feature-card:hover:before {
                transform: scaleX(1);
            }
            
            .feature-icon {
                font-size: 3.5rem;
                margin-bottom: 1.5rem;
                color: var(--linkedin-blue);
                transition: var(--transition);
            }
            
            .feature-card:hover .feature-icon {
                transform: scale(1.2);
                color: var(--linkedin-dark-blue);
            }
            
            .feature-title {
                font-weight: 700;
                margin-bottom: 1rem;
                color: var(--linkedin-dark-blue);
                font-size: 1.5rem;
            }
            
            .feature-text {
                color: var(--linkedin-dark-gray);
                font-size: 1.1rem;
                line-height: 1.7;
            }
            
            /* Stats section */
            .stats-section {
                display: flex;
                justify-content: center;
                gap: 3rem;
                flex-wrap: wrap;
                margin: 4rem 0;
                padding: 2rem;
                background: rgba(255, 255, 255, 0.9);
                border-radius: 16px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
                max-width: 1000px;
                margin: 0 auto;
            }
            
            .stat-item {
                text-align: center;
                padding: 1.5rem;
                min-width: 200px;
            }
            
            .stat-number {
                font-size: 3rem;
                font-weight: 700;
                color: var(--linkedin-blue);
                margin-bottom: 0.5rem;
                transition: var(--transition);
            }
            
            .stat-item:hover .stat-number {
                transform: scale(1.1);
            }
            
            .stat-label {
                color: var(--linkedin-dark-gray);
                font-weight: 600;
                font-size: 1.1rem;
            }
            
            /* Footer */
            .footer {
                text-align: center;
                padding: 3rem 0;
                color: var(--linkedin-dark-gray);
                font-size: 1.1rem;
                margin-top: 4rem;
                background: rgba(255, 255, 255, 0.9);
                border-radius: 20px;
                max-width: 1200px;
                margin: 4rem auto 0;
                box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.05);
            }
            
            .social-links {
                display: flex;
                justify-content: center;
                gap: 1.5rem;
                margin: 1.5rem 0;
            }
            
            .social-link {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                background: var(--linkedin-light-gray);
                color: var(--linkedin-blue);
                font-size: 1.5rem;
                transition: var(--transition);
                text-decoration: none;
            }
            
            .social-link:hover {
                background: var(--linkedin-blue);
                color: var(--linkedin-white);
                transform: translateY(-5px);
            }
            
            /* Animations */
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .animate {
                animation: fadeInUp 0.8s ease forwards;
            }
            
            .delay-1 {
                animation-delay: 0.2s;
            }
            
            .delay-2 {
                animation-delay: 0.4s;
            }
            
            .delay-3 {
                animation-delay: 0.6s;
            }
            
            /* Responsive design */
            @media (max-width: 768px) {
                .btn-container {
                    flex-direction: column;
                    align-items: center;
                }
                
                .btn {
                    width: 100%;
                    max-width: 300px;
                }
                
                .welcome-title {
                    font-size: 2.2rem;
                }
                
                .section-title {
                    font-size: 2rem;
                }
                
                .stats-section {
                    flex-direction: column;
                    gap: 1.5rem;
                }
                
                .nav-container {
                    justify-content: center;
                    padding: 1rem;
                }
            }
        </style>
    </head>
    <body>
        <!-- Animated background -->
        <div class="animated-bg">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        
        <!-- Navigation -->
    
        
        <!-- Main content -->
        <div class="welcome-container">
            <!-- Hero section -->
            <div class="hero-content animate">
                <div class="welcome-logo">
                    TaskPro
                </div>
                
                <h1 class="welcome-title">Transform Your Productivity</h1>
                <h2 class="welcome-subtitle">Professional Task Management Solution</h2>
                <p class="welcome-text">TaskPro helps teams and individuals organize, prioritize, and accomplish more with less effort. Experience the power of professional task management designed for modern workflows.</p>
                
                <div class="btn-container">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-primary animate delay-1">
                                <i class="fas fa-tachometer-alt"></i> Go to Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary animate delay-1">
                                <i class="fas fa-sign-in-alt"></i> Log in
                            </a>
                            
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline animate delay-2">
                                    <i class="fas fa-user-plus"></i> Create Account
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
            
            <!-- Stats section -->
            <div class="stats-section animate delay-2">
                <div class="stat-item">
                    <div class="stat-number">95%</div>
                    <div class="stat-label">Increased Productivity</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10K+</div>
                    <div class="stat-label">Active Users</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Reliable Service</div>
                </div>
            </div>
            
            <!-- Features section -->
            <div class="features-section">
                <h2 class="section-title animate">Why Choose TaskPro?</h2>
                
                <div class="feature-grid">
                    <div class="feature-card animate delay-1">
                        <div class="feature-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <h3 class="feature-title">Intuitive Task Management</h3>
                        <p class="feature-text">Create, organize, and prioritize your tasks with our user-friendly interface designed for maximum productivity.</p>
                    </div>
                    
                    <div class="feature-card animate delay-2">
                        <div class="feature-icon">
                            <i class="fas fa-stopwatch"></i>
                        </div>
                        <h3 class="feature-title">Time Optimization</h3>
                        <p class="feature-text">Track time spent on tasks, identify bottlenecks, and optimize your workflow for better efficiency.</p>
                    </div>
                    
                    <div class="feature-card animate delay-3">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="feature-title">Performance Analytics</h3>
                        <p class="feature-text">Gain valuable insights into your productivity patterns with detailed reports and visual analytics.</p>
                    </div>
                    
                    <div class="feature-card animate">
                        <div class="feature-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <h3 class="feature-title">Real-time Collaboration</h3>
                        <p class="feature-text">Work seamlessly with your team through real-time updates and collaborative task management.</p>
                    </div>
                    
                    <div class="feature-card animate delay-1">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3 class="feature-title">Cross-Platform Sync</h3>
                        <p class="feature-text">Access your tasks anywhere, anytime with our fully responsive web app and mobile-ready design.</p>
                    </div>
                    
                    <div class="feature-card animate delay-2">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="feature-title">Enterprise Security</h3>
                        <p class="feature-text">Your data is protected with industry-leading security measures and regular backups.</p>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->

        </div>
        
        <script>
            // Add animations when elements come into view
            document.addEventListener('DOMContentLoaded', function() {
                // Function to check if element is in viewport
                function isInViewport(element) {
                    const rect = element.getBoundingClientRect();
                    return (
                        rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 0.75
                    );
                }
                
                // Add animation class when element comes into view
                function handleScroll() {
                    const elements = document.querySelectorAll('.animate');
                    elements.forEach(element => {
                        if (isInViewport(element)) {
                            element.classList.add('animate');
                        }
                    });
                }
                
                // Initial check
                handleScroll();
                
                // Listen for scroll events
                window.addEventListener('scroll', handleScroll);
                
                // Button hover effects
                const buttons = document.querySelectorAll('.btn');
                buttons.forEach(button => {
                    button.addEventListener('mouseenter', () => {
                        button.style.transform = 'translateY(-5px)';
                    });
                    
                    button.addEventListener('mouseleave', () => {
                        button.style.transform = 'translateY(0)';
                    });
                });
            });
        </script>
    </body>
</html>