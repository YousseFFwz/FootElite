<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* FIFA-style dark theme */
    .fifa-bg-dark {
        background: linear-gradient(135deg, #0B1120 0%, #0F172A 50%, #1E293B 100%);
    }
    
    /* Main Card */
    .player-card-fifa {
        background: linear-gradient(135deg, rgba(30, 41, 59, 0.95) 0%, rgba(15, 23, 42, 0.98) 100%);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(34, 197, 94, 0.2);
        transition: all 0.3s;
    }
    
    .player-card-fifa:hover {
        border-color: rgba(34, 197, 94, 0.5);
        box-shadow: 0 0 30px rgba(34, 197, 94, 0.15);
    }
    
    /* Avatar with FIFA border */
    .avatar-fifa-large {
        border: 4px solid #22c55e;
        box-shadow: 0 0 30px rgba(34, 197, 94, 0.4);
        transition: all 0.3s;
    }
    
    .avatar-fifa-large:hover {
        transform: scale(1.05);
        box-shadow: 0 0 40px rgba(34, 197, 94, 0.6);
    }
    
    /* Rating Card */
    .rating-card-fifa {
        background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
        animation: pulse-glow 2s infinite;
        position: relative;
        overflow: hidden;
    }
    
    .rating-card-fifa::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
        opacity: 0;
        transition: opacity 0.3s;
    }
    
    .rating-card-fifa:hover::before {
        opacity: 1;
        animation: shine 1s;
    }
    
    @keyframes shine {
        0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
        100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
    }
    
    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 15px rgba(245, 158, 11, 0.4); }
        50% { box-shadow: 0 0 30px rgba(245, 158, 11, 0.7); }
    }
    
    /* Stats Cards */
    .stat-card-fifa {
        background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
        border: 1px solid rgba(34, 197, 94, 0.2);
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    
    .stat-card-fifa:hover {
        transform: translateY(-5px);
        border-color: rgba(34, 197, 94, 0.5);
        box-shadow: 0 5px 20px rgba(34, 197, 94, 0.2);
    }
    
    .stat-value {
        background: linear-gradient(135deg, #22c55e, #15803d);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
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
    
    /* Position Badge */
    .position-badge-fifa {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(34, 197, 94, 0.05));
        border: 1px solid rgba(34, 197, 94, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    /* Skill Bars */
    .skill-bar {
        background: rgba(34, 197, 94, 0.2);
        border-radius: 10px;
        overflow: hidden;
        position: relative;
    }
    
    .skill-progress {
        background: linear-gradient(90deg, #22c55e, #15803d);
        height: 100%;
        border-radius: 10px;
        animation: slideIn 1s ease-out;
        position: relative;
        overflow: hidden;
    }
    
    .skill-progress::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        animation: shimmer 2s infinite;
    }
    
    @keyframes slideIn {
        from { width: 0; }
        to { width: 100%; }
    }
    
    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
    
    /* Divider */
    .divider-fifa {
        background: linear-gradient(90deg, transparent, rgba(34, 197, 94, 0.5), transparent);
        height: 1px;
    }
    
    /* Player Info */
    .player-name {
        background: linear-gradient(135deg, #fff, #22c55e);
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
</style>

<div class="min-h-screen fifa-bg-dark flex items-center justify-center p-6">
    <div class="player-card-fifa rounded-2xl shadow-2xl w-full max-w-4xl p-8 transition-all duration-300">
        
        <!-- Back Button -->
        <a href="/players"
           class="inline-flex items-center gap-2 mb-6 px-5 py-2.5 btn-back-fifa rounded-lg text-gray-300 hover:text-white transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Players
        </a>
        
        <!-- Header Section -->
        <div class="flex flex-wrap items-center gap-8">
            
            <!-- Avatar with FIFA Style -->
            <div class="relative">
                <div class="avatar-fifa-large rounded-full inline-block">
                    <img src="{{ $player->avatar ? asset('storage/'.$player->avatar) : '/images/player.png' }}"
                         class="w-32 h-32 rounded-full object-cover">
                </div>
                <!-- Online Status -->
                <div class="absolute bottom-2 right-2 w-4 h-4 bg-green-500 rounded-full border-2 border-[#0F172A] animate-pulse"></div>
            </div>
            
            <!-- Player Info -->
            <div class="flex-1">
                <h2 class="text-4xl md:text-5xl font-bold player-name mb-2">
                    {{ $player->user->name }}
                </h2>
                
                <div class="position-badge-fifa inline-flex items-center px-4 py-2 rounded-lg mt-2">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                    </svg>
                    <span class="text-gray-300 font-medium">
                        {{ strtoupper($player->position ?? 'FREE AGENT') }}
                    </span>
                    @if($player->position)
                        <span class="text-gray-500 text-sm ml-2">
                            ({{ ucfirst($player->position) }})
                        </span>
                    @endif
                </div>
                
                <!-- Player ID -->
                <p class="text-gray-500 text-xs mt-3 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                    </svg>
                    Player ID: #{{ $player->id }}
                </p>
            </div>
            
            <!-- FIFA Rating Card -->
            <div class="rating-card-fifa text-center px-8 py-5 rounded-xl min-w-[130px]">
                <p class="text-white text-xs font-semibold mb-1 tracking-wider">OVERALL</p>
                <p class="text-5xl font-bold text-white">75</p>
                <div class="flex items-center justify-center gap-1 mt-2">
                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span class="text-white text-sm font-bold">89 POT</span>
                </div>
                <p class="text-green-300 text-xs mt-2">↑ Elite Potential</p>
            </div>
            
        </div>
        
        <!-- Divider -->
        <div class="divider-fifa my-8"></div>
        
        <!-- Physical Stats Section -->
        <h3 class="text-white text-xl font-bold mb-4 flex items-center gap-2">
            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
            </svg>
            Physical Attributes
        </h3>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center mb-8">
            
            <div class="stat-card-fifa p-4 rounded-xl">
                <p class="stat-value text-3xl font-bold">{{ $player->age ?? '--' }}</p>
                <span class="text-gray-400 text-sm flex items-center justify-center gap-1 mt-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                    Age
                </span>
            </div>
            
            <div class="stat-card-fifa p-4 rounded-xl">
                <p class="stat-value text-3xl font-bold">{{ strtoupper(substr($player->preferred_foot ?? '-', 0, 1)) }}</p>
                <span class="text-gray-400 text-sm flex items-center justify-center gap-1 mt-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                    </svg>
                    {{ ucfirst($player->preferred_foot ?? 'Foot') }}
                </span>
            </div>
            
            <div class="stat-card-fifa p-4 rounded-xl">
                <p class="stat-value text-3xl font-bold">{{ $player->height ?? '--' }}<span class="text-lg">cm</span></p>
                <span class="text-gray-400 text-sm flex items-center justify-center gap-1 mt-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                    </svg>
                    Height
                </span>
            </div>
            
            <div class="stat-card-fifa p-4 rounded-xl">
                <p class="stat-value text-3xl font-bold">{{ $player->weight ?? '--' }}<span class="text-lg">kg</span></p>
                <span class="text-gray-400 text-sm flex items-center justify-center gap-1 mt-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                        <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                    </svg>
                    Weight
                </span>
            </div>
            
        </div>
        
        <!-- FIFA Skills Section -->
        <div class="mt-8">
            <h3 class="text-white text-xl font-bold mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                </svg>
                Skill Attributes
            </h3>
            
            <div class="space-y-3">
                <!-- Pace -->
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-400">Pace</span>
                        <span class="text-green-500 font-bold">82</span>
                    </div>
                    <div class="skill-bar h-2">
                        <div class="skill-progress" style="width: 82%"></div>
                    </div>
                </div>
                
                <!-- Shooting -->
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-400">Shooting</span>
                        <span class="text-green-500 font-bold">78</span>
                    </div>
                    <div class="skill-bar h-2">
                        <div class="skill-progress" style="width: 78%"></div>
                    </div>
                </div>
                
                <!-- Passing -->
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-400">Passing</span>
                        <span class="text-green-500 font-bold">75</span>
                    </div>
                    <div class="skill-bar h-2">
                        <div class="skill-progress" style="width: 75%"></div>
                    </div>
                </div>
                
                <!-- Dribbling -->
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-400">Dribbling</span>
                        <span class="text-green-500 font-bold">80</span>
                    </div>
                    <div class="skill-bar h-2">
                        <div class="skill-progress" style="width: 80%"></div>
                    </div>
                </div>
                
                <!-- Defense -->
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-400">Defense</span>
                        <span class="text-green-500 font-bold">70</span>
                    </div>
                    <div class="skill-bar h-2">
                        <div class="skill-progress" style="width: 70%"></div>
                    </div>
                </div>
                
                <!-- Physical -->
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-400">Physical</span>
                        <span class="text-green-500 font-bold">76</span>
                    </div>
                    <div class="skill-bar h-2">
                        <div class="skill-progress" style="width: 76%"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Team Status -->
        @if($player->team_id)
        <div class="mt-8 p-4 bg-green-500/10 border border-green-500/30 rounded-lg">
            <div class="flex items-center justify-between flex-wrap gap-3">
                <div class="flex items-center gap-3">
                    <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                    </svg>
                    <span class="text-white">Currently playing for</span>
                    <span class="text-green-500 font-bold">{{ $player->team->name ?? 'a team' }}</span>
                </div>
                <div class="px-3 py-1 bg-green-500/20 rounded-full">
                    <span class="text-green-400 text-sm">Active Player</span>
                </div>
            </div>
        </div>
        @else
        <div class="mt-8 p-4 bg-yellow-500/10 border border-yellow-500/30 rounded-lg">
            <div class="flex items-center gap-3">
                <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                <span class="text-yellow-400">Free Agent - Available for transfers</span>
            </div>
        </div>
        @endif
        
        <!-- Footer Note -->
        <div class="mt-6 text-center pt-4">
            <p class="text-gray-500 text-xs flex items-center justify-center gap-1">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                Last updated: {{ now()->format('d M Y') }}
            </p>
        </div>
        
    </div>
</div>