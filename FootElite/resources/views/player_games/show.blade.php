<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* FIFA-style dark theme */
    .fifa-chat-bg {
        background: linear-gradient(135deg, #0B1120 0%, #0F172A 50%, #1E293B 100%);
    }
    
    /* Chat Container */
    .chat-container {
        background: linear-gradient(135deg, rgba(30, 41, 59, 0.95) 0%, rgba(15, 23, 42, 0.98) 100%);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(34, 197, 94, 0.2);
        transition: all 0.3s;
    }
    
    .chat-container:hover {
        border-color: rgba(34, 197, 94, 0.5);
        box-shadow: 0 0 30px rgba(34, 197, 94, 0.15);
    }
    
    /* Messages Area */
    .messages-area {
        background: rgba(15, 23, 42, 0.6);
        scroll-behavior: smooth;
    }
    
    /* Custom Scrollbar */
    .messages-area::-webkit-scrollbar {
        width: 6px;
    }
    
    .messages-area::-webkit-scrollbar-track {
        background: #0F172A;
        border-radius: 10px;
    }
    
    .messages-area::-webkit-scrollbar-thumb {
        background: #22c55e;
        border-radius: 10px;
    }
    
    .messages-area::-webkit-scrollbar-thumb:hover {
        background: #15803d;
    }
    
    /* Message Bubbles */
    .bubble-sent {
        background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
        color: white;
        border-bottom-right-radius: 4px;
        animation: slideInRight 0.3s ease-out;
    }
    
    .bubble-received {
        background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
        border: 1px solid rgba(34, 197, 94, 0.3);
        color: #E5E7EB;
        border-bottom-left-radius: 4px;
        animation: slideInLeft 0.3s ease-out;
    }
    
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    /* Avatar Styles */
    .chat-avatar {
        border: 2px solid #22c55e;
        transition: all 0.3s;
    }
    
    .chat-avatar:hover {
        transform: scale(1.1);
        box-shadow: 0 0 10px rgba(34, 197, 94, 0.5);
    }
    
    /* Input Area */
    .chat-input {
        background: rgba(15, 23, 42, 0.8);
        border: 1px solid rgba(34, 197, 94, 0.3);
        transition: all 0.3s;
    }
    
    .chat-input:focus-within {
        border-color: #22c55e;
        box-shadow: 0 0 10px rgba(34, 197, 94, 0.3);
    }
    
    .chat-input input {
        background: transparent;
        color: white;
    }
    
    .chat-input input::placeholder {
        color: rgba(156, 163, 175, 0.6);
    }
    
    /* Send Button */
    .btn-send {
        background: linear-gradient(135deg, #22c55e 0%, #15803d 100%);
        transition: all 0.3s;
        position: relative;
        overflow: hidden;
    }
    
    .btn-send:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(34, 197, 94, 0.4);
    }
    
    .btn-send:active {
        transform: translateY(0);
    }
    
    /* Back Button */
    .btn-back-chat {
        background: rgba(30, 41, 59, 0.9);
        border: 1px solid rgba(34, 197, 94, 0.3);
        backdrop-filter: blur(10px);
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-back-chat:hover {
        background: rgba(34, 197, 94, 0.2);
        border-color: #22c55e;
        transform: translateX(-5px);
    }
    
    /* Chat Header */
    .chat-header {
        border-bottom: 1px solid rgba(34, 197, 94, 0.2);
    }
    
    /* Match Info Badge */
    .match-info-badge {
        background: rgba(34, 197, 94, 0.1);
        border: 1px solid rgba(34, 197, 94, 0.3);
    }
    
    /* Typing Indicator */
    .typing-indicator {
        background: rgba(34, 197, 94, 0.1);
        border-radius: 20px;
        padding: 8px 12px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    
    .typing-dot {
        width: 6px;
        height: 6px;
        background: #22c55e;
        border-radius: 50%;
        animation: typingBounce 1.4s infinite;
    }
    
    .typing-dot:nth-child(2) {
        animation-delay: 0.2s;
    }
    
    .typing-dot:nth-child(3) {
        animation-delay: 0.4s;
    }
    
    @keyframes typingBounce {
        0%, 60%, 100% {
            transform: translateY(0);
        }
        30% {
            transform: translateY(-5px);
        }
    }
    
    /* Empty Messages */
    .empty-messages {
        text-align: center;
        padding: 40px;
    }
    
    /* Timestamp */
    .timestamp {
        font-size: 10px;
        opacity: 0.6;
    }
    
    /* Message Status */
    .message-status {
        font-size: 8px;
        margin-left: 4px;
    }
</style>

<div class="min-h-screen fifa-chat-bg p-6 flex items-center justify-center">
    <div class="chat-container rounded-2xl shadow-2xl w-full max-w-3xl transition-all duration-300">
        
        <!-- Header with Match Info -->
        <div class="chat-header p-5">
            <div class="flex items-center justify-between mb-4 flex-wrap gap-3">
                <a href="/player-games"
                   class="btn-back-chat px-4 py-2 rounded-lg text-gray-300 hover:text-white transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Matches
                </a>
                
                <div class="match-info-badge px-4 py-2 rounded-full">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2L12 6H18L14 9L16 13L10 10L4 13L6 9L2 6H8L10 2Z"/>
                        </svg>
                        <span class="text-gray-300 text-sm">{{ $game->terrain->name }}</span>
                        <span class="text-gray-500">•</span>
                        <span class="text-gray-400 text-xs">{{ \Carbon\Carbon::parse($game->match_date)->format('d M, H:i') }}</span>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                        <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-white text-xl flex items-center gap-2">
                        Match Chat
                        <span class="text-xs bg-green-500/20 text-green-400 px-2 py-1 rounded-full">
                            {{ $game->players->count() }}/10 Players
                        </span>
                    </h3>
                    <p class="text-gray-400 text-xs">Discuss match strategy and coordinate with teammates</p>
                </div>
            </div>
        </div>
        
        <!-- Messages Area -->
        <div class="messages-area h-96 overflow-y-auto p-5 space-y-4" id="messagesContainer">
            
            @forelse($game->messages as $msg)
            <div class="flex items-end gap-2 
                {{ $msg->user_id === auth()->id() ? 'justify-end' : 'justify-start' }} group">
                
                <!-- Avatar (for others) -->
                @if($msg->user_id !== auth()->id())
                    <img src="{{ $msg->user->avatar ? asset('storage/'.$msg->user->avatar) : '/images/player.png' }}"
                         class="chat-avatar w-8 h-8 rounded-full object-cover opacity-80 group-hover:opacity-100 transition">
                @endif
                
                <div class="max-w-xs md:max-w-md">
                    <!-- Name -->
                    <p class="text-xs text-gray-400 mb-1 
                        {{ $msg->user_id === auth()->id() ? 'text-right' : 'text-left' }}
                        {{ $msg->user_id === auth()->id() ? 'mr-2' : 'ml-2' }}">
                        {{ $msg->user_id === auth()->id() ? 'You' : $msg->user->name }}
                        @if($msg->user->role === 'team_owner')
                            <span class="text-green-500 text-[10px] ml-1">(Captain)</span>
                        @endif
                    </p>
                    
                    <!-- Message Bubble -->
                    <div class="px-4 py-2.5 rounded-2xl shadow-lg
                        {{ $msg->user_id === auth()->id() 
                            ? 'bubble-sent rounded-br-none' 
                            : 'bubble-received rounded-bl-none' }}">
                        
                        <p class="text-sm leading-relaxed">
                            {{ $msg->message }}
                        </p>
                        
                        <!-- Time and Status -->
                        <div class="flex items-center justify-end gap-1 mt-1">
                            <p class="timestamp {{ $msg->user_id === auth()->id() ? 'text-green-200' : 'text-gray-400' }}">
                                {{ $msg->created_at->format('H:i') }}
                            </p>
                            @if($msg->user_id === auth()->id())
                                <svg class="w-3 h-3 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Avatar (for current user) -->
                @if($msg->user_id === auth()->id())
                    <img src="{{ auth()->user()->avatar ? asset('storage/'.auth()->user()->avatar) : '/images/player.png' }}"
                         class="chat-avatar w-8 h-8 rounded-full object-cover opacity-80 group-hover:opacity-100 transition">
                @endif
                
            </div>
            @empty
            <!-- Empty Messages State -->
            <div class="empty-messages">
                <div class="w-20 h-20 mx-auto mb-4 bg-gray-800 rounded-full flex items-center justify-center">
                    <svg class="w-10 h-10 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"/>
                        <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"/>
                    </svg>
                </div>
                <p class="text-gray-400 text-center">No messages yet</p>
                <p class="text-gray-500 text-sm text-center mt-1">Be the first to send a message!</p>
            </div>
            @endforelse
            
            <!-- Typing Indicator (Optional - would need WebSocket) -->
            <div id="typingIndicator" class="hidden">
                <div class="flex items-start gap-2">
                    <div class="typing-indicator">
                        <div class="typing-dot"></div>
                        <div class="typing-dot"></div>
                        <div class="typing-dot"></div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <!-- Send Message Form -->
        <div class="p-5 border-t border-green-500/20">
            <form method="POST" action="/player-games/{{ $game->id }}/message" id="messageForm">
                @csrf
                
                <div class="chat-input rounded-xl p-1 flex items-center gap-2">
                    <input name="message"
                           id="messageInput"
                           class="flex-1 bg-transparent text-white outline-none px-3 py-2 placeholder-gray-400"
                           placeholder="Type your message..."
                           autocomplete="off"
                           required>
                    
                    <button type="submit"
                            class="btn-send px-5 py-2 rounded-lg text-white font-medium transition-all duration-300 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                        Send
                    </button>
                </div>
                
                <!-- Character Counter -->
                <div class="text-right mt-2">
                    <p class="text-gray-500 text-xs" id="charCount">0 / 500</p>
                </div>
            </form>
        </div>
        
        <!-- Match Info Footer -->
        <div class="px-5 pb-4">
            <div class="flex items-center justify-between text-xs text-gray-500">
                <div class="flex items-center gap-2">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <span>Be respectful and have fun!</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ $game->players->count() }} players in chat</span>
                </div>
            </div>
        </div>
        
    </div>
</div>

<script>
    // Auto-scroll to bottom of messages
    const messagesContainer = document.getElementById('messagesContainer');
    if (messagesContainer) {
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }
    
    // Character counter
    const messageInput = document.getElementById('messageInput');
    const charCount = document.getElementById('charCount');
    
    if (messageInput && charCount) {
        messageInput.addEventListener('input', function() {
            const length = this.value.length;
            charCount.textContent = length + ' / 500';
            
            if (length > 500) {
                charCount.classList.add('text-red-400');
                this.value = this.value.substring(0, 500);
                charCount.textContent = '500 / 500';
            } else {
                charCount.classList.remove('text-red-400');
            }
        });
    }
    
    // Auto-refresh messages every 5 seconds (optional)
    function refreshMessages() {
        // You can implement AJAX refresh here
        // This would require a route that returns new messages
    }
    
    // Refresh every 10 seconds if needed
    // setInterval(refreshMessages, 10000);
    
    // Send message on Enter key
    if (messageInput) {
        messageInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                const form = document.getElementById('messageForm');
                if (form && this.value.trim() !== '') {
                    form.submit();
                }
            }
        });
    }
</script>