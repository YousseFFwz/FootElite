<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* FIFA-style dark theme */
    .fifa-bg-dark {
        background: linear-gradient(135deg, #0B1120 0%, #0F172A 50%, #1E293B 100%);
    }
    
    /* Match Card */
    .match-card {
        background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
        border: 1px solid rgba(34, 197, 94, 0.2);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    
    .match-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(34, 197, 94, 0.1), transparent);
        transition: left 0.5s;
    }
    
    .match-card:hover::before {
        left: 100%;
    }
    
    .match-card:hover {
        transform: translateY(-5px);
        border-color: rgba(34, 197, 94, 0.5);
        box-shadow: 0 15px 35px rgba(34, 197, 94, 0.2);
    }
    
    /* Player Avatar in List */
    .player-avatar-mini {
        border: 2px solid #22c55e;
        transition: all 0.3s;
    }
    
    .player-avatar-mini:hover {
        transform: scale(1.1);
    }
    
    /* Status Badges */
    .status-pending {
        background: rgba(245, 158, 11, 0.2);
        border: 1px solid rgba(245, 158, 11, 0.5);
        color: #F59E0B;
    }
    
    .status-accepted {
        background: rgba(34, 197, 94, 0.2);
        border: 1px solid rgba(34, 197, 94, 0.5);
        color: #22c55e;
    }
    
    /* Join Button */
    .btn-join-match {
        background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    
    .btn-join-match:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(34, 197, 94, 0.4);
    }
    
    .btn-join-match:active {
        transform: translateY(0);
    }
    
    /* Create Button */
    .btn-create-match {
        background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
        transition: all 0.3s;
    }
    
    .btn-create-match:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(34, 197, 94, 0.4);
    }
    
    /* Chat Button */
    .btn-chat {
        background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
        transition: all 0.3s;
    }
    
    .btn-chat:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(59, 130, 246, 0.4);
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
    
    /* Page Title */
    .page-title-fifa {
        background: linear-gradient(135deg, #22c55e, #15803d);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        text-shadow: 0 2px 10px rgba(34, 197, 94, 0.3);
    }
    
    /* Player Count Badge */
    .player-count-badge {
        background: rgba(34, 197, 94, 0.2);
        border: 1px solid rgba(34, 197, 94, 0.3);
    }
    
    /* Terrain Icon */
    .terrain-icon {
        background: rgba(34, 197, 94, 0.1);
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
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .match-card {
        animation: fadeInUp 0.5s ease-out forwards;
        opacity: 0;
    }
    
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
    }
    
    .status-pending {
        animation: pulse 2s infinite;
    }
</style>

<div class="min-h-screen fifa-bg-dark p-6">
    <div class="max-w-7xl mx-auto">
        
        <!-- Header Section -->
        <div class="flex flex-wrap justify-between items-center mb-8 gap-4">
            <a href="/dashboard"
               class="inline-flex items-center gap-2 px-5 py-2.5 btn-back-fifa rounded-lg text-gray-300 hover:text-white transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Dashboard
            </a>
            
            <div class="player-count-badge px-4 py-2 rounded-full">
                <span class="text-green-400 font-bold">{{ count($games) }}</span>
                <span class="text-gray-400 text-sm ml-1">Matches Available</span>
            </div>
        </div>
        
        <!-- Title Section -->
        <div class="mb-8">
            <h1 class="text-4xl md:text-5xl font-bold page-title-fifa mb-3 flex items-center gap-3">
                <svg class="w-10 h-10 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                </svg>
                Player Matches
            </h1>
            <p class="text-gray-400">Find and join matches near you</p>
        </div>
        
        <!-- Create Button -->
        <div class="mb-8">
            <a href="/player-games/create"
               class="inline-flex items-center gap-2 px-6 py-3 btn-create-match text-white rounded-lg font-medium transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Create New Match
            </a>
        </div>
        
        <!-- Matches Grid -->
        @if(count($games) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            
            @foreach($games as $index => $game)
            <div class="match-card rounded-2xl p-6" style="animation-delay: {{ $index * 0.05 }}s">
                
                <!-- Header with Player Count -->
                <div class="flex justify-between items-start mb-4">
                    <div class="flex items-center gap-2 terrain-icon px-3 py-1 rounded-full">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-gray-400 text-xs">Football</span>
                    </div>
                    <div class="player-count-badge px-3 py-1 rounded-full text-sm">
                        👥 {{ $game->players->count() }}/10
                    </div>
                </div>
                
                <!-- Terrain Info -->
                <div class="mb-4">
                    <h3 class="text-xl font-bold text-white mb-1">
                        {{ $game->terrain->name }}
                    </h3>
                    <div class="flex items-center gap-2 text-gray-400 text-sm">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        📍 {{ $game->terrain->location }}
                    </div>
                </div>
                
                <!-- Date & Time -->
                <div class="bg-[#0F172A] rounded-lg p-3 mb-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-white font-medium">
                                {{ \Carbon\Carbon::parse($game->match_date)->format('d M Y') }}
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-white font-medium">
                                {{ \Carbon\Carbon::parse($game->match_date)->format('H:i') }}
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Status Badge -->
                <div class="mb-4">
                    @if($game->status === 'accepted')
                        <div class="status-accepted inline-flex items-center gap-2 px-3 py-1 rounded-full text-sm font-medium">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Match Ready ✅
                        </div>
                    @else
                        <div class="status-pending inline-flex items-center gap-2 px-3 py-1 rounded-full text-sm font-medium">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            Waiting for Players
                        </div>
                    @endif
                </div>
                
                <!-- Players List -->
                @if($game->players->count() > 0)
                <div class="mb-4">
                    <p class="text-gray-400 text-xs mb-2 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                        </svg>
                        Players Joined ({{ $game->players->count() }}/10)
                    </p>
                    <div class="flex flex-wrap gap-2">
                        @foreach($game->players->take(5) as $player)
                            <div class="flex items-center gap-2 bg-[#0F172A] px-3 py-1 rounded-full hover:bg-[#1E293B] transition">
                                <img src="{{ $player->avatar ? asset('storage/'.$player->avatar) : '/images/player.png' }}"
                                     class="player-avatar-mini w-6 h-6 rounded-full object-cover">
                                <span class="text-gray-300 text-sm">{{ $player->user->name ?? $player->name }}</span>
                            </div>
                        @endforeach
                        @if($game->players->count() > 5)
                            <div class="bg-[#0F172A] px-3 py-1 rounded-full">
                                <span class="text-gray-400 text-sm">+{{ $game->players->count() - 5 }} more</span>
                            </div>
                        @endif
                    </div>
                </div>
                @else
                <div class="text-center py-3">
                    <p class="text-gray-500 text-sm">No players joined yet</p>
                </div>
                @endif
                
                <!-- Action Buttons -->
                @if($game->status === 'pending')
                    @if(!$game->players->contains(auth()->id()))
                        <form method="POST" action="/player-games/{{ $game->id }}/join" class="mt-4">
                            @csrf
                            <button class="btn-join-match w-full text-white py-2.5 rounded-lg font-medium flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                                Join Match
                            </button>
                        </form>
                    @else
                        <div class="mt-4 bg-green-500/20 border border-green-500/30 rounded-lg py-2.5 text-center">
                            <p class="text-green-400 font-medium flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                You joined this match ✔️
                            </p>
                        </div>
                    @endif
                @else
                    <div class="mt-4 bg-green-500/20 border border-green-500/30 rounded-lg py-2.5 text-center">
                        <p class="text-green-400 font-medium">Match Confirmed ✅</p>
                    </div>
                @endif
                
                <!-- Chat Button (for participants) -->
                @if($game->players->contains(auth()->id()))
                    <a href="/player-games/{{ $game->id }}"
                       class="btn-chat mt-3 block text-center text-white py-2.5 rounded-lg font-medium transition-all duration-300 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                        Open Team Chat 💬
                    </a>
                @endif
                
            </div>
            @endforeach
            
        </div>
        @else
        <!-- Empty State -->
        <div class="empty-state rounded-2xl p-16 text-center">
            <div class="w-28 h-28 mx-auto mb-5 bg-gray-800 rounded-full flex items-center justify-center">
                <svg class="w-14 h-14 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                </svg>
            </div>
            <h3 class="text-white text-2xl font-bold mb-2">No Matches Available</h3>
            <p class="text-gray-400 mb-4">Be the first to create a match and invite players!</p>
            <a href="/player-games/create" class="inline-flex items-center gap-2 px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Create Your First Match
            </a>
        </div>
        @endif
        
    </div>
</div>