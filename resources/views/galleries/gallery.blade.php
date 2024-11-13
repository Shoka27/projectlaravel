<x-homelayout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <!-- Back to Galleries Link -->
    <div class="p-4 border-b justify-center block sm:inline-block max-w-full">
        <a href="/galleries" class="font-medium text-blue-500 hover:underline">&laquo; Back to Galleries</a>
    </div>

    <!-- Gallery Title and Author Info -->
    <div class="mt-4 sm:mt-0 text-center sm:text-left">
        <h2 class="mb-2 text-3xl tracking-tight font-bold text-white">
            {{ $gallery['title'] }}
        </h2>

        <!-- Author and Date Info -->
        <div class="text-base text-gray-500">
            <a href="/Authors/{{ $gallery->user->id }}" class="hover:underline">
                {{ $gallery->user->name }}
            </a> 
            <span>|</span> 
            {{ $gallery->created_at->format('j F Y') }}
        </div>
    </div>

    <!-- Gallery Image or Placeholder -->
    <div class="my-4">
        @if ($gallery->image)
            <!-- Responsive image with full width on mobile and limited height -->
            <img src="{{ asset('storage/galleries/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-full h-auto max-h-screen object-contain">
        @else
            <p class="text-gray-500 text-sm">No image available</p>
        @endif
    </div>

    <!-- Gallery Description -->
    <div class="text-base text-white p-4 bg-gray-800 rounded-md">
        <!-- Assuming gallery has a 'description' field -->
        @if ($gallery->description)
            <p>{{ $gallery->description }}</p>
        @else
            <p class="text-gray-400">No description available for this gallery.</p>
        @endif
    </div>
</x-homelayout>
