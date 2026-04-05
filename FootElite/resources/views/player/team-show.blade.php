<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* FIFA-style dark theme */
    .fifa-bg-dark {
        background: linear-gradient(135deg, #0B1120 0%, #0F172A 50%, #1E293B 100%);
    }
    
    /* Team Header Card */
    .team-header-card {
        background: linear-gradient(135deg, rgba(30, 41, 59, 0.95) 0%, rgba(15, 23, 42, 0.98) 100%);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(34, 197, 94, 0.2);
        transition: all 0.3s;
    }
    
    .team-header-card:hover {
        border-color: rgba(34, 197, 94, 0.5);
        box-shadow: 0 0 30px rgba(34, 197, 94, 0.15);
    }
    
    /* Team Logo */
    .team-logo {
        border: 4px solid #22c55e;
        box-shadow: 0 0 30px rgba(34, 197, 94, 0.4);
        transition: all 0.3s;
    }
    
    .team-logo:hover {
        transform: scale(1.05);
        box-shadow: 0 0 40px rgba(34, 197, 94, 0.6);
    }
    
    /* Player Card */
    .team-player-card {
        background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
        border: 1px solid rgba(34, 197, 94, 0.2);
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    
    .team-player-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(34, 197, 94, 0.1), transparent);
        transition: left 0.5s;
    }
    
    .team-player-card:hover::before {
        left: 100%;
    }
    
    .team-player-card:hover {
        transform: translateY(-8px);
        border-color: rgba(34, 197, 94, 0.5);
        box-shadow: 0 10px 30px rgba(34, 197, 94, 0.2);
    }
    
    /* Player Avatar */
    .player-avatar-team {
        border: 3px solid #22c55e;
        box-shadow: 0 0 15px rgba(34, 197, 94, 0.3);
        transition: all 0.3s;
    }
    
    .team-player-card:hover .player-avatar-team {
        transform: scale(1.05);
        box-shadow: 0 0 25px rgba(34, 197, 94, 0.5);
    }
    
    /* Position Badge */
    .position-badge-team {
        background: rgba(34, 197, 94, 0.15);
        border: 1px solid rgba(34, 197, 94, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 6px;
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
    
    /* Team Stats */
    .team-stat {
        background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
        border: 1px solid rgba(34, 197, 94, 0.2);
    }
    
    /* Jersey Number */
    .jersey-number {
        background: linear-gradient(135deg, #22c55e, #15803d);
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-weight: bold;
        font-size: 12px;
    }
    
    /* Empty State */
    .empty-state {
        background: linear-gradient(135deg, rgba(30, 41, 59, 0.5), rgba(15, 23, 42, 0.5));
        border: 2px dashed rgba(34, 197, 94, 0.3);
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
    
    .player-card-animation {
        animation: fadeInUp 0.5s ease-out forwards;
    }
</style>

<div class="min-h-screen fifa-bg-dark p-6 md:p-10">
    <div class="max-w-7xl mx-auto">
        
        <!-- Back Button -->
        <a href="/teams"
           class="inline-flex items-center gap-2 mb-6 px-5 py-2.5 btn-back-fifa rounded-lg text-gray-300 hover:text-white transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Teams
        </a>
        
        <!-- Team Header -->
        <div class="team-header-card rounded-2xl p-8 mb-8">
            <div class="flex flex-wrap items-center gap-8">
                
                <!-- Team Logo -->
                <div class="relative">
                    <img src="{{ $team->logo ? asset('storage/'.$team->logo) : '/images/team.png' }}"
                         class="team-logo w-28 h-28 rounded-full object-cover">
                    <div class="absolute -bottom-2 -right-2 w-6 h-6 bg-green-500 rounded-full border-2 border-[#0F172A] animate-pulse"></div>
                </div>
                
                <!-- Team Info -->
                <div class="flex-1">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-2 flex items-center gap-3">
                        {{ $team->name }}
                        <span class="text-sm bg-green-500/20 text-green-400 px-3 py-1 rounded-full">
                            {{ $team->players->count() }} Players
                        </span>
                    </h2>
                    <div class="flex flex-wrap gap-3 mt-3">
                        <div class="position-badge-team px-3 py-1 rounded-full">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                            </svg>
                            <span class="text-gray-300 text-sm">Competitive Team</span>
                        </div>
                        <div class="position-badge-team px-3 py-1 rounded-full">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-300 text-sm">Home Stadium</span>
                        </div>
                    </div>
                </div>
                
                <!-- Team Rating -->
                <div class="text-center">
                    <div class="rating-card-fifa bg-gradient-to-br from-yellow-500 to-yellow-600 px-6 py-4 rounded-xl shadow-2xl">
                        <p class="text-white text-xs font-semibold tracking-wider">TEAM RATING</p>
                        <p class="text-4xl font-bold text-white">82</p>
                        <div class="flex items-center justify-center gap-1 mt-1">
                            <svg class="w-3 h-3 text-yellow-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="text-white text-xs">Top 100</span>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <!-- Team Stats Row -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8 pt-6 border-t border-green-500/20">
                <div class="team-stat rounded-xl p-3 text-center">
                    <p class="text-gray-400 text-xs">Matches Played</p>
                    <p class="text-white text-xl font-bold">24</p>
                </div>
                <div class="team-stat rounded-xl p-3 text-center">
                    <p class="text-gray-400 text-xs">Wins</p>
                    <p class="text-green-500 text-xl font-bold">16</p>
                </div>
                <div class="team-stat rounded-xl p-3 text-center">
                    <p class="text-gray-400 text-xs">Draws</p>
                    <p class="text-yellow-500 text-xl font-bold">4</p>
                </div>
                <div class="team-stat rounded-xl p-3 text-center">
                    <p class="text-gray-400 text-xs">Losses</p>
                    <p class="text-red-500 text-xl font-bold">4</p>
                </div>
            </div>
        </div>
        
        <!-- Squad Section Title -->
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-white text-2xl font-bold flex items-center gap-3">
                <svg class="w-7 h-7 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                </svg>
                Current Squad
            </h3>
            <div class="text-gray-400 text-sm flex items-center gap-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                </svg>
                {{ $team->players->count() }} / 25 Players
            </div>
        </div>
        
        <!-- Players Grid -->
        @if($team->players->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            
            @foreach($team->players as $index => $player)
            <div class="team-player-card rounded-2xl p-5 text-center player-card-animation" style="animation-delay: {{ $index * 0.05 }}s">
                
                <!-- Jersey Number -->
                <div class="absolute top-3 left-3 jersey-number text-white">
                    {{ $player->jersey_number ?? $loop->iteration }}
                </div>
                
                <!-- Player Level Badge -->
                <div class="absolute top-3 right-3">
                    <div class="w-8 h-8 rounded-full bg-green-500/20 flex items-center justify-center">
                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                    </div>
                </div>
                
                <!-- Player Avatar -->
                <div class="mt-4">
                    <img src="{{ $player->avatar ? asset('storage/'.$player->avatar) : '/images/player.png' }}"
                         class="player-avatar-team w-24 h-24 rounded-full mx-auto object-cover">
                </div>
                
                <!-- Player Info -->
                <div class="mt-4">
                    <h4 class="text-white text-lg font-bold mb-1">
                        {{ $player->user->name }}
                    </h4>
                    
                    <div class="position-badge-team inline-flex items-center gap-1 px-3 py-1 rounded-full mt-2">
                        <svg class="w-3 h-3 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                        </svg>
                        <span class="text-gray-300 text-xs font-medium">
                            {{ $player->position ?? 'Flexible' }}
                        </span>
                    </div>
                </div>
                
                <!-- Player Stats Mini -->
                <div class="grid grid-cols-2 gap-2 mt-4 pt-3 border-t border-gray-700">
                    <div class="text-center">
                        <p class="text-gray-500 text-xs">Age</p>
                        <p class="text-white text-sm font-bold">{{ $player->age ?? '--' }}</p>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-500 text-xs">OVR</p>
                        <p class="text-green-500 text-sm font-bold">75</p>
                    </div>
                </div>
                
                <!-- View Profile Link -->
                <a href="/players/{{ $player->id }}" 
                   class="inline-flex items-center justify-center gap-1 mt-4 text-green-500 hover:text-green-400 text-sm font-medium transition-all duration-300">
                    View Profile
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
                
            </div>
            @endforeach
            
        </div>
        @else
        <!-- Empty State -->
        <div class="empty-state rounded-2xl p-12 text-center">
            <div class="w-24 h-24 mx-auto mb-4 bg-gray-800 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                </svg>
            </div>
            <h3 class="text-white text-xl font-bold mb-2">No Players Yet</h3>
            <p class="text-gray-400">This team doesn't have any players at the moment.</p>
            @if(auth()->user()->role === 'team_owner')
            <a href="/players" class="inline-flex items-center gap-2 mt-4 px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Invite Players
            </a>
            @endif
        </div>
        @endif
        
        <!-- Formation Section (FIFA Style) -->
        @if($team->players->count() >= 4)
        <div class="mt-12">
            <h3 class="text-white text-xl font-bold mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
                Suggested Formation
            </h3>
            <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-xl p-6 border border-green-500/20">
                <div class="flex justify-center items-center gap-4 flex-wrap">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-green-500/20 rounded-full flex items-center justify-center mx-auto">
                            <span class="text-white font-bold">4</span>
                        </div>
                        <p class="text-gray-400 text-xs mt-1">Defenders</p>
                    </div>
                    <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <div class="text-center">
                        <div class="w-12 h-12 bg-green-500/20 rounded-full flex items-center justify-center mx-auto">
                            <span class="text-white font-bold">3</span>
                        </div>
                        <p class="text-gray-400 text-xs mt-1">Midfielders</p>
                    </div>
                    <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <div class="text-center">
                        <div class="w-12 h-12 bg-green-500/20 rounded-full flex items-center justify-center mx-auto">
                            <span class="text-white font-bold">3</span>
                        </div>
                        <p class="text-gray-400 text-xs mt-1">Attackers</p>
                    </div>
                </div>
                <p class="text-center text-gray-500 text-sm mt-4">4-3-3 Formation • Based on squad composition</p>
            </div>
        </div>
        @endif
        
    </div>
</div>

<style>
    /* Additional styles for rating card */
    .rating-card-fifa {
        animation: pulseGlow 2s infinite;
    }
    
    @keyframes pulseGlow {
        0%, 100% {
            box-shadow: 0 0 10px rgba(245, 158, 11, 0.3);
        }
        50% {
            box-shadow: 0 0 25px rgba(245, 158, 11, 0.6);
        }
    }
</style>