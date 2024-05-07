<div class="navbar bg-slate-200">
    <ul class="flex justify-around items-center h-full">
        <li>
            <a href="{{route('index')}}"><x-application-logo class="w-14 h-14"></x-application-logo></a>
        </li>
        <li>
            <a href="{{route('docs.index')}}">Documentación API</a>
        </li>
        <li>
            <a href="{{route('products.index')}}">Products</a>
        </li>
        <li>
            <a href="{{route('providers.index')}}">Providers</a>
        </li>
        <li>
            <a href="{{route('products-providers.index')}}">Products-Providers</a>
        </li>
        <!--<li>
            <a href="{{route('apiUsage.index')}}">Pruebas</a>
        </li>-->
        <li>

            @if(!session('user_token'))
                <a href="{{route('login.index')}}">Iniciar Sesión</a>
            @else
                <a href="{{route('logout')}}">Cerrar Sesión</a>
            @endif

        </li>
    </ul>
</div>
