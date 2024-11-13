<x-welcomelayout class="">
    <x-slot:title>{{ $title }}</x-slot:title>
            
   
    <div class="flex flex-wrap justify-start">

    @foreach ($galleries as $gallery )

    <div class="p-4 border-b border-gray-500 justify-center inline-block max-w-full">
        <a href="/image/{{ $gallery['id'] }}">            
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-white hover:underline">{{$gallery ['title']}}</h2>  
        </a>
        {{-- @dd($gallery->user) --}}

        @if($gallery->user && $gallery->user->trashed())
                        <p class="text-red-500">Deleted User</p>
                    @else
                            <div class="text-base text-gray-500"> 
                                <a href="/Authors/{{$gallery->user_id}}" class="hover:underline"> {{$gallery->user->name}} </a>   | 
                                {{ $gallery->created_at->format ('j F Y') }}                                                       
                                </div>
        @endif
            <div class=" my-4 ">
                @if ($gallery->image)
                    <img src="{{ asset('storage/galleries/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="max-w-md h-full object-cover">
                @else
                    <p class="text-gray-500 text-sm">No image</p>
                 @endif        
            </div> 
    </div>
    @endforeach
    </div>

</x-welcomelayout>