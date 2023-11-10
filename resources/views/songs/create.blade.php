<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Song') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('songs.store') }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <x-text-input
                    type="text"
                    name="title"
                    field="title"
                    placeholder="Title"
                    class="w-full"
                    :value="@old('title')"></x-text-input>

                    <x-text-input
                    type="text"
                    name="genre"
                    field="genre"
                    placeholder="genre..."
                    class="w-full mt-6"
                    :value="@old('genre')"></x-text-input>

                    <x-text-input
                    type="text"
                    name="album"
                    field="album"
                    placeholder="album..."
                    class="w-full mt-6"
                    :value="@old('album')"></x-text-input>

                    <x-text-input
                    type="text"
                    name="release_date"
                    field="release_date"
                    placeholder="release_date..."
                    class="w-full mt-6"
                    :value="@old('release_date')"></x-text-input>

                    <x-text-input
                    type="text"
                    name="length"
                    field="length"
                    placeholder="length..."
                    class="w-full mt-6"
                    :value="@old('length')"></x-text-input>



                    <x-file-input
                    type="file"
                    name="song_image"
                    placeholder="Song"
                    class="w-full mt-6"
                    field="song_image"
                    :value="@old('song_image')">>
                    </x-file-input>

                    <x-primary-button class="mt-6">Save Song</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
