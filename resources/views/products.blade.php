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
                        Crear nuevo producto
                    </h3>
                    <button type="button" id="close-modal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  " data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="{{route('products.store')}}" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                            <input type="text" name="product_name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Añade un nombre" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
                            <select id="category" name="product_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                <option selected disabled>Selecciona categoría</option>
                                <option value="Tarjeta gráfica">Tarjeta gráfica</option>
                                <option value="Procesador">Procesador</option>
                                <option value="Placa base">Placa base</option>
                                <option value="	Memoria RAM">Memoria RAM</option>
                            </select>
                        </div>

                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Añadir nuevo producto
                    </button>
                </form>
            </x-modal>



            <x-modal name="products" id="modal-edit">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Actualizar producto
                    </h3>
                    <button type="button" id="close-modal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center " data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="form-edit p-4 md:p-5" action="{{route('products.update')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="id" class="block mb-2 text-sm font-medium text-gray-900 ">Id</label>
                            <input type="text" name="id" id="id" class="id edit-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Id" readonly>
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
                            <input type="text" name="product_name" id="name" class="edit-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="AÑade un nombre" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="code" class="block mb-2 text-sm font-medium text-gray-900 ">Code</label>
                            <input type="text" name="product_code" id="code" class="edit-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="Code" readonly>
                        </div>
                        <div class="col-span-2">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
                            <select id="category" name="product_category" class="edit-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                <option selected disabled>Selecciona categoría</option>
                                <option value="Tarjeta gráfica">Tarjeta gráfica</option>
                                <option value="Procesador">Procesador</option>
                                <option value="Placa base">Placa base</option>
                                <option value="Memoria RAM">Memoria RAM</option>
                            </select>
                        </div>

                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Actualizar producto
                    </button>
                </form>
            </x-modal>
            <button type="button" id="add" class="text-white bg-blue-700 w-1/6 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none  relative">AÑADIR</button>

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
                              Name
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Code
                          </th>
                          <th scope="col" class="px-6 py-3">
                              Category
                          </th>
                          <th scope="col" class="px-6 py-3"></th>
                          <th scope="col" class="px-6 py-3"></th>
                      </tr>
                  </thead>

                    @if(gettype($products['data']) == "array")
                        @foreach ($products['data'] as $product)
                        <tr class="row bg-white border-b  ">
                            @foreach ($product as $key => $value)

                            @if ($key != 'created_at' && $key != 'updated_at')
                            <td scope="row" class="td px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                {{$value}}
                            </td>
                            @endif
                            @endforeach
                            <td><button type="button" id="btn-edit-{{$product['id']}}" class="edit-btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2  focus:outline-none ">EDITAR</button></td>
                            <td><form action="{{route('products.delete')}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="id" value="{{$product['id']}}" id="btn-delete-{{$product['id']}}" class="delete-btn focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">ELIMINAR</button>
                            </form></td>
                        </tr>
                        @endforeach
                    @else
                        <p>No existen productos</p>
                    @endif

                  </tbody>
              </table>
        </div>
    </body>
</html>
