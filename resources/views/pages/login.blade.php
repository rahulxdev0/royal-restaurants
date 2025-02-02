@extends('home.layout')

@section('content')
    <div class="min-h-screen bg-[#000] flex items-center justify-center p-4 relative">
        @if (session('success'))
            <div class="absolute top-5 right-5 transform  w-full max-w-[250px] z-50">
                <div
                    class="bg-white/20 backdrop-blur-sm border border-white/30 text-white px-4 py-3 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <span class="text-sm">{{ session('success') }}</span>
                        <button onclick="this.parentElement.parentElement.remove()"
                            class="ml-4 text-green-300 hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif

        <div
            class="w-full max-w-md bg-white/10 backdrop-blur-lg rounded-2xl shadow-xl p-8 space-y-6 border border-white/20">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-white mb-2">Welcome Back</h1>
                <p class="text-white/80">Sign in to continue your journey</p>
            </div>

            <form action="{{ route('authenticate') }}" class="space-y-5" method="POST">
                @csrf
                <div class="space-y-4">
                    <div class="relative">
                        <input type="email" id="email" name="email" required placeholder="Enter your email"
                            class="w-full px-4 py-3 bg-white/5 backdrop-blur-sm border border-white/20 rounded-lg text-white placeholder:text-white/20 focus:border-white/40 focus:ring-2 focus:ring-white/20 focus:outline-none transition-all" />
                    </div>
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                        
                    @enderror

                    <div class="relative">
                        <input type="password" id="password" name="password" required placeholder="Enter your password"
                            class="w-full px-4 py-3 bg-white/5 backdrop-blur-sm border border-white/20 rounded-lg text-white placeholder:text-white/20 focus:border-white/40 focus:ring-2 focus:ring-white/20 focus:outline-none transition-all" />
                    </div>
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                        
                    @enderror
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center text-white/80">
                        <input type="checkbox" class="rounded border-white/20 bg-white/5 focus:ring-white/20">
                        <span class="ml-2">Remember me</span>
                    </label>
                    <a href="#" class="text-white hover:text-white/90 underline underline-offset-4">Forgot
                        Password?</a>
                </div>

                <button type="submit"
                    class="w-full py-3.5 bg-gradient-to-r from-orange-500 to-red-600 text-white font-semibold rounded-lg hover:shadow-md hover:shadow-white/30 transition-all duration-300">
                    Sign In
                </button>

                <div class="relative text-center">
                    <span class="absolute inset-x-0 top-1/2 h-px bg-white/20"></span>
                    <span class="relative px-4 bg-transparent text-white/80 text-sm">Or continue with</span>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <button type="button"
                        class="flex items-center justify-center gap-2 py-2.5 bg-white/5 border border-white/20 rounded-lg text-white hover:bg-white/10 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12.24 10.285V14.4h6.806c-.275 1.765-2.056 5.174-6.806 5.174-4.095 0-7.439-3.389-7.439-7.574s3.345-7.574 7.439-7.574c2.33 0 3.891.989 4.785 1.849l3.254-3.138C18.189 1.186 15.479 0 12.24 0c-6.635 0-12 5.365-12 12s5.365 12 12 12c6.926 0 11.52-4.869 11.52-11.726 0-.788-.085-1.39-.189-1.989H12.24z" />
                        </svg>
                        <span>Google</span>
                    </button>
                    <button type="button"
                        class="flex items-center justify-center gap-2 py-2.5 bg-white/5 border border-white/20 rounded-lg text-white hover:bg-white/10 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M18.71 19.5C17.88 20.74 17 21.95 15.66 21.97C14.32 22 13.89 21.18 12.37 21.18C10.84 21.18 10.37 21.95 9.09997 22C7.78997 22.05 6.79997 20.68 5.95997 19.47C4.24997 17 2.93997 12.45 4.69997 9.39C5.56997 7.87 7.12997 6.91 8.81997 6.88C10.1 6.86 11.32 7.75 12.11 7.75C12.89 7.75 14.37 6.68 15.92 6.84C16.57 6.87 18.39 7.1 19.56 8.82C19.47 8.88 17.39 10.1 17.41 12.63C17.44 15.65 20.06 16.66 20.09 16.67C20.06 16.74 19.67 18.11 18.71 19.5ZM13 3.5C13.73 2.67 14.94 2.04 15.94 2C16.07 3.17 15.6 4.35 14.9 5.19C14.21 6.04 13.07 6.7 11.95 6.61C11.8 5.46 12.36 4.26 13 3.5Z" />
                        </svg>
                        <span>Apple</span>
                    </button>
                </div>

                <p class="text-center text-white/80">
                    Don't have an account?
                    <a href="{{ route('signup') }}" class="text-white hover:text-white/90 underline underline-offset-4">Sign
                        up</a>
                </p>
            </form>
        </div>
    </div>
@endsection
