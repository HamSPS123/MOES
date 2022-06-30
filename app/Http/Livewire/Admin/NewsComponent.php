<?php

namespace App\Http\Livewire\Admin;

use App\Models\News;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class NewsComponent extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $deleteId;
    public $search = '';


    public function render()
    {
        return view('livewire.admin.news-component',[
            'post' => News::query()
            ->with('type')
            ->with('auth')
            ->where('title', 'like', '%'. $this->search . '%')
            ->paginate(10)
        ]);
    }

    public function checkDelete($id){
        $this->alert('info', 'ຄຳຖາມ', [
            'position' => 'center',
            'timer' => '',
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'confirmDelete',
            'confirmButtonText' => 'ຕົກລົງ',
            'showCancelButton' => true,
            'onDismissed' => '',
            'cancelButtonText' => 'ຍົກເລີກ',
            'text' => 'ທ່ານຕ້ອງການລົບເນື້ອຫາຂ່າວນີ້ ຫຼື ບໍ່?',
           ]);

           $this->deleteId = $id;
    }

    public function getListeners(){
        return [
            'confirmDelete'
        ];
    }

    public function confirmDelete(){
        try {
            $img = News::find($this->deleteId);

            $coverPath = public_path('storage/uploads/'.$img->cover);

            if(file_exists($coverPath)){
                unlink($coverPath);
            }

            $attachPath = public_path('storage/uploads/'.$img->attach_file);

            if(file_exists($attachPath)){
                unlink($attachPath);
            }


            $content = $img->description;
            $dom = new \DOMDocument();
            $dom->loadHTML('<?xml encoding="UTF-8">'.$content);

            $images = $dom->getElementsByTagName('img');

            foreach($images as $img){
                $data = $img->getattribute('src');

                $imgPath = public_path($data);

                if(file_exists($imgPath)){
                    unlink($imgPath);
                }
            }

            News::find($this->deleteId)->delete();


            $this->alert('success', 'ລືບຂໍ້ມູນສຳເລັດ', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
               ]);
        } catch (\Throwable $th) {
            $this->alert('error', 'ເກີດຂໍ້ຜິດພາດ ກະລຸນາລອງໃໝ່!!!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
               ]);
        }
    }

}
