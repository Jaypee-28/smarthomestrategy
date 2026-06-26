<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - SmartHomeStrategy CRM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-900 text-gray-100 flex items-center justify-center min-h-screen antialiased">
    
    <div class="w-full max-w-md p-8 bg-gray-800 rounded-2xl border border-gray-700 shadow-2xl">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold tracking-tighter text-white">SmartHomeStrategy</h1>
            <p class="text-sm text-gray-400 mt-2">Secure Outbound CRM Access</p>
        </div>

        <form method="POST" action="{{ route('admin.login') }}" x-data="{ isSubmitting: false }" @submit="isSubmitting = true">
            @csrf
            
            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-900/50 border border-red-500 rounded text-red-200 text-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full bg-gray-900 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-300 mb-2">Password</label>
                <input type="password" name="password" required class="w-full bg-gray-900 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
            </div>

            <button type="submit" :disabled="isSubmitting" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-semibold py-3 rounded-lg transition-colors shadow-lg shadow-blue-500/30 flex items-center justify-center disabled:opacity-75 disabled:cursor-wait">
                <svg x-show="isSubmitting" class="animate-spin w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" style="display: none;">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span x-text="isSubmitting ? 'Authenticating...' : 'Access CRM'"></span>
            </button>
        </form>
    </div>

</body>
</html>
