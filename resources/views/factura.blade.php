<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" bg-white border-b border-gray-200">
                <div>
            <div>
                <div class="flex justify-between p-4">
                    <div>
                        <h6 class="font-bold">Fecha : <span class="text-sm font-medium"> {{$factura->created_at}}</span></h6>
                        <h6 class="font-bold">Factura ID : <span class="text-sm font-medium"> {{$factura->id}}</span></h6>
                    </div>
                    <div></div>
                </div>
                <div class="flex justify-center p-4">
                    <div class="border-b border-gray-200 shadow">
                        <table class="">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        #
                                    </th>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Nombre del Producto
                                    </th>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Cantidad
                                    </th>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        precio
                                    </th>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Impuesto
                                    </th>
                                    <th class="px-4 py-2 text-xs text-gray-500 ">
                                        Subtotal
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                            @foreach($detalles as $detalle)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        1
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                           {{$detalle->nombreProducto}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500">{{$detalle->cantidad}}</div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{$detalle->precio}}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                    {{$detalle->impuesto}}%
                                    </td>
                                    <td class="px-6 py-4">
                                    {{$detalle->subtotal}}
                                    </td>
                                </tr>
                            @endforeach

                                <tr class="">
                                    <td colspan="4"></td>
                                    <td class="text-sm font-bold">Sub Total</td>
                                    <td class="text-sm font-bold tracking-wider"><b>{{$factura->base}}</b></td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <th colspan="4"></th>
                                    <td class="text-sm font-bold"><b>Impuesto</b></td>
                                    <td class="text-sm font-bold"><b>{{$factura->impuesto}}</b></td>
                                </tr>
                                <!--end tr-->
                                <tr class="text-white bg-gray-800">
                                    <th colspan="4"></th>
                                    <td class="text-sm font-bold"><b>Neto</b></td>
                                    <td class="text-sm font-bold"><b>{{$factura->neto}}</b></td>
                                </tr>
                                <!--end tr-->

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex justify-between p-4">
                    <div>
                        <h3 class="text-xl"></h3>
                        <ul class="text-xs list-disc list-inside">
                        </ul>
                    </div>
                    <div class="p-4">
                        <h3>Firma</h3>
                        <div class=" italic text-indigo-500">PoderJudicialVirtual.com</div>
                    </div>
                </div>



            </div>
        </div>

                </div>
            </div>




    </div>

    </div>



    <script>
        setTimeout(()=>{
            document.getElementById('alert').remove();
        }, 5000)
    </script>
</x-app-layout>
