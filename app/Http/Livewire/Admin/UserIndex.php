<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use PDO;

class UserIndex extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $index = 10;
    public $selectAll = false;
    public $selected = [];
    public $search = '';
    // public $users;
    public User $user;
    public $modal;
    public $updateModal;

    public $updateId;
    public $deleteId;

    //variable for submit form

    public $code;
    public $name;
    public $gender;
    public $dob;
    public $telephone;
    public $email;
    public $pwd;
    public $address;

    // delete multiple
    protected $listeners = ['deleteCheckedUsers'];

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function resetForm()
    {
        $this->code = "";
        $this->name = "";
        $this->gender = "";
        $this->dob = "";
        $this->telephone = "";
        $this->email = "";
        $this->pwd = "";
        $this->address = "";
    }

    public function rules()
    {
        return [
            'code' => 'required|min:4|max:10|unique:users,code,' . $this->updateId,
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:20',
            'email' => 'required|email|unique:users,email,' . $this->updateId, //['required', 'email', 'unique:users,'.$this->user->id]
            'pwd' => 'required|min:8',
            'address' => 'required',
        ];
    }

    // Real-time validate
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Edit meassage
    protected $messages = [
        'code.required' => 'ກະລຸນາປ້ອນລະຫັດຜູ້ໃຊ້.',
        'code.min' => 'ກະລຸນາປ້ອນຢ່າງໜ້ອຍ 4 ຕົວອັນສອນ.',
        'code.max' => 'ກະລຸນາປ້ອນບໍ່ເກີນ 10 ຕົວອັນສອນ.',
        'code.unique' => 'ລະຫັດຜູ້ໃຊ້ນີ້ມີແລ້ວກະລຸນາປ້ອນລະຫັດໃໝ່.',
        'name.required' => 'ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້.',
        'gender.required' => 'ກະລຸນາເລືອກເພດຂອງຜູ້ໃຊ້.',
        'dob.required' => 'ກະລຸນາເລືອກວັນເດືອນປີເກີດ.',
        'telephone.required' => 'ກະລຸນາປ້ອນເບີໂທ.',
        'telephone.regex' => 'ກະລຸນາປ້ອນສະເພາະຕົວເລກ.',
        'telephone.min' => 'ກະລຸນາປ້ອນຢ່າງໜ້ອຍ 10 ຕົວເລກ.',
        'telephone.max' => 'ກະລຸນາປ້ອນບໍ່ເກີນ 20 ຕົວເລກ.',
        'email.required' => 'ກະລຸນາປ້ອນອີເມວ.',
        'email.email' => 'ຮູບແບບອີເມວບໍ່ຖືກຕ້ອງ.',
        'email.unique' => 'ອີເມວນີ້ມີຢູ່ແລ້ວ ກະລຸນາລອງໃໝ່.',
        'pwd.required' => 'ກະລຸນາປ້ອນລະຫັດຜ່ານ.',
        'pwd.min' => 'ກະລຸນາປ້ອນລະຫັດຜ່ານຢ່າງນ້ອຍ 8 ໂຕຂື້ນໄປ.',
        'address.required' => 'ກະລຸນາປ້ອນທີ່ຢູ່.',
    ];

    public function getUsersProperty()
    {
        return $this->user::query()
            ->where('code', 'like', '%' . $this->search . '%')
            ->orwhere('name', 'like', '%' . $this->search . '%')
            ->orwhere('email', 'like', '%' . $this->search . '%')
            ->orderby('id', 'desc')
            ->paginate($this->index);
    }


    public function render()
    {

        return view('livewire.admin.user-index', [
            'users' => $this->getUsersProperty()
        ]);
    }

    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selected = $this->getUsersProperty()->pluck('id');
        } else {
            $this->selected = [];
        }
    }

    public function store()
    {
        $this->validate();


        try {

            $user = new User();
            $user->code = $this->code;
            $user->name = $this->name;
            $user->gender = $this->gender;
            $user->dob = $this->dob;
            $user->telephone = $this->telephone;
            $user->email = $this->email;
            $user->password = Hash::make($this->pwd);
            $user->address = $this->address;

            $user->save();

            $this->resetForm();

            $this->modal = false;

            $this->alert('success', 'ການເພີ່ມຂໍ້ມູນສຳເລັດ!!!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'text' => '',
            ]);
        } catch (\Throwable $th) {
            $this->alert('error', 'ການເພີ່ມຂໍ້ມູນເກີດຂໍ້ຜິດພາດ ກະລຸນາລອງໃໝ່!!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'text' => '',
            ]);
        }
    }

    public function checkUpdate($id)
    {
        $this->updateId = $id;

        $this->updateModal = true;

        $user = $this->user::find($id);

        $this->code = $user->code;
        $this->name = $user->name;
        $this->gender = $user->gender;
        $this->dob = $user->dob->format('Y-m-d');
        $this->telephone = $user->telephone;
        $this->email = $user->email;
        $this->address = $user->address;
        $this->pwd = $user->password;
    }

    public function updateUser()
    {
        $this->validate();

        try {

            // dd('Update');
            User::find($this->updateId)->update([
                'code' => $this->code,
                'name' => $this->name,
                'gender' => $this->gender,
                'dob' => $this->dob,
                'telephone' => $this->telephone,
                'email' => $this->email,
                'address' => $this->address,
            ]);

            $this->resetForm();

            $this->updateModal = false;

            $this->alert('success', 'ການແກ້ໄຂຂໍ້ມູນສຳເລັດ!!!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'text' => '',
            ]);
        } catch (\Throwable $th) {
            $this->alert('error', 'ການແກ້ໄຂຂໍ້ມູນເກີດຂໍ້ຜິດພາດ ກະລຸນາລອງໃໝ່!!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'text' => $th,
            ]);
        }
    }

    public function checkDelete($id)
    {
        $this->deleteId = $id;

        $this->alert('info', 'ຕ້ອງການລືບຜູ້ໃຊ້ ' . $id . ' ຫຼື ບໍ່', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'confirmDel',
            'showDenyButton' => false,
            'onDenied' => '',
            'showCancelButton' => true,
            'onDismissed' => '',
            'cancelButtonText' => 'ຍົກເລີກ',
            'confirmButtonText' => 'ຕົກລົງ',
        ]);
    }

    public function confirmDel()
    {
        try {
            if ($this->deleteId != null) {
                User::find($this->deleteId)->delete();

                $this->alert('success', 'ການລືບຂໍ້ມູນສຳເລັດ!!!', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                    'timerProgressBar' => true,
                    'text' => '',
                ]);
            }
        } catch (\Throwable $th) {
            $this->alert('error', 'ການລືບຂໍ້ມູນເກີດຂໍ້ຜິດພາດ ກະລຸນາລອງໃໝ່!!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'text' => $th,
            ]);
        }
    }

    public function getListeners()
    {
        return [
            'confirmDel'
        ];
    }

    public function deleteUsers()
    {
        try {
            User::query()
                ->whereIn('id', $this->selected)
                ->delete();
            $this->selected = [];
            $this->selectAll = false;

            $this->alert('success', 'ການລືບຂໍ້ມູນສຳເລັດ!!!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'text' => '',
            ]);
        } catch (\Throwable $th) {
            $this->alert('error', 'ການລືບຂໍ້ມູນເກີດຂໍ້ຜິດພາດ', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
                'text' => '',
            ]);
        }
    }
}
