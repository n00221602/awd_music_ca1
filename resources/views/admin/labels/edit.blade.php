<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Label') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.labels.update', $label) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <x-text-input
                    type="text"
                    name="name"
                    field="name"
                    placeholder="name"
                    class="w-full"
                    :value="@old('name', $label->name)"></x-text-input>

                    <x-text-input
                    type="text"
                    name="description"
                    field="description"
                    placeholder="description..."
                    class="w-full mt-6"
                    :value="@old('description', $label->description)"></x-text-input>

                    <x-primary-button class="mt-6">Save Label</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
