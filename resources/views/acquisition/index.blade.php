<x-layouts.app title="Strategic Acquisition Inquiry | SmartHomeStrategy">
    <div class="relative pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden min-h-screen">
        <!-- Background Effects -->
        <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
            <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-blue-600/10 rounded-full blur-[120px] animate-blob"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-purple-600/10 rounded-full blur-[120px] animate-blob" style="animation-delay: 2s;"></div>
            <div class="absolute inset-0 bg-grid-pattern opacity-[0.10]"></div>
        </div>

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="text-center mb-12 animate-fade-in-up">
                <h1 class="text-4xl md:text-5xl font-extrabold font-display tracking-tight text-white mb-4">
                    Strategic <span class="text-cyan-400">Acquisition</span> Inquiry
                </h1>
                <p class="text-lg text-slate-400 max-w-2xl mx-auto">
                    Thank you for your interest in SmartHomeStrategy.com. <br class="hidden md:block"/>
                    Please provide details about your organization and acquisition interest. Qualified inquiries will receive a response within 1–3 business days.
                </p>
            </div>

            <x-ui.glass-card class="animate-fade-in-up" style="animation-delay: 0.2s;" hoverEffect="false">
                <form action="{{ route('acquisition.store') }}" method="POST" class="space-y-6" x-data="{ isSubmitting: false }" @submit="isSubmitting = true">
                    @csrf

                    <!-- Honeypot -->
                    <div class="hidden">
                        <input type="text" name="company_code" id="company_code" tabindex="-1" autocomplete="off">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Full Name -->
                        <div>
                            <label for="full_name" class="block text-sm font-medium text-slate-300 mb-2">Full Name *</label>
                            <input type="text" name="full_name" id="full_name" required value="{{ old('full_name') }}"
                                class="w-full bg-[#020617]/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all placeholder-slate-500"
                                placeholder="John Doe">
                            @error('full_name') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <!-- Business Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-300 mb-2">Business Email *</label>
                            <input type="email" name="email" id="email" required value="{{ old('email') }}"
                                class="w-full bg-[#020617]/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all placeholder-slate-500"
                                placeholder="john@company.com">
                            @error('email') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <!-- Organization Name -->
                        <div>
                            <label for="organization" class="block text-sm font-medium text-slate-300 mb-2">Organization Name</label>
                            <input type="text" name="organization" id="organization" value="{{ old('organization') }}"
                                class="w-full bg-[#020617]/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all placeholder-slate-500"
                                placeholder="Acme Corp">
                            @error('organization') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <!-- Job Title -->
                        <div>
                            <label for="job_title" class="block text-sm font-medium text-slate-300 mb-2">Job Title</label>
                            <input type="text" name="job_title" id="job_title" value="{{ old('job_title') }}"
                                class="w-full bg-[#020617]/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all placeholder-slate-500"
                                placeholder="CEO / Managing Director">
                            @error('job_title') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <!-- Country -->
                        <div class="relative z-20">
                            <label for="country" class="block text-sm font-medium text-slate-300 mb-2">Country *</label>
                            <div x-data="{
                                open: false,
                                selected: '{{ old('country') }}',
                                options: [
                                    'United States', 'United Kingdom', 'Canada', 'Australia', 'Germany', 'France', 'Japan', 'China', 'India', 'Brazil', 'Mexico', 'Italy', 'Spain', 'Netherlands', 'Switzerland', 'Sweden', 'South Korea', 'Singapore', 'United Arab Emirates', 'Saudi Arabia', 'South Africa', 'Nigeria', 'Argentina', 'Other'
                                ],
                                toggle() { this.open = !this.open; },
                                select(option) { this.selected = option; this.open = false; }
                            }" @click.away="open = false" class="relative">
                                
                                <input type="hidden" name="country" :value="selected">
                                
                                <button type="button" @click="toggle()" 
                                    class="w-full bg-[#020617]/50 border border-white/10 rounded-xl px-4 py-3 text-left focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all flex items-center justify-between"
                                    :class="selected ? 'text-white' : 'text-slate-500'">
                                    <span x-text="selected || 'Select Country'"></span>
                                    <svg class="h-4 w-4 text-slate-400 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                </button>

                                <div x-show="open" 
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="opacity-0 transform scale-95 -translate-y-2"
                                    x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 transform scale-95 -translate-y-2"
                                    style="display: none;" 
                                    class="absolute mt-2 w-full bg-[#0f172a] rounded-xl border border-slate-700 shadow-[0_10px_40px_-10px_rgba(0,0,0,0.8)] overflow-hidden max-h-[240px] overflow-y-auto z-[60] custom-scrollbar">
                                    <div class="py-1">
                                        <template x-for="option in options" :key="option">
                                            <div @click="select(option)" 
                                                class="px-4 py-2.5 text-sm text-slate-300 hover:bg-cyan-500/20 hover:text-cyan-400 cursor-pointer transition-colors"
                                                :class="selected === option ? 'bg-cyan-500/10 text-cyan-400 font-medium' : ''">
                                                <span x-text="option"></span>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                            @error('country') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                        </div>

                        <!-- Website -->
                        <div>
                            <label for="website" class="block text-sm font-medium text-slate-300 mb-2">Website</label>
                            <input type="url" name="website" id="website" value="{{ old('website') }}"
                                class="w-full bg-[#020617]/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all placeholder-slate-500"
                                placeholder="https://example.com">
                            @error('website') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Estimated Budget -->
                    <!-- Estimated Budget -->
                    <div class="relative z-10">
                        <label for="budget_range" class="block text-sm font-medium text-slate-300 mb-2">Estimated Acquisition Budget *</label>
                        <div x-data="{
                            open: false,
                            selected: '{{ old('budget_range') }}',
                            options: [
                                '$15,000 - $50,000',
                                '$50,000 - $100,000',
                                '$100,000 - $250,000',
                                '$250,000 - $500,000',
                                '$500,000+'
                            ],
                            toggle() { this.open = !this.open; },
                            select(option) { this.selected = option; this.open = false; }
                        }" @click.away="open = false" class="relative">
                            
                            <input type="hidden" name="budget_range" :value="selected">
                            
                            <button type="button" @click="toggle()" 
                                class="w-full bg-[#020617]/50 border border-white/10 rounded-xl px-4 py-3 text-left focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all flex items-center justify-between"
                                :class="selected ? 'text-white' : 'text-slate-500'">
                                <span x-text="selected || 'Select Budget Range'"></span>
                                <svg class="h-4 w-4 text-slate-400 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                            </button>

                            <div x-show="open" 
                                x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 transform scale-95 -translate-y-2"
                                x-transition:enter-end="opacity-100 transform scale-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="opacity-100 transform scale-100 translate-y-0"
                                x-transition:leave-end="opacity-0 transform scale-95 -translate-y-2"
                                style="display: none;" 
                                class="absolute mt-2 w-full bg-[#0f172a] rounded-xl border border-slate-700 shadow-[0_10px_40px_-10px_rgba(0,0,0,0.8)] overflow-hidden max-h-[240px] overflow-y-auto z-[60] custom-scrollbar">
                                <div class="py-1">
                                    <template x-for="option in options" :key="option">
                                        <div @click="select(option)" 
                                            class="px-4 py-3 text-sm text-slate-300 hover:bg-cyan-500/20 hover:text-cyan-400 cursor-pointer transition-colors"
                                            :class="selected === option ? 'bg-cyan-500/10 text-cyan-400 font-medium' : ''">
                                            <span x-text="option"></span>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                        @error('budget_range') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-slate-300 mb-2">Message *</label>
                        <textarea name="message" id="message" rows="5" required
                            class="w-full bg-[#020617]/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all placeholder-slate-500 resize-none"
                            placeholder="Tell us about your organization, intended use case, acquisition goals, or any questions regarding SmartHomeStrategy.com.">{{ old('message') }}</textarea>
                        @error('message') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                    </div>

                    <!-- Submit -->
                    <div class="pt-4 flex items-center justify-between">
                        <p class="text-xs text-slate-500">Your information is strictly confidential.</p>
                        <button type="submit" :disabled="isSubmitting"
                            class="inline-flex items-center justify-center px-8 py-3 text-sm font-semibold rounded-full bg-cyan-500 text-white hover:bg-cyan-400 hover:shadow-[0_0_20px_rgba(6,182,212,0.4)] transition-all duration-300 transform hover:-translate-y-0.5 disabled:opacity-70 disabled:cursor-not-allowed">
                            <svg x-show="isSubmitting" style="display: none;" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span x-text="isSubmitting ? 'Submitting...' : 'Submit Inquiry'"></span>
                        </button>
                    </div>
                </form>
            </x-ui.glass-card>
        </div>
    </div>
</x-layouts.app>
