<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* FIFA-style dark theme */
    .fifa-bg-dark {
        background: linear-gradient(135deg, #0B1120 0%, #0F172A 50%, #1E293B 100%);
    }
    
    /* Player Card Styles */
    .player-card {
        background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
        border: 1px solid rgba(34, 197, 94, 0.2);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    
    .player-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(34, 197, 94, 0.1), transparent);
        transition: left 0.5s;
    }
    
    .player-card:hover::before {
        left: 100%;
    }
    
    .player-card:hover {
        transform: translateY(-8px);
        border-color: rgba(34, 197, 94, 0.5);
        box-shadow: 0 10px 30px rgba(34, 197, 94, 0.2);
    }
    
    /* Rating Badge */
    .rating-badge {
        background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
        box-shadow: 0 0 15px rgba(245, 158, 11, 0.3);
        animation: pulse-glow 2s infinite;
    }
    
    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 5px rgba(245, 158, 11, 0.3); }
        50% { box-shadow: 0 0 15px rgba(245, 158, 11, 0.6); }
    }
    
    /* Avatar with FIFA-style border */
    .avatar-fifa {
        border: 3px solid #22c55e;
        box-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
        transition: all 0.3s;
    }
    
    .player-card:hover .avatar-fifa {
        transform: scale(1.05);
        box-shadow: 0 0 30px rgba(34, 197, 94, 0.5);
    }
    
    /* Position Badge */
    .position-badge {
        background: rgba(34, 197, 94, 0.15);
        border: 1px solid rgba(34, 197, 94, 0.3);
        backdrop-filter: blur(5px);
    }
    
    /* Button Styles */
    .btn-invite {
        background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    
    .btn-invite:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(34, 197, 94, 0.4);
    }
    
    .btn-invite:active {
        transform: translateY(0);
    }
    
    .btn-invite::after {
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
    
    .btn-invite:active::after {
        width: 300px;
        height: 300px;
    }
    
    /* Back Button */
    .btn-back-fifa {
        background: rgba(30, 41, 59, 0.9);
        border: 1px solid rgba(34, 197, 94, 0.3);
        backdrop-filter: blur(10px);
        transition: all 0.3s;
    }
    
    .btn-back-fifa:hover {
        background: rgba(34, 197, 94, 0.2);
        border-color: #22c55e;
        transform: translateX(-5px);
    }
    
    /* Status Badges */
    .status-invited {
        background: linear-gradient(135deg, rgba(245, 158, 11, 0.2), rgba(245, 158, 11, 0.05));
        border: 1px solid rgba(245, 158, 11, 0.5);
        color: #F59E0B;
    }
    
    .status-in-team {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(239, 68, 68, 0.05));
        border: 1px solid rgba(239, 68, 68, 0.5);
        color: #EF4444;
    }
    
    /* View Profile Link */
    .view-profile-link {
        color: #22c55e;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    
    .view-profile-link:hover {
        color: #4ade80;
        gap: 8px;
    }
    
    /* Title Section */
    .page-title {
        background: linear-gradient(135deg, #22c55e, #15803d);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        text-shadow: 0 2px 10px rgba(34, 197, 94, 0.3);
    }
    
    /* Player Count Badge */
    .player-count {
        background: rgba(34, 197, 94, 0.2);
        border: 1px solid rgba(34, 197, 94, 0.3);
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
</style>

<div class="min-h-screen fifa-bg-dark p-6 md:p-10">
    
    <!-- Header Section -->
    <div class="max-w-7xl mx-auto">
        
        <!-- Back Button & Header -->
        <div class="flex flex-wrap justify-between items-center mb-8 gap-4">
            <a href="{{ auth()->user()->role === 'team_owner' 
                ? '/team-dashboard' 
                : (auth()->user()->role === 'admin' 
                    ? '/admin' 
                    : '/dashboard') 
            }}" class="inline-flex items-center gap-2 px-5 py-2.5 btn-back-fifa rounded-lg text-gray-300 hover:text-white transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Dashboard
            </a>
            
            <div class="flex items-center gap-3">
                <div class="player-count px-4 py-2 rounded-full">
                    <span class="text-green-400 font-bold">{{ count($players) }}</span>
                    <span class="text-gray-400 text-sm ml-1">Players Available</span>
                </div>
            </div>
        </div>
        
        <!-- Title -->
        <div class="mb-10">
            <h1 class="text-4xl md:text-5xl font-bold page-title mb-2 flex items-center gap-3">
                <svg class="w-10 h-10 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                </svg>
                All Players
            </h1>
            <p class="text-gray-400">Discover and connect with talented footballers</p>
        </div>
        
        <!-- Players Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            
            @foreach($players as $player)
            <div class="player-card rounded-2xl p-5 text-center relative">
                
                <!-- Rating Badge -->
                <div class="absolute top-3 left-3 rating-badge rounded-lg px-2 py-1">
                    <p class="text-white text-sm font-bold flex items-center gap-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        75
                    </p>
                </div>
                
                <!-- Player Level Indicator -->
                <div class="absolute top-3 right-3">
                    <div class="w-8 h-8 rounded-full bg-green-500/20 flex items-center justify-center">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    </div>
                </div>
                
                <!-- Avatar -->
                <div class="mt-6">
                    <img src="{{ $player->avatar ? asset('storage/'.$player->avatar) : '/images/player.png' }}"
                         class="w-24 h-24 rounded-full mx-auto avatar-fifa object-cover">
                </div>
                
                <!-- Player Info -->
                <div class="mt-4">
                    <h3 class="text-white text-xl font-bold mb-1">
                        {{ $player->user->name }}
                    </h3>
                    
                    <div class="position-badge inline-flex items-center gap-1 px-3 py-1 rounded-full mt-2">
                        <svg class="w-3 h-3 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                        </svg>
                        <span class="text-gray-300 text-sm">
                            {{ $player->position ?? 'Free Agent' }}
                        </span>
                    </div>
                    
                    <!-- Player Stats Mini -->
                    <div class="grid grid-cols-2 gap-2 mt-3 text-center">
                        <div class="bg-[#0F172A] rounded-lg p-1">
                            <p class="text-gray-500 text-xs">Age</p>
                            <p class="text-white text-sm font-bold">{{ $player->age ?? '--' }}</p>
                        </div>
                        <div class="bg-[#0F172A] rounded-lg p-1">
                            <p class="text-gray-500 text-xs">Foot</p>
                            <p class="text-white text-sm font-bold">{{ ucfirst($player->preferred_foot ?? '--') }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- View Profile Link -->
                <a href="/players/{{ $player->id }}" 
                   class="view-profile-link inline-flex items-center gap-1 mt-4 text-sm font-medium">
                    View Profile
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
                
                <!-- Invite Logic -->
                @if(auth()->user()->role === 'team_owner')
                    <div class="mt-4">
                        @if(!$player->team_id)
                            @if(!in_array($player->user_id, $invites))
                                <form method="POST" action="/invite/{{ $player->user_id }}">
                                    @csrf
                                    <button class="btn-invite w-full text-white py-2.5 rounded-lg font-medium flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        Invite Player
                                    </button>
                                </form>
                            @else
                                <div class="status-invited rounded-lg py-2.5 px-3 text-sm font-medium flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    Invitation Sent
                                </div>
                            @endif
                        @else
                            <div class="status-in-team rounded-lg py-2.5 px-3 text-sm font-medium flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                Already in Team
                            </div>
                        @endif
                    </div>
                @endif
                
            </div>
            @endforeach
            
        </div>
        
        <!-- Empty State -->
        @if(count($players) == 0)
        <div class="text-center py-20">
            <div class="w-24 h-24 mx-auto mb-4 bg-gray-800 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h3 class="text-white text-xl font-bold mb-2">No Players Found</h3>
            <p class="text-gray-400">There are no players available at the moment.</p>
        </div>
        @endif
        
    </div>
    
</div>