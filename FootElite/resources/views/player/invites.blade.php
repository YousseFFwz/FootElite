<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* Dark football theme */
    .football-bg {
        background: linear-gradient(135deg, #0a0f1e 0%, #0f1424 50%, #131a2c 100%);
        position: relative;
    }
    
    /* Ball pattern */
    .football-bg::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100' opacity='0.03'%3E%3Ccircle cx='20' cy='20' r='10' fill='%2322c55e'/%3E%3Cpolygon points='20,10 25,18 20,26 15,18' fill='%2322c55e'/%3E%3C/svg%3E");
        background-repeat: repeat;
        background-size: 50px;
        pointer-events: none;
    }
    
    /* Invite Card */
    .invite-card {
        background: linear-gradient(135deg, #1a1f2e 0%, #131725 100%);
        border: 1px solid rgba(34, 197, 94, 0.2);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .invite-card:hover {
        transform: translateY(-5px);
        border-color: rgba(34, 197, 94, 0.5);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3), 0 0 20px rgba(34, 197, 94, 0.2);
    }
    
    /* Team logo */
    .team-logo {
        border: 3px solid #22c55e;
        box-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
        transition: all 0.3s;
    }
    
    .invite-card:hover .team-logo {
        transform: scale(1.05) rotate(3deg);
        box-shadow: 0 0 30px rgba(34, 197, 94, 0.5);
    }
    
    /* Jersey number badge */
    .jersey-number {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        font-weight: bold;
        font-size: 18px;
        box-shadow: 0 5px 15px rgba(245, 158, 11, 0.3);
    }
    
    /* Accept button */
    .btn-accept {
        background: linear-gradient(135deg, #22c55e, #15803d);
        transition: all 0.3s;
        border-radius: 30px;
        position: relative;
        overflow: hidden;
    }
    
    .btn-accept:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(34, 197, 94, 0.4);
    }
    
    /* Reject button */
    .btn-reject {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        transition: all 0.3s;
        border-radius: 30px;
    }
    
    .btn-reject:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(239, 68, 68, 0.4);
    }
    
    /* Stats cards */
    .stat-item {
        background: rgba(15, 23, 42, 0.6);
        border-radius: 12px;
        transition: all 0.3s;
    }
    
    .stat-item:hover {
        background: rgba(34, 197, 94, 0.1);
    }
    
    /* Back button */
    .btn-back {
        background: rgba(30, 41, 59, 0.9);
        border: 1px solid rgba(34, 197, 94, 0.3);
        backdrop-filter: blur(10px);
        transition: all 0.3s;
        border-radius: 30px;
    }
    
    .btn-back:hover {
        background: rgba(34, 197, 94, 0.2);
        border-color: #22c55e;
        transform: translateX(-5px);
    }
    
    /* Empty state */
    .empty-state {
        background: linear-gradient(135deg, rgba(30, 41, 59, 0.5), rgba(15, 23, 42, 0.5));
        border: 2px dashed rgba(34, 197, 94, 0.3);
        border-radius: 20px;
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
    
    .invite-card {
        animation: fadeInUp 0.4s ease-out forwards;
        opacity: 0;
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.6; }
    }
    
    .pending-badge {
        animation: pulse 2s infinite;
    }
</style>

