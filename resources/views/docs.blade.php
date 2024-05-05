<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css'])
    </head>
    <body class="antialiased">
        <x-navbar></x-navbar>
        <div class="content p-10">
            <h1 class="text-2xl font-bold mb-5 underline">Documentación</h1>
            <div class="api-docs">
                <p class="mb-3">Esta API es GET, POST, PUT Y DELETE y es necesario autenticación para acceder a ella</p>
                <p class="mb-5">Está divida en 3 apartados: COMPONENTES, PROVEEDORES y PRODUCTOS (COMPONENTE CON STOCK Y PRECIO)</p>
                <h2 class="text-xl underline font-normal mb-3">GET</h2>
                <h3 class="mb-5">Obtener todos los recursos</h3>
                <pre class="code">
                    <code class="code-text">
getAllComponents: 'https://localhost:8000/api/products',
getAllProviders: 'https://localhost:8000/api/providers',
getAllProducts: 'https://localhost:8000/api/products-providers'
                    </code>
                </pre>
                <pre class="code">
                    <code class="">
{
    "data": [
        {
            "id": 1,
            "provider_name": "INTEL",
            "provider_phone": null,
            "provider_email": "dubuque.alessandro@example.net",
            "provider_location": "SI",
            "created_at": "2024-04-22T09:57:10.000000Z",
            "updated_at": "2024-04-22T09:57:10.000000Z"
        },
        {
            "id": 2,
            "provider_name": "AMD",
            "provider_phone": null,
            "provider_email": "erin09@example.org",
            "provider_location": "AI",
            "created_at": "2024-04-22T09:57:10.000000Z",
            "updated_at": "2024-04-22T09:57:10.000000Z"
        }
        ...
    ]
}
                    </code>
                </pre>
                <h3 class="mb-5">Obtener un recurso</h3>
                <pre class="code">
                    <code class="">
getOneComponent: 'https://localhost:8000/api/products/{id}',
getOneProvider: 'https://localhost:8000/api/providers/{id}',
getOneProduct: 'https://localhost:8000/api/products-providers/{id}'
                    </code>
                </pre>
                <pre class="code">
                    <code class="">
{
    "data": {
        "id": 4,
        "product_name": "RTX 4060 Ti",
        "product_code": "202422040957104",
        "product_category": "Tarjeta gráfica",
        "created_at": "2024-04-22T09:57:10.000000Z",
        "updated_at": "2024-04-22T09:57:10.000000Z"
    }
}
                    </code>
                </pre>
                <h2 class="text-xl underline font-normal mb-3">POST</h2>
                <p class="mb-5">Componentes: Aceptan un "product_name" y "product_category"</p>
                <pre class="code">
                    <code class="language-json">
addComponent: 'https://localhost:8000/api/products',
body:
{
    "product_name": "RTX 4080",
    "product_category": "Tarjeta gráfica"
}
result:
{
    {
        "data": "Producto insertado correctamente"
    }
}
                    </code>
                </pre>
                <p class="mb-5">Proveedores: Aceptan un "provider_name", "provider_phone" (nullable),
                    "provider_email" y "provider_email"
                </p>
                <pre class="code">
                    <code class="ml-0">
addProvider: 'https://localhost:8000/api/providers',
body:
{
    "provider_name": "ASIX",
    "provider_phone": "123456789",
    "provider_email": "asix@example.com",
    "provider_location": "ES"
}
result:
{
    {
        "data": "Proveedor insertado correctamente"
    }
}
                    </code>
                </pre>

                <p class="mb-5">Productos: Aceptan un "product_id", "provider_id",
                    "product_price" y "product_stock"
                </p>
                <pre class="code">
                    <code class="ml-0">
addProduct: 'https://localhost:8000/api/products-providers',
body:
{
    "product_id": 1,
    "provider_id": 1,
    "product_price": 50,
    "product_stock": 5
}
result:
{
    {
        "data": "Producto insertado correctamente"
    }
}
                    </code>
                </pre>
                <h2 class="text-xl underline font-normal mb-3">PUT</h2>
                <h3 class="mb-5">Actualizar un componente</h3>
                <pre class="code">
                    <code class="language-json">
updateComponent: 'https://localhost:8000/api/products/{id}',
body:
{
    "product_name": "RTX 4080",
    "product_category": "Tarjeta gráfica"
}
result:
{
    {
        "data": "Producto actualizado correctamente"
    }
}
                    </code>
                </pre>
                <h3 class="mb-5">Actualizar un proveedor</h3>
                <pre class="code">
                    <code class="ml-0">
updateProvider: 'https://localhost:8000/api/providers/{id}',
body:
{
    "provider_name": "ASIX",
    "provider_phone": "123456789",
    "provider_email": "asix@example.com",
    "provider_location": "ES"
}
result:
{
        {
            "data": "Proveedor actualizado correctamente"
        }
}
                    </code>
                </pre>
                <h3 class="mb-5">Actualizar un prdocuto</h3>
                <pre class="code">
                    <code class="ml-0">
updateProduct: 'https://localhost:8000/api/products-providers/{id}',
body:
{
    "product_id": 1,
    "provider_id": 1,
    "product_price": 50,
    "product_stock": 5
}
result:
{
    {
        "data": "Producto actualizado correctamente"
    }
}
                    </code>
                </pre>
                <h2 class="text-xl underline font-normal mb-3">DELETE</h2>
                <pre class="code">
                    <code class="ml-0">
deleteComponent: 'https://localhost:8000/api/products/{id}',
deleteProvider: 'https://localhost:8000/api/providers/{id}',
deleteProduct: 'https://localhost:8000/api/products-providers/{id}',
                    </code>
                </pre>

            </div>
        </div>
    </body>
</html>
