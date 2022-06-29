<?php

namespace App\Http\Livewire\Mainnews;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class MainnewsIndex extends Component
{
    use WithPagination;

    public bool $isLoading = false;

    public function initLoading()
    {
        $this->isLoading = true;
    }
    public function render()
    {
        return view('livewire.mainnews.mainnews-index', [
            'news' => $this->isLoading ? News::with('auth')->where('type_id', 2)->orderBy('id', 'desc')->paginate(6) : new News(),
        ]);
    }
}
