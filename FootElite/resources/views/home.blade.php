<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Now - Football Academy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* FIFA-style dark theme */
        .fifa-bg-gradient {
            background: linear-gradient(135deg, #0B1120 0%, #0F172A 50%, #1E293B 100%);
        }
        
        /* Navbar with blur effect */
        .navbar-blur {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(34, 197, 94, 0.3);
        }
        
        /* Hero Section */
        .hero-gradient {
            background: radial-gradient(circle at 80% 50%, rgba(34, 197, 94, 0.1) 0%, transparent 70%);
        }
        
        /* Glowing Text */
        .glow-text {
            text-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
        }
        
        /* Animated Button */
        .btn-primary {
            background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 25px rgba(34, 197, 94, 0.4);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .btn-primary::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        
        .btn-primary:active::after {
            width: 300px;
            height: 300px;
        }
        
        .btn-outline {
            background: transparent;
            border: 2px solid rgba(34, 197, 94, 0.5);
            transition: all 0.3s;
        }
        
        .btn-outline:hover {
            background: rgba(34, 197, 94, 0.1);
            border-color: #22c55e;
            transform: translateY(-2px);
        }
        
        /* Floating Animation for Hero Image */
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }
        
        .hero-image {
            animation: float 6s ease-in-out infinite;
        }
        
        /* Pulse Animation for CTA */
        @keyframes pulse {
            0%, 100% {
                box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.4);
            }
            50% {
                box-shadow: 0 0 0 20px rgba(34, 197, 94, 0);
            }
        }
        
        .pulse-effect {
            animation: pulse 2s infinite;
        }
        
        /* Stats Cards */
        .stat-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.8), rgba(15, 23, 42, 0.9));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(34, 197, 94, 0.2);
            transition: all 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            border-color: rgba(34, 197, 94, 0.5);
            box-shadow: 0 10px 30px rgba(34, 197, 94, 0.2);
        }
        
        /* Feature Card */
        .feature-card {
            background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
            border: 1px solid rgba(34, 197, 94, 0.2);
            transition: all 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-8px);
            border-color: rgba(34, 197, 94, 0.5);
            box-shadow: 0 15px 35px rgba(34, 197, 94, 0.2);
        }
        
        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #22c55e, #15803d);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #0F172A;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #22c55e;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #15803d;
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
        
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out;
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
    </style>
</head>
<body class="fifa-bg-gradient">

<!-- Navbar -->
<nav class="navbar-blur fixed top-0 left-0 right-0 z-50 flex justify-between items-center px-6 md:px-10 py-4">
    <div class="flex items-center gap-2">
        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center shadow-lg pulse-effect">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
            </svg>
        </div>
        <h1 class="text-xl font-bold gradient-text">Match Now</h1>
    </div>

    <div class="space-x-3">
        <a href="/login" class="px-5 py-2 border-2 border-green-500 text-green-500 rounded-lg hover:bg-green-500 hover:text-white transition-all duration-300">
            Login
        </a>
        <a href="/register" class="px-5 py-2 btn-primary text-white rounded-lg transition-all duration-300">
            Register
        </a>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-gradient min-h-screen flex items-center justify-between px-6 md:px-10 lg:px-20 pt-20">
    
    <!-- Text Content -->
    <div class="max-w-xl fade-in-up">
        <div class="inline-flex items-center gap-2 bg-green-500/10 border border-green-500/30 rounded-full px-4 py-2 mb-6">
            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
            <span class="text-green-400 text-sm">Welcome to the Ultimate Football Experience</span>
        </div>
        
        <h1 class="text-4xl md:text-6xl font-bold leading-tight">
            Welcome to best <br>
            <span class="gradient-text glow-text">Football Academy</span>
        </h1>

        <p class="mt-6 text-gray-400 text-lg leading-relaxed">
            Train like a pro, join teams, compete, and grow your football skills with the best academy platform. 
            Elevate your game to the next level.
        </p>

        <div class="mt-8 space-x-4">
            <a href="/register" class="inline-flex items-center gap-2 px-8 py-3 btn-primary text-white rounded-lg font-semibold transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Join Now
            </a>

            <a href="/login" class="inline-flex items-center gap-2 px-8 py-3 btn-outline text-gray-300 rounded-lg font-semibold transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                </svg>
                Login
            </a>
        </div>
        
        <!-- Stats -->
        <div class="grid grid-cols-3 gap-4 mt-12">
            <div class="stat-card rounded-xl p-3 text-center">
                <p class="text-2xl font-bold text-green-500">500+</p>
                <p class="text-gray-400 text-xs">Active Players</p>
            </div>
            <div class="stat-card rounded-xl p-3 text-center">
                <p class="text-2xl font-bold text-green-500">50+</p>
                <p class="text-gray-400 text-xs">Teams</p>
            </div>
            <div class="stat-card rounded-xl p-3 text-center">
                <p class="text-2xl font-bold text-green-500">200+</p>
                <p class="text-gray-400 text-xs">Matches</p>
            </div>
        </div>
    </div>

    <!-- Image with Animation -->
    <div class="relative hidden lg:block fade-in-up delay-2">
        <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-green-700 rounded-full w-[500px] h-[500px] right-0 opacity-20 blur-3xl animate-pulse"></div>
        <div class="absolute inset-0 bg-green-500 rounded-full w-[400px] h-[400px] right-20 top-20 opacity-10 blur-2xl"></div>
        <img src="/images/player.png" alt="Football Player"
             class="relative w-[550px] hero-image z-10 drop-shadow-2xl">
    </div>
