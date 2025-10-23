<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Menu List
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($foods as $food)
                <div class="bg-white rounded-xl shadow-md p-4 hover:shadow-lg transition">
                    <img src="{{ asset('storage/' . $food->image) }}" 
                         alt="{{ $food->name }}" 
                         class="rounded-md h-48 w-full object-cover mb-3">
                    <h3 class="font-semibold text-lg">{{ $food->name }}</h3>
                    <p class="text-gray-600 text-sm mt-1">{{ $food->description }}</p>
                    <p class="font-bold text-green-600 mt-2">₱{{ number_format($food->price, 2) }}</p>
                    <a href="{{ route('reserve.table', $food->id) }}" 
                       class="block text-center mt-3 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md">
                       Reserve
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
