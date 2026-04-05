<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* FIFA-style dark theme */
    .fifa-bg-dark {
        background: linear-gradient(135deg, #0B1120 0%, #0F172A 50%, #1E293B 100%);
    }
    
    /* Request Card */
    .request-card {
        background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
        border: 1px solid rgba(34, 197, 94, 0.2);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    
    .request-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(34, 197, 94, 0.1), transparent);
        transition: left 0.5s;
    }
    
    .request-card:hover::before {
        left: 100%;
    }
    
    .request-card:hover {
        transform: translateY(-5px);
        border-color: rgba(34, 197, 94, 0.5);
        box-shadow: 0 15px 35px rgba(34, 197, 94, 0.2);
    }
    
    /* Accept Button */
    .btn-accept-request {
        background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    
    .btn-accept-request:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(34, 197, 94, 0.4);
    }
    
    .btn-accept-request:active {
        transform: translateY(0);
    }
    
    .btn-accept-request::after {
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
    
    .btn-accept-request:active::after {
        width: 300px;
        height: 300px;
    }
    
    /* Reject Button */
    .btn-reject-request {
        background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
        transition: all 0.3s;
    }
    
    .btn-reject-request:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(239, 68, 68, 0.4);
    }
    
    .btn-reject-request:active {
        transform: translateY(0);
    }
    
    /* Page Title */
    .page-title-fifa {
        background: linear-gradient(135deg, #22c55e, #15803d);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        text-shadow: 0 2px 10px rgba(34, 197, 94, 0.3);
    }
    
    /* Request Count Badge */
    .request-count-badge {
        background: rgba(34, 197, 94, 0.2);
        border: 1px solid rgba(34, 197, 94, 0.3);
    }
    
    /* Player Avatar */
    .player-avatar-request {
        border: 3px solid #22c55e;
        box-shadow: 0 0 15px rgba(34, 197, 94, 0.3);
        transition: all 0.3s;
    }
    
    .request-card:hover .player-avatar-request {
        transform: scale(1.05);
        box-shadow: 0 0 25px rgba(34, 197, 94, 0.5);
    }
    
    /* Position Badge */
    .position-badge-request {
        background: rgba(34, 197, 94, 0.15);
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
    
    .request-card {
        animation: fadeInUp 0.5s ease-out forwards;
        opacity: 0;
    }
    
    .request-card:nth-child(1) { animation-delay: 0s; }
    .request-card:nth-child(2) { animation-delay: 0.05s; }
    .request-card:nth-child(3) { animation-delay: 0.1s; }
    .request-card:nth-child(4) { animation-delay: 0.15s; }
    .request-card:nth-child(5) { animation-delay: 0.2s; }
    .request-card:nth-child(6) { animation-delay: 0.25s; }
    
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
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }
    
    .request-badge {
        animation: pulse 2s infinite;
    }
</style>

<div class="min-h-screen fifa-bg-dark p-6 md:p-10">
    <div class="max-w-7xl mx-auto">
        
        <!-- Header Section -->
        <div class="flex flex-wrap justify-between items-center mb-8 gap-4">
            <div>
                <h1 class="text-4xl md:text-5xl font-bold page-title-fifa mb-2 flex items-center gap-3">
                    <svg class="w-10 h-10 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                    Join Requests
                </h1>
                <p class="text-gray-400">Manage players who want to join your team</p>
            </div>
            
            <div class="request-count-badge px-4 py-2 rounded-full">
                <span class="text-green-400 font-bold">{{ count($requests) }}</span>
                <span class="text-gray-400 text-sm ml-1">Pending Requests</span>
            </div>
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
        
        <!-- Requests Grid -->
        @if(count($requests) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">
            
            @foreach($requests as $index => $req)
            <div class="request-card rounded-2xl p-6 text-center" style="animation-delay: {{ $index * 0.05 }}s">
                
                <!-- Request Badge -->
                <div class="absolute top-3 right-3">
                    <div class="request-badge bg-yellow-500/20 border border-yellow-500/30 rounded-full px-2 py-1">
                        <span class="text-yellow-400 text-xs font-medium">NEW</span>
                    </div>
                </div>
                
                <!-- Player Avatar -->
                <div class="mt-2">
                    <img src="{{ $req->player->avatar ? asset('storage/'.$req->player->avatar) : '/images/player.png' }}"
                         class="player-avatar-request w-24 h-24 rounded-full mx-auto object-cover">
                </div>
                
                <!-- Player Info -->
                <div class="mt-4">
                    <h3 class="text-white text-xl font-bold mb-1">
                        {{ $req->player->user->name ?? $req->player->name }}
                    </h3>
                    
                    <div class="position-badge-request inline-flex items-center gap-1 px-3 py-1 rounded-full mt-2">
                        <svg class="w-3 h-3 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                        </svg>
                        <span class="text-gray-300 text-sm">
                            {{ $req->player->position ?? 'Free Agent' }}
                        </span>
                    </div>
                    
                    <!-- Player Stats Mini -->
                    <div class="grid grid-cols-2 gap-2 mt-4">
                        <div class="bg-[#0F172A] rounded-lg p-2">
                            <p class="text-gray-500 text-xs">Age</p>
                            <p class="text-white text-sm font-bold">{{ $req->player->age ?? '--' }}</p>
                        </div>
                        <div class="bg-[#0F172A] rounded-lg p-2">
                            <p class="text-gray-500 text-xs">Rating</p>
                            <p class="text-green-500 text-sm font-bold">75</p>
                        </div>
                    </div>
                    
                    <!-- Request Message -->
                    <div class="mt-3 p-2 bg-green-500/10 rounded-lg border border-green-500/20">
                        <p class="text-gray-400 text-xs flex items-center justify-center gap-1">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                                <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"/>
                            </svg>
                            Wants to join your team
                        </p>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex gap-3 mt-5">
                    <!-- Accept Form -->
                    <form method="POST" action="/team/requests/{{ $req->id }}/accept" class="flex-1 accept-form">
                        @csrf
                        <button type="submit" class="btn-accept-request w-full text-white py-2.5 rounded-lg font-medium flex items-center justify-center gap-2 transition-all duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Accept
                        </button>
                    </form>
                    
                    <!-- Reject Form -->
                    <form method="POST" action="/team/requests/{{ $req->id }}/reject" class="flex-1 reject-form">
                        @csrf
                        <button type="submit" class="btn-reject-request w-full text-white py-2.5 rounded-lg font-medium flex items-center justify-center gap-2 transition-all duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Reject
                        </button>
                    </form>
                </div>
                
                <!-- Request Date -->
                <p class="text-gray-500 text-xs mt-3 flex items-center justify-center gap-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                    Requested {{ $req->created_at->diffForHumans() }}
                </p>
                
            </div>
            @endforeach
            
        </div>
        @else
        <!-- Empty State -->
        <div class="empty-state rounded-2xl p-16 text-center">
            <div class="w-28 h-28 mx-auto mb-5 bg-gray-800 rounded-full flex items-center justify-center">
                <svg class="w-14 h-14 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                </svg>
            </div>
            <h3 class="text-white text-2xl font-bold mb-2">No Join Requests</h3>
            <p class="text-gray-400 mb-4">There are no pending requests from players</p>
            <a href="/players" class="inline-flex items-center gap-2 px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                Find Players to Invite
            </a>
        </div>
        @endif
        
        <!-- Info Footer -->
        @if(count($requests) > 0)
        <div class="mt-8 p-4 bg-green-500/5 border border-green-500/20 rounded-xl">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-green-500/20 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-white text-sm font-medium">Review requests carefully</p>
                        <p class="text-gray-400 text-xs">Accepted players will be added to your team roster</p>
                    </div>
                </div>
                <div class="text-gray-500 text-xs">
                    ⏰ Requests expire after 7 days
                </div>
            </div>
        </div>
        @endif
        
    </div>
</div>

<script>
    // Auto-hide alerts after 5 seconds
    const successAlert = document.querySelector('.alert-success-fifa');
    const errorAlert = document.querySelector('.alert-error-fifa');
    
    if (successAlert && !successAlert.querySelector('.flex-1')?.innerText.includes('redirect')) {
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
    
    // Prevent double submission on reject forms
    const rejectForms = document.querySelectorAll('.reject-form');
    rejectForms.forEach(form => {
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
                    Rejecting...
                `;
            }
        });
    });
</script>