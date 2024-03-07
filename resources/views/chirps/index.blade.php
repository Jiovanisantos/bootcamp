<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chirps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('chirps.store') }}" method="POST">
                        @csrf
                        <textarea name="message"
                            class="bg-transparent block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ __('Whats on your mind?') }}"> {{ old('message') }} </textarea>
                        <x-input-error :messages="$errors->get('message')" class="mt-2"></x-input-error>

                        <x-primary-button class="mt-4">Chirps</x-primary-button>
                    </form>
                </div>
            </div>
            <div class="mt-06 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                @foreach ($chirps as $chirp)
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
                                    {{ $chirp->user->name }}
                                    <small class="ml-2 text-sm text-gray-600 dark:text-gray-400">Creacion:
                                        {{ $chirp->created_at->format('j M Y, g:i a') }}</small>
                                        @if ($chirp->created_at != $chirp->updated_at)
                                            <small class="text-sm text-gray-600 dark:text-gray-400">&middot; {{__('edited')}}</small>
                                        @endif
                                </span>
                            </div>
                            <p class="mt-4 text-lg text-gray-900 dark:text-gray-100">{{ $chirp->message }}</p>
                        </div>
                        @can ('update', $chirp)
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
                                <x-dropdown-link :href="route('chirps.edit', $chirp)">{{ __('Edit Chirp') }}</x-dropdown-link>
                                <form action="{{route('chirps.destroy', $chirp)}}" method="POST">
                                    @csrf @method('DELETE')
                                    <x-dropdown-link :href="route('chirps.destroy', $chirp)" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Delete Chirp') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                        @endcan

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
