<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* FIFA-style dark theme */
    .fifa-bg-dark {
        background: linear-gradient(135deg, #0B1120 0%, #0F172A 50%, #1E293B 100%);
    }
    
    /* Team Card */
    .team-card {
        background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
        border: 1px solid rgba(34, 197, 94, 0.2);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    
    .team-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(34, 197, 94, 0.1), transparent);
        transition: left 0.5s;
    }
    
    .team-card:hover::before {
        left: 100%;
    }
    
    .team-card:hover {
        transform: translateY(-8px);
        border-color: rgba(34, 197, 94, 0.5);
        box-shadow: 0 15px 35px rgba(34, 197, 94, 0.2);
    }
    
    /* Team Logo */
    .team-logo-card {
        border: 3px solid #22c55e;
        box-shadow: 0 0 20px rgba(34, 197, 94, 0.3);
        transition: all 0.3s;
    }
    
    .team-card:hover .team-logo-card {
        transform: scale(1.05);
        box-shadow: 0 0 30px rgba(34, 197, 94, 0.5);
    }
    
    /* Join Button */
    .btn-join {
        background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    
    .btn-join:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(34, 197, 94, 0.4);
    }
    
    .btn-join:active {
        transform: translateY(0);
    }
    
    .btn-join::after {
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
    
    .btn-join:active::after {
        width: 300px;
        height: 300px;
    }
    
    /* Request Sent Badge */
    .request-sent {
        background: rgba(245, 158, 11, 0.2);
        border: 1px solid rgba(245, 158, 11, 0.5);
        backdrop-filter: blur(5px);
    }
    
    /* Already in Team Badge */
    .already-team {
        background: rgba(239, 68, 68, 0.2);
        border: 1px solid rgba(239, 68, 68, 0.5);
        backdrop-filter: blur(5px);
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
    
    /* Team Count Badge */
    .team-count {
        background: rgba(34, 197, 94, 0.2);
        border: 1px solid rgba(34, 197, 94, 0.3);
        backdrop-filter: blur(5px);
    }
    
    /* Alert Messages */
    .alert-success {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(34, 197, 94, 0.05));
        border: 1px solid rgba(34, 197, 94, 0.5);
        backdrop-filter: blur(10px);
    }
    
    .alert-error {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(239, 68, 68, 0.05));
        border: 1px solid rgba(239, 68, 68, 0.5);
        backdrop-filter: blur(10px);
    }
    
    /* Team Name */
    .team-name {
        color: white;
        transition: all 0.3s;
    }
    
    .team-card:hover .team-name {
        color: #22c55e;
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
    
    .team-card {
        animation: fadeInUp 0.5s ease-out forwards;
        opacity: 0;
    }
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }
</style>

<div class="min-h-screen fifa-bg-dark p-6 md:p-10">
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
            
            <div class="team-count px-4 py-2 rounded-full">
                <span class="text-green-400 font-bold">{{ count($teams) }}</span>
                <span class="text-gray-400 text-sm ml-1">Teams Available</span>
            </div>
        </div>
        
        <!-- Title Section -->
        <div class="mb-10">
            <h1 class="text-4xl md:text-5xl font-bold page-title-fifa mb-3 flex items-center gap-3">
                <svg class="w-10 h-10 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                </svg>
                All Teams
            </h1>
            <p class="text-gray-400">Find your perfect squad and start your journey</p>
        </div>
        
        <!-- Alert Messages -->
        @if(session('error'))
            <div class="alert-error text-red-400 p-4 mb-6 rounded-lg flex items-center gap-3 animate-pulse">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                {{ session('error') }}
            </div>
        @endif
        
        @if(session('success'))
            <div class="alert-success text-green-400 p-4 mb-6 rounded-lg flex items-center gap-3 animate-pulse">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Teams Grid -->
        @if(count($teams) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            
            @foreach($teams as $index => $team)
            <div class="team-card rounded-2xl p-6 text-center" style="animation-delay: {{ $index * 0.05 }}s">
                
                <!-- Team Logo -->
                <a href="/teams/{{ $team->id }}" class="block">
                    <div class="relative inline-block">
                        <img src="{{ $team->logo ? asset('storage/'.$team->logo) : '/images/team.png' }}"
                             class="team-logo-card w-24 h-24 rounded-full mx-auto object-cover">
                        <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 rounded-full border-2 border-[#0F172A]"></div>
                    </div>
                    
                    <!-- Team Name -->
                    <h3 class="team-name text-xl font-bold mt-4 mb-2">
                        {{ $team->name }}
                    </h3>
                    
                    <!-- Team Stats Mini -->
                    <div class="flex justify-center gap-4 text-center mt-2">
                        <div>
                            <p class="text-gray-400 text-xs">Players</p>
                            <p class="text-green-500 font-bold text-sm">{{ $team->players->count() }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Rating</p>
                            <p class="text-yellow-500 font-bold text-sm">82</p>
                        </div>
                    </div>
                </a>
                
                <!-- Join Logic -->
                @php
                    $profile = auth()->user()->profile;
                @endphp
                
                <div class="mt-5">
                    @if(!$profile->team_id)
                        @if(!in_array($team->id, $requests))
                            <form method="POST" action="/teams/{{ $team->id }}/join">
                                @csrf
                                <button class="btn-join w-full text-white py-2.5 rounded-lg font-medium flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                    </svg>
                                    Join Team
                                </button>
                            </form>
                        @else
                            <div class="request-sent rounded-lg py-2.5 px-3 text-sm font-medium flex items-center justify-center gap-2">
                                <svg class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Request Sent
                                <span class="text-yellow-500 text-xs">Pending</span>
                            </div>
                        @endif
                    @else
                        <div class="already-team rounded-lg py-2.5 px-3 text-sm font-medium flex items-center justify-center gap-2">
                            <svg class="w-4 h-4 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            Already in a Team
                        </div>
                    @endif
                </div>
                
                <!-- Team Badge -->
                @if($team->players->count() > 10)
                <div class="absolute top-3 right-3">
                    <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 text-white text-xs px-2 py-1 rounded-full">
                        Popular
                    </div>
                </div>
                @endif
                
            </div>
            @endforeach
            
        </div>
        @else
        <!-- Empty State -->
        <div class="empty-state rounded-2xl p-16 text-center">
            <div class="w-28 h-28 mx-auto mb-5 bg-gray-800 rounded-full flex items-center justify-center">
                <svg class="w-14 h-14 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                </svg>
            </div>
            <h3 class="text-white text-2xl font-bold mb-2">No Teams Available</h3>
            <p class="text-gray-400 mb-4">There are no teams to display at the moment.</p>
            @if(auth()->user()->role === 'team_owner')
            <a href="/teams/create" class="inline-flex items-center gap-2 px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Create Your Team
            </a>
            @endif
        </div>
        @endif
        
        <!-- Featured Teams Section (if enough teams) -->
        @if(count($teams) >= 3)
        <div class="mt-12 p-6 bg-gradient-to-r from-green-600/10 to-purple-600/10 rounded-2xl border border-green-500/20">
            <div class="flex items-center gap-3 mb-4">
                <svg class="w-6 h-6 text-yellow-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                <h3 class="text-white font-bold text-lg">Featured Teams</h3>
            </div>
            <p class="text-gray-400 text-sm">Join one of these top-rated teams and start your football journey today!</p>
        </div>
        @endif
        
    </div>
</div>

<style>
    /* Additional animations */
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    .alert-success, .alert-error {
        animation: slideIn 0.5s ease-out;
    }
    
    /* Team card staggered animation */
    .team-card {
        opacity: 1;
    }
</style>