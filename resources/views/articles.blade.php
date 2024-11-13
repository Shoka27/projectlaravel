<x-homelayout>
    <x-slot:title>Articles</x-slot:title>

        <div class="flex flex-wrap justify-center">
            @if($articles->isEmpty())
            <p>No galleries available.</p>
            @else
                @foreach ($articles as $article)
                        <div class="p-4 border-b border-gray-500 justify-center inline-block" style="max-width: 455px">
                                <a href="/articles/{{ $article['id'] }}">
                                    <h2 class="mb-1 text-3xl tracking-tight font-bold text-white hover:underline">{{ $article['title'] }}</h2>
                                </a>
                                {{-- @dd($article->author) --}}

                                    @if($article->author && $article->author->trashed())
                                        <p class="text-red-500">Deleted User</p>
                                    @else
                                        <div class="text-base text-gray-500">
                                            <a href="/Authors/{{ $article->author->id }}" class="hover:underline">{{ $article->author->name }}</a> 
                                            | {{ $article->created_at->format('j F Y') }}
                                        </div>
                                    @endif

                                <div class="my-4 font-light text-gray-400">{{ Str::limit($article['body']) }}</div>

                                <a href="/articles/{{ $article['id'] }}" class="font-medium text-blue-500 hover:underline">Read more! &raquo;</a>
                        </div>
                @endforeach
            @endif
        </div>
</x-homelayout>
