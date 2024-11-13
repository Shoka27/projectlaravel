<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <!-- Title and Description -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $article->title }}</h1>
                        <p class="text-gray-700 leading-relaxed" style="word-wrap: break-word">{{ $article->body }}</p>
                    </div>

                    <!-- Image Section -->

                    <!-- Action Buttons (Edit and Delete) -->
                    <div class="flex space-x-4">
                        <!-- Edit Button -->
                        @if (auth()->check() && (auth()->user()->id == $article->author_id || auth()->user()->usertype == 'admin'))
                            <div class="flex space-x-4">
                                <!-- Edit Button -->
                                    <div class="flex-shrink-0">
                                        <form action="{{ route('article.edit', $article->id) }}" method="GET">
                                            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">
                                                Edit
                                            </button>
                                        </form>
                                    </div>
            
                                <!-- Delete Button -->
                                    <div class="flex-shrink-0">
                                        <form action="{{ route('article.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
