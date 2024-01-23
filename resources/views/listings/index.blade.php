<x-layout>
    @include('partials._hero')
    @include('partials._search')
    @if(count($listings) === 0)
        <p>No listings found</p>
    @else
        <section class="lg:grid lg:grid-cols-2 gap-6 space-y-6 md:space-y-0">
            @foreach($listings as $listing)
                <x-listing-card :listing="$listing" />
            @endforeach
        </section>
        <div class="mt-4 mb-24">
            {{ $listings->links() }}
        </div>
    @endif
</x-layout>
