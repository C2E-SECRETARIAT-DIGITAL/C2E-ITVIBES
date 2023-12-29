<div>
    <div>

        <p>
            Recherche 
        </p>
        <div class="grid grid-cols-6 gap-6 px-4">

            <div class="col-span-6 md:col-span-2 ">
                <label for="matricule" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" name="matricule" id="matricule" wire:model.debounce500ms='searchName' autocomplete="matricules" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('matricule')
                    <div class="font-semibold text-center text-red-600">{{ $errors->first('matricule') }}  </div>
                @enderror
               
            </div>

            <div class="col-span-6 md:col-span-2 ">
                <label for="matricule" class="block text-sm font-medium text-gray-700">Matricule</label>
                <input type="text" name="matricule" id="matricule" wire:model.debounce500ms='searchMaticule' autocomplete="matricules" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('matricule')
                    <div class="font-semibold text-center text-red-600">{{ $errors->first('matricule') }}  </div>
                @enderror
               
            </div>

            

            <div class="col-span-6 mt-6 text-xl font-bold text-center md:col-span-2 ">
              <p>
                {{$etudiant_entree}} / {{$etudiant_non_entree}} entré(e)s
              </p>
            </div>

        </div>
         
    </div>
    <div class="py-4">
        <div class="">

            <div class="flex flex-col w-full">
            <div class="w-full -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block w-full min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="w-full border-b border-gray-200 shadow overflow-x sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-800">
                    <thead class="bg-gray-100">
                        <tr>
                        
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Matricule
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Nom et prenom
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Contact
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Statut
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($etudiants as $key => $etudiant)
                        <tr>
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                
                                    <div class="ml-4">
                                        <div class="text-sm font-extrabold text-gray-900">
                                            {{$etudiant->matricule}} 
                                        </div>
                                        
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-670">{{$etudiant->nom}}</div>
                                <div class="text-sm font-semibold text-gray-500">{{$etudiant->prenoms}}</div>
                            </td>
                            
                            <td class="px-6 py-4 font-normal whitespace-nowrap">
                                {{$etudiant->contacts}} 
                            </td>
            
<<<<<<< HEAD
                            <td class="px-6 py-4 whitespace-nowrap ">
                            
                                <div>

                                    <div class="ml-3">
                                        @if(!$etudiant->entree) 
                                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"  viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" > <path d="M580 2565 l0 -2555 190 0 190 0 0 2370 0 2370 1253 -1 c688 0 1248 -2 1242 -4 -5 -2 -307 -56 -670 -120 -363 -63 -684 -120 -713 -126 l-52 -10 2 -1997 3 -1996 985 -243 c542 -133 995 -245 1008 -248 l22 -5 0 365 0 365 60 0 60 0 0 -365 0 -365 190 0 190 0 0 2560 0 2560 -1980 0 -1980 0 0 -2555z m3580 1950 l0 -235 -60 0 -60 0 0 235 0 235 60 0 60 0 0 -235z m0 -2005 l0 -1200 -60 0 -60 0 0 1200 0 1200 60 0 60 0 0 -1200z m-1713 108 c55 -50 72 -164 36 -235 -75 -144 -243 -73 -243 103 0 51 36 122 74 146 40 24 98 19 133 -14z"/> </g> </svg>
                                        @else
                                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"  viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#0000ff" > <path d="M580 2565 l0 -2555 190 0 190 0 0 2370 0 2370 1253 -1 c688 0 1248 -2 1242 -4 -5 -2 -307 -56 -670 -120 -363 -63 -684 -120 -713 -126 l-52 -10 2 -1997 3 -1996 985 -243 c542 -133 995 -245 1008 -248 l22 -5 0 365 0 365 60 0 60 0 0 -365 0 -365 190 0 190 0 0 2560 0 2560 -1980 0 -1980 0 0 -2555z m3580 1950 l0 -235 -60 0 -60 0 0 235 0 235 60 0 60 0 0 -235z m0 -2005 l0 -1200 -60 0 -60 0 0 1200 0 1200 60 0 60 0 0 -1200z m-1713 108 c55 -50 72 -164 36 -235 -75 -144 -243 -73 -243 103 0 51 36 122 74 146 40 24 98 19 133 -14z"/> </g> </svg>
                                        @endif
                                    </div>

                                    <!-- <div>   
                                        @if(!$etudiant->restauration) 
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z"></path></svg>
=======
                            <td class="px-6 py-4 whitespace-nowrap">
                            
                                <div class="flex gap-4">

                                    <div>   
                                        @if(!$etudiant->restauration) 
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" /></svg>

>>>>>>> a58d6b5be4d118972b673ccfccdec1f9a70088df
                                        @else
                                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                                        @endif
                                    </div>

<<<<<<< HEAD
                                    <div>
                                       
                                        @if(!$etudiant->cinema) 
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path></svg>
                                        @else
                                             <svg class="w-6 h-6 text-amber-600 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"></path></svg>
                                        @endif
                                        
                                    </div> -->

=======
>>>>>>> a58d6b5be4d118972b673ccfccdec1f9a70088df
                                </div>
                            </td>

                            
                            <td class="flex justify-center px-6 py-6 text-sm font-medium whitespace-nowrap">
                                
                                <a href="#" onclick="window.location='{{route('get.ticket', $etudiant->id, false)}}'" class="px-2 cursor-pointer text-cyan-900 ">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    {{-- <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg> --}}
                                </a>
                                {{-- <a wire:click='selectetudiant({{$etudiant->id}})' class="px-2 text-yellow-600 cursor-pointer ">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </a> --}}
<<<<<<< HEAD
            
=======
>>>>>>> a58d6b5be4d118972b673ccfccdec1f9a70088df
                            </td>
                        </tr>
                        @endforeach
            
                        
                    </tbody>
                    </table>
                    
                </div>
                <div class="flex justify-end py-2">
                    {{$etudiants->links()}}
                </div>
                </div>

            
            </div>

            
            </div>
            
        </div>
    </div>
</div>
