<?php

namespace App\Http\Livewire\Admin;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddNews extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public News $news;

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
            'attach.*' => 'mimes: jpg,jpeg,png,pdf|max:51200', //50 MB
            'type' => 'required',

        ];
    }

    protected $messages = [
        'title.required' => "ກະລຸນາປ້ອນຫົວຂໍ້ຂ່າວ",
        'cover.required' => "ກະລຸນາອັບໂຫຼດຮູບພາບ",
        'cover.max' => "ຂະໜາດຮູບບໍ່ໃຫ້ເກີນ 10MB",
        'attach.required' => "ກະລຸນາອັບໂຫຼດໄຟລ໌ແນບ",
        'attach.mimes' => "ກະລຸນາເລືອກໄຟລ໌ນາມສະກຸນ *.jpg,*.jpeg,*.png,*.pdf ເທົ່ານັ້ນ",
        'attach.max' => "ຂະໜາດໄຟລ໌ບໍ່ໃຫ້ເກີນ 50MB",
        'type.required' => "ກະລຸນາເລືອກປະເພດຂ່າວສານ",
    ];

    // Real-time validate
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $this->validate();

        try {
            $news = new News();

            $news->title = $this->title;
            $news->type_id = $this->type;
            $news->description = $this->desc;

            //cover upload
            $photoFileName = $this->cover->hashName();
            $this->cover->storeAs('news-cover',$photoFileName, 'public');
            $news->cover = $photoFileName;

            //attach file upload
            $attachFileName = $this->attach->hashName();
            $this->attach->storeAs('news-attach', $attachFileName, 'public');
            $news->attach_file = $attachFileName;

            $news->user_id = Auth::user()->id;

            $news->save();

            $this->title='';
            $this->cover='';
            $this->attach='';
            $this->desc='';

            $this->alert('success', 'ເພີ່ມຂໍ້ມູນສຳເລັດ', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => '',
                'confirmButtonText' => 'ຕົກລົງ',
                'timerProgressBar' => true,
            ]);



        } catch (\Throwable $th) {
            $this->alert('error', 'ການເພີ່ມຂໍ້ມູນເກີດຂໍ້ຜິດພາດ ກະລຸນາລອງໃໝ່!!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => false,
                'showConfirmButton' => true,
                'onConfirmed' => function(){
                    return redirect()->route('admin.news');
                },
                'confirmButtonText' => 'ຕົກລົງ',
                'timerProgressBar' => true,
                'text' => $th,
            ]);
        }
    }
}
