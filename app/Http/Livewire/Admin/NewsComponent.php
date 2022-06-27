<?php

namespace App\Http\Livewire\Admin;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class NewsComponent extends Component
{
    use WithPagination;

    public $modal = false;


    public function render()
    {
        return view('livewire.admin.news-component',[
            'post' => News::query()
            ->with('type')
            ->with('auth')
            ->paginate(10)
        ]);
    }

    public function confirmInsert(){
        $this->modal = true;
    }
}
