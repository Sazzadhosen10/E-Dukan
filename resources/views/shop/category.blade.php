<x-app-layout :category="$category">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $category ? $category->name : 'All Products' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products as $product)
                <div class="bg-white dark:bg-gray-800 shadow rounded p-4">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-2 rounded">
                    <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200">{{ $product->name }}</h3>
                    <p class="text-gray-600 dark:text-gray-400">{{ $product->price }} USD</p>
                    <a href="{{ route('shop.product', $product->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline mt-2 inline-block">View</a>
                </div>
            @empty
                <p class="text-gray-700 dark:text-gray-300 col-span-full">No products found.</p>
            @endforelse
        </div>

        <div class="mt-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
