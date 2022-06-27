<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;

class AddNews extends Component
{
    use WithFileUploads;

    public $title;
    public $cover;
    public $attach;
    public $type = 1;
    public $desc;

    public function render()
    {
        return view('livewire.admin.add-news');
    }


    public function rules()
    {
        return [
            'title' => 'required',
            'cover' => 'image|max:10240', //10 MB
            'attach.*' => 'mimes: pdf|max:10240', //10 MB
            'type' => 'required',

        ];
    }

    protected $messages = [
        'title.required' => "ກະລຸນາປ້ອນຫົວຂໍ້ຂ່າວ",
        'cover.required' => "ກະລຸນາອັບໂຫຼດຮູບພາບ",
        'cover.max' => "ຂະໜາດຮູບບໍ່ໃຫ້ເກີນ 10MB",
        'attach.required' => "ກະລຸນາອັບໂຫຼດໄຟລ໌ແນບ",
        'type.required' => "ກະລຸນາເລືອກປະເພດຂ່າວສານ",
    ];

    // Real-time validate
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store(){
        $this->validate();

        dd("Store");
    }
}
