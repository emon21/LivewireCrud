<?php

namespace App\Livewire;

use App\Models\UserList;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{
   
    public $userName;
    use WithPagination;

    public function UserCreate(){

        #validation
        $this->validate([
            'userName' => 'required|min:5'
        ]);

        UserList::create([
            'userName' => $this->userName
        ]);

        session()->flash('success', 'Post successfully updated.');
        // request()->session()->flash('success',"User Created");
       
        //form input clear
        $this->reset(['userName']);

    }
    public function render()
    {
        $AllUser = UserList::latest()->paginate(6);
        return view('livewire.user-component',compact('AllUser'));
    }
}
