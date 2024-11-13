<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Form Heading -->
                    <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Gallery</h1>

                    <!-- Edit Form -->
                    <form method="POST" action="{{ route('gallery.update', $gallery->id) }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Title Input -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                            <input type="text" name="title" value="{{ $gallery->title }}" required 
                                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>

                        <!-- Description Input -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                            <textarea name="description" required rows="4"
                                      class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ $gallery->description }}</textarea>
                        </div>

                        <!-- Image Input -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Upload New Image:</label>
                            <input type="file" name="image" 
                                   class="mt-1 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm cursor-pointer focus:ring-blue-500 focus:border-blue-500">
                            <p class="text-sm text-gray-500 mt-2">Leave this empty if you don't want to change the image.</p>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
