<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* FIFA-style dark theme */
    .fifa-bg-dark {
        background: linear-gradient(135deg, #0B1120 0%, #0F172A 50%, #1E293B 100%);
    }
    
    /* Navbar */
    .navbar-fifa {
        background: rgba(15, 23, 42, 0.95);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid rgba(34, 197, 94, 0.3);
    }
    
    /* Card Styles */
    .dashboard-card {
        background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
        border: 1px solid rgba(34, 197, 94, 0.2);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    
    .dashboard-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(34, 197, 94, 0.1), transparent);
        transition: left 0.5s;
    }
    
    .dashboard-card:hover::before {
        left: 100%;
    }
    
    .dashboard-card:hover {
        transform: translateY(-5px);
        border-color: rgba(34, 197, 94, 0.5);
        box-shadow: 0 15px 35px rgba(34, 197, 94, 0.2);
    }
    
    /* Stat Card */
    .stat-card-fifa {
        background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
        border: 1px solid rgba(34, 197, 94, 0.2);
        transition: all 0.3s;
    }
    
    .stat-card-fifa:hover {
        transform: translateY(-5px);
        border-color: rgba(34, 197, 94, 0.5);
        box-shadow: 0 5px 20px rgba(34, 197, 94, 0.2);
    }
    
    /* Logout Button */
    .btn-logout {
        background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
        transition: all 0.3s;
    }
    
    .btn-logout:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(239, 68, 68, 0.4);
    }
    
    /* Welcome Text */
    .welcome-text {
        background: linear-gradient(135deg, #22c55e, #15803d);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    
    /* Stat Values */
    .stat-value-green {
        background: linear-gradient(135deg, #22c55e, #15803d);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-size: 2rem;
        font-weight: bold;
    }
    
    .stat-value-blue {
        background: linear-gradient(135deg, #3B82F6, #2563EB);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-size: 2rem;
        font-weight: bold;
    }
    
    .stat-value-purple {
        background: linear-gradient(135deg, #8B5CF6, #6D28D9);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        font-size: 2rem;
        font-weight: bold;
    }
    
    /* Avatar */
    .avatar-mini {
        border: 2px solid #22c55e;
        transition: all 0.3s;
    }
    
    .avatar-mini:hover {
        transform: scale(1.1);
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
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .dashboard-card {
        animation: fadeInUp 0.5s ease-out forwards;
        opacity: 0;
    }
    
    .dashboard-card:nth-child(1) { animation-delay: 0s; }
    .dashboard-card:nth-child(2) { animation-delay: 0.05s; }
    .dashboard-card:nth-child(3) { animation-delay: 0.1s; }
    .dashboard-card:nth-child(4) { animation-delay: 0.15s; }
    .dashboard-card:nth-child(5) { animation-delay: 0.2s; }
    
    .stat-card-fifa {
        animation: fadeInUp 0.5s ease-out forwards;
        opacity: 0;
        animation-delay: 0.25s;
    }
</style>

<div class="min-h-screen fifa-bg-dark">
    
    <!-- Navbar -->
    <div class="navbar-fifa px-6 md:px-10 py-4 flex flex-wrap justify-between items-center gap-4">
        
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center shadow-lg">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                </svg>
            </div>
            <h1 class="text-xl font-bold bg-gradient-to-r from-green-400 to-green-600 bg-clip-text text-transparent">
                🏟️ Team Dashboard
            </h1>
        </div>
        
        <div class="flex items-center gap-4">
            <!-- User Info -->
            <div class="flex items-center gap-3 bg-[#0F172A] px-4 py-2 rounded-full border border-green-500/30">
                <img src="{{ auth()->user()->avatar ? asset('storage/'.auth()->user()->avatar) : '/images/player.png' }}"
                     class="avatar-mini w-8 h-8 rounded-full object-cover">
                <span class="text-gray-200 font-medium hidden sm:inline">
                    {{ auth()->user()->name }}
                </span>
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
            </div>
            
            <!-- Logout -->
            <form method="POST" action="/logout">
                @csrf
                <button class="btn-logout text-white px-5 py-2 rounded-lg font-medium flex items-center gap-2 transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
    
    <!-- Content -->
    <div class="p-6 md:p-10">
        <div class="max-w-7xl mx-auto">
            
            <!-- Welcome Section -->
            <div class="mb-8">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold welcome-text">
                            Welcome Coach 👋
                        </h2>
                        <p class="text-gray-400 text-sm mt-1">Manage your team and lead them to victory</p>
                    </div>
                </div>
            </div>
            
            <!-- Dashboard Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6">
                
                <!-- My Team Card -->
                <a href="/team" class="dashboard-card rounded-xl p-5 border-l-4 border-green-500 block">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                            </svg>
                        </div>
                        <svg class="w-4 h-4 text-gray-500 group-hover:text-green-500 transition" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-white text-lg font-bold mb-1">My Team</h3>
                    <p class="text-gray-400 text-sm">Edit your team info & logo</p>
                    <div class="mt-3 flex items-center gap-2">
                        <div class="h-1 w-8 bg-green-500 rounded-full"></div>
                        <span class="text-green-400 text-xs">MANAGE</span>
                    </div>
                </a>
                
                <!-- Players Card -->
                <a href="/players" class="dashboard-card rounded-xl p-5 border-l-4 border-blue-500 block">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <svg class="w-4 h-4 text-gray-500 group-hover:text-blue-500 transition" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-white text-lg font-bold mb-1">Players</h3>
                    <p class="text-gray-400 text-sm">Explore & invite new talent</p>
                    <div class="mt-3 flex items-center gap-2">
                        <div class="h-1 w-8 bg-blue-500 rounded-full"></div>
                        <span class="text-blue-400 text-xs">DISCOVER</span>
                    </div>
                </a>
                
                <!-- Invites Card -->
                <a href="/team/requests" class="dashboard-card rounded-xl p-5 border-l-4 border-purple-500 block">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                            </svg>
                        </div>
                        <span class="bg-purple-500 text-white text-xs px-2 py-1 rounded-full animate-pulse">NEW</span>
                    </div>
                    <h3 class="text-white text-lg font-bold mb-1">Invites</h3>
                    <p class="text-gray-400 text-sm">Manage player requests</p>
                    <div class="mt-3 flex items-center gap-2">
                        <div class="h-1 w-8 bg-purple-500 rounded-full"></div>
                        <span class="text-purple-400 text-xs">REVIEW</span>
                    </div>
                </a>
                
                <!-- Create Match Card -->
                <a href="/games/create" class="dashboard-card rounded-xl p-5 border-l-4 border-orange-500 block">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-10 h-10 bg-orange-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <svg class="w-4 h-4 text-gray-500 group-hover:text-orange-500 transition" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-white text-lg font-bold mb-1">Create Match</h3>
                    <p class="text-gray-400 text-sm">Organize a new fixture</p>
                    <div class="mt-3 flex items-center gap-2">
                        <div class="h-1 w-8 bg-orange-500 rounded-full"></div>
                        <span class="text-orange-400 text-xs">CREATE</span>
                    </div>
                </a>
                
                <!-- Find Matches Card -->
                <a href="/games" class="dashboard-card rounded-xl p-5 border-l-4 border-yellow-500 block">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-10 h-10 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <svg class="w-4 h-4 text-gray-500 group-hover:text-yellow-500 transition" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-white text-lg font-bold mb-1">Find Matches</h3>
                    <p class="text-gray-400 text-sm">Browse available games</p>
                    <div class="mt-3 flex items-center gap-2">
                        <div class="h-1 w-8 bg-yellow-500 rounded-full"></div>
                        <span class="text-yellow-400 text-xs">SEARCH</span>
                    </div>
                </a>
                
            </div>
            
            <!-- Team Stats Section -->
            <div class="mt-10">
                <h3 class="text-white text-xl font-bold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"/>
                    </svg>
                    Team Statistics
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Team Name Stat -->
                    <div class="stat-card-fifa rounded-xl p-6 text-center">
                        <div class="w-12 h-12 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                            </svg>
                        </div>
                        <p class="stat-value-green text-2xl font-bold">
                            {{ auth()->user()->team->name ?? 'No Team' }}
                        </p>
                        <p class="text-gray-400 text-sm mt-1">Team Name</p>
                    </div>
                    
                    <!-- Players Count Stat -->
                    <div class="stat-card-fifa rounded-xl p-6 text-center">
                        <div class="w-12 h-12 bg-blue-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        {{-- <p class="stat-value-blue text-3xl font-bold">
                            {{ auth()->user()->team?->players->count() ?? 0 }}
                        </p> --}}
                        <p class="text-gray-400 text-sm mt-1">Total Players</p>
                    </div>
                    
                    <!-- Matches Count Stat -->
                    <div class="stat-card-fifa rounded-xl p-6 text-center">
                        <div class="w-12 h-12 bg-purple-500/20 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                            </svg>
                        </div>
                        {{-- <p class="stat-value-purple text-3xl font-bold">
                            {{ auth()->user()->team?->matches->count() ?? 0 }}
                        </p> --}}
                        <p class="text-gray-400 text-sm mt-1">Matches Played</p>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions Footer -->
            <div class="mt-8 p-4 bg-green-500/5 border border-green-500/20 rounded-xl">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-500/20 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-white text-sm font-medium">Ready for your next match?</p>
                            <p class="text-gray-400 text-xs">Create a match and invite other teams to play</p>
                        </div>
                    </div>
                    <a href="/games/create" class="px-5 py-2 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg hover:from-green-500 hover:to-green-600 transition text-sm font-medium">
                        + Create Match
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</div>