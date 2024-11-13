<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Gallery') }}
        </h2>
    </x-slot>
     @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data" class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-lg space-y-4">
                        @csrf
                        <div>
                            <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                            <input type="text" name="title" id="title" required class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-500">
                        </div>
                    
                        <div>
                            <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                            <textarea name="description" id="description" required class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-500" rows="4"></textarea>
                        </div>
                    
                        <div>
                            <label for="image" class="block text-gray-700 font-bold mb-2">Image:</label>
                            <input type="file" name="image" id="image" required class="w-full text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>
                    
                        <div>
                            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
                                Create
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>