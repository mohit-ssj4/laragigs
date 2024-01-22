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
            <ul class="flex">
                @foreach(explode(',', $listing->tags) as $tag)
                    <a href="#">
                        <li
                            class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                        >
                            {{ ucwords($tag) }}
                        </li>
                    </a>
                @endforeach
            </ul>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
        </div>
    </div>
</x-card>
