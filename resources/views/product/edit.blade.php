<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Product') }}
        </h2>
        <!--<a href="{{ route('chirppdf.pdf') }}" class="absolute right-14 font-semibold text-xl text-gray-800 dark:text-gray-200">Exportar PDF</a>-->
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{route('product.update',$product)}}" method="POST">
                        @csrf
                        @method('PUT')
                        Nombre producto:
                        <input name="nproducto"
                            class="bg-transparent block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ __('Whats is your product?') }}" value="{{ old('nproducto', $product->nproducto) }}">
                        <x-input-error :messages="$errors->get('nproducto')" class="mt-2"></x-input-error><br>

                        Cntidad producto:
                        <input name="cantidad"
                            class="bg-transparent block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ __('What is the amount?') }}" value="{{ old('nproducto', $product->cantidad) }}">
                        <x-input-error :messages="$errors->get('cantidad')" class="mt-2"></x-input-error><br>

                        Precio producto:
                        <input name="precio"
                            class="bg-transparent block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ __('Whats the price?') }}" value="{{ old('nproducto', $product->precio) }}">
                        <x-input-error :messages="$errors->get('precio')" class="mt-2"></x-input-error>
                        <x-primary-button class="mt-4">PRODUCTS</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
