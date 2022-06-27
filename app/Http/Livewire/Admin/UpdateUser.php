<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UpdateUser extends Component
{
    public User $users;
    public $name;
    public $email;
    public $photo;

    public $disabled = "disabled";

    public $updateId;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.admin.update-user');
    }

    public function confirmUpdate($id){
        $this->updateId = $id;

        $user = User::find($id);

        $this->name = $user->name;
        $this->email = $user->email;

        $this->disabled = "enabled";
    }

    public function update(){

    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => ['required', 'email'],
        ];
    }
    // Real-time validate
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Edit meassage
    protected $messages = [
        'name.required' => 'ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້.',
        'email.required' => 'ກະລຸນາປ້ອນອີເມວ.',
        'email.email' => 'ຮູບແບບອີເມວບໍ່ຖືກຕ້ອງ.',
    ];
}
