<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Vibes Liste') }}
        </h2>
    </x-slot>

    <div class="h-screen px-2 py-12">
       <div class="grid h-full grid-cols-6 gap-8 " >

        <div class="h-full col-span-2 px-2 ">
            @livewire('etudiant.qrcode')
        </div>

        <div class="col-span-4 font-bold">
            @livewire('etudiant.liste')    
        </div>

       </div>
    </div>
</x-app-layout>
