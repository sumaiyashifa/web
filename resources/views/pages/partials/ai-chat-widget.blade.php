{{-- ========== AI CHAT AGENT WIDGET — FreelanceHub ========== --}}
<meta name="csrf-token-ai" content="{{ csrf_token() }}">

<style>
    /* ===== Google Font ===== */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    /* ===== Chat Widget Variables ===== */
    :root {
        --chat-primary: #6C63FF;
        --chat-primary-dark: #5A52D5;
        --chat-secondary: #FF6584;
        --chat-bg-dark: #0F0E17;
        --chat-bg-card: rgba(20, 19, 36, 0.85);
        --chat-bg-glass: rgba(255, 255, 255, 0.06);
        --chat-text: #FFFFFE;
        --chat-text-muted: #A7A9BE;
        --chat-border: rgba(255, 255, 255, 0.08);
        --chat-success: #2CB67D;
        --chat-radius: 20px;
        --chat-shadow: 0 25px 60px rgba(0, 0, 0, 0.5);
    }

    /* ===== Floating Action Button ===== */
    #ai-chat-fab {
        position: fixed;
        bottom: 28px;
        right: 28px;
        z-index: 99999;
        width: 62px;
        height: 62px;
        border-radius: 50%;
        border: none;
        background: linear-gradient(135deg, var(--chat-primary), var(--chat-secondary));
        color: #fff;
        font-size: 26px;
        cursor: pointer;
        box-shadow: 0 8px 30px rgba(108, 99, 255, 0.45);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s cubic-bezier(.4,0,.2,1), box-shadow 0.3s ease;
        animation: ai-fab-pulse 2.5s infinite;
    }
    #ai-chat-fab:hover {
        transform: scale(1.1) rotate(-8deg);
        box-shadow: 0 12px 40px rgba(108, 99, 255, 0.6);
    }
    #ai-chat-fab.hidden { display: none; }

    @keyframes ai-fab-pulse {
        0%, 100% { box-shadow: 0 8px 30px rgba(108, 99, 255, 0.45); }
        50% { box-shadow: 0 8px 45px rgba(108, 99, 255, 0.7); }
    }

    /* ===== Chat Container ===== */
    #ai-chat-container {
        position: fixed;
        bottom: 28px;
        right: 28px;
        z-index: 100000;
        width: 400px;
        max-width: calc(100vw - 32px);
        height: 580px;
        max-height: calc(100vh - 60px);
        border-radius: var(--chat-radius);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        background: var(--chat-bg-dark);
        border: 1px solid var(--chat-border);
        box-shadow: var(--chat-shadow);
        font-family: 'Inter', sans-serif;
        opacity: 0;
        transform: translateY(20px) scale(0.95);
        pointer-events: none;
        transition: opacity 0.35s cubic-bezier(.4,0,.2,1), transform 0.35s cubic-bezier(.4,0,.2,1);
    }
    #ai-chat-container.open {
        opacity: 1;
        transform: translateY(0) scale(1);
        pointer-events: all;
    }

    /* ===== Header ===== */
    .ai-chat-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px;
        background: linear-gradient(135deg, rgba(108,99,255,0.25), rgba(255,101,132,0.12));
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-bottom: 1px solid var(--chat-border);
        flex-shrink: 0;
    }
    .ai-chat-header-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .ai-chat-avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--chat-primary), var(--chat-secondary));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }
    .ai-chat-header-text h4 {
        margin: 0;
        font-size: 15px;
        font-weight: 700;
        color: var(--chat-text);
        line-height: 1.3;
    }
    .ai-chat-header-text span {
        font-size: 12px;
        color: var(--chat-success);
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .ai-chat-header-text span::before {
        content: '';
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--chat-success);
        display: inline-block;
        animation: ai-status-blink 1.5s infinite;
    }
    @keyframes ai-status-blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.4; }
    }
    .ai-chat-header-actions {
        display: flex;
        gap: 6px;
    }
    .ai-chat-header-actions button {
        background: rgba(255,255,255,0.08);
        border: none;
        color: var(--chat-text-muted);
        width: 34px;
        height: 34px;
        border-radius: 10px;
        cursor: pointer;
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s, color 0.2s;
    }
    .ai-chat-header-actions button:hover {
        background: rgba(255,255,255,0.15);
        color: var(--chat-text);
    }

    /* ===== Messages Area ===== */
    .ai-chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 20px 16px;
        display: flex;
        flex-direction: column;
        gap: 14px;
        scroll-behavior: smooth;
    }
    .ai-chat-messages::-webkit-scrollbar { width: 4px; }
    .ai-chat-messages::-webkit-scrollbar-track { background: transparent; }
    .ai-chat-messages::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.12); border-radius: 4px; }

    /* ===== Message Bubbles ===== */
    .ai-msg { display: flex; gap: 10px; max-width: 88%; animation: ai-msg-in 0.35s ease-out; }
    .ai-msg.bot { align-self: flex-start; }
    .ai-msg.user { align-self: flex-end; flex-direction: row-reverse; }

    .ai-msg-avatar {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        flex-shrink: 0;
        margin-top: 4px;
    }
    .ai-msg.bot .ai-msg-avatar {
        background: linear-gradient(135deg, var(--chat-primary), var(--chat-secondary));
    }
    .ai-msg.user .ai-msg-avatar {
        background: linear-gradient(135deg, #FF6584, #FF8A5C);
    }

    .ai-msg-bubble {
        padding: 12px 16px;
        border-radius: 16px;
        font-size: 13.5px;
        line-height: 1.55;
        color: var(--chat-text);
        word-wrap: break-word;
    }
    .ai-msg.bot .ai-msg-bubble {
        background: var(--chat-bg-glass);
        border: 1px solid var(--chat-border);
        border-top-left-radius: 4px;
    }
    .ai-msg.user .ai-msg-bubble {
        background: linear-gradient(135deg, var(--chat-primary), var(--chat-primary-dark));
        border-top-right-radius: 4px;
    }

    .ai-msg-time {
        font-size: 10px;
        color: var(--chat-text-muted);
        margin-top: 5px;
        opacity: 0.7;
    }
    .ai-msg.user .ai-msg-time { text-align: right; }

    @keyframes ai-msg-in {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* ===== Typing Indicator ===== */
    .ai-typing { display: flex; align-items: center; gap: 4px; padding: 8px 0 0 40px; }
    .ai-typing span {
        width: 7px; height: 7px; border-radius: 50%;
        background: var(--chat-text-muted);
        animation: ai-dot-bounce 1.4s infinite ease-in-out;
    }
    .ai-typing span:nth-child(2) { animation-delay: 0.16s; }
    .ai-typing span:nth-child(3) { animation-delay: 0.32s; }
    @keyframes ai-dot-bounce {
        0%, 80%, 100% { transform: scale(0.6); opacity: 0.4; }
        40% { transform: scale(1); opacity: 1; }
    }

    /* ===== Suggestions ===== */
    .ai-suggestions {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        padding: 0 16px 12px;
        flex-shrink: 0;
    }
    .ai-suggestion-btn {
        background: var(--chat-bg-glass);
        border: 1px solid var(--chat-border);
        color: var(--chat-text);
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-family: 'Inter', sans-serif;
        cursor: pointer;
        transition: background 0.2s, border-color 0.2s, transform 0.15s;
        white-space: nowrap;
    }
    .ai-suggestion-btn:hover {
        background: rgba(108, 99, 255, 0.2);
        border-color: var(--chat-primary);
        transform: translateY(-1px);
    }

    /* ===== Input Area ===== */
    .ai-chat-input-area {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 14px 16px;
        background: rgba(15, 14, 23, 0.9);
        border-top: 1px solid var(--chat-border);
        flex-shrink: 0;
    }
    #ai-chat-input {
        flex: 1;
        background: var(--chat-bg-glass);
        border: 1px solid var(--chat-border);
        border-radius: 14px;
        padding: 12px 16px;
        color: var(--chat-text);
        font-size: 13.5px;
        font-family: 'Inter', sans-serif;
        outline: none;
        transition: border-color 0.2s;
        resize: none;
        max-height: 80px;
        line-height: 1.4;
    }
    #ai-chat-input::placeholder { color: var(--chat-text-muted); }
    #ai-chat-input:focus { border-color: var(--chat-primary); }

    #ai-chat-send {
        width: 44px;
        height: 44px;
        border-radius: 14px;
        border: none;
        background: linear-gradient(135deg, var(--chat-primary), var(--chat-secondary));
        color: #fff;
        font-size: 18px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.2s, box-shadow 0.2s;
        flex-shrink: 0;
    }
    #ai-chat-send:hover {
        transform: scale(1.08);
        box-shadow: 0 4px 20px rgba(108, 99, 255, 0.4);
    }
    #ai-chat-send:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
    }

    /* ===== Mobile Responsive ===== */
    @media (max-width: 480px) {
        #ai-chat-container {
            width: calc(100vw - 16px);
            height: calc(100vh - 80px);
            bottom: 8px;
            right: 8px;
            border-radius: 16px;
        }
        #ai-chat-fab { bottom: 18px; right: 18px; width: 56px; height: 56px; font-size: 22px; }
    }
