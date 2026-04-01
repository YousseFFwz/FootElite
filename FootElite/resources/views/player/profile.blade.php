<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* FIFA-style gradients and effects */
    .fifa-bg {
        background: linear-gradient(135deg, #0B1120 0%, #0F172A 50%, #1E293B 100%);
    }
    
    .card-fifa {
        background: linear-gradient(135deg, rgba(30, 41, 59, 0.95) 0%, rgba(15, 23, 42, 0.98) 100%);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(34, 197, 94, 0.2);
    }
    
    .card-fifa:hover {
        border: 1px solid rgba(34, 197, 94, 0.5);
        box-shadow: 0 0 25px rgba(34, 197, 94, 0.15);
    }
    
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
    
    select.input-fifa option {
        background: #0F172A;
    }
    
    .btn-fifa {
        background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
        transition: all 0.3s;
    }
    
    .btn-fifa:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(34, 197, 94, 0.4);
    }
    
    .rating-card {
        background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
        border-left: 4px solid #22c55e;
        animation: glow 2s infinite;
    }
    
    @keyframes glow {
        0%, 100% { box-shadow: 0 0 5px rgba(34, 197, 94, 0.3); }
        50% { box-shadow: 0 0 20px rgba(34, 197, 94, 0.5); }
    }
    
    .avatar-border {
        background: linear-gradient(135deg, #22c55e, #15803d);
        padding: 3px;
        border-radius: 50%;
    }
    
    .avatar-border img {
        border: 3px solid #0F172A;
    }
    
    .position-badge {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(34, 197, 94, 0.05));
        border: 1px solid rgba(34, 197, 94, 0.3);
    }
    
    /* Custom select dropdown */
    select.input-fifa {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%2322c55e' viewBox='0 0 20 20'%3E%3Cpath fill-rule='evenodd' d='M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' clip-rule='evenodd'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 1.2rem;
    }
    
    /* Success message */
    .success-alert {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(34, 197, 94, 0.05));
        border: 1px solid rgba(34, 197, 94, 0.5);
        backdrop-filter: blur(10px);
    }
    
    /* Back button */
    .btn-back {
        background: rgba(30, 41, 59, 0.8);
        border: 1px solid rgba(34, 197, 94, 0.3);
        transition: all 0.3s;
    }
    
    .btn-back:hover {
        background: rgba(34, 197, 94, 0.2);
        border-color: #22c55e;
        transform: translateX(-5px);
    }
</style>

