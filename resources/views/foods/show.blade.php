<x-app-layout>
    <div class="max-w-4xl mx-auto py-12">
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <img src="{{ asset('storage/'.$food->image) }}" alt="{{ $food->name }}" class="h-80 w-full object-cover">
            <div class="p-6">
                <h2 class="text-3xl font-bold text-gray-800">{{ $food->name }}</h2>
                <p class="mt-3 text-gray-600">{{ $food->description }}</p>
                <p class="mt-4 text-green-600 font-semibold text-lg">₱{{ number_format($food->price, 2) }}</p>

                <div class="mt-6 flex gap-4">
                    <button class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                        Buy Now
                    </button>

                    <a href="{{ route('reserve.table', $food->id) }}" 
                       class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                        Reserve Table
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
