<x-app-layout>
  <div class="container mx-auto mt-8">
    <h2 class="text-2xl font-semibold mb-4 text-white">Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" class="max-w-md mx-auto">
      @csrf
      @method('PUT')

      <div class="mb-4">
        <label for="naziv_proizvoda" class="block text-sm font-medium text-gray-600">Product Name:</label>
        <input type="text" name="naziv_proizvoda" value="{{ $product->naziv_proizvoda }}" class="mt-1 p-2 border rounded w-full" required>
      </div>

      <div class="mb-4">
        <label for="opis" class="block text-sm font-medium text-gray-600">Description:</label>
        <textarea name="opis" class="mt-1 p-2 border rounded w-full">{{ $product->opis }}</textarea>
      </div>

      <div class="mb-4">
        <label for="cijena" class="block text-sm font-medium text-gray-600">Price:</label>
        <input type="number" name="cijena" value="{{ $product->cijena }}" class="mt-1 p-2 border rounded w-full" required>
      </div>

      <div class="mb-4">
        <label for="dostupna_kolicina" class="block text-sm font-medium text-gray-600">Available Quantity:</label>
        <input type="number" name="dostupna_kolicina" value="{{ $product->dostupna_kolicina }}" class="mt-1 p-2 border rounded w-full" required>
      </div>

      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Product</button>
    </form>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="max-w-md mx-auto mt-2">
      @csrf
      @method('DELETE')
      <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete Product</button>
    </form>
  </div>
</x-app-layout>