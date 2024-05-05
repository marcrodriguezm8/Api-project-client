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
        <div class="content p-10">
            <div class="api" id="get">
                <h2>GET</h2>
                <form class="api-group">
                    @csrf
                    <x-input-label>URL</x-input-label>
                    <x-text-input name="url" id="get" value="{{env('API_ROUTE')}}" class="url-input" data-method="GET"></x-text-input>
                    <x-primary-button>ENVIAR</x-primary-button>
                    <pre class="code mt-5">
                        <code class="code-text"></code>
                    </pre>
                </form>

            </div>
            <div class="api" id="post">
                <h2>POST</h2>
                <x-select name="table" id="selectApi" class="select-table">
                    <option value="products">Products</option>
                    <option value="providers">Providers</option>
                    <option value="products-providers">Products-providers</option>
                </x-select>
                <form class="api-group">
                    @csrf
                    <x-input-label>URL</x-input-label>
                    <x-text-input name="url" id="post" value="{{env('API_ROUTE')}}products" class="url-input" data-method="POST"></x-text-input>
                    <div class="form-group" id="post-products">
                        <x-input-label>PRODUCT_NAME</x-input-label>
                        <x-text-input name="product_name" id="pname-post" value="" data-method="POST"></x-text-input>
                        <x-input-label>PRODUCT_CATEGORY</x-input-label>
                        <x-select name="product_category" id="pcategory-post" >
                            <option value="Tarjeta gráfica">Tarjeta gráfica</option>
                            <option value="Procesador">Procesador</option>
                            <option value="Placa base">Placa base</option>
                            <option value="	Memoria RAM">Memoria RAM</option>
                        </x-select>
                    </div>
                    <div class="form-group" id="post-providers">
                        <x-input-label>PROVIDER_NAME</x-input-label>
                        <x-text-input name="provider_name" id="provname-post" value="" data-method="POST"></x-text-input>
                        <x-input-label>PROVIDER_PHONE</x-input-label>
                        <x-text-input name="provider_phone" id="provname-post" value="" data-method="POST"></x-text-input>
                        <x-input-label>PROVIDER_EMAIL</x-input-label>
                        <x-text-input name="provider_email" id="provemail-post" value="" data-method="POST" type="email"></x-text-input>
                        <x-input-label>PROVIDER_LOCATION</x-input-label>
                        <x-text-input name="provider_location" id="provloc-post" value="" data-method="POST"></x-text-input>
                    </div>
                    <div class="form-group" id="post-products-providers">
                        <x-input-label>PRODUCT_ID</x-input-label>
                        <x-text-input name="product_id" id="pid-post" value="" data-method="POST"></x-text-input>
                        <x-input-label>PROVIDER_ID</x-input-label>
                        <x-text-input name="provider_id" id="provid-post" value="" data-method="POST"></x-text-input>
                        <x-input-label>PRODUCT_PRICE</x-input-label>
                        <x-text-input name="product_price" id="pprice-post" value="" data-method="POST"></x-text-input>
                        <x-input-label>PRODUCT_STOCK</x-input-label>
                        <x-text-input name="product_stock" id="pstock-post" value="" data-method="POST"></x-text-input>
                    </div>

                    <x-primary-button>ENVIAR</x-primary-button>
                    <pre class="code mt-5">
                        <code class="code-text"></code>
                    </pre>
                </form>

            </div>
            <div class="api" id="put">
                <h2>PUT</h2>
                <x-select name="table" id="selectApi" class="select-table">
                    <option value="products">Products</option>
                    <option value="providers">Providers</option>
                    <option value="products-providers">Products-providers</option>
                </x-select>
                <form class="api-group">
                    @csrf
                    <x-input-label>URL</x-input-label>
                    <x-text-input name="url" id="put" value="{{env('API_ROUTE')}}products" class="url-input" data-method="PUT"></x-text-input>
                    <div class="form-group" id="put-products">
                        <x-input-label>PRODUCT_NAME</x-input-label>
                        <x-text-input name="product_name" id="pname-put" value="" data-method="PUT"></x-text-input>
                        <x-input-label>PRODUCT_CATEGORY</x-input-label>
                        <x-select name="product_category" id="pcategory-put">
                            <option value="Tarjeta gráfica">Tarjeta gráfica</option>
                            <option value="Procesador">Procesador</option>
                            <option value="Placa base">Placa base</option>
                            <option value="	Memoria RAM">Memoria RAM</option>
                        </x-select>
                    </div>
                    <div class="form-group" id="put-providers">
                        <x-input-label>PROVIDER_NAME</x-input-label>
                        <x-text-input name="provider_name" id="provname-put" value="" data-method="PUT"></x-text-input>
                        <x-input-label>PROVIDER_PHONE</x-input-label>
                        <x-text-input name="provider_phone" id="provname-put" value="" data-method="PUT"></x-text-input>
                        <x-input-label>PROVIDER_EMAIL</x-input-label>
                        <x-text-input name="provider_email" id="provemail-put" value="" data-method="PUT" type="email"></x-text-input>
                        <x-input-label>PROVIDER_LOCATION</x-input-label>
                        <x-text-input name="provider_location" id="provloc-put" value="" data-method="PUT"></x-text-input>
                    </div>
                    <div class="form-group" id="put-products-providers">
                        <x-input-label>PRODUCT_ID</x-input-label>
                        <x-text-input name="product_id" id="pid-put" value="" data-method="PUT"></x-text-input>
                        <x-input-label>PROVIDER_ID</x-input-label>
                        <x-text-input name="provider_id" id="provid-put" value="" data-method="PUT"></x-text-input>
                        <x-input-label>PRODUCT_PRICE</x-input-label>
                        <x-text-input name="product_price" id="pprice-put" value="" data-method="PUT"></x-text-input>
                        <x-input-label>PRODUCT_STOCK</x-input-label>
                        <x-text-input name="product_stock" id="pstock-put" value="" data-method="PUT"></x-text-input>
                    </div>

                    <x-primary-button>ENVIAR</x-primary-button>
                    <pre class="code mt-5">
                        <code class="code-text"></code>
                    </pre>
                </form>

            </div>
            <div class="api" id="put">
                <h2>DELETE</h2>
                <form class="api-group">
                    @csrf
                    <x-input-label>URL</x-input-label>
                    <x-text-input name="url" id="delete" value="{{env('API_ROUTE')}}" class="url-input" data-method="DELETE"></x-text-input>

                    <x-primary-button>ENVIAR</x-primary-button>
                    <pre class="code mt-5">
                        <code class="code-text"></code>
                    </pre>
                </form>

            </div>
        </div>
    </body>
</html>
