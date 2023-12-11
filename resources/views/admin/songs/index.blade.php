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

            <x-primary-button><a href="{{ route('admin.songs.create') }}" class="btn-link btn-lg mb-2">Add a
                    Song</a></x-primary-button>

            @forelse ($songs as $song)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2x1">
                        <a href="{{ route('admin.songs.show', $song) }}"> <strong>Title:  </strong>{{ $song->title }}</a>
                    </h2>
                    <p class="mt-2">
                        <strong>Genre: </strong>{{ $song->genre }}
                        <br>
                        <strong>Album: </strong>{{ $song->album }}
                        <br>
                        <strong>Release date: </strong>{{ $song->release_date }}
                        <br>
                        <strong>Length: </strong>{{ $song->length }}
                        <br>
                        <strong>Label: </strong>{{ $song->label->name }}
                        <br>
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
