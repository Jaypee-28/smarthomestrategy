<footer class="border-t border-white/10 bg-[#020617] pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            
            <div class="col-span-1 md:col-span-1">
                <div class="flex items-center gap-2 mb-6">
                    <div class="w-6 h-6 rounded bg-gradient-to-br from-blue-500 to-cyan-400 flex items-center justify-center">
                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="font-display font-bold text-lg text-white">SmartHome<span class="text-cyan-400">Strategy</span></span>
                </div>
                <p class="text-slate-400 text-sm leading-relaxed mb-6">
                    The future of intelligent living. Elevating the standard for connected, AI-powered environments globally.
                </p>
                <!-- Social placeholders -->
                <div class="flex space-x-4">
                    <a href="#" class="text-slate-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="#" class="text-slate-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4 text-sm tracking-wider uppercase">Platform</h4>
                <ul class="space-y-3 text-sm text-slate-400">
                    <li><a href="#" class="hover:text-cyan-400 transition-colors">AI Intelligence</a></li>
                    <li><a href="#" class="hover:text-cyan-400 transition-colors">Energy Optimization</a></li>
                    <li><a href="#" class="hover:text-cyan-400 transition-colors">Advanced Security</a></li>
                    <li><a href="#" class="hover:text-cyan-400 transition-colors">Hardware Integration</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4 text-sm tracking-wider uppercase">Company</h4>
                <ul class="space-y-3 text-sm text-slate-400">
                    <li><a href="#" class="hover:text-cyan-400 transition-colors">About</a></li>
                    <li><a href="#" class="hover:text-cyan-400 transition-colors">Careers</a></li>
                    <li><a href="#" class="hover:text-cyan-400 transition-colors">Press</a></li>
                    <li><a href="{{ route('acquisition.show') }}" class="hover:text-cyan-400 transition-colors">Brand Acquisition</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4 text-sm tracking-wider uppercase">Stay Updated</h4>
                <p class="text-sm text-slate-400 mb-4">Subscribe to our newsletter for the latest in smart home AI.</p>
                <form class="flex">
                    <input type="email" placeholder="Enter your email" class="w-full bg-white/5 border border-white/10 rounded-l-lg px-4 py-2 text-sm text-white focus:outline-none focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition-all">
                    <button type="submit" class="bg-cyan-500 hover:bg-cyan-400 text-white px-4 py-2 rounded-r-lg text-sm font-semibold transition-colors">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>

        <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center">
            <p class="text-slate-500 text-sm">
                &copy; {{ date('Y') }} SmartHomeStrategy.com. All rights reserved.
            </p>
            <div class="flex space-x-6 mt-4 md:mt-0 text-sm text-slate-500">
                <a href="#" class="hover:text-slate-300">Privacy Policy</a>
                <a href="#" class="hover:text-slate-300">Terms of Service</a>
                <a href="#" class="hover:text-slate-300">Cookie Policy</a>
            </div>
        </div>
    </div>
</footer>
