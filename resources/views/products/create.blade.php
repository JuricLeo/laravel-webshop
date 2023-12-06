<x-app-layout>
<div class="container mx-auto mt-8">
  <h2 class="text-2xl font-semibold mb-4 text-white">Create New Product</h2>

  <form action="{{ route('products.store') }}" method="POST" class="max-w-md mx-auto">
    @csrf

    <div class="mb-4">
      <label for="naziv_proizvoda" class="block text-sm font-medium text-gray-600">Product Name:</label>
      <input type="text" name="naziv_proizvoda" class="mt-1 p-2 border rounded w-full" required>
    </div>

    <div class="mb-4">
      <label for="opis" class="block text-sm font-medium text-gray-600">Description:</label>
      <textarea name="opis" class="mt-1 p-2 border rounded w-full"></textarea>
    </div>

    <div class="mb-4">
      <label for="cijena" class="block text-sm font-medium text-gray-600">Price:</label>
      <input type="number" name="cijena" class="mt-1 p-2 border rounded w-full" required>
    </div>

    <div class="mb-4">
      <label for="dostupna_kolicina" class="block text-sm font-medium text-gray-600">Available Quantity:</label>
      <input type="number" name="dostupna_kolicina" class="mt-1 p-2 border rounded w-full" required>
    </div>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Product</button>
  </form>
</div>
</x-app-layout>