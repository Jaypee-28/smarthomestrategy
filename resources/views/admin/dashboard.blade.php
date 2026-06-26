<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outbound CRM Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-950 text-gray-200 antialiased font-sans h-screen flex flex-col" x-data="crmData()">

    <!-- Top Nav -->
    <header class="bg-gray-900 border-b border-gray-800 flex justify-between items-center px-6 py-4">
        <div>
            <h1 class="text-xl font-bold text-white tracking-tight">SmartHomeStrategy <span class="text-blue-500 font-medium">Outbound CRM</span></h1>
        </div>
        
        <!-- Modern Profile Dropdown -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" @click.outside="open = false" class="flex items-center space-x-3 focus:outline-none">
                <div class="w-9 h-9 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold shadow-lg ring-2 ring-gray-800">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <div class="hidden sm:block text-left">
                    <p class="text-sm font-medium text-white leading-tight">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-400">Administrator</p>
                </div>
            </button>
            
            <div x-show="open" x-transition.opacity.scale.95 class="absolute right-0 mt-3 w-48 bg-gray-800 border border-gray-700 rounded-lg shadow-xl py-1 z-50" style="display: none;">
                <div class="px-4 py-2 border-b border-gray-700 mb-1">
                    <p class="text-sm text-white font-medium">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-400 truncate">{{ auth()->user()->email }}</p>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-red-400 hover:bg-gray-700/50 hover:text-red-300 transition">Sign out</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 overflow-hidden flex flex-col p-4 sm:p-6">
        
        <div class="mb-4 flex flex-col sm:flex-row justify-between items-start sm:items-end space-y-2 sm:space-y-0">
            <div>
                <h2 class="text-2xl font-bold text-white">Acquisition Prospects</h2>
                <p class="text-gray-400 text-sm mt-1">Manage leads, log follow-ups, and track your outbound pipeline.</p>
            </div>
            <div class="text-sm bg-gray-900 border border-gray-800 px-4 py-2 rounded-lg flex space-x-4 shadow">
                <div><span class="text-gray-500 block text-xs uppercase font-bold tracking-wider">Total</span> <span class="text-white font-bold">{{ $prospects->count() }}</span></div>
            </div>
        </div>

        <!-- Responsive Data Container -->
        <div class="bg-gray-900 sm:rounded-xl border-y sm:border border-gray-800 flex-1 overflow-x-auto overflow-y-auto shadow-2xl -mx-4 sm:mx-0">
            
            <!-- Mobile Cards View (Hidden on sm and up) -->
            <div class="block sm:hidden divide-y divide-gray-800">
                @foreach($prospects as $prospect)
                <div class="p-4 bg-gray-900">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <div class="font-bold text-white text-lg">{{ $prospect->company }}</div>
                            <div class="text-xs text-gray-400">{{ $prospect->niche }}</div>
                        </div>
                        <span class="px-2 py-0.5 text-[10px] font-bold rounded bg-gray-800 text-gray-300 border border-gray-700">Tmpl: {{ $prospect->template_id ?? 'N/A' }}</span>
                    </div>
                    
                    <div class="mb-3">
                        <div class="text-sm text-gray-300">{{ $prospect->contact_name }}</div>
                        <div class="text-xs text-blue-400">{{ $prospect->email }}</div>
                    </div>

                    <div class="flex items-center justify-between mb-4">
                        <div class="text-xs">
                            <span class="text-gray-500">Follow-ups:</span> <span class="text-white font-semibold">{{ $prospect->follow_up_count }}</span>
                        </div>
                        <div class="text-[10px] text-gray-500">
                            {{ $prospect->last_contacted_at ? $prospect->last_contacted_at->diffForHumans() : 'Never Contacted' }}
                        </div>
                    </div>

                    <div class="flex items-center justify-between space-x-2">
                        <select 
                            @change="updateStatus({{ $prospect->id }}, $event.target.value)"
                            class="bg-gray-800 border border-gray-700 text-xs rounded px-2 py-2 flex-1 focus:ring-blue-500 focus:border-blue-500"
                            :class="{
                                'text-gray-400': '{{ $prospect->status }}' === 'Not Contacted',
                                'text-blue-400': '{{ $prospect->status }}' === 'Sent',
                                'text-yellow-400': '{{ $prospect->status }}' === 'Follow Up',
                                'text-green-400': '{{ $prospect->status }}' === 'Replied',
                                'text-red-400': '{{ $prospect->status }}' === 'Dead'
                            }"
                        >
                            <option value="Not Contacted" {{ $prospect->status == 'Not Contacted' ? 'selected' : '' }}>Not Contacted</option>
                            <option value="Sent" {{ $prospect->status == 'Sent' ? 'selected' : '' }}>Sent</option>
                            <option value="Follow Up" {{ $prospect->status == 'Follow Up' ? 'selected' : '' }}>Follow Up</option>
                            <option value="Replied" {{ $prospect->status == 'Replied' ? 'selected' : '' }}>Replied</option>
                            <option value="Dead" {{ $prospect->status == 'Dead' ? 'selected' : '' }}>Dead</option>
                        </select>
                        
                        <button @click="openModal({{ json_encode($prospect) }})" class="flex-1 inline-flex items-center justify-center px-3 py-2 bg-blue-600 hover:bg-blue-500 text-white text-xs font-semibold rounded shadow transition">
                            Draft Pitch
                        </button>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Desktop Table View (Hidden on mobile) -->
            <table class="w-full text-left border-collapse hidden sm:table">
                <thead class="bg-gray-900/50 sticky top-0 z-10 border-b border-gray-800 backdrop-blur">
                    <tr>
                        <th class="py-3 px-4 text-[10px] uppercase font-bold tracking-widest text-gray-500">Company</th>
                        <th class="py-3 px-4 text-[10px] uppercase font-bold tracking-widest text-gray-500">Contact</th>
                        <th class="py-3 px-4 text-[10px] uppercase font-bold tracking-widest text-gray-500 text-center">F/U</th>
                        <th class="py-3 px-4 text-[10px] uppercase font-bold tracking-widest text-gray-500">Status</th>
                        <th class="py-3 px-4 text-[10px] uppercase font-bold tracking-widest text-gray-500 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @foreach($prospects as $prospect)
                    <tr class="hover:bg-gray-800/30 transition-colors group">
                        <td class="py-3 px-4">
                            <div class="font-semibold text-white flex items-center space-x-2">
                                <span>{{ $prospect->company }}</span>
                                <span class="px-1.5 py-0.5 text-[9px] font-bold rounded bg-gray-800 text-gray-400 border border-gray-700" title="Template Assigned">{{ $prospect->template_id ?? '-' }}</span>
                            </div>
                            <div class="text-xs text-gray-500">{{ $prospect->niche }}</div>
                        </td>
                        <td class="py-3 px-4">
                            <div class="text-sm text-gray-300 font-medium">{{ $prospect->contact_name }}</div>
                            <div class="text-[11px] text-blue-400">{{ $prospect->email }}</div>
                        </td>
                        <td class="py-3 px-4 text-center">
                            <div class="inline-flex flex-col items-center justify-center">
                                <span class="text-sm font-bold {{ $prospect->follow_up_count > 0 ? 'text-yellow-400' : 'text-gray-600' }}">{{ $prospect->follow_up_count }}</span>
                                <span class="text-[9px] text-gray-500 whitespace-nowrap">{{ $prospect->last_contacted_at ? $prospect->last_contacted_at->format('M d') : 'Never' }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-4">
                            <select 
                                @change="updateStatus({{ $prospect->id }}, $event.target.value)"
                                class="bg-transparent border border-gray-700 hover:border-gray-600 text-xs rounded px-2 py-1.5 focus:ring-blue-500 focus:border-blue-500 appearance-none cursor-pointer transition-colors"
                                :class="{
                                    'text-gray-400': '{{ $prospect->status }}' === 'Not Contacted',
                                    'text-blue-400': '{{ $prospect->status }}' === 'Sent',
                                    'text-yellow-400': '{{ $prospect->status }}' === 'Follow Up',
                                    'text-green-400': '{{ $prospect->status }}' === 'Replied',
                                    'text-red-400': '{{ $prospect->status }}' === 'Dead'
                                }"
                            >
                                <option value="Not Contacted" {{ $prospect->status == 'Not Contacted' ? 'selected' : '' }}>Not Contacted</option>
                                <option value="Sent" {{ $prospect->status == 'Sent' ? 'selected' : '' }}>Sent</option>
                                <option value="Follow Up" {{ $prospect->status == 'Follow Up' ? 'selected' : '' }}>Follow Up</option>
                                <option value="Replied" {{ $prospect->status == 'Replied' ? 'selected' : '' }}>Replied</option>
                                <option value="Dead" {{ $prospect->status == 'Dead' ? 'selected' : '' }}>Dead</option>
                            </select>
                        </td>
                        <td class="py-3 px-4 text-right">
                            <button 
                                @click="openModal({{ json_encode($prospect) }})"
                                class="inline-flex items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-500 text-white text-xs font-semibold rounded shadow transition opacity-90 group-hover:opacity-100"
                            >
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                Draft Pitch
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    @include('admin.components.pitch-modal')

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('crmData', () => ({
                templates: @json($templates),
                isModalOpen: false,
                isSending: false,
                activeProspect: null,
                generatedEmail: '',
                subjectLine: '',
                currentTab: 'Initial', // Initial, FollowUp1, FollowUp2
                
                openModal(prospect) {
                    this.activeProspect = prospect;
                    this.setTab('Initial');
                    this.isModalOpen = true;
                },

                setTab(tab) {
                    this.currentTab = tab;
                    let templateKey = '';
                    let body = '';
                    let subject = '';

                    if(tab === 'Initial') {
                        templateKey = this.activeProspect.template_id;
                        body = this.templates[templateKey] || "No template assigned.";
                        if(this.activeProspect.hook) {
                            body = this.activeProspect.hook + "\n\n" + body;
                        }

                        if(templateKey === 'A') subject = 'SmartHomeStrategy.com + ' + this.activeProspect.company;
                        else if(templateKey === 'B') subject = 'Acquisition of SmartHomeStrategy.com';
                        else if(templateKey === 'C') subject = 'SmartHomeStrategy.com';
                        else if(templateKey === 'D') subject = 'digital asset: SmartHomeStrategy.com';
                        else subject = 'SmartHomeStrategy.com';
                    } 
                    else if (tab === 'FollowUp1') {
                        body = this.templates['FollowUp1'];
                        subject = 'Re: SmartHomeStrategy.com + ' + this.activeProspect.company; // Simulating a reply
                    }
                    else if (tab === 'FollowUp2') {
                        body = this.templates['FollowUp2'];
                        subject = 'Re: SmartHomeStrategy.com + ' + this.activeProspect.company;
                    }

                    this.generatedEmail = body;
                    this.subjectLine = subject;
                },
                
                closeModal() {
                    if(this.isSending) return;
                    this.isModalOpen = false;
                    this.activeProspect = null;
                },

                copyToClipboard() {
                    navigator.clipboard.writeText(this.generatedEmail);
                    alert('Pitch copied to clipboard!');
                },

                async markAsSentOnly() {
                    if(!this.activeProspect) return;
                    
                    try {
                        if(this.currentTab === 'Initial') {
                            await this.updateStatus(this.activeProspect.id, 'Sent');
                        } else {
                            // It's a follow up
                            const token = document.querySelector('meta[name="csrf-token"]').content;
                            await fetch(`/admin/prospects/${this.activeProspect.id}/follow-up`, {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': token }
                            });
                        }
                        
                        window.location.reload(); 
                    } catch (e) {
                        console.error(e);
                    }
                },

                async sendEmailViaSmtp() {
                    if(!this.activeProspect || this.isSending) return;
                    
                    this.isSending = true;
                    
                    try {
                        const token = document.querySelector('meta[name="csrf-token"]').content;
                        const res = await fetch(`/admin/prospects/${this.activeProspect.id}/send`, {
                            method: 'POST',
                            headers: { 
                                'Content-Type': 'application/json', 
                                'X-CSRF-TOKEN': token 
                            },
                            body: JSON.stringify({
                                subject: this.subjectLine,
                                body: this.generatedEmail,
                                type: this.currentTab
                            })
                        });

                        if(!res.ok) throw new Error('Network error');
                        
                        alert('Email sent successfully!');
                        window.location.reload(); 
                    } catch (e) {
                        console.error(e);
                        alert('Failed to send email. Check error logs.');
                        this.isSending = false;
                    }
                },

                async updateStatus(id, newStatus) {
                    try {
                        const token = document.querySelector('meta[name="csrf-token"]').content;
                        const res = await fetch(`/admin/prospects/${id}/status`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': token
                            },
                            body: JSON.stringify({ status: newStatus })
                        });
                        if(!res.ok) throw new Error('Network response was not ok');
                    } catch (error) {
                        console.error('Error updating status:', error);
                        alert('Failed to update status.');
                    }
                }
            }))
        })
    </script>
</body>
</html>
