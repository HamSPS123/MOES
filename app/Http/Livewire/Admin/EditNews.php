<?php

namespace App\Http\Livewire\Admin;

use App\Models\News;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditNews extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $news_id;
    public $title;
    public $cover;
    public $attach;
    public $desc;
    public $type;

    //update image
    public $updateCover;
    public $updateAttach;
    public $checkContent;

    // File exention
    public $ext;

    //delete image
    public $deleteImg;

    public function mount($id)
    {
        $news = News::find($id);

        $this->news_id = $news->id;
        $this->title = $news->title;
        $this->cover = $news->cover;
        $this->attach = $news->attach_file;
        $this->desc = $news->description;
        $this->type = $news->type_id;

        $this->checkContent = $news->description;

        $this->ext = pathinfo($this->attach, PATHINFO_EXTENSION);
    }

    public function render()
    {
        return view('livewire.admin.edit-news');
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'updateCover' => 'image|max:10240', //10 MB
            'updateAttach.*' => 'mimes: jpg,jpeg,png,pdf|max:51200', //50 MB
            'type' => 'required',
            'desc' => 'required',
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
        'desc.required' => "ກະລຸນາເນື້ອຫາຂ່າວ",
    ];

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'desc' => 'required',
            'type' => 'required',
        ]);

        // try {


        // } catch (\Throwable $th) {
        //     $this->alert('error', 'ບໍ່ສາມາດແກ້ໄຂຂໍ້ມູນໄດ້ ກະລຸນາລອງໃໝ່!!!', [
        //         'position' => 'top-end',
        //         'timer' => 3000,
        //         'toast' => true,
        //         'timerProgressBar' => true,
        //         'text' => $th,
        //     ]);
        // }

        if ($this->updateCover != null) {
            $newsCover = $this->updateCover->hashName();
            $this->updateCover->storeAs('uploads', $newsCover, 'public');

            $this->updateCover = $newsCover;
            // Unlink Old cover
            $imgPath = public_path('storage/uploads/' . $this->cover);
            if (file_exists($imgPath)) {
                unlink($imgPath);
            }
        } else {
            $this->updateCover = $this->cover;
        }

        if ($this->updateAttach != null) {
            $newsAttach = $this->updateAttach->hashName();
            $this->updateAttach->storeAs('uploads', $newsAttach, 'public');

            $this->updateAttach = $newsAttach;
            // Unlink Old attach
            $attachPath = public_path('storage/uploads/' . $this->attach);
            if (file_exists($attachPath)) {
                unlink($attachPath);
            }
        } else {
            $this->updateAttach = $this->attach;
        }

        if($this->desc != $this->checkContent){
            // Save Content Dom
            $content = $this->desc;
            $dom = new \DOMDocument();
            $dom->loadHTML('<?xml encoding="UTF-8">' . $content);

            $images = $dom->getElementsByTagName('img');

            foreach ($images as $k => $img) {
                $data = $img->getattribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);

                $data = base64_decode($data);

                $image_name = "/uploads/" . time() . $k . '.png';

                $path = public_path() . $image_name;

                file_put_contents($path, $data);

                $img->removeattribute('src');
                $img->setattribute('src', $image_name);
            }

            $this->desc = $dom->saveHTML();
        }

        News::find($this->news_id)->update([
            'title' => $this->title,
            'description' => $this->desc,
            'cover' => $this->updateCover,
            'attach_file' => $this->updateAttach,
            'type_id' => $this->type
        ]);

        $this->alert('success', 'ແກ້ໄຂຂໍ້ມູນສຳເລັດ', [
            'position' => 'center',
            'timer' => null,
            'toast' => false,
            'timerProgressBar' => true,
            'showConfirmButton' => true,
            'onConfirmed' => 'returnRoute',
            'confirmButtonText' => 'ຕົກລົງ',

        ]);


    }

    public function returnRoute()
    {
        return redirect()->route('admin.news');
    }

    public function getListeners()
    {
        return [
            'returnRoute',
        ];
    }
}
