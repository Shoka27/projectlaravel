<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        {{-- Galleries Count --}}
                        <div class="p-4 bg-gray-100 rounded shadow-md">
                            <h3 class="text-lg font-semibold text-gray-700">Galleries</h3>
                            <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Gallery::count() }}</p>
                        </div>

                        {{-- Articles Count --}}
                        <div class="p-4 bg-gray-100 rounded shadow-md">
                            <h3 class="text-lg font-semibold text-gray-700">Articles</h3>
                            <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Article::count() }}</p>
                        </div>

                        {{-- Users Count --}}
                        <div class="p-4 bg-gray-100 rounded shadow-md">
                            <h3 class="text-lg font-semibold text-gray-700">Users</h3>
                            <p class="text-3xl font-bold text-gray-900">{{ \App\Models\User::count() }}</p>
                        </div>

                        {{-- Posts (Galleries + Articles) Count --}}
                        <div class="p-4 bg-gray-100 rounded shadow-md">
                            <h3 class="text-lg font-semibold text-gray-700">Posts (Galleries + Articles)</h3>
                            <p class="text-3xl font-bold text-gray-900">
                                {{ \App\Models\Gallery::count() + \App\Models\Article::count() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
