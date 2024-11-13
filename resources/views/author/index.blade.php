<x-homelayout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- Articles Section --}}
    <div class="mb-8">
        <h2 class="text-4xl font-bold text-center mb-4">Articles</h2>
        <div class="flex flex-wrap justify-center gap-6">
            @if($articles->isEmpty())
                <p>No articles available.</p>
            @else
                @foreach ($articles as $article)
                    <div class="p-4 border-b border-gray-500 inline-block" style="max-width: 455px">
                        <a href="/articles/{{ $article['id'] }}">
                            <h2 class="mb-1 text-3xl tracking-tight font-bold text-white hover:underline">{{ $article['title'] }}</h2>
                        </a>

                        {{-- Check if the author has been soft deleted --}}
                        @if($article->author && $article->author->trashed())
                            <p class="text-red-500">Deleted User</p>
                        @else
                            <div class="text-base text-gray-500">
                                <a href="/Authors/{{ $article->author->id }}" class="hover:underline">{{ $article->author->name }}</a>
                                | {{ $article->created_at->format('j F Y') }}
                            </div>
                        @endif

                        <div class="my-4 font-light text-gray-400">{{ Str::limit($article['body'], 150) }}</div>

                        <a href="/articles/{{ $article['id'] }}" class="font-medium text-blue-500 hover:underline">Read more! &raquo;</a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    {{-- Galleries Section --}}
    <div class="mt-8">
        <h2 class="text-4xl font-bold text-center mb-4">Galleries</h2>
        <div class="flex flex-wrap justify-center gap-6">
            @if($galleries->isEmpty())
                <p>No galleries available.</p>
            @else
                @foreach ($galleries as $gallery)
                    <div class="p-4 border-b border-gray-500 inline-block max-w-full">
                        <a href="/image/{{ $gallery['id'] }}">
                            <h2 class="mb-1 text-3xl tracking-tight font-bold text-white hover:underline">{{ $gallery['title'] }}</h2>
                        </a>

                        {{-- Check if the user has been soft deleted --}}
                        @if($gallery->user && $gallery->user->trashed())
                            <p class="text-red-500">Deleted User</p>
                        @else
                            <div class="text-base text-gray-500">
                                <a href="/Authors/{{ $gallery->user_id }}" class="hover:underline">{{ $gallery->user->name }}</a>
                                | {{ $gallery->created_at->format('j F Y') }}
                            </div>
                        @endif

                        <div class="my-4">
                            @if ($gallery->image)
                                <img src="{{ asset('storage/galleries/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="max-w-md h-full object-cover">
                            @else
                                <p class="text-gray-500 text-sm">No image</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</x-homelayout>
