<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* FIFA-style dark theme */
    .fifa-bg-dark {
        background: linear-gradient(135deg, #0B1120 0%, #0F172A 50%, #1E293B 100%);
    }
    
    /* Main Card */
    .match-card-fifa {
        background: linear-gradient(135deg, rgba(30, 41, 59, 0.95) 0%, rgba(15, 23, 42, 0.98) 100%);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(34, 197, 94, 0.2);
        transition: all 0.3s;
    }
    
    .match-card-fifa:hover {
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
    
    .input-fifa::placeholder {
        color: rgba(156, 163, 175, 0.6);
    }
    
    select.input-fifa {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%2322c55e' viewBox='0 0 20 20'%3E%3Cpath fill-rule='evenodd' d='M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' clip-rule='evenodd'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1.2rem;
    }
    
    select.input-fifa option {
        background: #0F172A;
        color: white;
    }
    
    /* Date Input Styling */
    input[type="date"].input-fifa {
        color-scheme: dark;
    }
    
    input[type="date"].input-fifa::-webkit-calendar-picker-indicator {
        filter: invert(1);
        cursor: pointer;
    }
    
    /* Create Button */
    .btn-create {
        background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    
    .btn-create:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(34, 197, 94, 0.4);
    }
    
    .btn-create:active {
        transform: translateY(0);
    }
    
    .btn-create::after {
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
    
    .btn-create:active::after {
        width: 300px;
        height: 300px;
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
    
    /* Alert Error */
    .alert-error {
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
    
    /* Form Labels */
    .form-label {
        color: #9CA3AF;
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    /* Match Preview */
    .match-preview {
        background: rgba(34, 197, 94, 0.05);
        border: 1px dashed rgba(34, 197, 94, 0.3);
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
        animation: fadeInUp 0.5s ease-out;
    }
    
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
    
    .alert-error {
        animation: slideIn 0.5s ease-out;
    }
</style>

<div class="min-h-screen fifa-bg-dark flex items-center justify-center p-6">
    <div class="match-card-fifa rounded-2xl shadow-2xl w-full max-w-xl p-8 transition-all duration-300">
        
        <!-- Back Button -->
        <a href="/dashboard"
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
                Create Player Match
            </h1>
            <p class="text-gray-400 text-sm">Set up a new match and invite players to join</p>
        </div>
        
        <!-- Error Alert -->
        @if(session('error'))
            <div class="alert-error text-red-400 p-4 mb-6 rounded-lg flex items-center gap-3">
                <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <span class="flex-1">{{ session('error') }}</span>
            </div>
        @endif
        
        <!-- Match Form -->
        <form method="POST" action="/player-games" class="space-y-5">
            @csrf
            
            <!-- Terrain Selection -->
            <div>
                <label class="form-label">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                    </svg>
                    Select Terrain
                </label>
                <select name="terrain_id" class="input-fifa w-full p-3 rounded-lg">
                    @foreach($terrains as $terrain)
                        <option value="{{ $terrain->id }}">
                            🏟️ {{ $terrain->name }} - {{ $terrain->location }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <!-- Date Selection -->
            <div>
                <label class="form-label">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                    </svg>
                    Match Date
                </label>
                <input type="date" name="date" class="input-fifa w-full p-3 rounded-lg" min="{{ date('Y-m-d') }}">
            </div>
            
            <!-- Time Selection -->
            <div>
                <label class="form-label">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                    Match Time
                </label>
                <select name="time" class="input-fifa w-full p-3 rounded-lg">
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
            
            <!-- Match Preview (Live Preview) -->
            <div class="match-preview rounded-lg p-4 mt-4">
                <p class="text-gray-400 text-xs mb-2 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                    </svg>
                    Match Preview
                </p>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-500">Kickoff:</span>
                    <span class="text-green-400 font-medium" id="previewDateTime">Not selected yet</span>
                </div>
                <div class="flex items-center justify-between text-sm mt-1">
                    <span class="text-gray-500">Terrain:</span>
                    <span class="text-white" id="previewTerrain">Select a terrain</span>
                </div>
            </div>
            
            <!-- Create Button -->
            <button type="submit" class="btn-create w-full text-white py-3 rounded-lg font-bold text-lg flex items-center justify-center gap-2 mt-6">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Create Match
            </button>
            
        </form>
        
        <!-- Footer Info -->
        <div class="mt-6 text-center pt-4 border-t border-green-500/20">
            <p class="text-gray-500 text-xs flex items-center justify-center gap-1">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                Players will be able to join your match after creation
            </p>
        </div>
        
    </div>
</div>

<script>
    // Live Preview Update
    document.addEventListener('DOMContentLoaded', function() {
        const terrainSelect = document.querySelector('select[name="terrain_id"]');
        const dateInput = document.querySelector('input[name="date"]');
        const timeSelect = document.querySelector('select[name="time"]');
        const previewDateTime = document.getElementById('previewDateTime');
        const previewTerrain = document.getElementById('previewTerrain');
        
        function updatePreview() {
            // Update terrain preview
            if (terrainSelect && terrainSelect.selectedOptions[0]) {
                const terrainText = terrainSelect.selectedOptions[0].text;
                previewTerrain.textContent = terrainText.replace('🏟️ ', '');
            }
            
            // Update date/time preview
            const date = dateInput ? dateInput.value : '';
            const time = timeSelect ? timeSelect.value : '';
            
            if (date && time) {
                const formattedDate = new Date(date).toLocaleDateString('en-US', { 
                    weekday: 'short', 
                    year: 'numeric', 
                    month: 'short', 
                    day: 'numeric' 
                });
                previewDateTime.textContent = `${formattedDate} at ${time}`;
            } else if (date) {
                const formattedDate = new Date(date).toLocaleDateString('en-US', { 
                    weekday: 'short', 
                    month: 'short', 
                    day: 'numeric' 
                });
                previewDateTime.textContent = `${formattedDate} - Select time`;
            } else {
                previewDateTime.textContent = 'Select date and time';
            }
        }
        
        if (terrainSelect) terrainSelect.addEventListener('change', updatePreview);
        if (dateInput) dateInput.addEventListener('change', updatePreview);
        if (timeSelect) timeSelect.addEventListener('change', updatePreview);
        
        // Set minimum date to today
        if (dateInput) {
            const today = new Date().toISOString().split('T')[0];
            dateInput.min = today;
        }
    });
</script>