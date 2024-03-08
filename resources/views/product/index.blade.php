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
                    <form action="{{ route('product.store') }}" method="POST">
                        @csrf
                        Nombre producto:
                        <input name="nproducto"
                            class="bg-transparent block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ __('Whats is your product?') }}" value="{{ old('nproducto') }}">
                        <x-input-error :messages="$errors->get('nproducto')" class="mt-2"></x-input-error><br>

                        Cntidad producto:
                        <input name="cantidad"
                            class="bg-transparent block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ __('What is the amount?') }}" value="{{ old('cantidad') }}">
                        <x-input-error :messages="$errors->get('cantidad')" class="mt-2"></x-input-error><br>

                        Precio producto:
                        <input name="precio"
                            class="bg-transparent block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ __('Whats the price?') }}" value="{{ old('precio') }}">
                        <x-input-error :messages="$errors->get('precio')" class="mt-2"></x-input-error>
                        <x-primary-button class="mt-4">PRODUCTS</x-primary-button>
                    </form>
                </div>
            </div>
            <div class="mt-06 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                @foreach ($products as $product)
                    <div class="p-6 flex space-x-2">
                        <svg class="h-6 w-6 text-gray-600 dark:text-gray-400 -scale-x-100" data-slot="icon"
                            fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z">
                            </path>
                        </svg>
                        <div class="flex-1">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-800 dark:text-gray-200">
                                    <small class="ml-2 text-sm text-gray-600 dark:text-gray-400">Creacion:
                                        {{ $product->created_at->format('j M Y, g:i a') }}</small>
                                    @if ($product->created_at != $product->updated_at)
                                        <small class="text-sm text-gray-600 dark:text-gray-400">&middot;
                                            {{ __('edited') }}</small>
                                    @endif
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="mt-4 text-lg text-gray-900 dark:text-gray-100">Nombre:&nbsp;&nbsp;{{ $product->nproducto }}</p>
                                <p class="grid justify-items-center mt-4 text-lg text-gray-900 dark:text-gray-100">
                                    Cantidad:&nbsp;&nbsp;{{ $product->cantidad }}</p>
                                <p class="grid justify-items-end mt-4 text-lg text-gray-900 dark:text-gray-100">
                                   Precio:&nbsp;&nbsp; ${{ $product->precio }}</p>
                            </div>
                        </div>

                        <x-dropdown>
                            <x-slot name="trigger">
                                <button>
                                    <svg class="h-6 w-6 text-gray-600 dark:text-gray-400 -scale-x-100" data-slot="icon"
                                        fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495">
                                        </path>
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('product.edit', $product)">{{ __('Edit Product') }}</x-dropdown-link>
                                <form action="{{route('product.destroy', $product)}}" method="POST">
                                    @csrf @method('DELETE')
                                    <x-dropdown-link :href="route('product.destroy', $product)" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Delete Product') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
