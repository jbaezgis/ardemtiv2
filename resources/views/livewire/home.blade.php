@section('title', __('Home'))
<div>
    
    <div class="max-w-7xl mx-auto pt-6 px-2">
        <div class="mb-4 flex justify-center">
            {{-- <x-jet-button wire:click="createShowModal">
                {{ __('Ordenar Ahora') }}
            </x-jet-button> --}}
        </div>

        <div class="flex justify-center pt-4">
            <div class="text-5xl font-anton">
                Menu
            </div>
        </div>
        {{-- iconos --}}
        <div class="flex gap-2 justify-center">
            <div><img class="h-8" src="{{ asset('images/iconos/hamburguesa.png') }}" alt="Hamburguesa"></div>
            <div><img class="h-8" src="{{ asset('images/iconos/burrito.png') }}" alt="burrito"></div>
            <div><img class="h-8" src="{{ asset('images/iconos/beber.png') }}" alt="beber"></div>
            <div><img class="h-8" src="{{ asset('images/iconos/pollo-frito.png') }}" alt="pollo-frito"></div>
            <div><img class="h-8" src="{{ asset('images/iconos/sandwich.png') }}" alt="sandwich"></div>
            <div><img class="h-8" src="{{ asset('images/iconos/taco.png') }}" alt="taco"></div>
        </div>

        @foreach ($categorias as $categoria)
            <div class="mb-4">
                <div class="py-6 flex">
                    <div class="px-2 pt-1 text-gray-900 text-3xl font-bold font-acme border-b-2 border-gray-900">
                        {{ $categoria->nombre }}
                    </div>
                </div>

                @foreach ($productos->where('categoria', $categoria->id) as $producto)
                    <div class="flex gap-2 justify-between">
                        <div>
                            <div class="font-acme text-xl font-bold">
                            {{ $producto->nombre }} 
                            </div>
                            <div class="text-sm">
                                {{ $producto->descripcion }} 
                            </div>
                        </div>
                        <div class="grow pt-4">
                            <div class="border-b-2 border-dashed border-gray-400"></div>
                        </div>
                        <div class="font-acme text-xl font-bold">
                            RD${{ number_format($producto->precio, 2, '.', ',') }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

    </div>
</div>
