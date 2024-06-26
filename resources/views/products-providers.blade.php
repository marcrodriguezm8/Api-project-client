<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <x-navbar></x-navbar>
        <div class="content flex flex-col justify-center p-10">
            <x-modal name="products" id="modal-add">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Crear nuevo producto-proveedor
                    </h3>
                    <button type="button" id="close-modal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="{{route('products-providers.store')}}" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="product-id" class="block mb-2 text-sm font-medium text-gray-900 ">Product Id</label>
                            <input type="number" name="product_id" id="product-id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Añadir un id de producto" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="provider-id" class="block mb-2 text-sm font-medium text-gray-900 ">Provider Id</label>
                            <input type="number" name="provider_id" id="provider-id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Añadir un id de proveedor">
                        </div>
                        <div class="col-span-2">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                            <input type="number" step="0.01" name="product_price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Añadir un precio" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 ">Stock</label>
                            <input type="number" name="product_stock" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Añadir un número de stock" required="">
                        </div>

                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Añadir nuevo producto-proveedor
                    </button>
                </form>
            </x-modal>



            <x-modal name="products" id="modal-edit">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Actualizar producto-proveedor
                    </h3>
                    <button type="button" id="close-modal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="form-edit p-4 md:p-5" action="{{route('products-providers.update')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="id" class="block mb-2 text-sm font-medium text-gray-900 ">Id</label>
                            <input type="number" name="id" id="id" class="id edit-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Id" readonly>
                        </div>
                        <div class="col-span-2">
                            <label for="product-id" class="block mb-2 text-sm font-medium text-gray-900 ">Product Id</label>
                            <input type="number" name="product_id" id="product-id" class="edit-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Añadir un id de producto" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="provider-id" class="block mb-2 text-sm font-medium text-gray-900 ">Provider Id</label>
                            <input type="number" name="provider_id" id="provider-id" class="edit-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Añadir un id de proveedor">
                        </div>
                        <div class="col-span-2">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Price</label>
                            <input type="number" step="0.01" name="product_price" id="price" class="edit-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Añadir un precio" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 ">Stock</label>
                            <input type="number" name="product_stock" id="stock" class="edit-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Añadir un número de stock" required="">
                        </div>

                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Actualizar producto-proveedor
                    </button>
                </form>
            </x-modal>
          <button type="button" id="add" class="text-white bg-blue-700 w-1/6 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">AÑADIR</button>
          @if (session('success'))
          <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
            class="mb-4 text-sm text-green-600 ">{{ session('success')['data'] }}</p>
            @endif
            @if (session('error'))
          <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
            class="mb-4 text-sm text-red-600 ">{{ session('error')['data'] }}</p>
            @endif
          <table class=" text-gray-500 " id="table">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                      <tr>
                          <th scope="col" class="px-6 py-3">
                            Id
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Product Id
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Provider Id
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Price
                          </th>
                          <th scope="col" class="px-6 py-3">
                            Stock
                            </th>
                          <th scope="col" class="px-6 py-3"></th>
                          <th scope="col" class="px-6 py-3"></th>
                      </tr>
                  </thead>
                  <tbody>
                    @php
                        $toPrint = ['product_provider_id', 'product_id', 'provider_id', 'product_price', 'product_stock']
                    @endphp

                    @if(gettype($productProviders['data']) == "array")
                        @foreach ($productProviders['data'] as $productProvider)
                        <tr class="row bg-white border-b  ">
                            @foreach ($productProvider as $key => $value)

                            @if (in_array($key, $toPrint))
                            @if($key == 'product_id')
                            <td data-popover-target="popover-default" scope="row" class="relative td px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                <span class="product-id-td text-blue-700 underline">{{$value}}</span>
                                <div data-popover id="popover-default" role="tooltip" class="absolute left-44 z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 ">
                                    <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg  ">
                                        <h3 class="font-semibold text-gray-900 ">{{$productProvider["product_name"]}}</h3>
                                    </div>
                                    <div class="px-3 py-2 flex justify-start flex-col items-start">
                                        <p>Code: {{$productProvider["product_code"]}}</p>
                                        <p>Category: {{$productProvider["product_category"]}}</p>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                            </td>
                            @elseif($key == 'provider_id')
                            <td data-popover-target="popover-default" scope="row" class="relative td px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                <span class="product-id-td text-blue-700 underline">{{$value}}</span>
                                <div data-popover id="popover-default" role="tooltip" class="absolute left-44 z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 ">
                                    <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg ">
                                        <h3 class="font-semibold text-gray-900 ">{{$productProvider["provider_name"]}}</h3>
                                    </div>
                                    <div class="px-3 py-2 flex justify-start flex-col items-start">
                                        @isset($productProvider["provider_phone"])<p>Phone: {{$productProvider["provider_phone"]}}</p>@endisset
                                        <p>Email: {{$productProvider["provider_email"]}}</p>
                                        <p>Location: {{$productProvider["provider_location"]}}</p>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                            </td>
                            @else
                                @if($key == 'product_price')
                                    <td scope="row" class="td px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{$value}} €
                                    </td>
                                @elseif ($key == 'product_stock')
                                <td scope="row" class="td px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    {{$value}} u
                                    </td>
                                @else
                                <td scope="row" class="td px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                    {{$value}}
                                    </td>
                                @endif

                            @endif
                            @endif
                            @endforeach
                            <td><button type="button" id="btn-edit-{{$productProvider['product_provider_id']}}" class="edit-btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">EDITAR</button></td>
                            <td><form action="{{route('products-providers.delete')}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="id" value="{{$productProvider['product_provider_id']}}" id="btn-delete-{{$productProvider['product_provider_id']}}" class="delete-btn focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">ELIMINAR</button>
                            </form></td>
                            </tr>
                        @endforeach
                    @else
                        <p>No existen productos-proveedores</p>
                    @endif

                  </tbody>
              </table>
        </div>
    </body>
</html>
