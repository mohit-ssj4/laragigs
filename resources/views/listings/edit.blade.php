<x-layout>
    <a href="/listings/{{ $listing->id }}" class="flex items-center gap-2 w-fit">
        <i class="fa-solid fa-arrow-left-long"></i>
        <span class="hover:underline">Back</span>
    </a>
    <x-card class="p-10 rounded max-w-lg mx-auto mb-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit: {{ $listing->title }}
            </h2>
        </header>
        <form action="/listings/{{ $listing->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Company Name</label>
                <input
                    id="company"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="company"
                    value="{{ $listing->company }}"
                />
                @error('company')
                <p class="text-laravel text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Job Title</label>
                <input
                    id="title"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    placeholder="Example: Senior Laravel Developer"
                    value="{{ $listing->title }}"
                />
                @error('title')
                <p class="text-laravel text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Job Location</label>
                <input
                    id="location"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="location"
                    placeholder="Example: Remote, Boston MA, etc"
                    value="{{ $listing->location }}"
                />
                @error('location')
                <p class="text-laravel text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input
                    id="email"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{ $listing->email }}"
                />
                @error('email')
                <p class="text-laravel text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">Website/Application URL</label>
                <input
                    id="website"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="website"
                    value="{{ $listing->website }}"
                />
                @error('website')
                <p class="text-laravel text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">Tags (Comma Separated)</label>
                <input
                    id="tags"
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tags"
                    placeholder="Example: Laravel, Backend, Postgres, etc"
                    value="{{ $listing->tags }}"
                />
                @error('tags')
                <p class="text-laravel text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">Company Logo</label>
                <input
                    id="logo"
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo"
                    value="{{ old('logo') }}"
                />
                <img
                    class="hidden w-32 h-32 mr-6 md:block"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
                    alt="logo"
                />
                @error('logo')
                <p class="text-laravel text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Job Description</label>
                <textarea
                    id="description"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                >{{ $listing->description }}</textarea>
                @error('description')
                <p class="text-laravel text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">Edit Gig</button>
                <a href="/" class="text-black ml-4">Cancel</a>
            </div>
        </form>
    </x-card>
</x-layout>
