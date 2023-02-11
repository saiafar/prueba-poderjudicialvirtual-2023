<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(Session::get('mensaje'))
        <div id="alert" class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3 sm:rounded-lg mb-4" role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
        <p>{{ Session::get('mensaje') }}</p>
        </div>
        @endif
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-10">
        @foreach($productos as $producto)

            <!--<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="inline-flex items-center">{{$producto->nombre}}</h2>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">
                        Comprar
                    </button>
                </div>
            </div>-->
             <!-- product card -->
            <div
                class="flex flex-col bg-white drop-shadow rounded-md">
                <img src="default.jpg" alt="Fiction Product"
                    class="h-36 object-cover rounded-tl-md rounded-tr-md">

                <div class="px-3 py-2">
                    <h1 class="font-semibold">{{$producto->nombre}}</h1>
                    <p class="text-sm">{{$producto->precio}}</p>
                    <form method="post" action="{{ route('compra') }}">
                        <input type="hidden" name="producto_id" value="{{$producto->id}}">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <button type="submit" class=" px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer">
                        Comprar
                        </button>
                    </form>

                </div>
            </div>
        @endforeach

    </div>

    </div>


    </div>



    <script>
        setTimeout(()=>{
            document.getElementById('alert').remove();
        }, 5000)
    </script>
</x-app-layout>
