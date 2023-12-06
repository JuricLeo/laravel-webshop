<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Kreiraj novi proizvod
            </a>
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Proizvodi</h2>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ime Proizvoda</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Opis</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cijena</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dostupna Količina</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Akcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-white">{{ $product->naziv_proizvoda }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-white">{{ $product->opis }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-white">{{ $product->cijena }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-white">{{ $product->dostupna_kolicina }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($product->user_id == auth()->user()->id)
                                    <a href="{{ route('products.edit', $product->id) }}" class="text-green-500 hover:underline">Azuriraj</a>
                                    @else
                                    <button class="order-product text-blue-500 hover:underline" data-product-id="{{ $product->id }}" data-order-url="{{ route('order.product', $product->id) }}">Naruci</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>