<div class="min-h-screen fifa-bg flex items-center justify-center p-6">
    <div class="card-fifa rounded-2xl shadow-2xl w-full max-w-4xl p-8 transition-all duration-300">
        
        <!-- Back Button -->
        <a href="/dashboard"
           class="inline-flex items-center gap-2 mb-6 px-5 py-2.5 btn-back rounded-lg text-gray-300 hover:text-white transition-all duration-300">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Dashboard
        </a>
        
        <!-- Header Section -->
        <div class="flex items-start gap-6 flex-wrap lg:flex-nowrap">
            
            <!-- Avatar Section -->
            <div class="text-center">
                <div class="avatar-border inline-block rounded-full">
                    <img src="{{ $profile?->avatar ? asset('storage/'.$profile->avatar) : '/images/player.png' }}"
                         class="w-28 h-28 rounded-full object-cover">
                </div>
                <div class="mt-3">
                    <label for="avatar-upload" class="cursor-pointer">
                        <div class="px-3 py-1.5 bg-green-600/20 border border-green-500/30 rounded-lg text-green-400 text-xs hover:bg-green-600/30 transition inline-flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                            </svg>
                            Change Photo
                        </div>
                    </label>
                    <input type="file" name="avatar" form="profileForm" id="avatar-upload" class="hidden">
                </div>
            </div>
            
            <!-- Player Info -->
            <div class="flex-1">
                <h2 class="text-3xl font-bold text-white mb-2">{{ auth()->user()->name }}</h2>
                <div class="position-badge inline-flex items-center gap-2 px-4 py-2 rounded-lg">
                    <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                    </svg>
                    <span class="text-gray-300">
                        {{ $profile->position ?? 'Free Agent' }}
                    </span>
                </div>
                
                <!-- Player Stats Mini -->
                <div class="grid grid-cols-3 gap-3 mt-4">
                    <div class="text-center">
                        <p class="text-gray-400 text-xs">Age</p>
                        <p class="text-white font-bold">{{ $profile?->age ?? '--' }}</p>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-400 text-xs">Height</p>
                        <p class="text-white font-bold">{{ $profile?->height ?? '--' }}cm</p>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-400 text-xs">Weight</p>
                        <p class="text-white font-bold">{{ $profile?->weight ?? '--' }}kg</p>
                    </div>
                </div>
            </div>
            
            <!-- FIFA Rating Card -->
            <div class="rating-card text-center px-6 py-4 rounded-xl min-w-[100px]">
                <p class="text-gray-400 text-xs mb-1">OVERALL RATING</p>
                <p class="text-5xl font-bold text-green-500">75</p>
                <div class="flex items-center justify-center gap-1 mt-2">
                    <svg class="w-3 h-3 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span class="text-white text-sm font-bold">89 POT</span>
                </div>
                <p class="text-green-400 text-xs mt-2">↑ +2 this season</p>
            </div>
            
        </div>
        
        <!-- Success Message -->
        @if(session('success'))
            <div class="success-alert text-green-400 p-4 mt-6 rounded-lg flex items-center gap-3">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Profile Form -->
        <form id="profileForm" method="POST" action="/profile" enctype="multipart/form-data" class="mt-8">
            @csrf
            
            <h3 class="text-white text-lg font-bold mb-4 flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                    <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"/>
                </svg>
                Player Statistics
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Age -->
                <div>
                    <label class="text-gray-400 text-sm mb-1 block">Age</label>
                    <input type="number" name="age" value="{{ $profile?->age }}" placeholder="25"
                           class="input-fifa w-full p-3 rounded-lg">
                </div>
                
                <!-- Position -->
                <div>
                    <label class="text-gray-400 text-sm mb-1 block">Position</label>
                    <select name="position" class="input-fifa w-full p-3 rounded-lg">
                        <option value="">Select Position</option>
                        <option value="goalkeeper" @selected($profile?->position == 'goalkeeper')>🧤 Goalkeeper (GK)</option>
                        <option value="defender" @selected($profile?->position == 'defender')>🛡️ Defender (DEF)</option>
                        <option value="midfielder" @selected($profile?->position == 'midfielder')>⚡ Midfielder (MID)</option>
                        <option value="attacker" @selected($profile?->position == 'attacker')>🎯 Attacker (ATT)</option>
                    </select>
                </div>
                
                <!-- Preferred Foot -->
                <div>
                    <label class="text-gray-400 text-sm mb-1 block">Preferred Foot</label>
                    <select name="preferred_foot" class="input-fifa w-full p-3 rounded-lg">
                        <option value="">Select Foot</option>
                        <option value="right" @selected($profile?->preferred_foot == 'right')>🦶 Right Foot</option>
                        <option value="left" @selected($profile?->preferred_foot == 'left')>🦶 Left Foot</option>
                        <option value="both" @selected($profile?->preferred_foot == 'both')>✨ Both Feet</option>
                    </select>
                </div>
                
                <!-- Height -->
                <div>
                    <label class="text-gray-400 text-sm mb-1 block">Height (cm)</label>
                    <input type="number" name="height" value="{{ $profile?->height }}" placeholder="175"
                           class="input-fifa w-full p-3 rounded-lg">
                </div>
                
                <!-- Weight -->
                <div>
                    <label class="text-gray-400 text-sm mb-1 block">Weight (kg)</label>
                    <input type="number" name="weight" value="{{ $profile?->weight }}" placeholder="70"
                           class="input-fifa w-full p-3 rounded-lg">
                </div>
                
                <!-- Jersey Number -->
                <div>
                    <label class="text-gray-400 text-sm mb-1 block">Jersey Number</label>
                    <input type="number" name="jersey_number" value="{{ $profile?->jersey_number }}" placeholder="10"
                           class="input-fifa w-full p-3 rounded-lg">
                </div>
            </div>
            
            <!-- Skill Stats (FIFA-style) -->
            <div class="mt-6">
                <h3 class="text-white text-lg font-bold mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                    </svg>
                    Skill Attributes
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <div class="bg-[#0F172A] p-3 rounded-lg text-center">
                        <p class="text-gray-400 text-xs">Pace</p>
                        <p class="text-green-500 text-xl font-bold">82</p>
                    </div>
                    <div class="bg-[#0F172A] p-3 rounded-lg text-center">
                        <p class="text-gray-400 text-xs">Shooting</p>
                        <p class="text-green-500 text-xl font-bold">78</p>
                    </div>
                    <div class="bg-[#0F172A] p-3 rounded-lg text-center">
                        <p class="text-gray-400 text-xs">Passing</p>
                        <p class="text-green-500 text-xl font-bold">75</p>
                    </div>
                    <div class="bg-[#0F172A] p-3 rounded-lg text-center">
                        <p class="text-gray-400 text-xs">Defense</p>
                        <p class="text-green-500 text-xl font-bold">70</p>
                    </div>
                </div>
            </div>
            
            <!-- Save Button -->
            <div class="mt-8">
                <button type="submit" class="btn-fifa w-full text-white p-3 rounded-lg font-bold text-lg transition-all duration-300 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                    </svg>
                    Save Profile Changes
                </button>
            </div>
            
        </form>
        
        <!-- Footer Note -->
        <div class="mt-6 text-center">
            <p class="text-gray-500 text-xs flex items-center justify-center gap-1">
                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                Complete your profile to unlock more features
            </p>
        </div>
        
    </div>
</div>