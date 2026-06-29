<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Pitch Templates</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-950 text-gray-200 antialiased font-sans h-screen flex flex-col">

    <!-- Top Nav -->
    <header class="bg-gray-900 border-b border-gray-800 flex justify-between items-center px-6 py-4">
        <div>
            <h1 class="text-xl font-bold text-white tracking-tight">SmartHomeStrategy <span class="text-blue-500 font-medium">Templates</span></h1>
        </div>
        
        <div class="flex items-center space-x-6">
            <a href="{{ route('admin.dashboard') }}" class="text-sm font-medium text-gray-300 hover:text-white transition">Back to Dashboard</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto p-4 sm:p-6">
        
        <div class="mb-6 max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold text-white">Manage Pitch Templates</h2>
            <p class="text-gray-400 text-sm mt-1">Edit the subject and body for outbound pitch templates. Use <code class="text-blue-400 bg-gray-900 px-1 rounded">{firstname}</code>, <code class="text-blue-400 bg-gray-900 px-1 rounded">{company}</code>, and <code class="text-blue-400 bg-gray-900 px-1 rounded">{hook}</code> for dynamic prospect data.</p>
        </div>

        @if(session('success'))
        <div class="max-w-4xl mx-auto mb-6 bg-green-900/50 border border-green-500 text-green-300 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        <form action="{{ route('admin.templates.update') }}" method="POST" class="max-w-4xl mx-auto space-y-8 pb-12">
            @csrf

            @foreach($templates as $index => $template)
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 shadow-lg">
                <div class="flex justify-between items-center border-b border-gray-800 pb-4 mb-4">
                    <h3 class="text-lg font-bold text-white">Template: <span class="text-blue-400">{{ $template->key }}</span></h3>
                </div>

                <input type="hidden" name="templates[{{ $index }}][id]" value="{{ $template->id }}">
                
                <div class="mb-4">
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Subject Line</label>
                    <input type="text" name="templates[{{ $index }}][subject]" value="{{ old('templates.'.$index.'.subject', $template->subject) }}" class="w-full bg-gray-950 border border-gray-700 text-white text-sm rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" required>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Email Body</label>
                    <textarea name="templates[{{ $index }}][body]" rows="10" class="w-full bg-gray-950 border border-gray-700 text-gray-300 text-sm rounded px-3 py-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition resize-y" required>{{ old('templates.'.$index.'.body', $template->body) }}</textarea>
                </div>
            </div>
            @endforeach

            <div class="flex justify-end sticky bottom-6 z-10">
                <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-lg shadow-xl transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-900 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                    Save Changes
                </button>
            </div>
        </form>
    </main>

</body>
</html>