</section>

<!-- Features Section -->
<section class="py-20 px-6 md:px-10 lg:px-20">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            Why Choose <span class="gradient-text">Match Now</span>
        </h2>
        <p class="text-gray-400 max-w-2xl mx-auto">
            Experience the best football platform with professional features designed for players like you
        </p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Feature 1 -->
        <div class="feature-card rounded-2xl p-6 text-center">
            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                </svg>
            </div>
            <h3 class="text-white text-xl font-bold mb-2">Join Teams</h3>
            <p class="text-gray-400">Find your perfect squad and play with teammates who share your passion</p>
        </div>
        
        <!-- Feature 2 -->
        <div class="feature-card rounded-2xl p-6 text-center">
            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h3 class="text-white text-xl font-bold mb-2">Create Matches</h3>
            <p class="text-gray-400">Organize your own games, invite players, and manage your football schedule</p>
        </div>
        
        <!-- Feature 3 -->
        <div class="feature-card rounded-2xl p-6 text-center">
            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                    <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"/>
                </svg>
            </div>
            <h3 class="text-white text-xl font-bold mb-2">Team Chat</h3>
            <p class="text-gray-400">Communicate with teammates, discuss strategies, and build team chemistry</p>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 px-6 md:px-10 lg:px-20">
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-green-600/20 to-green-800/20 border border-green-500/30 p-12 text-center">
        <div class="absolute inset-0 bg-gradient-to-r from-green-500/5 to-green-700/5"></div>
        <div class="relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                Ready to Start Your Journey?
            </h2>
            <p class="text-gray-300 mb-8 max-w-2xl mx-auto">
                Join thousands of players who are already improving their skills and enjoying the beautiful game
            </p>
            <a href="/register" class="inline-flex items-center gap-2 px-8 py-3 btn-primary text-white rounded-lg font-semibold text-lg transition-all duration-300">
                Get Started Now
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="border-t border-green-500/20 py-8 px-6 md:px-10 lg:px-20">
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                </svg>
            </div>
            <span class="text-white font-bold">Match Now</span>
        </div>
        <p class="text-gray-500 text-sm">© 2024 Match Now Football Academy. All rights reserved.</p>
        <div class="flex gap-4">
            <a href="#" class="text-gray-500 hover:text-green-500 transition">Privacy Policy</a>
            <a href="#" class="text-gray-500 hover:text-green-500 transition">Terms of Service</a>
            <a href="#" class="text-gray-500 hover:text-green-500 transition">Contact</a>
        </div>
    </div>
</footer>

</body>
</html>