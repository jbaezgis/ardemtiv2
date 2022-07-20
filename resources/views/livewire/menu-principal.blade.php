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

        <ul class="grid grid-cols-3 gap-x-5 m-10 mx-auto sm:grid-cols-6 md:grid-col-12">
            <li class="relative pb-4">
              <input wire:model="categoria" class="sr-only peer" type="radio" value="" name="todas" id="todas">
              <label class="flex py-2 px-4 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-green-500 peer-checked:ring-2 peer-checked:border-transparent" for="todas">Todo</label>
          
              <div class="absolute hidden w-5 h-5 peer-checked:block top-2 right-3 text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
              </div>
            </li>

            @foreach ($categoriasMenu as $categoria)
                <li class="relative pb-4">
                    <input wire:model="categoria" class="sr-only peer" type="radio" value="{{ $categoria->nombre }}" name="{{ $categoria->nombre }}" id="{{ $categoria->nombre }}">
                    <label class="flex py-2 px-4 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-green-500 peer-checked:ring-2 peer-checked:border-transparent" for="{{ $categoria->nombre }}">{{ $categoria->nombre }}</label>
                
                    <div class="absolute hidden w-5 h-5 peer-checked:block top-2 right-3 text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </li>
                
            @endforeach
        </ul>

        <div wire:poll>
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
</div>
