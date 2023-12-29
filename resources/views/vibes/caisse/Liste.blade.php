<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Vibes Liste') }}
        </h2>
    </x-slot>

    <div class="px-2 py-4 md:h-screen md:py-12">
       <div class="h-full gap-8 md:grid md:grid-cols-6 " >

        <div class="col-span-2 px-2 md:h-full ">
            @livewire('etudiant.qrcode')
        </div>

        <div class="font-bold md:col-span-4">
            @livewire('etudiant.liste')    
        </div>

       </div>
    </div>
</x-app-layout>
