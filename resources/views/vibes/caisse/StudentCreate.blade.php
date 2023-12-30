<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Enregistrement Etudiants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            
            <div class="flex justify-between">

                <div class="px-4 py-4 mx:px-12 ">
                    <span class="text-base font-bold md:text-2xl md:px-6">Vibes-Ticket</span>
                </div>

                @if ($message = Session::get('success'))
                    <div class="flex justify-center py-4">
                        
                        <div
                            class="flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <div class="flex items-center justify-center w-12 bg-green-500">
                                <svg
                                class="w-6 h-6 text-white fill-current"
                                viewBox="0 0 40 40"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <path
                                    d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"
                                />
                                </svg>
                            </div>
                    
                            <div class="px-4 py-2 -mx-3">
                                <div class="mx-3">
                                    <span class="font-bold text-green-500 dark:text-green-400"
                                    >IT-VIBES </span
                                    >
                                    <p class="text-xs text-gray-600 md:text-sm dark:text-gray-200">
                                    {{$message}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                @endif

            </div>
            
            

            

            <div class="mt- md:mt-0 md:col-span-2">
                
                <form action="{{route('store.student',null,false)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                      <div class="grid grid-cols-6 gap-6">
                         <div class="col-span-6 md:col-span-2 sm:col-span-3">
                            <label for="matricule" class="block text-sm font-medium text-gray-700">Matricule</label>
                            <input type="text" name="matricule" id="matricule" value="{{old('matricule')}}" autocomplete="matricule" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('matricule')
                           <div class="font-semibold text-center text-red-600">{{ $errors->first('matricule') }}  </div>
                          @enderror
                          </div>
            
                          <div class="col-span-6 md:col-span-2 sm:col-span-3">
                            <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" name="nom" id="nom" autocomplete="nom" value="{{old('nom')}}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('nom')
                           <div class="font-semibold text-center text-red-600">{{ $errors->first('nom') }}  </div>
                          @enderror
                          </div>
            
                          <div class="col-span-6 md:col-span-2 sm:col-span-4">
                            <label for="prenoms" class="block text-sm font-medium text-gray-700">Prenoms</label>
                            <input type="text" name="prenoms" id="prenoms" autocomplete="prenoms" value="{{old('prenoms')}}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('prenoms')
                             <div class="font-semibold text-center text-red-600">{{ $errors->first('prenoms') }}  </div>
                            @enderror
                          </div>
                       
                          <div class="col-span-6 md:col-span-2 sm:col-span-3">
                            <label for="filiere" class="block text-sm font-medium text-gray-700">Filier ou Niveau </label>
                            <input type="text" name="filiere" id="filiere" autocomplete="filiere" value="{{old('filiere')}}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('filiere')
                             <div class="font-semibold text-center text-red-600">{{ $errors->first('filiere') }}  </div>
                            @enderror
                          </div>
          
                          <div class="col-span-6 md:col-span-2 sm:col-span-3">
                            <label for="email" class="block text-sm font-medium text-gray-700">Adresse Email</label>
                            <input type="text" name="email" id="email" autocomplete="email" value="{{old('email')}}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('email')
                             <div class="font-semibold text-center text-red-600">{{ $errors->first('email') }}  </div>
                            @enderror
                          </div>

                          <div class="col-span-6 md:col-span-2 sm:col-span-3">
                            <label for="contacts" class="block text-sm font-medium text-gray-700">contact</label>
                            <input type="tel" name="contacts" id="contacts" autocomplete="contacts" value="{{old('contacts')}}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('contacts')
                             <div class="font-semibold text-center text-red-600">{{ $errors->first('contacts') }}  </div>
                            @enderror
                          </div>
          
                          <div class="col-span-6">
                            
                
                            <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
                                <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Enregistrer
                                </button>
                            </div>
                        </div>
                </form>

              </div>

              <div class="font-bold md:col-span-4">
                    @livewire('etudiant.liste')    
              </div>
              
            </div>
        </div>
    </div>
</x-app-layout>
