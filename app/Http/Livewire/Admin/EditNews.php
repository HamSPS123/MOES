<?php

namespace App\Http\Livewire\Admin;

use App\Models\News;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class EditNews extends Component
{
    use LivewireAlert;

    public $news_id;
    public $title;
    public $cover;
    public $attach;
    public $desc;

    // File exention
    public $ext;

    //delete image
    public $deleteImg;

    public function mount($id){
        $news = News::find($id);

        $this->news_id = $news->id;
        $this->title = $news->title;
        $this->cover = $news->cover;
        $this->attach = $news->attach_file;
        $this->desc = $news->description;

        $this->ext = pathinfo($this->attach, PATHINFO_EXTENSION);

    }

    public function render()
    {
        return view('livewire.admin.edit-news');
    }

    public function update(){

    }

    public function checkDelete($id)
    {
        $this->deleteImg = $id;

        $this->alert('info', 'ຕ້ອງການລົບຮູບ ຫຼື ບໍ່?', [
            'position' => 'center',
            'timer' => '3000',
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => 'confirmDel',
            'showDenyButton' => false,
            'onDenied' => '',
            'denyButtonText' => 'ຍົກເລີກ',
            'confirmButtonText' => 'ຕົກລົງ',
            'text' => '',
            'showCancelButton' => true,
            'onDismissed' => '',
            'cancelButtonText' => 'ຍົກເລີກ',
           ]);
    }

    public function confirmDel(){

        try {
            $this->alert('success', 'Hello!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
               ]);
        } catch (\Throwable $th) {
            $this->alert('error', 'Hello!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
               ]);
        }

    }
}
