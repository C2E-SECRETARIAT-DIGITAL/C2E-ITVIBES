<div>
    <div>

        <p>
            Liste 
        </p>

         
    </div>
    <div class="py-4">
        <div class="">

            <div class="flex flex-col w-full">
            <div class="w-full -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block w-full min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="w-full border-b border-gray-200 shadow overflow-x sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-800">
                    <thead class="bg-gray-100 ">
                        <tr>
                        
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Pseudo
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Rôle
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Action
                        </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 ">
                        @foreach ($users as $key => $user)
                        <tr class="items-center">
                            
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                
                                    <div class="ml-4">
                                        <div class="text-sm font-extrabold text-gray-900">
                                            {{$user->email}} 
                                        </div>
                                        
                                    </div>
                                </div>
                            </td>

                            
                            <td class="px-6 py-4 font-normal whitespace-nowrap">
                                {{$user->name}} 
                            </td>

                            <td class="px-6 py-4 font-normal whitespace-nowrap">
                                {{$user->role_name}} 
                            </td>


                            <td class="items-center">
                                @if (
                                    ($user->role_name != 'Administrateur' || $user->email != 'ephremfrancketou@gmail.com') && ($user->role_name != 'Administrateur' || $user->email != 'angeemmanuelassamoi@gmail.com'))
                                    <form id="supUser" style="" action="{{ route('delete.user', $user->id, false) }}" class="items-center" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <button class="px-3 py-2 mt-0 font-bold text-white bg-red-600 rounded-md"> Supprimer </button>  
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
            
                        
                    </tbody>
                    </table>
                    
                </div>
                </div>

            
            </div>

            
            </div>
            
        </div>
    </div>
</div>
<script>

        let viderForm = document.querySelector('#supUser');

        viderForm.addEventListener("submit", function(e){

            e.preventDefault();

            result = confirm("Voulez vous vraiment supprimer l'utilisateur ?");

            if(result){

                result = confirm("Vraiment ???");

                if (result){
                    e.target.submit();
                }
            }

        });

    </script>