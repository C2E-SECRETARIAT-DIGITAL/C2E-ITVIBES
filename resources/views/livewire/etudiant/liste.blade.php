<div>
    <div>
        @if($routeName == "liste.student")
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
        @else
        <div class="col-span-6 mt-6 text-xl font-bold text-center md:col-span-2 ">
            <p>
            {{$etudiant_non_entree}} participant(s) / 200
            </p>
        </div>
        @endif
         
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
                            Tombola
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Nom et prenom
                        </th>
                        @if ($routeName == "liste.student")
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Statut
                        </th>
                        @else
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Email
                        </th>
                        @endif
                        @if ($routeName == "create.student")
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Actions
                        </th>
                        @endif
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($etudiants as $key => $etudiant)
                        <tr>
                            <td class="px-6 py-4 font-normal whitespace-nowrap">
                                {{$etudiant->matricule}} 
                            </td>
                            <td class="px-6 py-4 font-normal whitespace-nowrap">
                                No-{{$etudiant->tombola < 10 ? '00'.$etudiant->tombola : ($etudiant->tombola < 100 ? '0'.$etudiant->tombola : $etudiant->tombola)}} 
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-670">{{$etudiant->nom}}</div>
                                <div class="text-sm font-semibold text-gray-500">{{$etudiant->prenoms}}</div>
                            </td>

            
                            @if ($routeName == "liste.student")
                            <td class="px-6 py-4 whitespace-nowrap ">
                            
                                <div>

                                    <div class="ml-3">
                                        @if(!$etudiant->entree) 
                                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"  viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#000000" > <path d="M580 2565 l0 -2555 190 0 190 0 0 2370 0 2370 1253 -1 c688 0 1248 -2 1242 -4 -5 -2 -307 -56 -670 -120 -363 -63 -684 -120 -713 -126 l-52 -10 2 -1997 3 -1996 985 -243 c542 -133 995 -245 1008 -248 l22 -5 0 365 0 365 60 0 60 0 0 -365 0 -365 190 0 190 0 0 2560 0 2560 -1980 0 -1980 0 0 -2555z m3580 1950 l0 -235 -60 0 -60 0 0 235 0 235 60 0 60 0 0 -235z m0 -2005 l0 -1200 -60 0 -60 0 0 1200 0 1200 60 0 60 0 0 -1200z m-1713 108 c55 -50 72 -164 36 -235 -75 -144 -243 -73 -243 103 0 51 36 122 74 146 40 24 98 19 133 -14z"/> </g> </svg>
                                        @else
                                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6"  viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)" fill="#008000	" > <path d="M580 2565 l0 -2555 190 0 190 0 0 2370 0 2370 1253 -1 c688 0 1248 -2 1242 -4 -5 -2 -307 -56 -670 -120 -363 -63 -684 -120 -713 -126 l-52 -10 2 -1997 3 -1996 985 -243 c542 -133 995 -245 1008 -248 l22 -5 0 365 0 365 60 0 60 0 0 -365 0 -365 190 0 190 0 0 2560 0 2560 -1980 0 -1980 0 0 -2555z m3580 1950 l0 -235 -60 0 -60 0 0 235 0 235 60 0 60 0 0 -235z m0 -2005 l0 -1200 -60 0 -60 0 0 1200 0 1200 60 0 60 0 0 -1200z m-1713 108 c55 -50 72 -164 36 -235 -75 -144 -243 -73 -243 103 0 51 36 122 74 146 40 24 98 19 133 -14z"/> </g> </svg>
                                        @endif
                                    </div>                                   

                                </div>
                            </td>
                            @else
                            <td class="px-6 py-4 font-normal whitespace-nowrap">
                                {{$etudiant->email}} 
                            </td>
                            @endif

                            @if ($routeName == "create.student")
                            <td class="flex justify-center px-6 py-6 text-sm font-medium whitespace-nowrap">
                            <form id="delForm" action="{{route('delete.etudiant', $etudiant->id, false)}}" class="flex justify-center text-sm font-medium whitespace-nowrap">
                                
                                <a href="#" onclick="window.location='{{route('get.ticket', $etudiant->id, false)}}'" class="px-2 cursor-pointer text-cyan-900 ">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                </a>
                                <a href="#" onclick="window.location='{{route('ticket.send', $etudiant->id, false)}}'" class="px-2 cursor-pointer text-cyan-900 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" /></svg>
                                </a>
                                @if(auth()->user()->role_name == 'Administrateur')
                                    <a href="#" id="delIcon" class="px-2 cursor-pointer text-cyan-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                    </a>
                                </form>
                                @endif
                            </td>
                            @endif
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

<script>

    
    let delIcon = document.querySelector('#delIcon');
    delIcon.addEventListener("click", function(e){

        // e.preventDefault();

        result = confirm("Voulez vous vraiment supprimer cet étudiant ?");

        if(result){

            result = confirm("Vraiment ???");

            if (result){
                const delForm = document.querySelector('#delForm');
                delForm.submit();
            }
        }

    });

</script>
