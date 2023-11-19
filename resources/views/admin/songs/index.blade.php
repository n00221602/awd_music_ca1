<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Songs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <x-primary-button><a href="{{ route('songs.create') }}" class="btn-link btn-lg mb-2">Add a Song</a></x-primary-button>

            @forelse ($songs as $song)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2x1">
                        <a href="{{ route('songs.show', $song) }}">{{ $song->title }}</a>
                    </h2>
                    <p class="mt-2">
                        {{ $song->genre }}
                        {{ $song->album }}
                        {{ $song->release_date }}
                        {{ $song->length }}
                        @if ($song->song_image)
                            <img src="{{ asset($song->song_image) }}" alt="{{ $song->album }}" width="100">
                        @else
                            No Image
                        @endif
                    </p>
                </div>
            @empty
                <p>No songs</p>
            @endforelse
        </div>
</x-app-layout>
