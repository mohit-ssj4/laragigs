<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">Manage Gigs</h1>
        </header>
        <div class="w-full rounded-lg">
            @unless($listings->isEmpty())
                @foreach($listings as $listing)
                    <div class="flex items-center justify-between py-4 border-b-2">
                        <div class="px-4 text-lg">
                            <a href="/listings/{{ $listing->id }}"> {{ $listing->title }}</a>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="px-4 text-lg">
                                <a href="/listings/{{ $listing->id }}/edit" class="text-blue-600 px-6 py-2 rounded-xl">
                                    <i class="fa-solid fa-pen-to-square"></i>Edit
                                </a>
                            </div>
                            <div class="px-4 text-lg">
                                <form method="POST" action="/listings/{{ $listing->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-laravel"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="border-gray-300">
                    <div class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p>No Listings Found</p>
                    </div>
                </div>
            @endunless
        </div>
    </x-card>
</x-layout>
