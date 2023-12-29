<?php

namespace App\Http\Livewire;


use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class UserList extends Component
{
    public function render()
    {
        return view('livewire.user-list', [
            'users' => User::orderBy('created_at', 'DESC')->paginate(100),

        ]);
    }
}
