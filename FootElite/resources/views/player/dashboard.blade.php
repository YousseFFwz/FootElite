<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* Custom FIFA-style gradients and effects */
    .fifa-gradient {
        background: linear-gradient(135deg, #0B1120 0%, #0F172A 50%, #1E293B 100%);
    }
    
    .card-gradient {
        background: linear-gradient(135deg, rgba(30, 41, 59, 0.9) 0%, rgba(15, 23, 42, 0.95) 100%);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(34, 197, 94, 0.2);
    }
    
    .card-gradient:hover {
        border: 1px solid rgba(34, 197, 94, 0.5);
        box-shadow: 0 0 20px rgba(34, 197, 94, 0.2);
        transform: translateY(-5px);
    }
    
    .glow-effect {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0%, 100% {
            box-shadow: 0 0 5px rgba(34, 197, 94, 0.3);
        }
        50% {
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.6);
        }
    }
    
    .nav-blur {
        background: rgba(15, 23, 42, 0.8);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid rgba(34, 197, 94, 0.3);
    }
    
    .stat-card {
        background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
        border-left: 4px solid #22c55e;
    }
    
    /* Custom scrollbar */
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
</style>

<div class="min-h-screen fifa-gradient">
    <!-- Navbar with FIFA-style blur effect -->
    <div class="nav-blur sticky top-0 z-50 px-6 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center shadow-lg glow-effect">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                </svg>
            </div>
            <h1 class="text-2xl font-bold bg-gradient-to-r from-green-400 to-green-600 bg-clip-text text-transparent">
                Player Dashboard
            </h1>
        </div>
        
        <div class="space-x-3">
            <a href="/profile" class="px-5 py-2.5 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg hover:from-green-500 hover:to-green-600 transition-all duration-300 transform hover:scale-105 shadow-lg">
                <i class="fas fa-user mr-2"></i> My Profile
            </a>
            
            <form method="POST" action="/logout" class="inline">
                @csrf
                <button class="px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700 text-white rounded-lg hover:from-red-500 hover:to-red-600 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </button>
            </form>
        </div>
    </div>
    
    <!-- Content -->
    <div class="max-w-7xl mx-auto px-6 py-10">
        <!-- Welcome Banner -->
        <div class="card-gradient rounded-2xl p-8 mb-10 shadow-2xl">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-2">
                        Welcome back, {{ auth()->user()->name }}! 👋
                    </h2>
                    <p class="text-gray-400 text-lg">Ready to dominate the field today?</p>
                </div>
                <div class="flex space-x-2">
                    <div class="w-12 h-12 bg-green-500/20 rounded-full flex items-center justify-center">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-ping"></div>
                    </div>
                    <div class="text-right">
                        <p class="text-green-400 text-sm">Player Rating</p>
                        <p class="text-white text-2xl font-bold">89</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Dashboard Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Profile Card - FIFA Style -->
            <a href="/profile" class="card-gradient rounded-xl p-6 transition-all duration-300 cursor-pointer group">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-700 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                        </svg>
                    </div>
                    <div class="text-green-400 opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">My Profile</h3>
                <p class="text-gray-400 text-sm">Manage your football career stats</p>
                <div class="mt-4 flex items-center space-x-2">
                    <div class="h-1 w-12 bg-green-500 rounded-full"></div>
                    <span class="text-green-400 text-xs">VIEW STATS</span>
                </div>
            </a>
            
            <!-- Players Card -->
            <a href="/players" class="card-gradient rounded-xl p-6 transition-all duration-300 cursor-pointer group">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-700 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                        </svg>
                    </div>
                    <div class="text-green-400 opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Players</h3>
                <p class="text-gray-400 text-sm">Discover & connect with athletes</p>
                <div class="mt-4 flex items-center space-x-2">
                    <div class="h-1 w-12 bg-blue-500 rounded-full"></div>
                    <span class="text-blue-400 text-xs">EXPLORE</span>
                </div>
            </a>
            
            <!-- My Invites Card -->
            <a href="/my-invites" class="card-gradient rounded-xl p-6 transition-all duration-300 cursor-pointer group border-l-4 border-green-500">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-700 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                    </div>
                    <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full animate-pulse">NEW</span>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">My Invites</h3>
                <p class="text-gray-400 text-sm">Team invitations waiting for you</p>
                <div class="mt-4 flex items-center space-x-2">
                    <div class="h-1 w-12 bg-purple-500 rounded-full"></div>
                    <span class="text-purple-400 text-xs">CHECK NOW</span>
                </div>
            </a>
            
            <!-- Teams Card -->
            <a href="/teams" class="card-gradient rounded-xl p-6 transition-all duration-300 cursor-pointer group border-l-4 border-purple-500">
                <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-700 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                        </svg>
                    </div>
                    <div class="text-green-400 opacity-0 group-hover:opacity-100 transition-opacity">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Teams</h3>
                <p class="text-gray-400 text-sm">Join elite squads & compete</p>
                <div class="mt-4 flex items-center space-x-2">
                    <div class="h-1 w-12 bg-yellow-500 rounded-full"></div>
                    <span class="text-yellow-400 text-xs">FIND TEAM</span>
                </div>
            </a>
            
            @if(auth()->user()->profile && auth()->user()->profile->team_id)
                <!-- My Matches Card (with team) -->
                <a href="/my-matches" class="card-gradient rounded-xl p-6 transition-all duration-300 cursor-pointer group border-l-4 border-green-500">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-700 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                            </svg>
                        </div>
                        <div class="text-green-400 opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Team Matches</h3>
                    <p class="text-gray-400 text-sm">Upcoming fixtures & results</p>
                    <div class="mt-4 flex items-center space-x-2">
                        <div class="h-1 w-12 bg-red-500 rounded-full"></div>
                        <span class="text-red-400 text-xs">VIEW FIXTURES</span>
                    </div>
                </a>
            @endif
            
            @if(auth()->user()->profile && !auth()->user()->profile->team_id)
                <!-- Create Match Card (no team) -->
                <a href="/player-games/create" class="card-gradient rounded-xl p-6 transition-all duration-300 cursor-pointer group border-l-4 border-blue-500">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-700 rounded-lg flex items-center justify-center animate-pulse">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full animate-pulse">CREATE</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Create Match</h3>
                    <p class="text-gray-400 text-sm">Organize your own game</p>
                    <div class="mt-4 flex items-center space-x-2">
                        <div class="h-1 w-12 bg-green-500 rounded-full"></div>
                        <span class="text-green-400 text-xs">START NOW</span>
                    </div>
                </a>
                
                <!-- My Matches Card (no team) -->
                <a href="/player-games" class="card-gradient rounded-xl p-6 transition-all duration-300 cursor-pointer group border-l-4 border-green-500">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-700 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="text-green-400 opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Player Matches</h3>
                    <p class="text-gray-400 text-sm">Join games near you</p>
                    <div class="mt-4 flex items-center space-x-2">
                        <div class="h-1 w-12 bg-orange-500 rounded-full"></div>
                        <span class="text-orange-400 text-xs">JOIN GAME</span>
                    </div>
                </a>
            @endif
        </div>
        
        <!-- Bottom Stats Section -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="stat-card rounded-xl p-4">
                <p class="text-gray-400 text-sm">Matches Played</p>
                <p class="text-white text-2xl font-bold">124</p>
                <p class="text-green-400 text-xs">↑ 12 this season</p>
            </div>
            <div class="stat-card rounded-xl p-4">
                <p class="text-gray-400 text-sm">Goals Scored</p>
                <p class="text-white text-2xl font-bold">67</p>
                <p class="text-green-400 text-xs">↑ 8 this season</p>
            </div>
            <div class="stat-card rounded-xl p-4">
                <p class="text-gray-400 text-sm">Assists</p>
                <p class="text-white text-2xl font-bold">43</p>
                <p class="text-green-400 text-xs">↑ 5 this season</p>
            </div>
            <div class="stat-card rounded-xl p-4">
                <p class="text-gray-400 text-sm">Win Rate</p>
                <p class="text-white text-2xl font-bold">73%</p>
                <p class="text-green-400 text-xs">↑ 4% improvement</p>
            </div>
        </div>
    </div>
</div>