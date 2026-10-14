<x-guardLayout.app>
    <div class="min-h-screen bg-white flex items-center justify-center p-4 font-sans">
        <div class="w-full max-w-md bg-white rounded-xl p-8 lg:p-10 shadow-[0_4px_24px_rgba(0,0,0,0.06)] border border-gray-100">
            <div class="text-center mb-8">
                <div class="w-12 h-12 flex items-center justify-center mx-auto mb-4">
                    <img src="{{asset('icons/rsm_color.svg')}}" alt="">
                </div>
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Најави се</h2>
            </div>

            @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-600 p-4 rounded-lg mb-6 text-center text-sm font-medium">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('guard.login.submit') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Е-пошта адреса <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="email" 
                        class="w-full bg-white border border-gray-300 text-gray-900 px-4 py-3 rounded-lg focus:outline-none focus:border-[#2b5a97] focus:ring-1 focus:ring-[#2b5a97] transition-colors" 
                        required autofocus>
                    @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Лозинка <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input type="password" name="password" 
                            class="w-full bg-white border border-gray-300 text-gray-900 px-4 py-3 rounded-lg focus:outline-none focus:border-[#2b5a97] focus:ring-1 focus:ring-[#2b5a97] transition-colors pr-12" 
                            required>
                        <button type="button" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-600">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="flex items-center pt-1">
                    <input type="checkbox" id="remember" name="remember" 
                        class="w-4 h-4 rounded border-gray-300 text-[#2b5a97] focus:ring-[#2b5a97] cursor-pointer accent-[#2b5a97]">
                    <label for="remember" class="ml-2 text-sm text-gray-700 cursor-pointer">
                        Запомни ме
                    </label>
                </div>

                <button type="submit" 
                    class="w-full bg-[#2b5a97] hover:bg-[#214072] text-white font-medium py-3 rounded-lg transition-colors mt-2">
                    Најави се
                </button>
            </form>
        </div>
    </div>
</x-guardLayout.app>