<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">User Dashboard</h2>
    </x-slot>

    <div class="py-12 text-center">
        <h1 class="text-3xl font-bold text-green-700">Welcome, {{ Auth::user()->name }}!</h1>
        <p class="mt-4">You are in the User Dashboard.</p>
    </div>
</x-app-layout>
