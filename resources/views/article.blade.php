<x-homelayout>
    <x-slot:title>Singel Article</x-slot:title>
    
    <div class="max-w-3xl mx-auto p-4">
        <!-- Back to Article Link -->
        <a href="/articles" class="font-medium text-blue-500 hover:underline">&laquo; Back to Article</a>
        
        <!-- Article Title -->
        <h2 class="mb-2 text-3xl md:text-4xl tracking-tight font-bold text-white">{{ $article['title'] }}</h2>  

        <!-- Author and Date Information -->
        @if($article->author && $article->author->trashed())
            <p class="text-red-500">Deleted User</p>
        @else
            <div class="text-base text-gray-500">
                <a href="/Authors/{{$article->author->id}}" class="hover:underline">{{ $article->author->name }}</a> 
                | {{ $article->created_at->format('j F Y') }}
            </div>
        @endif
    </div>

    <!-- Article Body -->
    <div class="max-w mx-auto my-4 font-light text-gray-400 whitespace-pre-wrap px-4" style="word-wrap: break-word; min-width: 412px; ">
        {{ $article['body'] }}
    </div>

    <!-- Back to Article Link -->
    <div class="text-center my-4">
        <a href="/articles" class="font-medium text-blue-500 hover:underline">&laquo; Back to Article</a>
    </div>
</x-homelayout>
