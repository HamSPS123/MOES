<?php

namespace App\Http\Livewire\Main;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class MainIndex extends Component
{
    use WithPagination;

    public bool $isLoading = false;

    public function initLoading()
    {
        $this->isLoading = true;
    }

    public function render()
    {
        return view('livewire.main.main-index', [
            'news' => $this->isLoading ? News::with('auth')->where('type_id', 1)->orderBy('id', 'desc')->paginate(6) : new News(),
        ]);
    }
}
