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
        <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-400">Welcome, {{ auth()->user()->name }}</span>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-sm text-gray-400 hover:text-white transition">Logout</button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 overflow-hidden flex flex-col p-6">
        
        <div class="mb-4 flex justify-between items-end">
            <div>
                <h2 class="text-2xl font-bold text-white">Acquisition Prospects</h2>
                <p class="text-gray-400 text-sm mt-1">High-value leads automatically curated and matched with Wall Street templates.</p>
            </div>
            <div class="text-sm">
                <span class="text-gray-400">Total Leads:</span>
                <span class="text-white font-bold">{{ $prospects->count() }}</span>
            </div>
        </div>

        <!-- Table Container -->
        <div class="bg-gray-900 rounded-xl border border-gray-800 flex-1 overflow-hidden flex flex-col shadow-2xl">
            <div class="overflow-x-auto overflow-y-auto flex-1">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-900/50 sticky top-0 z-10 border-b border-gray-800 backdrop-blur">
                        <tr>
                            <th class="py-3 px-4 text-xs uppercase font-semibold tracking-wider text-gray-400">Company</th>
                            <th class="py-3 px-4 text-xs uppercase font-semibold tracking-wider text-gray-400">Contact</th>
                            <th class="py-3 px-4 text-xs uppercase font-semibold tracking-wider text-gray-400">Template</th>
                            <th class="py-3 px-4 text-xs uppercase font-semibold tracking-wider text-gray-400">Status</th>
                            <th class="py-3 px-4 text-xs uppercase font-semibold tracking-wider text-gray-400 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800">
                        @foreach($prospects as $prospect)
                        <tr class="hover:bg-gray-800/50 transition-colors">
                            <td class="py-3 px-4">
                                <div class="font-medium text-white">{{ $prospect->company }}</div>
                                <div class="text-xs text-gray-500">{{ $prospect->niche }}</div>
                            </td>
                            <td class="py-3 px-4">
                                <div class="text-sm text-gray-300">{{ $prospect->contact_name }}</div>
                                <div class="text-xs text-blue-400">{{ $prospect->email }}</div>
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 text-xs font-bold rounded bg-gray-800 text-gray-300 border border-gray-700">
                                    {{ $prospect->template_id ?? 'None' }}
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <select 
                                    @change="updateStatus({{ $prospect->id }}, $event.target.value)"
                                    class="bg-gray-800 border border-gray-700 text-xs rounded px-2 py-1 focus:ring-blue-500 focus:border-blue-500"
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
                                    class="inline-flex items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-500 text-white text-xs font-semibold rounded shadow transition"
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
        </div>
    </main>

    @include('admin.components.pitch-modal')

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('crmData', () => ({
                templates: @json($templates),
                isModalOpen: false,
                activeProspect: null,
                generatedEmail: '',
                subjectLine: '',
                
                openModal(prospect) {
                    this.activeProspect = prospect;
                    
                    // Generate Subject
                    if(prospect.template_id === 'A') this.subjectLine = 'SmartHomeStrategy.com + ' + prospect.company;
                    else if(prospect.template_id === 'B') this.subjectLine = 'Acquisition of SmartHomeStrategy.com';
                    else if(prospect.template_id === 'C') this.subjectLine = 'SmartHomeStrategy.com';
                    else if(prospect.template_id === 'D') this.subjectLine = 'digital asset: SmartHomeStrategy.com';
                    else this.subjectLine = 'SmartHomeStrategy.com';

                    // Generate Body
                    let body = this.templates[prospect.template_id] || "No template assigned.";
                    if(prospect.hook) {
                        body = prospect.hook + "\n\n" + body;
                    }
                    this.generatedEmail = body;
                    
                    this.isModalOpen = true;
                },
                
                closeModal() {
                    this.isModalOpen = false;
                    this.activeProspect = null;
                },

                copyToClipboard() {
                    navigator.clipboard.writeText(this.generatedEmail);
                    alert('Pitch copied to clipboard!');
                },

                getMailtoLink() {
                    if(!this.activeProspect) return '#';
                    const to = this.activeProspect.email;
                    const subject = encodeURIComponent(this.subjectLine);
                    const body = encodeURIComponent(this.generatedEmail);
                    return `mailto:${to}?subject=${subject}&body=${body}`;
                },

                markAsSent() {
                    if(!this.activeProspect) return;
                    this.updateStatus(this.activeProspect.id, 'Sent');
                    // Find select element and update visually
                    const selects = document.querySelectorAll('select');
                    // Simple page reload to reflect state easily, or could be fully reactive
                    window.location.reload(); 
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
