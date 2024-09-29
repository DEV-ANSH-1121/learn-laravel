<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    public $userSearch;
    public $sortCol = 'id';
    public $sortDir = 'desc';

    public function sortUserList($col, $dir)
    {
        $this->sortCol = $col;
        $this->sortDir = $dir;
    }

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->userSearch . '%')
            ->orderBy($this->sortCol, $this->sortDir)
            ->paginate(10);
        return view('livewire.admin.user.user-list', compact('users'));
    }
}
