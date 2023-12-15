<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit artist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.artists.update', $artist) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <x-text-input
                    type="text"
                    name="name"
                    field="name"
                    placeholder="name"
                    class="w-full"
                    :value="@old('name')"></x-text-input>

                    <x-text-input
                    type="text"
                    name="monthly_listeners"
                    field="monthly_listeners"
                    placeholder="monthly_listeners..."
                    class="w-full mt-6"
                    :value="@old('monthly_listeners')"></x-text-input>

                    <x-text-input
                    type="text"
                    name="debut"
                    field="debut"
                    placeholder="debut..."
                    class="w-full mt-6"
                    :value="@old('debut')"></x-text-input>

                    <x-primary-button class="mt-6">Save artist</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