<div class="min-h-screen football-bg p-6 md:p-10">
    <div class="max-w-6xl mx-auto relative z-10">
        
        <!-- Header -->
        <div class="flex flex-wrap justify-between items-center mb-8 gap-4">
            <a href="/dashboard" class="inline-flex items-center gap-2 px-5 py-2.5 btn-back text-gray-300 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back
            </a>
            
            <div class="flex items-center gap-3 bg-green-500/20 px-4 py-2 rounded-full border border-green-500/30">
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                <span class="text-green-400 font-bold">{{ count($invites) }}</span>
                <span class="text-gray-400 text-sm">Invitations</span>
            </div>
        </div>
        
        <!-- Title -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center gap-3 mb-2">
                <div class="jersey-number">
                    <span class="text-white text-sm">⚽</span>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-green-400 to-green-600 bg-clip-text text-transparent">
                    Transfer Offers
                </h1>
                <div class="jersey-number">
                    <span class="text-white text-sm">🏆</span>
                </div>
            </div>
            <p class="text-gray-400">Teams that want you in their squad</p>
        </div>
        
        <!-- Alerts -->
        @if(session('success'))
            <div class="bg-green-500/20 border border-green-500 text-green-400 p-3 mb-6 rounded-xl flex items-center gap-3">
                <span class="text-xl">✅</span>
                {{ session('success') }}
                <span class="ml-auto text-sm animate-pulse">GOAL! 🎯</span>
            </div>
        @endif
        
        @if(session('error'))
            <div class="bg-red-500/20 border border-red-500 text-red-400 p-3 mb-6 rounded-xl flex items-center gap-3">
                <span class="text-xl">🟥</span>
                {{ session('error') }}
            </div>
        @endif
        
        <!-- Invites List -->
        @if(count($invites) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            @foreach($invites as $index => $invite)
            <div class="invite-card rounded-2xl p-5" style="animation-delay: {{ $index * 0.1 }}s">
                
                <!-- Header with team info -->
                <div class="flex items-center gap-4 mb-4">
                    <div class="relative">
                        <img src="{{ $invite->team->logo ? asset('storage/'.$invite->team->logo) : '/images/team.png' }}"
                             class="team-logo w-16 h-16 rounded-full object-cover">
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-[#1a1f2e]"></div>
                    </div>
                    
                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-white">
                            {{ $invite->team->name }}
                        </h3>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-green-500 text-xs">⚡ Professional Club</span>
                            <span class="text-gray-600">•</span>
                            <span class="text-yellow-500 text-xs">⭐ 82 OVR</span>
                        </div>
                    </div>
                    
                    <div class="pending-badge bg-yellow-500/20 px-3 py-1 rounded-full">
                        <span class="text-yellow-400 text-xs font-medium">PENDING</span>
                    </div>
                </div>
                
                <!-- Team stats -->
                <div class="grid grid-cols-3 gap-2 mb-4">
                    <div class="stat-item p-2 text-center">
                        <p class="text-gray-500 text-xs">👥 Players</p>
                        {{-- <p class="text-white text-sm font-bold">{{ $invite->team->players->count() }}/25</p> --}}
                    </div>
                    <div class="stat-item p-2 text-center">
                        <p class="text-gray-500 text-xs">🏟️ Matches</p>
                        {{-- <p class="text-white text-sm font-bold">{{ $invite->team->matches->count() ?? 0 }}</p> --}}
                    </div>
                    <div class="stat-item p-2 text-center">
                        <p class="text-gray-500 text-xs">🎯 Win Rate</p>
                        {{-- <p class="text-green-500 text-sm font-bold">{{ $invite->team->win_rate ?? 68 }}%</p> --}}
                    </div>
                </div>
                
                <!-- Invite message -->
                <div class="bg-green-500/10 rounded-xl p-3 mb-4 border-l-3 border-green-500">
                    <p class="text-gray-300 text-sm flex items-center gap-2">
                        <span>📢</span>
                        <span>We've been watching you play! Join our team and grow together.</span>
                    </p>
                </div>
                
                <!-- Players preview -->
                @if($invite->team->players->count() > 0)
                <div class="mb-4">
                    <p class="text-gray-500 text-xs mb-2">Current squad:</p>
                    <div class="flex items-center gap-2">
                        @foreach($invite->team->players->take(4) as $player)
                            <img src="{{ $player->avatar ? asset('storage/'.$player->avatar) : '/images/player.png' }}"
                                 class="w-8 h-8 rounded-full border border-green-500 object-cover"
                                 title="{{ $player->user->name ?? $player->name }}">
                        @endforeach
                        @if($invite->team->players->count() > 4)
                            <div class="w-8 h-8 rounded-full bg-gray-700 flex items-center justify-center text-xs text-gray-400">
                                +{{ $invite->team->players->count() - 4 }}
                            </div>
                        @endif
                    </div>
                </div>
                @endif
                
                <!-- Expiry -->
                <div class="text-center mb-4">
                    <p class="text-gray-500 text-xs">
                        ⏰ Expires in {{ $invite->created_at->addDays(7)->diffForHumans() }}
                    </p>
                </div>
                
                <!-- Actions -->
                <div class="flex gap-3">
                    <form method="POST" action="/invite/{{ $invite->id }}/accept" class="flex-1">
                        @csrf
                        <button class="btn-accept w-full text-white py-2 font-medium flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Sign Contract
                        </button>
                    </form>
                    
                    <form method="POST" action="/invite/{{ $invite->id }}/reject" class="flex-1">
                        @csrf
                        <button class="btn-reject w-full text-white py-2 font-medium flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Decline
                        </button>
                    </form>
                </div>
                
                <!-- Received date -->
                <p class="text-gray-600 text-xs text-center mt-3">
                    📅 Received {{ $invite->created_at->diffForHumans() }}
                </p>
                
            </div>
            @endforeach
            
        </div>
        
        <!-- Transfer tip -->
        <div class="mt-8 p-4 bg-gradient-to-r from-green-600/10 to-yellow-600/10 rounded-xl border border-green-500/20 text-center">
            <p class="text-gray-400 text-sm">
                💡 <span class="text-green-400">Pro Tip:</span> You can only play for one team. Choose wisely!
            </p>
        </div>
        
        @else
        <!-- Empty state -->
        <div class="empty-state p-12 text-center">
            <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-800 rounded-full mb-4">
                <span class="text-5xl">📭</span>
            </div>
            <h3 class="text-white text-xl font-bold mb-2">No Transfer Offers</h3>
            <p class="text-gray-400 mb-4">No teams have invited you yet</p>
            <a href="/teams" class="inline-flex items-center gap-2 px-6 py-2 bg-green-600 text-white rounded-full hover:bg-green-700">
                🔍 Browse Teams
            </a>
        </div>
        @endif
        
    </div>
</div>

<style>
    .border-l-3 {
        border-left-width: 3px;
    }
</style>