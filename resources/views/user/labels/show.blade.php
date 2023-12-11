<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $label->name }} - Songs
        </h2>
    </x-slot>

    <!-- Page Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Label Details --}}

            <h3 class="font-bold text-2x1 mb-4">Label Details</h3>
            <p class="text-gray-700"><span class="font-bold">ID: </span> {{ $label->id }}</p>
            <p class="text-gray-700"><span class="font-bold">Name: </span> {{ $label->name }}</p>
            <p class="text-gray-700"><span class="font-bold">Description: </span> {{ $label->description }}</p>

            {{-- Songs from the Label --}}

            <h3 class="font-bold text-2x1 mb-4">Songs by {{ $label->name }}</h3>

            @forelse ( $songs as $song )
                <x-card>
                    <a href="{{ route('admin.songs.show', $song)}}" class="font-bold text-2x1">{{ $song->title}}</a>
                </x-card>
            @empty
                <p>No songs for this label</p>
            @endforelse

        </div>
    </div>
</x-app-layout>
