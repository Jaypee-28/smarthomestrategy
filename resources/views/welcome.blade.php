<x-layouts.app>
    <!-- Background Effects -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-blue-600/20 rounded-full blur-[120px] animate-blob"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-cyan-600/20 rounded-full blur-[120px] animate-blob" style="animation-delay: 2s;"></div>
        <div class="absolute top-[40%] left-[60%] w-[30%] h-[30%] bg-purple-600/10 rounded-full blur-[120px] animate-blob" style="animation-delay: 4s;"></div>
        <div class="absolute inset-0 bg-grid-pattern opacity-[0.15]"></div>
    </div>

    <div class="relative z-10">
        <!-- 1. HERO SECTION -->
        <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
            <!-- Glitters -->
            <div class="absolute top-1/4 left-1/4 animate-sparkle" style="animation-delay: 0.5s;">
                <svg class="w-6 h-6 text-cyan-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg>
            </div>
            <div class="absolute top-1/3 right-1/4 animate-sparkle" style="animation-delay: 1.2s;">
                <svg class="w-8 h-8 text-blue-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg>
            </div>
            <div class="absolute bottom-1/4 left-1/3 animate-sparkle" style="animation-delay: 0.2s;">
                <svg class="w-4 h-4 text-purple-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg>
            </div>
            <div class="absolute top-1/2 right-1/3 animate-sparkle" style="animation-delay: 1.8s;">
                <svg class="w-5 h-5 text-cyan-200" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0L14.59 9.41L24 12L14.59 14.59L12 24L9.41 14.59L0 12L9.41 9.41L12 0Z"/></svg>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
                <div class="animate-fade-in-up">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass border border-cyan-500/30 text-cyan-400 text-sm font-medium mb-8">
                        <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
                        Introducing Next-Gen AI Automation
                    </div>
                    
                    <h1 x-data="typewriter()" x-init="start()" class="text-5xl md:text-6xl lg:text-7xl font-extrabold font-display tracking-tight mb-8 leading-tight min-h-[3em] md:min-h-[2em]">
                        <span x-html="displayedText"></span><span class="animate-pulse border-r-4 border-cyan-400 ml-1 inline-block h-[1em] align-middle -mt-2"></span>
                    </h1>
                    
                    <p class="text-xl md:text-2xl text-slate-400 max-w-3xl mx-auto mb-10 font-light">
                        AI-powered smart home strategies that transform everyday living into a seamless, connected experience.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <x-ui.button variant="primary" href="#features" class="w-full sm:w-auto text-lg px-8 py-4">
                            Explore Smart Solutions
                        </x-ui.button>
                        <x-ui.button variant="secondary" href="{{ route('acquisition.show') }}" class="w-full sm:w-auto text-lg px-8 py-4">
                            Request Demo
                        </x-ui.button>
                    </div>
                </div>

                <!-- Animated Dashboard Mockup -->
                <div class="mt-20 relative mx-auto max-w-5xl animate-fade-in-up" style="animation-delay: 0.3s;">
                    <div class="glass p-2 rounded-2xl border border-white/10 shadow-2xl shadow-cyan-500/10">
                        <div class="bg-[#0f172a] rounded-xl overflow-hidden relative aspect-[16/9] flex items-center justify-center">
                            <!-- Placeholder for Dashboard UI -->
                            <div class="absolute inset-0 bg-gradient-to-br from-slate-900 to-[#020617] border border-white/5 rounded-xl flex items-center justify-center overflow-hidden">
                                
                                <!-- Floating UI Elements inside mockup -->
                                <div class="absolute top-10 left-10 glass p-4 rounded-lg w-48 animate-float">
                                    <div class="text-xs text-slate-400 mb-1">Energy Optimization</div>
                                    <div class="text-2xl font-bold text-cyan-400">-40%</div>
                                </div>
                                
                                <div class="absolute bottom-10 right-10 glass p-4 rounded-lg w-48 animate-float-delayed">
                                    <div class="text-xs text-slate-400 mb-1">Security Status</div>
                                    <div class="text-green-400 flex items-center gap-2">
                                        <div class="w-2 h-2 rounded-full bg-green-400"></div> Secure
                                    </div>
                                </div>

                                <div class="w-32 h-32 rounded-full border-4 border-cyan-500/30 flex items-center justify-center shadow-[0_0_50px_rgba(6,182,212,0.2)]">
                                    <svg class="w-12 h-12 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2. TRUST / STATISTICS SECTION -->
        <section class="py-20 border-y border-white/5 bg-white/[0.02]" x-data="{ shown: false }" x-intersect.once="shown = true">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center" :class="shown ? 'reveal-visible' : 'reveal-hidden'">
                    <div>
                        <div class="text-4xl md:text-5xl font-display font-bold text-white mb-2">500K+</div>
                        <div class="text-sm font-medium text-slate-400 uppercase tracking-wider">Connected Devices</div>
                    </div>
                    <div>
                        <div class="text-4xl md:text-5xl font-display font-bold text-white mb-2">98%</div>
                        <div class="text-sm font-medium text-slate-400 uppercase tracking-wider">Automation Efficiency</div>
                    </div>
                    <div>
                        <div class="text-4xl md:text-5xl font-display font-bold text-white mb-2">24/7</div>
                        <div class="text-sm font-medium text-slate-400 uppercase tracking-wider">AI Monitoring</div>
                    </div>
                    <div>
                        <div class="text-4xl md:text-5xl font-display font-bold text-white mb-2">40%</div>
                        <div class="text-sm font-medium text-slate-400 uppercase tracking-wider">Energy Savings</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. SMART HOME FEATURES -->
        <section id="features" class="py-24" x-data="{ shown: false }" x-intersect.margin.-100px="shown = true">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div :class="shown ? 'reveal-visible' : 'reveal-hidden'">
                    <x-ui.section-title 
                        title="Intelligent Core Features" 
                        subtitle="A comprehensive suite of tools designed to optimize, secure, and elevate your living space through advanced machine learning."
                    />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-16" :class="shown ? 'reveal-visible' : 'reveal-hidden'" style="transition-delay: 200ms;">
                    <!-- Feature 1 -->
                    <x-ui.glass-card>
                        <div class="w-12 h-12 rounded-lg bg-blue-500/20 flex items-center justify-center mb-6 border border-blue-500/30">
                            <svg class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">AI Home Intelligence</h3>
                        <p class="text-slate-400 leading-relaxed">Predictive automation powered by machine learning that anticipates your needs before you even realize them.</p>
                    </x-ui.glass-card>

                    <!-- Feature 2 -->
                    <x-ui.glass-card>
                        <div class="w-12 h-12 rounded-lg bg-green-500/20 flex items-center justify-center mb-6 border border-green-500/30">
                            <svg class="w-6 h-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" /></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Energy Optimization</h3>
                        <p class="text-slate-400 leading-relaxed">Dynamically reduce waste and maximize efficiency, lowering your carbon footprint and energy bills seamlessly.</p>
                    </x-ui.glass-card>

                    <!-- Feature 3 -->
                    <x-ui.glass-card>
                        <div class="w-12 h-12 rounded-lg bg-red-500/20 flex items-center justify-center mb-6 border border-red-500/30">
                            <svg class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Advanced Security</h3>
                        <p class="text-slate-400 leading-relaxed">Real-time monitoring and threat detection using computer vision and behavioral analysis.</p>
                    </x-ui.glass-card>

                    <!-- Feature 4 -->
                    <x-ui.glass-card>
                        <div class="w-12 h-12 rounded-lg bg-purple-500/20 flex items-center justify-center mb-6 border border-purple-500/30">
                            <svg class="w-6 h-6 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" /></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Unified Device Control</h3>
                        <p class="text-slate-400 leading-relaxed">Manage every connected device from one place, regardless of manufacturer or protocol.</p>
                    </x-ui.glass-card>

                    <!-- Feature 5 -->
                    <x-ui.glass-card>
                        <div class="w-12 h-12 rounded-lg bg-cyan-500/20 flex items-center justify-center mb-6 border border-cyan-500/30">
                            <svg class="w-6 h-6 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" /></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Voice Automation</h3>
                        <p class="text-slate-400 leading-relaxed">Natural language control throughout the home with context-aware processing.</p>
                    </x-ui.glass-card>

                    <!-- Feature 6 -->
                    <x-ui.glass-card>
                        <div class="w-12 h-12 rounded-lg bg-orange-500/20 flex items-center justify-center mb-6 border border-orange-500/30">
                            <svg class="w-6 h-6 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Smart Insights</h3>
                        <p class="text-slate-400 leading-relaxed">Actionable intelligence derived from your household data to continuously improve your living experience.</p>
                    </x-ui.glass-card>
                </div>
            </div>
        </section>

        <!-- 4. AI AUTOMATION SHOWCASE -->
        <section id="showcase" class="py-24 border-y border-white/5 bg-gradient-to-b from-transparent to-blue-900/10" x-data="{ shown: false }" x-intersect.margin.-100px="shown = true">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
                    <div :class="shown ? 'reveal-visible' : 'reveal-hidden'">
                        <h2 class="text-3xl md:text-5xl font-bold font-display tracking-tight text-white mb-6">
                            Next-Generation <br/><span class="text-cyan-400">Command Center</span>
                        </h2>
                        <p class="text-lg text-slate-400 mb-8 leading-relaxed">
                            Experience the pinnacle of home automation. Our AI-driven dashboard brings every aspect of your living environment into a single, beautifully designed interface. Monitor energy, manage security, and set complex predictive workflows with ease.
                        </p>
                        
                        <div class="space-y-6">
                            <div class="flex gap-4">
                                <div class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-semibold mb-1">Real-time Analytics</h4>
                                    <p class="text-sm text-slate-400">Instantly view energy consumption patterns and security alerts.</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <div class="w-10 h-10 rounded-full bg-cyan-500/20 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                                </div>
                                <div>
                                    <h4 class="text-white font-semibold mb-1">Predictive Workflows</h4>
                                    <p class="text-sm text-slate-400">The system learns your habits and automatically adjusts environments.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-16 lg:mt-0 relative" :class="shown ? 'reveal-visible' : 'reveal-hidden'" style="transition-delay: 300ms;">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500/30 to-cyan-500/30 rounded-3xl blur-3xl opacity-50"></div>
                        <div class="relative glass p-4 rounded-3xl border border-white/10 shadow-2xl">
                            <!-- Complex UI Mockup -->
                            <div class="bg-[#0f172a] rounded-2xl overflow-hidden border border-white/5">
                                <!-- Top bar -->
                                <div class="flex items-center justify-between p-4 border-b border-white/5">
                                    <div class="flex gap-2">
                                        <div class="w-3 h-3 rounded-full bg-red-500/80"></div>
                                        <div class="w-3 h-3 rounded-full bg-yellow-500/80"></div>
                                        <div class="w-3 h-3 rounded-full bg-green-500/80"></div>
                                    </div>
                                    <div class="text-xs text-slate-500">System Status: Optimal</div>
                                </div>
                                <!-- Content -->
                                <div class="p-6 grid grid-cols-2 gap-4">
                                    <div class="col-span-2 glass rounded-xl p-4 flex justify-between items-center bg-white/5">
                                        <div>
                                            <div class="text-xs text-slate-400">Current Temperature</div>
                                            <div class="text-2xl font-bold text-white">72°F</div>
                                        </div>
                                        <div class="w-16 h-8 rounded-full bg-cyan-500/20 relative">
                                            <div class="absolute right-1 top-1 w-6 h-6 rounded-full bg-cyan-400"></div>
                                        </div>
                                    </div>
                                    <div class="glass rounded-xl p-4 bg-white/5 h-32 flex flex-col justify-end">
                                        <!-- Graph placeholder -->
                                        <div class="flex items-end gap-1 h-12 mb-2">
                                            <div class="w-full bg-blue-500/50 rounded-t h-[40%]"></div>
                                            <div class="w-full bg-blue-500/70 rounded-t h-[70%]"></div>
                                            <div class="w-full bg-cyan-400 rounded-t h-[100%]"></div>
                                            <div class="w-full bg-blue-500/50 rounded-t h-[60%]"></div>
                                        </div>
                                        <div class="text-xs text-slate-400">Energy Load</div>
                                    </div>
                                    <div class="glass rounded-xl p-4 bg-white/5 flex flex-col justify-center items-center relative overflow-hidden">
                                        <div class="absolute inset-0 bg-blue-500/10 animate-pulse"></div>
                                        <svg class="w-8 h-8 text-blue-400 mb-2 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" /></svg>
                                        <div class="text-xs text-slate-400 relative z-10">Active Scan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Floating badge -->
                        <div class="absolute -right-6 -bottom-6 glass p-4 rounded-xl shadow-xl animate-float-delayed">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-green-500/20 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                </div>
                                <div>
                                    <div class="text-sm font-bold text-white">System Secure</div>
                                    <div class="text-xs text-slate-400">All sensors active</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. WHY SMART HOME STRATEGY -->
        <section class="py-24" x-data="{ shown: false }" x-intersect.margin.-100px="shown = true">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="glass rounded-3xl p-8 md:p-16 border border-cyan-500/20 relative overflow-hidden" :class="shown ? 'reveal-visible' : 'reveal-hidden'">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl"></div>
                    
                    <div class="max-w-3xl relative z-10">
                        <h2 class="text-3xl md:text-5xl font-bold font-display tracking-tight text-white mb-6">
                            Where Artificial Intelligence <br/>Meets Modern Living
                        </h2>
                        <div class="space-y-6 text-lg text-slate-300 leading-relaxed">
                            <p>
                                The era of fragmented smart devices is over. Smart Home Strategy represents a fundamental shift in how we interact with our living spaces. By integrating advanced machine learning algorithms with robust hardware networks, we create environments that don't just respond to your commands—they anticipate your needs.
                            </p>
                            <p>
                                From optimizing energy grids to ensure peak efficiency without sacrificing comfort, to establishing a unified security perimeter that learns normal behavior to flag anomalies, our platform is built for those who demand the ultimate luxury: a home that works seamlessly in the background.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. TESTIMONIALS -->
        <section id="testimonials" class="py-24 bg-white/[0.02]" x-data="{ shown: false }" x-intersect.margin.-100px="shown = true">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div :class="shown ? 'reveal-visible' : 'reveal-hidden'">
                    <x-ui.section-title 
                        title="Trusted by Visionaries" 
                        subtitle="Hear from the property managers and homeowners who are experiencing the future of living, today."
                    />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-16" :class="shown ? 'reveal-visible' : 'reveal-hidden'" style="transition-delay: 200ms;">
                    <!-- Testimonial 1 -->
                    <x-ui.glass-card class="flex flex-col h-full">
                        <div class="flex-grow">
                            <div class="flex text-cyan-400 mb-4">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>
                            <p class="text-slate-300 italic mb-6">"Smart Home Strategy has completely transformed how we manage our luxury high-rises. The predictive maintenance alone has saved us countless hours and reduced energy waste by nearly 35%."</p>
                        </div>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="w-12 h-12 rounded-full bg-slate-800 border border-white/10 flex items-center justify-center text-lg font-bold">ED</div>
                            <div>
                                <div class="text-white font-semibold">Elena Dubois</div>
                                <div class="text-sm text-slate-500">Director of Operations, Vertex Properties</div>
                            </div>
                        </div>
                    </x-ui.glass-card>

                    <!-- Testimonial 2 -->
                    <x-ui.glass-card class="flex flex-col h-full">
                        <div class="flex-grow">
                            <div class="flex text-cyan-400 mb-4">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>
                            <p class="text-slate-300 italic mb-6">"The AI doesn't just feel like a remote control; it feels like an intelligent entity managing the house. The way it handles security and climate control based on our routines is basically magic."</p>
                        </div>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="w-12 h-12 rounded-full bg-slate-800 border border-white/10 flex items-center justify-center text-lg font-bold">MW</div>
                            <div>
                                <div class="text-white font-semibold">Marcus Wright</div>
                                <div class="text-sm text-slate-500">Private Homeowner</div>
                            </div>
                        </div>
                    </x-ui.glass-card>

                    <!-- Testimonial 3 -->
                    <x-ui.glass-card class="flex flex-col h-full">
                        <div class="flex-grow">
                            <div class="flex text-cyan-400 mb-4">
                                @for($i = 0; $i < 5; $i++)
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>
                            <p class="text-slate-300 italic mb-6">"Integrating the Smart Home Strategy API into our development projects gave us an immediate competitive edge in the luxury real estate market. It's the standard for modern living."</p>
                        </div>
                        <div class="flex items-center gap-4 mt-auto">
                            <div class="w-12 h-12 rounded-full bg-slate-800 border border-white/10 flex items-center justify-center text-lg font-bold">SC</div>
                            <div>
                                <div class="text-white font-semibold">Sarah Chen</div>
                                <div class="text-sm text-slate-500">Lead Architect, Nova Designs</div>
                            </div>
                        </div>
                    </x-ui.glass-card>
                </div>
            </div>
        </section>

        <!-- 7. FUTURE OF SMART LIVING -->
        <section class="py-32 relative overflow-hidden" x-data="{ shown: false }" x-intersect.margin.-100px="shown = true">
            <!-- Large background elements -->
            <div class="absolute inset-0 bg-blue-900/10 z-0"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-cyan-600/10 rounded-full blur-[150px] pointer-events-none"></div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                <div :class="shown ? 'reveal-visible' : 'reveal-hidden'">
                    <h2 class="text-4xl md:text-6xl lg:text-7xl font-bold font-display tracking-tight text-white mb-8">
                        Pioneering the <br/><span class="text-gradient">Autonomous Environment</span>
                    </h2>
                    <p class="text-xl text-slate-400 max-w-2xl mx-auto mb-16">
                        We are building the connected ecosystems of tomorrow. Sustainable, secure, and entirely responsive to human presence.
                    </p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 max-w-4xl mx-auto text-left">
                        <div class="glass p-6 rounded-2xl border border-white/10">
                            <h4 class="text-white font-semibold mb-2">Predictive Maintenance</h4>
                            <p class="text-sm text-slate-400">Sensors detect hardware anomalies before failure, scheduling automated service requests.</p>
                        </div>
                        <div class="glass p-6 rounded-2xl border border-white/10">
                            <h4 class="text-white font-semibold mb-2">Sustainable Living</h4>
                            <p class="text-sm text-slate-400">Micro-grid integrations orchestrate power usage to utilize renewable sources primarily.</p>
                        </div>
                        <div class="glass p-6 rounded-2xl border border-white/10">
                            <h4 class="text-white font-semibold mb-2">Connected Ecosystems</h4>
                            <p class="text-sm text-slate-400">Vehicles, wearables, and homes communicate in real-time to synchronize your daily routine.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 8. DOMAIN ACQUISITION SECTION -->
        <section id="acquisition" class="py-24 border-t border-white/10 bg-[#020617]" x-data="{ shown: false }" x-intersect.margin.-100px="shown = true">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="glass rounded-3xl p-10 md:p-16 border border-white/10 relative overflow-hidden" :class="shown ? 'reveal-visible' : 'reveal-hidden'">
                    <!-- Subtle glow -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 z-0"></div>
                    
                    <div class="relative z-10">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white/5 border border-white/10 mb-8">
                            <svg class="w-8 h-8 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                        </div>
                        
                        <h2 class="text-3xl md:text-4xl font-display font-bold text-white mb-4">
                            Strategic Brand Opportunity
                        </h2>
                        
                        <p class="text-lg text-slate-400 mb-10 max-w-2xl mx-auto leading-relaxed">
                            <span class="text-white font-medium">SmartHomeStrategy.com</span> and its associated digital brand assets may be available for acquisition by qualified organizations seeking a premium presence in the smart home industry.
                        </p>
                        
                        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                            <a href="{{ route('acquisition.show') }}" class="inline-flex items-center justify-center px-8 py-4 text-sm font-semibold text-white bg-white/10 border border-white/20 rounded-full hover:bg-white/20 hover:border-white/30 transition-all duration-300 backdrop-blur-md">
                                Acquisition Inquiry
                                <svg class="ml-2 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('typewriter', () => ({
                text: 'The Future of <br class="hidden md:block"/><span class="text-gradient">Intelligent Living</span> Starts Here',
                displayedText: '',
                start() {
                    let i = 0;
                    let isTag = false;
                    const type = () => {
                        if (i < this.text.length) {
                            let char = this.text.charAt(i);
                            if (char === '<') isTag = true;
                            
                            this.displayedText += char;
                            i++;
                            
                            if (isTag) {
                                while (i < this.text.length && this.text.charAt(i-1) !== '>') {
                                    this.displayedText += this.text.charAt(i);
                                    i++;
                                }
                                isTag = false;
                                type();
                            } else {
                                setTimeout(type, 60);
                            }
                        }
                    };
                    setTimeout(type, 500);
                }
            }));
        });
    </script>
</x-layouts.app>
