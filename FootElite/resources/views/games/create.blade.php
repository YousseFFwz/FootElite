<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* FIFA-style dark theme */
    .fifa-bg-dark {
        background: linear-gradient(135deg, #0B1120 0%, #0F172A 50%, #1E293B 100%);
    }
    
    /* Main Card */
    .create-match-card {
        background: linear-gradient(135deg, rgba(30, 41, 59, 0.95) 0%, rgba(15, 23, 42, 0.98) 100%);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(34, 197, 94, 0.2);
        transition: all 0.3s;
    }
    
    .create-match-card:hover {
        border-color: rgba(34, 197, 94, 0.5);
        box-shadow: 0 0 30px rgba(34, 197, 94, 0.15);
    }
    
    /* Form Inputs */
    .input-fifa {
        background: rgba(15, 23, 42, 0.8);
        border: 1px solid rgba(34, 197, 94, 0.3);
        color: white;
        transition: all 0.3s;
    }
    
    .input-fifa:focus {
        border-color: #22c55e;
        box-shadow: 0 0 10px rgba(34, 197, 94, 0.3);
        outline: none;
        background: rgba(15, 23, 42, 1);
    }
    
    .input-fifa option {
        background: #0F172A;
        color: white;
    }
    
    /* Labels */
    .form-label-fifa {
        color: #9CA3AF;
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
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
    
    /* Create Button */
    .btn-create-match {
        background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    
    .btn-create-match:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(34, 197, 94, 0.4);
    }
    
    .btn-create-match:active {
        transform: translateY(0);
    }
    
    .btn-create-match::after {
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
    
    .btn-create-match:active::after {
        width: 300px;
        height: 300px;
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
    
    /* Page Title */
    .page-title-fifa {
        background: linear-gradient(135deg, #22c55e, #15803d);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        text-shadow: 0 2px 10px rgba(34, 197, 94, 0.3);
    }
    
    /* Match Preview Card */
    .match-preview-card {
        background: rgba(34, 197, 94, 0.05);
        border: 1px dashed rgba(34, 197, 94, 0.3);
        border-radius: 1rem;
    }
    
    /* Date Input Styling */
    input[type="date"].input-fifa {
        color-scheme: dark;
    }
    
    input[type="date"].input-fifa::-webkit-calendar-picker-indicator {
        filter: invert(1);
        cursor: pointer;
    }
    
    /* Select Dropdown */
    select.input-fifa {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%2322c55e' viewBox='0 0 20 20'%3E%3Cpath fill-rule='evenodd' d='M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' clip-rule='evenodd'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1.2rem;
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
    
    .create-match-card {
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
    
    .alert-success-fifa, .alert-error-fifa {
        animation: slideIn 0.5s ease-out;
    }
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.02);
        }
    }
</style>

<div class="min-h-screen fifa-bg-dark flex items-center justify-center p-6">
    <div class="create-match-card rounded-2xl shadow-2xl w-full max-w-xl p-8 transition-all duration-300">
        
        <!-- Back Button -->
        <a href="{{ auth()->user()->role === 'team_owner' 
            ? '/team-dashboard' 
            : (auth()->user()->role === 'admin' ? '/admin' : '/dashboard') }}"
           class="inline-flex items-center gap-2 mb-6 px-5 py-2.5 btn-back-fifa rounded-lg text-gray-300 hover:text-white transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Dashboard
        </a>
        
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-green-500 to-green-700 rounded-full mb-4 shadow-lg">
                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                </svg>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold page-title-fifa mb-2">
                Create New Match
            </h1>
            <p class="text-gray-400 text-sm">Set up a match for your team</p>
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
        
        <!-- Validation Errors -->
        @if($errors->any())
            <div class="alert-error-fifa text-red-400 p-4 mb-6 rounded-lg">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <div class="flex-1">
                        <p class="font-semibold mb-1">Please fix the following errors:</p>
                        <ul class="list-disc list-inside text-sm space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        
        <!-- Create Match Form -->
        <form method="POST" action="/games" class="space-y-5" id="matchForm">
            @csrf
            
            <!-- Terrain Selection -->
            <div>
                <label class="form-label-fifa">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    Select Terrain
                </label>
                <select name="terrain_id" id="terrainSelect" class="input-fifa w-full p-3 rounded-lg" required>
                    <option value="" disabled selected>Choose a terrain</option>
                    @foreach($terrains as $terrain)
                        <option value="{{ $terrain->id }}" data-name="{{ $terrain->name }}" data-location="{{ $terrain->location }}">
                            🏟️ {{ $terrain->name }} - {{ $terrain->location }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <!-- Date Selection -->
            <div>
                <label class="form-label-fifa">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                    Match Date
                </label>
                <input type="date" name="date" id="matchDate" 
                       class="input-fifa w-full p-3 rounded-lg" 
                       min="{{ date('Y-m-d') }}"
                       required>
            </div>
            
            <!-- Time Selection -->
            <div>
                <label class="form-label-fifa">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                    Kickoff Time
                </label>
                <select name="time" id="matchTime" class="input-fifa w-full p-3 rounded-lg" required>
                    <option value="" disabled selected>Select kickoff time</option>
                    @for($i = 8; $i <= 22; $i++)
                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00">
                            ⏰ {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00
                        </option>
                        @if($i != 22)
                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:30">
                                ⏰ {{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:30
                            </option>
                        @endif
                    @endfor
                </select>
            </div>
            
            <!-- Match Preview (Live) -->
            <div class="match-preview-card p-4 mt-4" id="matchPreview" style="display: none;">
                <p class="text-gray-400 text-xs mb-3 flex items-center gap-2">
                    <svg class="w-3 h-3 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                    </svg>
                    Match Preview
                </p>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">📍 Terrain:</span>
                        <span class="text-white font-medium" id="previewTerrain">—</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">📅 Date:</span>
                        <span class="text-white font-medium" id="previewDate">—</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">⏰ Time:</span>
                        <span class="text-white font-medium" id="previewTime">—</span>
                    </div>
                    <div class="flex justify-between items-center pt-2 border-t border-green-500/20">
                        <span class="text-gray-500">🏆 Status:</span>
                        <span class="text-green-400 text-xs font-semibold">PENDING</span>
                    </div>
                </div>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="btn-create-match w-full text-white py-3 rounded-lg font-bold text-lg flex items-center justify-center gap-2 mt-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Create Match
            </button>
            
        </form>
        
        <!-- Info Footer -->
        <div class="mt-6 text-center pt-4 border-t border-green-500/20">
            <p class="text-gray-500 text-xs flex items-center justify-center gap-1">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                Players will be able to join after match creation
            </p>
        </div>
        
    </div>
</div>

<script>
    // Live Preview Update
    const terrainSelect = document.getElementById('terrainSelect');
    const matchDate = document.getElementById('matchDate');
    const matchTime = document.getElementById('matchTime');
    const matchPreview = document.getElementById('matchPreview');
    const previewTerrain = document.getElementById('previewTerrain');
    const previewDate = document.getElementById('previewDate');
    const previewTime = document.getElementById('previewTime');
    
    function updatePreview() {
        let hasSelection = false;
        
        // Update terrain preview
        if (terrainSelect && terrainSelect.selectedOptions[0] && terrainSelect.selectedOptions[0].value) {
            const selectedOption = terrainSelect.selectedOptions[0];
            const terrainName = selectedOption.getAttribute('data-name') || selectedOption.text.split(' - ')[0].replace('🏟️ ', '');
            previewTerrain.textContent = terrainName;
            hasSelection = true;
        } else {
            previewTerrain.textContent = '—';
        }
        
        // Update date preview
        if (matchDate && matchDate.value) {
            const date = new Date(matchDate.value);
            const formattedDate = date.toLocaleDateString('en-US', { 
                weekday: 'short', 
                month: 'short', 
                day: 'numeric',
                year: 'numeric'
            });
            previewDate.textContent = formattedDate;
            hasSelection = true;
        } else {
            previewDate.textContent = '—';
        }
        
        // Update time preview
        if (matchTime && matchTime.value) {
            previewTime.textContent = matchTime.value;
            hasSelection = true;
        } else {
            previewTime.textContent = '—';
        }
        
        // Show/hide preview
        if (matchPreview) {
            matchPreview.style.display = hasSelection ? 'block' : 'none';
            if (hasSelection) {
                matchPreview.style.animation = 'fadeInUp 0.3s ease-out';
            }
        }
    }
    
    // Add event listeners
    if (terrainSelect) terrainSelect.addEventListener('change', updatePreview);
    if (matchDate) matchDate.addEventListener('change', updatePreview);
    if (matchTime) matchTime.addEventListener('change', updatePreview);
    
    // Set minimum date to today
    if (matchDate) {
        const today = new Date().toISOString().split('T')[0];
        matchDate.min = today;
    }
    
    // Auto-hide alerts after 5 seconds
    const successAlert = document.querySelector('.alert-success-fifa');
    const errorAlert = document.querySelector('.alert-error-fifa');
    
    if (successAlert && !successAlert.querySelector('.flex-1')?.innerText.includes('redirect')) {
        setTimeout(() => {
            successAlert.style.opacity = '0';
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 300);
        }, 5000);
    }
    
    if (errorAlert) {
        setTimeout(() => {
            errorAlert.style.opacity = '0';
            setTimeout(() => {
                errorAlert.style.display = 'none';
            }, 300);
        }, 5000);
    }
    
    // Prevent double submission
    let isSubmitting = false;
    const form = document.getElementById('matchForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            if (isSubmitting) {
                e.preventDefault();
                return;
            }
            isSubmitting = true;
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <svg class="w-5 h-5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Creating Match...
                `;
            }
        });
    }
</script>