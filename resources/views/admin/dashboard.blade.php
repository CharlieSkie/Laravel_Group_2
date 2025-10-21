<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Admin</h2>
    </x-slot>

    <div class="py-12 text-center">
        <h1 class="text-3xl font-bold text-blue-700">Welcome, Admin {{ Auth::user()->name }}!</h1>
        <p class="mt-4"></p>
    </div>
</x-app-layout>
