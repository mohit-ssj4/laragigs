@props(['listing'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-32 h-32 mr-6 md:block"
            src="{{ asset('images/no-image.png') }}"
            alt="logo"
        />
        <div>
            <h3 class="text-xl">
                <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a>
            </h3>
            <div class="text-lg font-bold mb-4">{{ $listing->company }}</div>
            <x-listing-tags :tags="explode(',', $listing->tags)"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
        </div>
    </div>
</x-card>
