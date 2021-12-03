<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Acceuil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                
                <div class="justify-between hidden px-8 py-4 md:flex ">
                    <img src="{{asset('img/ItVibesLogoshort.jpeg')}}"  class="h-96 w-96 " alt=" C2E">
                    
                    <div class="w-96 ">
                        <img src="{{asset('img/C2E.jpeg')}}"  class="w-48 h-24 " alt=" C2E">
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
