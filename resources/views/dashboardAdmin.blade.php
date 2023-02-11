<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="inline-flex items-center">Generar facturas pendientes</h2>
                    <a href="compra/facturar">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ml-3">
                            Facturar
                        </button>
                    </a>

                </div>
            </div>

            @foreach($facturas as $factura)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <h2><b>Cliente: </b>{{ $factura->user->name }}</h2> <h2><b>Monto:</b> {{ $factura->base }}</h2>
                <a href="{{ url('/factura/'.$factura->id) }}">Ver Detalle</a>
                </div>
            </div>
            @endforeach


    </div>

    </div>



    <script>
        setTimeout(()=>{
            document.getElementById('alert').remove();
        }, 5000)
    </script>
</x-app-layout>
