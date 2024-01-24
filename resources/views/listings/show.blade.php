<x-layout>
    <a href="/" class="flex items-center gap-2 w-fit">
        <i class="fa-solid fa-arrow-left-long"></i>
        <span class="hover:underline">Back</span>
    </a>
    @include('partials._search')
    <section>
        <x-card class="p-10 mb-24">
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
                    alt=""
                />
                <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
                <x-listing-tags :tags="explode(',', $listing->tags)"/>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>{{ $listing->description }}</p>
                        <a
                            href="mailto:{{ $listing->email }}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-lg hover:opacity-80 w-full"
                        >
                            <i class="fa-solid fa-envelope px-1"></i>Contact Employer</a>
                        <a
                            href="{{ $listing->website }}"
                            target="_blank"
                            class="block bg-black text-white py-2 rounded-lg hover:opacity-80 w-full"
                        >
                            <i class="fa-solid fa-globe"></i> Visit Website
                        </a>
                    </div>
                </div>
            </div>
        </x-card>
    </section>
</x-layout>
