<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <!-- Search Form -->
    <div class="py-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('article.index') }}" method="GET">
            <input type="text" name="search" placeholder="Search articles..." value="{{ request('search') }}" 
                   class="p-2 border rounded w-full" />
        </form>
        <a href="{{ route('article.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 mb-4 px-4 rounded inline-block mt-1">
            Create Article
        </a>
    </div>

     

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Articles Table -->
                    @if($articles->isEmpty())
                        <p>No articles available.</p>
                    @else
                        <table class="w-full text-left table-auto">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">Title</th>
                                    <th class="border px-4 py-2">Author</th>
                                    @if ( auth()->user()->usertype == 'admin')
                                    <th class="border px-4 py-2">Usertype</th>
                                    @endif
                                    <th class="border px-4 py-2">Created At</th>
                                    <th class="border px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('article.show', $article->id) }}" class="text-blue-500 hover:underline">
                                                {{ $article->title }}
                                            </a>
                                        </td>
                                        <td class="border px-4 py-2">
                                            @if ($article->author && !$article->author->trashed())
                                                {{ $article->author->name }}
                                            @else
                                                <span class="text-red-500">Deleted author</span>
                                            @endif
                                        </td>
                                        @if ( auth()->user()->usertype == 'admin')
                                        <td class="border px-4 py-2">
                                            @if ($article->author)
                                                {{ $article->author->usertype }}
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        @endif
                                        <td class="border px-4 py-2">{{ $article->created_at->format('j F Y') }}</td>
                                        
                                        <!-- Action Buttons -->
                                        <td class="border px-4 py-2">
                                            @if (auth()->check() && (auth()->user()->id == $article->author_id || auth()->user()->usertype == 'admin'))
                                                <div class="flex space-x-2">
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('article.edit', $article->id) }}" 
                                                       class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded">
                                                        Edit
                                                    </a>
                                                    
                                                    <!-- Delete Button -->
                                                    <form action="{{ route('article.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
