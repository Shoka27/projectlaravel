<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gallery Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <!-- Title and Description -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $gallery->title }}</h1>
                        <p class="text-gray-700 leading-relaxed">{{ $gallery->description }}</p>
                    </div>

                    <!-- Image Section -->
                    <div class="mb-8">
                        @if ($gallery->image)
                            <img src="{{ asset('storage/galleries/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-auto object-cover rounded-lg shadow-lg">
                        @else
                            <p class="text-gray-500">No image available.</p>
                        @endif
                    </div>

                    <!-- Action Buttons (Edit and Delete) -->
                    <div class="flex space-x-4">
                        <!-- Edit Button -->
                        <a href="{{ route('gallery.edit', $gallery->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg">
                            Edit
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this gallery?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
