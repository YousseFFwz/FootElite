<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* FIFA-style dark theme */
    .fifa-bg-dark {
        background: linear-gradient(135deg, #0B1120 0%, #0F172A 50%, #1E293B 100%);
    }
    
    /* Main Card */
    .team-settings-card {
        background: linear-gradient(135deg, rgba(30, 41, 59, 0.95) 0%, rgba(15, 23, 42, 0.98) 100%);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(34, 197, 94, 0.2);
        transition: all 0.3s;
    }
    
    .team-settings-card:hover {
        border-color: rgba(34, 197, 94, 0.5);
        box-shadow: 0 0 30px rgba(34, 197, 94, 0.15);
    }
    
    /* Team Logo */
    .team-logo-settings {
        border: 4px solid #22c55e;
        box-shadow: 0 0 30px rgba(34, 197, 94, 0.4);
        transition: all 0.3s;
        cursor: pointer;
    }
    
    .team-logo-settings:hover {
        transform: scale(1.05);
        box-shadow: 0 0 40px rgba(34, 197, 94, 0.6);
    }
    
    /* Upload Overlay */
    .logo-upload-overlay {
        position: absolute;
        bottom: 5px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(135deg, #22c55e, #15803d);
        border-radius: 9999px;
        padding: 6px 12px;
        font-size: 10px;
        font-weight: bold;
        opacity: 0;
        transition: opacity 0.3s;
        cursor: pointer;
        white-space: nowrap;
    }
    
    .logo-container:hover .logo-upload-overlay {
        opacity: 1;
    }
    
    /* Form Inputs */
    .input-fifa-dark {
        background: rgba(15, 23, 42, 0.8);
        border: 1px solid rgba(34, 197, 94, 0.3);
        color: white;
        transition: all 0.3s;
    }
    
    .input-fifa-dark:focus {
        border-color: #22c55e;
        box-shadow: 0 0 10px rgba(34, 197, 94, 0.3);
        outline: none;
        background: rgba(15, 23, 42, 1);
    }
    
    .input-fifa-dark::placeholder {
        color: rgba(156, 163, 175, 0.6);
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
    
    /* Save Button */
    .btn-save-team {
        background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    
    .btn-save-team:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(34, 197, 94, 0.4);
    }
    
    .btn-save-team:active {
        transform: translateY(0);
    }
    
    .btn-save-team::after {
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
    
    .btn-save-team:active::after {
        width: 300px;
        height: 300px;
    }
    
    /* Stats Cards */
    .stat-card-settings {
        background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
        border: 1px solid rgba(34, 197, 94, 0.2);
        transition: all 0.3s;
    }
    
    .stat-card-settings:hover {
        transform: translateY(-5px);
        border-color: rgba(34, 197, 94, 0.5);
        box-shadow: 0 5px 20px rgba(34, 197, 94, 0.2);
    }
    
    .stat-value-settings {
        background: linear-gradient(135deg, #22c55e, #15803d);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    
    /* Status Badge */
    .status-badge-settings {
        background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
        border: 1px solid rgba(34, 197, 94, 0.3);
        animation: pulse-green 2s infinite;
    }
    
    @keyframes pulse-green {
        0%, 100% {
            box-shadow: 0 0 5px rgba(34, 197, 94, 0.3);
        }
        50% {
            box-shadow: 0 0 15px rgba(34, 197, 94, 0.6);
        }
    }
    
    /* Alert Success */
    .alert-success-fifa {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(34, 197, 94, 0.05));
        border: 1px solid rgba(34, 197, 94, 0.5);
        backdrop-filter: blur(10px);
    }
    
    /* Team Name Gradient */
    .team-name-gradient {
        background: linear-gradient(135deg, #fff, #22c55e);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    
    /* Owner Badge */
    .owner-badge-settings {
        background: rgba(34, 197, 94, 0.15);
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
    
    .team-settings-card {
        animation: fadeInUp 0.5s ease-out;
    }
    
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
    
    .alert-success-fifa {
        animation: slideIn 0.5s ease-out;
    }
</style>

<div class="min-h-screen fifa-bg-dark flex items-center justify-center p-6">
    <div class="team-settings-card rounded-2xl shadow-2xl w-full max-w-4xl p-8 transition-all duration-300">
        
        <!-- Back Button -->
        <a href="/team-dashboard"
           class="inline-flex items-center gap-2 mb-6 px-5 py-2.5 btn-back-fifa rounded-lg text-gray-300 hover:text-white transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Dashboard
        </a>
        
        <!-- Header Section -->
        <div class="flex flex-wrap items-center gap-8">
            
            <!-- Team Logo with Upload -->
            <div class="relative logo-container text-center">
                <img src="{{ $team->logo ? asset('storage/'.$team->logo) : '/images/team.png' }}"
                     class="team-logo-settings w-32 h-32 rounded-full object-cover">
                <label for="logo-upload" class="logo-upload-overlay text-white cursor-pointer text-xs">
                    <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                    </svg>
                    Change Logo
                </label>
                <input type="file" name="logo" form="teamForm" id="logo-upload" class="hidden" accept="image/*">
                <p class="text-gray-500 text-xs mt-3">Click on logo to change</p>
            </div>
            
            <!-- Team Info -->
            <div class="flex-1">
                <h2 class="text-4xl md:text-5xl font-bold team-name-gradient mb-2">
                    {{ $team->name }}
                </h2>
                
                <div class="owner-badge-settings inline-flex items-center gap-2 px-4 py-2 rounded-lg mt-2">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                    </svg>
                    <span class="text-gray-300 text-sm">Team Owner:</span>
                    <span class="text-green-400 font-medium">{{ auth()->user()->name }}</span>
                </div>
                
                <!-- Team ID -->
                <p class="text-gray-500 text-xs mt-3 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2h12v8H4V6z" clip-rule="evenodd"/>
                    </svg>
                    Team ID: #{{ $team->id }}
                </p>
            </div>
            
            <!-- Status Badge -->
            <div class="status-badge-settings text-center px-6 py-4 rounded-xl min-w-[130px]">
                <div class="flex items-center justify-center gap-2 mb-1">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    <p class="text-green-400 text-xs font-semibold tracking-wider">ACTIVE</p>
                </div>
                <p class="text-white text-2xl font-bold">TEAM</p>
                <span class="text-gray-400 text-xs">Ready to Play</span>
            </div>
            
        </div>
        
        <!-- Success Alert -->
        @if(session('success'))
            <div class="alert-success-fifa text-green-400 p-4 mt-6 rounded-lg flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="flex-1">{{ session('success') }}</span>
                <svg class="w-4 h-4 cursor-pointer hover:text-green-300" fill="currentColor" viewBox="0 0 20 20" onclick="this.parentElement.style.display='none'">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </div>
        @endif
        
        <!-- Edit Form -->
        <form id="teamForm" method="POST" action="/team" enctype="multipart/form-data" class="mt-8">
            @csrf
            @method('PUT')
            
            <h3 class="text-white text-lg font-bold mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                </svg>
                Team Information
            </h3>
            
            <div class="space-y-4">
                <!-- Team Name -->
                <div>
                    <label class="text-gray-400 text-sm mb-1 block">Team Name</label>
                    <input type="text" name="name" value="{{ $team->name }}" 
                           class="input-fifa-dark w-full p-3 rounded-lg" 
                           placeholder="Enter team name"
                           required>
                </div>
                
                <!-- Team Description -->
                {{-- <div>
                    <label class="text-gray-400 text-sm mb-1 block">Team Description</label>
                    <textarea name="description" rows="3" 
                              class="input-fifa-dark w-full p-3 rounded-lg resize-none"
                              placeholder="Describe your team's style, goals, achievements, and requirements for new players...">{{ $team->description ?? '' }}</textarea>
                    <p class="text-gray-500 text-xs mt-1 text-right">Max 500 characters</p>
                </div> --}}
                
                <!-- Team Formation -->
                {{-- <div>
                    <label class="text-gray-400 text-sm mb-1 block">Preferred Formation</label>
                    <select name="formation" class="input-fifa-dark w-full p-3 rounded-lg">
                        <option value="4-4-2" {{ ($team->formation ?? '') == '4-4-2' ? 'selected' : '' }}>4-4-2 (Classic)</option>
                        <option value="4-3-3" {{ ($team->formation ?? '') == '4-3-3' ? 'selected' : '' }}>4-3-3 (Attacking)</option>
                        <option value="3-5-2" {{ ($team->formation ?? '') == '3-5-2' ? 'selected' : '' }}>3-5-2 (Possession)</option>
                        <option value="5-4-1" {{ ($team->formation ?? '') == '5-4-1' ? 'selected' : '' }}>5-4-1 (Defensive)</option>
                        <option value="4-2-3-1" {{ ($team->formation ?? '') == '4-2-3-1' ? 'selected' : '' }}>4-2-3-1 (Balanced)</option>
                    </select>
                </div> --}}
                
                <!-- Save Button -->
                <button type="submit" class="btn-save-team w-full text-white py-3 rounded-lg font-bold text-lg flex items-center justify-center gap-2 mt-6">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                    </svg>
                    Save Team Changes
                </button>
            </div>
        </form>
        
        <!-- Team Statistics Section -->
        <div class="mt-8">
            <h3 class="text-white text-lg font-bold mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/>
                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"/>
                </svg>
                Team Statistics
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                <div class="stat-card-settings p-4 rounded-xl">
                    <svg class="w-8 h-8 text-green-500 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                    </svg>
                    <p class="stat-value-settings text-3xl font-bold">{{ $team->players->count() }}</p>
                    <span class="text-gray-400 text-sm">Total Players</span>
                </div>
                
                <div class="stat-card-settings p-4 rounded-xl">
                    <svg class="w-8 h-8 text-green-500 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                    </svg>
                    {{-- <p class="stat-value-settings text-3xl font-bold">{{ $team->matches->count() ?? 0 }}</p> --}}
                    <span class="text-gray-400 text-sm">Matches Played</span>
                </div>
                
                <div class="stat-card-settings p-4 rounded-xl">
                    <svg class="w-8 h-8 text-green-500 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <p class="stat-value-settings text-3xl font-bold">{{ $team->win_rate ?? 0 }}%</p>
                    <span class="text-gray-400 text-sm">Win Rate</span>
                </div>
            </div>
        </div>
        
        <!-- Team Roster Preview -->
        @if($team->players->count() > 0)
        <div class="mt-8">
            <h3 class="text-white text-lg font-bold mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                </svg>
                Squad Roster ({{ $team->players->count() }} players)
            </h3>
            <div class="flex flex-wrap gap-2">
                @foreach($team->players->take(6) as $player)
                    <div class="bg-[#0F172A] px-3 py-2 rounded-lg flex items-center gap-2 border border-green-500/20 hover:border-green-500/50 transition">
                        <img src="{{ $player->avatar ? asset('storage/'.$player->avatar) : '/images/player.png' }}" 
                             class="w-6 h-6 rounded-full object-cover">
                        <span class="text-gray-300 text-sm">{{ $player->user->name }}</span>
                    </div>
                @endforeach
                @if($team->players->count() > 6)
                    <div class="bg-[#0F172A] px-3 py-2 rounded-lg border border-green-500/20">
                        <span class="text-gray-400 text-sm">+{{ $team->players->count() - 6 }} more</span>
                    </div>
                @endif
            </div>
        </div>
        @endif
        
        <!-- Danger Zone -->
        <div class="mt-8 p-4 border border-red-500/30 rounded-xl bg-red-500/5">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-red-500/20 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-red-400 text-sm font-medium">Danger Zone</p>
                        <p class="text-gray-500 text-xs">Delete team and all associated data</p>
                    </div>
                </div>
                <button onclick="confirmDelete()" class="px-4 py-2 bg-red-600/20 border border-red-500 text-red-400 rounded-lg hover:bg-red-600 hover:text-white transition text-sm">
                    Delete Team
                </button>
            </div>
        </div>
        
        <!-- Footer Note -->
        <div class="mt-6 text-center pt-4 border-t border-green-500/20">
            <p class="text-gray-500 text-xs flex items-center justify-center gap-1">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                Last updated: {{ now()->format('d M Y - H:i') }}
            </p>
        </div>
        
    </div>
</div>

<script>
    // Preview logo before upload
    document.getElementById('logo-upload')?.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const img = document.querySelector('.team-logo-settings');
                if (img) {
                    img.src = event.target.result;
                }
            };
            reader.readAsDataURL(file);
        }
    });
    
    // Delete confirmation
    function confirmDelete() {
        if (confirm('⚠️ Are you sure you want to delete this team?\n\nThis action cannot be undone and all data will be permanently removed.')) {
            // Submit delete form
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/team/{{ $team->id }}/delete';
            form.innerHTML = '@csrf @method("DELETE")';
            document.body.appendChild(form);
            form.submit();
        }
    }
    
    // Character counter for description
    const textarea = document.querySelector('textarea[name="description"]');
    if (textarea) {
        const charLimit = 500;
        const charCounter = document.createElement('div');
        charCounter.className = 'text-right text-xs mt-1';
        
        function updateCounter() {
            const remaining = charLimit - textarea.value.length;
            if (remaining < 0) {
                textarea.value = textarea.value.substring(0, charLimit);
            }
            const current = textarea.value.length;
            charCounter.innerHTML = `<span class="${current > charLimit ? 'text-red-500' : 'text-gray-500'}">${Math.min(current, charLimit)} / ${charLimit}</span>`;
        }
        
        textarea.parentNode.appendChild(charCounter);
        textarea.addEventListener('input', updateCounter);
        updateCounter();
    }
    
    // Unsaved changes warning
    let formChanged = false;
    const formInputs = document.querySelectorAll('#teamForm input, #teamForm textarea, #teamForm select');
    formInputs.forEach(input => {
        input.addEventListener('change', () => {
            formChanged = true;
        });
    });
    
    window.addEventListener('beforeunload', (e) => {
        if (formChanged) {
            e.preventDefault();
            e.returnValue = 'You have unsaved changes. Are you sure you want to leave?';
        }
    });
    
    // Auto-hide success message after 5 seconds
    const successAlert = document.querySelector('.alert-success-fifa');
    if (successAlert) {
        setTimeout(() => {
            successAlert.style.opacity = '0';
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 300);
        }, 5000);
    }
</script>