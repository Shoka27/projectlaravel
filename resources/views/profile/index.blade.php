 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Galleries') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- Galleries List -->
                    @if($users->isEmpty())
                        <p>No Users available.</p>
                    @else
                    <ul class="space-y-8">
                        @foreach($users as $user)
                            <li class="flex items-start space-x-4 p-4 border-b border-gray-200">
                                <!-- user Details -->
                                <div class="flex-grow">
                                    <h3 class="text-lg font-semibold text-blue-500 ">
                                        {{ $user->name }}
                                    </h3>
                                    <p class="text-gray-950 mt-2" >{{$user->email}}</p>
                                </div>
                    
                                <!-- Edit/Delete Buttons (Only visible to user creator or admin) -->
                                    <div class="flex space-x-4">                                       
                                        <!-- Delete Button -->
                                        <td class="py-2">
                                            @if(Auth::user()->usertype === 'admin')
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to permanently delete this user? This action cannot be undone.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">
                                                        Absolute Delete
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </div>
                            </li>
                        @endforeach
                    </ul>
                    
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
