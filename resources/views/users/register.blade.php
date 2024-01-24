<x-layout>
    <a href="/" class="flex items-center gap-2 w-fit">
        <i class="fa-solid fa-arrow-left-long"></i>
        <span class="hover:underline">Back</span>
    </a>
    <x-card class="p-10 max-w-lg mx-auto mb-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Register</h2>
            <p class="mb-4">Create an account to post gigs</p>
        </header>
        <form action="/users" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mbName">Name</label>
                <input
                    id="name"
                    type="text"
                    class="border border-gray-200 rounded-lg p-2 w-full"
                    name="name"
                    value="{{ old('name') }}"
                />
                @error('name')
                <p class="text-laravel text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input
                    id="email"
                    type="email"
                    class="border border-gray-200 rounded-lg p-2 w-full"
                    name="email"
                    value="{{ old('email') }}"
                />
                @error('email')
                <p class="text-laravel text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">Password</label>
                <input
                    id="password"
                    type="password"
                    class="border border-gray-200 rounded-lg p-2 w-full"
                    name="password"
                />
                @error('password')
                <p class="text-laravel text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="inline-block text-lg mb-2">Confirm Password</label>
                <input
                    id="password_confirmation"
                    type="password"
                    class="border border-gray-200 rounded-lg p-2 w-full"
                    name="password_confirmation"
                />
                @error('password_confirmation')
                <p class="text-laravel text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded-lg py-2 px-4 hover:bg-black">Sign Up</button>
            </div>
            <div class="mt-8">
                <p>Already have an account? <a href="/login" class="text-laravel">Login</a></p>
            </div>
        </form>
    </x-card>
</x-layout>
