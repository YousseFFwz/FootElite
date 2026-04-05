<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* FIFA-style dark theme */
    .fifa-bg-dark {
        background: linear-gradient(135deg, #0B1120 0%, #0F172A 50%, #1E293B 100%);
    }
    
    /* Match Card */
    .match-card-fifa {
        background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
        border: 1px solid rgba(34, 197, 94, 0.2);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    
    .match-card-fifa::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(34, 197, 94, 0.1), transparent);
        transition: left 0.5s;
    }
    
    .match-card-fifa:hover::before {
        left: 100%;
    }
    
    .match-card-fifa:hover {
        transform: translateY(-5px);
        border-color: rgba(34, 197, 94, 0.5);
        box-shadow: 0 15px 35px rgba(34, 197, 94, 0.2);
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
    
    /* Match Count Badge */
    .match-count-badge {
        background: rgba(34, 197, 94, 0.2);
        border: 1px solid rgba(34, 197, 94, 0.3);
    }
    
    /* VS Badge */
    .vs-badge {
        background: linear-gradient(135deg, #F59E0B, #D97706);
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-weight: bold;
        font-size: 14px;
        margin: 0 auto;
        box-shadow: 0 0 15px rgba(245, 158, 11, 0.3);
    }
    
    /* Team Names */
    .team-name-home {
        background: linear-gradient(135deg, #fff, #22c55e);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    
    .team-name-away {
        color: #9CA3AF;
    }
    
    /* Terrain Info */
    .terrain-info {
        background: rgba(15, 23, 42, 0.8);
        border-radius: 0.75rem;
        padding: 0.75rem;
    }
    
    /* Date Badge */
    .date-badge {
        background: linear-gradient(135deg, #1E293B, #0F172A);
        border: 1px solid rgba(34, 197, 94, 0.3);
        border-radius: 0.75rem;
        padding: 0.75rem;
    }
    
    /* Status Badge */
    .status-confirmed {
        background: rgba(34, 197, 94, 0.2);
        border: 1px solid rgba(34, 197, 94, 0.5);
        color: #22c55e;
    }
    
    .status-pending {
        background: rgba(245, 158, 11, 0.2);
        border: 1px solid rgba(245, 158, 11, 0.5);
        color: #F59E0B;
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.7;
        }
    }
    
    /* Empty State */
    .empty-state {
        background: linear-gradient(135deg, rgba(30, 41, 59, 0.5), rgba(15, 23, 42, 0.5));
        border: 2px dashed rgba(34, 197, 94, 0.3);
        border-radius: 1rem;
    }
    
    /* Player Avatar Group */
    .avatar-group {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    
    .player-avatar-mini {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        border: 2px solid #22c55e;
        object-fit: cover;
        transition: all 0.3s;
    }
    
    .player-avatar-mini:hover {
        transform: scale(1.1);
        z-index: 10;
    }
    
    /* Chat Button */
    .btn-chat-match {
        background: linear-gradient(135deg, #3B82F6 0%, #2563EB 100%);
        transition: all 0.3s;
    }
    
    .btn-chat-match:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(59, 130, 246, 0.4);
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
    
    .match-card-fifa {
        animation: fadeInUp 0.5s ease-out forwards;
        opacity: 0;
    }
    
    .match-card-fifa:nth-child(1) { animation-delay: 0s; }
    .match-card-fifa:nth-child(2) { animation-delay: 0.1s; }
    .match-card-fifa:nth-child(3) { animation-delay: 0.2s; }
    .match-card-fifa:nth-child(4) { animation-delay: 0.3s; }
</style>

<div class="min-h-screen fifa-bg-dark p-6">
    <div class="max-w-6xl mx-auto">
        
        <!-- Header Section -->
        <div class="flex flex-wrap justify-between items-center mb-8 gap-4">
            <a href="/dashboard"
               class="inline-flex items-center gap-2 px-5 py-2.5 btn-back-fifa rounded-lg text-gray-300 hover:text-white transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Dashboard
            </a>
            
            <div class="match-count-badge px-4 py-2 rounded-full">
                <span class="text-green-400 font-bold">{{ count($games) }}</span>
                <span class="text-gray-400 text-sm ml-1">My Matches</span>
            </div>
        </div>
        
        <!-- Title Section -->
        <div class="mb-8">
            <h1 class="text-4xl md:text-5xl font-bold page-title-fifa mb-3 flex items-center gap-3">
                <svg class="w-10 h-10 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                </svg>
                My Matches
            </h1>
            <p class="text-gray-400">View all your upcoming matches and connect with teammates</p>
        </div>
        
        <!-- Matches Grid -->
        @if(count($games) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            @foreach($games as $index => $game)
            <div class="match-card-fifa rounded-2xl p-6" style="animation-delay: {{ $index * 0.05 }}s">
                
                <!-- Match Header -->
                <div class="text-center mb-4">
                    <div class="flex items-center justify-between gap-3">
                        <div class="flex-1 text-right">
                            <h3 class="text-xl font-bold team-name-home">
                                {{ $game->team1->name }}
                            </h3>
                            <p class="text-gray-500 text-xs mt-1">Home</p>
                        </div>
                        
                        <div class="vs-badge">
                            <span class="text-white text-xs font-bold">VS</span>
                        </div>
                        
                        <div class="flex-1 text-left">
                            <h3 class="text-xl font-bold team-name-away">
                                {{ $game->team2->name ?? 'TBD' }}
                            </h3>
                            <p class="text-gray-500 text-xs mt-1">Away</p>
                        </div>
                    </div>
                </div>
                
                <!-- Match Status -->
                <div class="flex justify-center mb-4">
                    @if($game->status === 'accepted' || $game->team2_id)
                        <div class="status-confirmed inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-medium">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            MATCH CONFIRMED
                        </div>
                    @else
                        <div class="status-pending inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-medium">
                            <svg class="w-3 h-3 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            WAITING FOR CONFIRMATION
                        </div>
                    @endif
                </div>
                
                <!-- Terrain Info -->
                <div class="terrain-info mb-4">
                    <div class="flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-white font-medium">{{ $game->terrain->name }}</span>
                    </div>
                    <p class="text-gray-400 text-sm text-center mt-1">
                        📍 {{ $game->terrain->location }}
                    </p>
                </div>
                
                <!-- Date & Time -->
                <div class="date-badge mb-4">
                    <div class="flex items-center justify-center gap-4">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-white font-medium">
                                {{ \Carbon\Carbon::parse($game->match_date)->format('d M Y') }}
                            </span>
                        </div>
                        <div class="w-px h-4 bg-gray-600"></div>
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-white font-medium">
                                {{ \Carbon\Carbon::parse($game->match_date)->format('H:i') }}
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Players List -->
                @if($game->players && $game->players->count() > 0)
                <div class="mb-4">
                    <p class="text-gray-400 text-xs text-center mb-2">
                        👥 {{ $game->players->count() }}/22 Players Joined
                    </p>
                    <div class="avatar-group">
                        @foreach($game->players->take(5) as $player)
                            <img src="{{ $player->avatar ? asset('storage/'.$player->avatar) : '/images/player.png' }}"
                                 class="player-avatar-mini"
                                 title="{{ $player->user->name ?? $player->name }}">
                        @endforeach
                        @if($game->players->count() > 5)
                            <div class="bg-[#0F172A] px-2 py-1 rounded-full text-xs text-gray-400">
                                +{{ $game->players->count() - 5 }}
                            </div>
                        @endif
                    </div>
                </div>
                @endif
                
                <!-- Action Buttons -->
                <div class="flex gap-3">
                    @if($game->status === 'accepted' || $game->team2_id)
                        {{-- <a href="/player-games/{{ $game->id }}" 
                           class="flex-1 btn-chat-match text-white py-2 rounded-lg text-center font-medium transition-all duration-300 flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                            Open Chat
                        </a> --}}
                    @else
                        <button disabled 
                                class="flex-1 bg-gray-700 text-gray-400 py-2 rounded-lg text-center font-medium cursor-not-allowed flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Waiting for Confirmation
                        </button>
                    @endif
                </div>
                
                <!-- Match ID -->
                <p class="text-gray-600 text-xs text-center mt-3">
                    Match ID: #{{ $game->id }}
                </p>
                
            </div>
            @endforeach
            
        </div>
        @else
        <!-- Empty State -->
        <div class="empty-state p-16 text-center">
            <div class="w-28 h-28 mx-auto mb-5 bg-gray-800 rounded-full flex items-center justify-center">
                <svg class="w-14 h-14 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                </svg>
            </div>
            <h3 class="text-white text-2xl font-bold mb-2">No Matches Yet</h3>
            <p class="text-gray-400 mb-4">You haven't joined any matches yet</p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="/player-games" class="inline-flex items-center gap-2 px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Find Matches
                </a>
                <a href="/player-games/create" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Create Match
                </a>
            </div>
        </div>
        @endif
        
        <!-- Stats Summary -->
        @if(count($games) > 0)
        <div class="mt-8 grid grid-cols-1 sm:grid-cols-4 gap-4">
            <div class="bg-[#0F172A] rounded-xl p-4 text-center border border-green-500/20">
                <p class="text-2xl font-bold text-green-500">{{ count($games) }}</p>
                <p class="text-gray-400 text-sm">Total Matches</p>
            </div>
            <div class="bg-[#0F172A] rounded-xl p-4 text-center border border-green-500/20">
                <p class="text-2xl font-bold text-green-500">
                    {{ $games->where('status', 'accepted')->where('team2_id', '!=', null)->count() }}
                </p>
                <p class="text-gray-400 text-sm">Confirmed</p>
            </div>
            <div class="bg-[#0F172A] rounded-xl p-4 text-center border border-green-500/20">
                <p class="text-2xl font-bold text-yellow-500">
                    {{ $games->where('status', 'pending')->where('team2_id', null)->count() }}
                </p>
                <p class="text-gray-400 text-sm">Pending</p>
            </div>
            <div class="bg-[#0F172A] rounded-xl p-4 text-center border border-green-500/20">
                <p class="text-2xl font-bold text-blue-500">
                    {{-- {{ $games->sum(function($game) { return $game->players->count(); }) }} --}}
                </p>
                <p class="text-gray-400 text-sm">Total Players</p>
            </div>
        </div>
        @endif
        
    </div>
</div>