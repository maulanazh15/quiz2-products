<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-3">
                        Tabel Product
                    </div>
                    <div class="grid grid-cols-10 gap-1">
                        <button onclick="window.location.replace('{{ route('products.available') }}')"
                            class="sm:col-start-1 sm:col-span-2 focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Stok
                            Available</button>
                        <button onclick="window.location.replace('{{ route('products.unavailable') }}')"
                            class="sm:col-start-3 sm:col-span-2 focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Stok
                            Unavailable</button>
                        </button>
                        <button type="button"
                            class="md:col-end-11 md:col-span-2 sm:col-end-11 sm:col-span-3 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                            onclick="window.location.replace('{{ route('products.create') }}')">+ Tambah Produk</button>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Nama Produk
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Harga
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Stok
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $product->nama_produk }}
                                        </th>
                                        <td class="px-6 py-4">
                                            Rp{{ $product->harga }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $product->stok }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="grid grid-cols-3">
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                <a href="{{ route('products.show', $product->id) }}"
                                                    class="ml-2 font-medium text-green-600 dark:text-green-500 hover:underline">Lihat</a>
                                                <form action="{{ route('products.destroy', $product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="ml-2 font-medium text-red-600 dark:text-red-500 hover:underline">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="my-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
