<!-- Pitch Modal -->
<div 
    x-show="isModalOpen" 
    class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6"
    style="display: none;"
>
    <!-- Backdrop -->
    <div 
        x-show="isModalOpen" 
        x-transition.opacity
        @click="closeModal"
        class="absolute inset-0 bg-gray-950/80 backdrop-blur-sm"
    ></div>

    <!-- Modal Panel -->
    <div 
        x-show="isModalOpen" 
        x-transition.scale.95
        class="relative w-full max-w-2xl bg-gray-900 border border-gray-700 rounded-xl shadow-2xl flex flex-col max-h-[90vh]"
    >
        <!-- Header -->
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-800">
            <div>
                <h3 class="text-lg font-bold text-white">Draft Pitch: <span x-text="activeProspect?.company" class="text-blue-400"></span></h3>
            </div>
            <button @click="closeModal" class="text-gray-400 hover:text-white transition focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Follow-Up Tabs -->
        <div class="px-6 py-3 border-b border-gray-800 bg-gray-900/50 flex space-x-2 overflow-x-auto">
            <button 
                @click="setTab('Initial')"
                class="px-4 py-1.5 rounded-full text-xs font-bold whitespace-nowrap transition border"
                :class="currentTab === 'Initial' ? 'bg-blue-600/20 text-blue-400 border-blue-500/50' : 'bg-transparent text-gray-500 border-gray-700 hover:text-gray-300'"
            >
                Initial Pitch
            </button>
            <button 
                @click="setTab('FollowUp1')"
                class="px-4 py-1.5 rounded-full text-xs font-bold whitespace-nowrap transition border"
                :class="currentTab === 'FollowUp1' ? 'bg-yellow-600/20 text-yellow-400 border-yellow-500/50' : 'bg-transparent text-gray-500 border-gray-700 hover:text-gray-300'"
            >
                Follow-Up 1 (The Bump)
            </button>
            <button 
                @click="setTab('FollowUp2')"
                class="px-4 py-1.5 rounded-full text-xs font-bold whitespace-nowrap transition border"
                :class="currentTab === 'FollowUp2' ? 'bg-red-600/20 text-red-400 border-red-500/50' : 'bg-transparent text-gray-500 border-gray-700 hover:text-gray-300'"
            >
                Follow-Up 2 (The Breakup)
            </button>
        </div>

        <!-- Body -->
        <div class="p-6 overflow-y-auto">
            
            <div class="mb-4">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">To:</label>
                <div class="text-gray-200 text-sm bg-gray-950 border border-gray-800 rounded px-3 py-2" x-text="activeProspect?.email"></div>
            </div>

            <div class="mb-4">
                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Subject:</label>
                <div class="text-white font-medium text-sm bg-gray-950 border border-gray-800 rounded px-3 py-2" x-text="subjectLine"></div>
            </div>

            <div class="mb-4">
                <div class="flex justify-between items-end mb-1">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider">Message Body:</label>
                    <button @click="copyToClipboard" class="text-xs text-blue-400 hover:text-blue-300 transition flex items-center focus:outline-none">
                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Copy
                    </button>
                </div>
                <textarea 
                    readonly 
                    x-model="generatedEmail" 
                    class="w-full h-48 sm:h-64 bg-gray-950 border border-gray-800 rounded px-3 py-3 text-sm text-gray-300 focus:outline-none resize-none"
                ></textarea>
            </div>
        </div>

        <!-- Footer Actions -->
        <div class="px-6 py-4 border-t border-gray-800 flex justify-between items-center bg-gray-900 rounded-b-xl">
            <button @click="markAsSentOnly" class="text-sm text-gray-400 hover:text-white transition focus:outline-none hidden sm:block">
                Mark as "Sent" Manually
            </button>
            <div class="flex space-x-3 w-full sm:w-auto justify-end">
                <button @click="closeModal" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white text-sm font-medium rounded transition focus:outline-none" :disabled="isSending">
                    Cancel
                </button>
                <button 
                    @click="sendEmailViaSmtp"
                    :disabled="isSending"
                    class="px-5 py-2 bg-blue-600 hover:bg-blue-500 text-white text-sm font-bold rounded shadow transition flex items-center disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    <svg x-show="!isSending" class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <svg x-show="isSending" class="animate-spin w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span x-text="isSending ? 'Sending...' : 'Send Pitch via SMTP'"></span>
                </button>
            </div>
        </div>
    </div>
</div>
