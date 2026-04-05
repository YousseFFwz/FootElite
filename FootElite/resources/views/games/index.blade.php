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
    
    /* Search Input */
    .search-input-fifa {
        background: rgba(15, 23, 42, 0.8);
        border: 1px solid rgba(34, 197, 94, 0.3);
        color: white;
        transition: all 0.3s;
    }
    
    .search-input-fifa:focus {
        border-color: #22c55e;
        box-shadow: 0 0 10px rgba(34, 197, 94, 0.3);
        outline: none;
        background: rgba(15, 23, 42, 1);
    }
    
    .search-input-fifa::placeholder {
        color: rgba(156, 163, 175, 0.6);
    }
    
    /* Search Button */
    .btn-search {
        background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
        transition: all 0.3s;
    }
    
    .btn-search:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(34, 197, 94, 0.4);
    }
    
    /* Accept Button */
    .btn-accept {
        background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    
    .btn-accept:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(34, 197, 94, 0.4);
    }
    
    .btn-accept:active {
        transform: translateY(0);
    }
    
    .btn-accept::after {
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
    
    .btn-accept:active::after {
        width: 300px;
        height: 300px;
    }
    
    /* Team Badge */
    .team-badge {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(34, 197, 94, 0.05));
        border-left: 4px solid #22c55e;
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
    
    /* Alerts */
    .alert-success-fifa {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(34, 197, 94, 0.05));
        border: 1px solid rgba(34, 197, 94, 0.5);
        backdrop-filter: blur(10px);
    }
    
    .alert-error-fifa {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(239, 68, 68, 0.05));
        border: 1px solid rgba(239, 68, 68, 0.5);
        backdrop-filter: blur(10px);
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
    
    .match-card-fifa {
        animation: fadeInUp 0.5s ease-out forwards;
        opacity: 0;
    }
    
    .match-card-fifa:nth-child(1) { animation-delay: 0s; }
    .match-card-fifa:nth-child(2) { animation-delay: 0.05s; }
    .match-card-fifa:nth-child(3) { animation-delay: 0.1s; }
    .match-card-fifa:nth-child(4) { animation-delay: 0.15s; }
    
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    .alert-success-fifa, .alert-error-fifa {
        animation: slideIn 0.5s ease-out;
    }
</style>

