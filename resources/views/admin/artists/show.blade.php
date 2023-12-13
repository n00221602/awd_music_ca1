<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $artist->name }} - Songs by this Artist
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Display publisher details -->

            <h3 class="font-bold text-2xl mb-4">Artist Details</h3>
            <p class="text-gray-700"><span class="font-bold">ID: </span> {{ $artist->id }}</p>
            <p class="text-gray-700"><span class="font-bold">Name: </span> {{ $artist->name }}</p>
            <p class="text-gray-700"><span class="font-bold">Monthly Listeners: </span> {{ $artist->monthly_listeners }}</p>
            <p class="text-gray-700"><span class="font-bold">Debut :</span> {{ $artist->debut }}</p>

            <!-- Display songs for the publisher -->

            <h3 class="font-bold text-2xl mt-6 mb-4">Songs by {{ $artist->name }}</h3>

            @forelse ($songs as $song)
                <x-card>
                     <a href="{{ route('admin.songs.show', $song) }}" class="font-bold text-2xl">{{ $song->title }}</a>

                </x-card>
            @empty
                <p>No songs for this artist</p>
            @endforelse

        </div>
    </div>
</x-app-layout>
