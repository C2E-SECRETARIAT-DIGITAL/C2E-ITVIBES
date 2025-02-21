<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Excel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-5 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                
                <div class="grid p-4 md:grid-cols-8 ">

                    <div class="px-8 w-96 text-center md:col-span-3">
                        <img src="{{asset('img/itvibeslogo.png')}}" class="w-96 h-64 md:h-96 md:w-96" alt="ItVibes">
                    </div>

                    <div class="text-center md:col-span-5 mt-12">
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
                                            <p class="text-sm text-gray-600 dark:text-gray-200">
                                            {{$message}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        @endif 

                        @if ($message = Session::get('error'))
                        <div class="flex justify-center py-4">
                                
                                <div
                                    class="flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                                
                                    <div class="flex items-center justify-center w-12 bg-red-500">
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
                                            <span class="font-bold text-red-500 dark:text-red-400"
                                            >IT-Vibes </span
                                            >
                                            <p class="text-sm text-gray-600 dark:text-gray-200">
                                            {{$message}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        @endif

                        @if ($message = Session::get('Warning'))
                            <div class="flex justify-center py-4">
                                
                                <div
                                    class="flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                                
                                    <div class="flex items-center justify-center w-12 bg-amber-500">
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
                                            <span class="font-bold text-amber-500 dark:text-amber-400"
                                            >IT-VIBES </span
                                            >
                                            <p class="text-sm text-gray-600 dark:text-gray-200">
                                            {{$message}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        @endif

                        <div class="flex items-center justify-center md:h-32">

                            <form style="" action="{{ route('importExcel',null,false) }}" class="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="file" class="text-xs md:text-xl" name="import_file" />
                                @error('import_file')
                                      <div class="font-semibold text-center text-red-600">{{ $errors->first('import_file') }}  </div>
                                @enderror

                                <button class="px-4 py-2 mt-5 font-bold text-white bg-gray-600 rounded-md"> Importer(xlsx) </button>
                            </form>
                        </div>

                        <div class="items-center justify-center gap-4 md:flex ">

                            <a href="{{ route('exportExcel', 'xlsx', false) }}">
                                <button class="px-4 py-2 mt-5 font-bold text-white bg-green-600 rounded-md">Exporter Excel xlsx</button>
                            </a>
                            <a href="{{ route('exportExcel', 'csv', false) }}">
                                <button class="px-4 py-2 mt-5 font-bold text-white bg-green-600 rounded-md">Exporter CSV</button>
                            </a>
                            <form id="viderForm" style="" action="{{ route('delete.allStudent',null,false) }}" class="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <button class="px-4 py-2 mt-5 font-bold text-white bg-red-600 rounded-md"> Vider la liste </button>
                            </form>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    </div>

    <script>

        let viderForm = document.querySelector('#viderForm');

        viderForm.addEventListener("submit", function(e){

            e.preventDefault();

            result = confirm("Voulez vous vraiment vider la liste des étudiants ?");

            if(result){

                result = confirm("Vraiment ???");

                if (result){
                    e.target.submit();
                }
            }

        });

    </script>
</x-app-layout>