<div class="min-h-screen fifa-bg-dark p-6">
    <div class="max-w-6xl mx-auto">
        
        <!-- Header Section -->
        <div class="flex flex-wrap justify-between items-center mb-8 gap-4">
            <a href="{{ auth()->user()->role === 'team_owner' 
                ? '/team-dashboard' 
                : (auth()->user()->role === 'admin' ? '/admin' : '/dashboard') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 btn-back-fifa rounded-lg text-gray-300 hover:text-white transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Dashboard
            </a>
            
            <div class="match-count-badge px-4 py-2 rounded-full">
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
                Available Matches
            </h1>
            <p class="text-gray-400">Find and accept match invitations from other teams</p>
        </div>
        
        <!-- Success Alert -->
        @if(session('success'))
            <div class="alert-success-fifa text-green-400 p-4 mb-6 rounded-lg flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="flex-1">{{ session('success') }}</span>
                <svg class="w-4 h-4 cursor-pointer hover:text-green-300 transition" fill="currentColor" viewBox="0 0 20 20" onclick="this.parentElement.style.display='none'">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </div>
        @endif
        
        <!-- Error Alert -->
        @if(session('error'))
            <div class="alert-error-fifa text-red-400 p-4 mb-6 rounded-lg flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <span class="flex-1">{{ session('error') }}</span>
            </div>
        @endif
        
        <!-- Search Filter -->
        <form method="GET" class="mb-8">
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="flex-1 relative">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
                    </svg>
                    <input name="city" 
                           placeholder="Filter by city or location..." 
                           value="{{ request('city') }}"
                           class="search-input-fifa w-full p-3 pl-10 rounded-lg">
                </div>
                <button class="btn-search text-white px-6 py-3 rounded-lg font-medium flex items-center justify-center gap-2 transition-all duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Search
                </button>
                @if(request('city'))
                    <a href="{{ url()->current() }}" class="px-4 py-3 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 transition text-center">
                        Clear
                    </a>
                @endif
            </div>
        </form>
        
        <!-- Matches Grid -->
        @if(count($games) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            @foreach($games as $index => $game)
            <div class="match-card-fifa rounded-2xl p-6" style="animation-delay: {{ $index * 0.05 }}s">
                
                <!-- Header with Team vs Team -->
                <div class="flex items-center justify-between mb-4">
                    <div class="team-badge rounded-lg px-3 py-1">
                        <div class="flex items-center gap-2">
                            <img src="{{ $game->team1->logo ? asset('storage/'.$game->team1->logo) : '/images/team.png' }}" 
                                 class="w-8 h-8 rounded-full object-cover border border-green-500">
                            <span class="text-white font-bold">{{ $game->team1->name }}</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="w-8 h-8 bg-green-500/20 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="text-gray-400 text-xs">Opponent</span>
                        <p class="text-gray-300 text-sm">TBD</p>
                    </div>
                </div>
                
                <!-- VS Badge -->
                <div class="text-center my-3">
                    <span class="inline-flex items-center gap-2 px-4 py-1 bg-yellow-500/20 border border-yellow-500/30 rounded-full text-yellow-400 text-xs font-bold">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        CHALLENGE
                    </span>
                </div>
                
                <!-- Terrain Info -->
                <div class="bg-[#0F172A] rounded-lg p-3 mb-4">
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-white font-medium">{{ $game->terrain->name }}</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-400 text-sm">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        📍 {{ $game->terrain->location }}
                    </div>
                </div>
                
                <!-- Date & Time -->
                <div class="grid grid-cols-2 gap-3 mb-4">
                    <div class="bg-[#0F172A] rounded-lg p-2 text-center">
                        <svg class="w-4 h-4 text-green-500 mx-auto mb-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-white text-sm font-medium">
                            {{ \Carbon\Carbon::parse($game->match_date)->format('d M Y') }}
                        </p>
                    </div>
                    <div class="bg-[#0F172A] rounded-lg p-2 text-center">
                        <svg class="w-4 h-4 text-green-500 mx-auto mb-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-white text-sm font-medium">
                            {{ \Carbon\Carbon::parse($game->match_date)->format('H:i') }}
                        </p>
                    </div>
                </div>
                
                <!-- Match Status -->
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 bg-yellow-500 rounded-full animate-pulse"></div>
                        <span class="text-yellow-500 text-xs font-medium">PENDING</span>
                    </div>
                    <div class="text-gray-500 text-xs">
                        {{-- 👥 {{ $game->players->count() ?? 0 }}/22 players --}}
                    </div>
                </div>
                
                <!-- Accept Button -->
                @if(auth()->user()->role === 'team_owner')
                    <form method="POST" action="/games/{{ $game->id }}/accept" class="accept-form">
                        @csrf
                        <button type="submit" class="btn-accept w-full text-white py-2.5 rounded-lg font-medium flex items-center justify-center gap-2 transition-all duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Accept Match Challenge
                        </button>
                    </form>
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
            <h3 class="text-white text-2xl font-bold mb-2">No Matches Found</h3>
            <p class="text-gray-400 mb-4">
                @if(request('city'))
                    No matches available in "{{ request('city') }}"
                @else
                    There are no available matches at the moment
                @endif
            </p>
            @if(request('city'))
                <a href="{{ url()->current() }}" class="inline-flex items-center gap-2 px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    Clear Filters
                </a>
            @endif
        </div>
        @endif
        
        <!-- Info Footer -->
        @if(count($games) > 0)
        <div class="mt-8 p-4 bg-green-500/5 border border-green-500/20 rounded-xl">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-500/20 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-white text-sm font-medium">Looking for more matches?</p>
                        <p class="text-gray-400 text-xs">Check back later or create your own match invitation</p>
                    </div>
                </div>
                <a href="/games/create" class="px-5 py-2 bg-gradient-to-r from-green-600 to-green-700 text-white rounded-lg hover:from-green-500 hover:to-green-600 transition text-sm font-medium">
                    + Create Match
                </a>
            </div>
        </div>
        @endif
        
    </div>
</div>

<script>
    // Auto-hide alerts after 5 seconds
    const successAlert = document.querySelector('.alert-success-fifa');
    const errorAlert = document.querySelector('.alert-error-fifa');
    
    if (successAlert) {
        setTimeout(() => {
            successAlert.style.opacity = '0';
            setTimeout(() => {
                if (successAlert) successAlert.style.display = 'none';
            }, 300);
        }, 5000);
    }
    
    if (errorAlert) {
        setTimeout(() => {
            errorAlert.style.opacity = '0';
            setTimeout(() => {
                if (errorAlert) errorAlert.style.display = 'none';
            }, 300);
        }, 5000);
    }
    
    // Prevent double submission on accept forms
    const acceptForms = document.querySelectorAll('.accept-form');
    acceptForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn && submitBtn.disabled) {
                e.preventDefault();
                return;
            }
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <svg class="w-4 h-4 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Accepting...
                `;
            }
        });
    });
</script>