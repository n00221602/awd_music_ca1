<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Artists') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- alert-success is a component I created to display a success message that may be sent from the controller.
            For example, when a artist is deleted, a message like "artist Deleted Successfully" will be displayed -->
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <x-primary-button>
                <a href="{{ route('admin.artists.create') }}">Add an Artist</a>
            </x-primary-button>

            @forelse ($artists as $artist)
                <x-card>

                        <a href="{{ route('admin.artists.show', $artist) }}" class="font-bold text-2xl">{{ $artist->name }}</a>

                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">ID:  </span> {{ $artist->id }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Name:  </span> {{ $artist->name }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Description  :</span> {{ $artist->description }}
                        </p>

                </x-card>
            @empty
                <p>No Artists</p>
            @endforelse

        </div>
    </div>
</x-app-layout>
