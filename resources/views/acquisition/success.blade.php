<x-layouts.app title="Inquiry Received | SmartHomeStrategy">
    <div class="relative pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden min-h-[80vh] flex items-center">
        <!-- Background Effects -->
        <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-cyan-600/10 rounded-full blur-[120px]"></div>
            <div class="absolute inset-0 bg-grid-pattern opacity-[0.10]"></div>
        </div>

        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            
            <div class="animate-fade-in-up">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-green-500/20 border border-green-500/30 mb-8 shadow-[0_0_30px_rgba(34,197,94,0.3)]">
                    <svg class="w-10 h-10 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-extrabold font-display tracking-tight text-white mb-6">
                    Inquiry Received
                </h1>
                
                <p class="text-xl text-slate-300 mb-4">
                    Thank you for your interest in SmartHomeStrategy.com.
                </p>
                
                <p class="text-lg text-slate-400 mb-10 leading-relaxed">
                    Your inquiry has been successfully submitted and is currently under review. A confirmation email has been sent to your inbox.
                </p>
                
                <x-ui.button variant="secondary" href="{{ url('/') }}" class="px-8 py-3">
                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                    Return Home
                </x-ui.button>
            </div>
            
        </div>
    </div>
</x-layouts.app>