</style>

{{-- Floating Action Button --}}
<button id="ai-chat-fab" title="Chat with AI Assistant" aria-label="Open AI Chat">
    🤖
</button>

{{-- Chat Widget Container --}}
<div id="ai-chat-container">
    {{-- Header --}}
    <div class="ai-chat-header">
        <div class="ai-chat-header-info">
            <div class="ai-chat-avatar">🤖</div>
            <div class="ai-chat-header-text">
                <h4>FreelanceHub AI</h4>
                <span>Online — here to help</span>
            </div>
        </div>
        <div class="ai-chat-header-actions">
            <button id="ai-chat-clear" title="Clear chat"><i class="fas fa-trash-alt"></i></button>
            <button id="ai-chat-close" title="Close chat"><i class="fas fa-times"></i></button>
        </div>
    </div>

    {{-- Messages --}}
    <div class="ai-chat-messages" id="ai-chat-messages">
        {{-- Welcome message injected by JS --}}
    </div>

    {{-- Suggestions --}}
    <div class="ai-suggestions" id="ai-suggestions"></div>

    {{-- Input --}}
    <div class="ai-chat-input-area">
        <input type="text" id="ai-chat-input" placeholder="Ask me anything..." autocomplete="off" />
        <button id="ai-chat-send" title="Send message" aria-label="Send">
            <i class="fas fa-paper-plane"></i>
        </button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // ===== Elements =====
    const fab = document.getElementById('ai-chat-fab');
    const container = document.getElementById('ai-chat-container');
    const messagesEl = document.getElementById('ai-chat-messages');
    const suggestionsEl = document.getElementById('ai-suggestions');
    const inputEl = document.getElementById('ai-chat-input');
    const sendBtn = document.getElementById('ai-chat-send');
    const closeBtn = document.getElementById('ai-chat-close');
    const clearBtn = document.getElementById('ai-chat-clear');

    const csrfToken = document.querySelector('meta[name="csrf-token-ai"]')?.content
                   || document.querySelector('meta[name="csrf-token"]')?.content || '';

    let sessionId = localStorage.getItem('ai_chat_session') || ('sess_' + Math.random().toString(36).substr(2, 12));
    localStorage.setItem('ai_chat_session', sessionId);

    // ===== Open / Close =====
    fab.addEventListener('click', () => {
        container.classList.add('open');
        fab.classList.add('hidden');
        inputEl.focus();
        if (messagesEl.children.length === 0) showWelcome();
    });
    closeBtn.addEventListener('click', () => {
        container.classList.remove('open');
        fab.classList.remove('hidden');
    });

    // ===== Welcome Message =====
    function showWelcome() {
        addBotMessage("Hello! 👋 Welcome to FreelanceHub! I'm your AI assistant. How can I help you today?");
        renderSuggestions(['How to find jobs?', 'How to register?', 'Payment methods', 'Contact support']);
    }

    // ===== Time Formatter =====
    function formatTime(date) {
        return new Date(date || Date.now()).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    }

    // ===== Add Messages =====
    function addBotMessage(text) {
        const wrapper = document.createElement('div');
        wrapper.className = 'ai-msg bot';
        // Convert **bold** markdown to <strong>
        const htmlText = text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>').replace(/\n/g, '<br>');
        wrapper.innerHTML = `
            <div class="ai-msg-avatar">🤖</div>
            <div>
                <div class="ai-msg-bubble">${htmlText}</div>
                <div class="ai-msg-time">${formatTime()}</div>
            </div>`;
        messagesEl.appendChild(wrapper);
        scrollToBottom();
    }

    function addUserMessage(text) {
        const wrapper = document.createElement('div');
        wrapper.className = 'ai-msg user';
        wrapper.innerHTML = `
            <div class="ai-msg-avatar">👤</div>
            <div>
                <div class="ai-msg-bubble">${escapeHtml(text)}</div>
                <div class="ai-msg-time">${formatTime()}</div>
            </div>`;
        messagesEl.appendChild(wrapper);
        scrollToBottom();
    }

    function escapeHtml(str) {
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    // ===== Typing Indicator =====
    function showTyping() {
        const el = document.createElement('div');
        el.className = 'ai-typing';
        el.id = 'ai-typing-indicator';
        el.innerHTML = '<span></span><span></span><span></span>';
        messagesEl.appendChild(el);
        scrollToBottom();
    }
    function hideTyping() {
        const el = document.getElementById('ai-typing-indicator');
        if (el) el.remove();
    }

    // ===== Suggestions =====
    function renderSuggestions(items) {
        suggestionsEl.innerHTML = '';
        if (!items || items.length === 0) return;
        items.forEach(text => {
            const btn = document.createElement('button');
            btn.className = 'ai-suggestion-btn';
            btn.textContent = text;
            btn.addEventListener('click', () => sendMessage(text));
            suggestionsEl.appendChild(btn);
        });
    }

    // ===== Scroll =====
    function scrollToBottom() {
        requestAnimationFrame(() => {
            messagesEl.scrollTop = messagesEl.scrollHeight;
        });
    }

    // ===== Send Message =====
    async function sendMessage(text) {
        text = text.trim();
        if (!text) return;

        addUserMessage(text);
        suggestionsEl.innerHTML = '';
        inputEl.value = '';
        sendBtn.disabled = true;
        showTyping();

        try {
            const resp = await fetch('/ai-chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    message: text,
                    session_id: sessionId,
                }),
            });

            const data = await resp.json();
            hideTyping();
            addBotMessage(data.reply || "I'm having trouble responding. Please try again.");
            renderSuggestions(data.suggestions || []);
        } catch (err) {
            hideTyping();
            addBotMessage("Oops! Something went wrong. Please check your connection and try again. 🔄");
            renderSuggestions(['Try again later', 'Contact support']);
        }

        sendBtn.disabled = false;
        inputEl.focus();
    }

    // ===== Input Events =====
    sendBtn.addEventListener('click', () => sendMessage(inputEl.value));
    inputEl.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage(inputEl.value);
        }
    });

    // ===== Clear Chat =====
    clearBtn.addEventListener('click', async () => {
        messagesEl.innerHTML = '';
        suggestionsEl.innerHTML = '';
        try {
            await fetch('/ai-chat/clear', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ session_id: sessionId }),
            });
        } catch (e) { /* silent */ }
        showWelcome();
    });
});
</script>
