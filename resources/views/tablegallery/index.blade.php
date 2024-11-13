<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Galleries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Create Button -->
            <div class=" mb-2">
                <a href="{{ route('gallery.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 mb-4 px-4 rounded inline-block">
                    Create Gallery
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- Galleries List -->
                    @if($galleries->isEmpty())
                        <p>No galleries available.</p>
                    @else
                        <ul class="space-y-8">
                            @foreach($galleries as $gallery)
                                <li class="flex items-start space-x-4 p-4 border-b border-gray-200">
                                    
                                    <!-- Gallery Image -->
                                    <div class="flex-shrink-0 w-24 h-24 bg-gray-100 overflow-hidden rounded-lg">
                                        @if ($gallery->image)
                                            <img src="{{ asset('storage/galleries/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover">
                                        @else
                                            <p class="text-gray-500 text-sm">No image</p>
                                        @endif
                                    </div>
                                    
                                    <!-- Gallery Details -->
                                    <div class="flex-grow">
                                        <a href="{{ route('gallery.show', $gallery->id) }}" class="text-lg font-semibold text-blue-500 hover:underline">
                                            {{ $gallery->title }}
                                        </a>
                                        <p class="text-gray-600 mt-2">{{ $gallery->description }}</p>
                                    </div>

                                    <!-- Edit Button -->
                                                                    <!-- Edit/Delete Buttons (Only visible to article creator or admin) -->
                                @if (auth()->check() && (auth()->user()->id == $gallery->user_id || auth()->user()->usertype == 'admin'))
                                <div class="flex space-x-4">
                                    <!-- Edit Button -->
                                    <div class="flex-shrink-0">
                                        <form action="{{ route('gallery.edit', $gallery->id) }}" method="GET">
                                            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                                                Edit
                                            </button>
                                        </form>
                                    </div>
                
                                    <!-- Delete Button -->
                                    <div class="flex-shrink-0">
                                        <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Image?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif

                                    
                                    
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
