<?php

namespace App\Http\Livewire\Admin;

use App\Models\News;
use App\Models\User;
use Livewire\Component;

class AdminIndex extends Component
{

    public $totalUsers;
    public $totalNews;
    public $male;
    public $female;
    public $type_1;
    public $type_2;

    public function mount(){
        $total_u = User::all();
        $this->totalUsers = $total_u->count();

        $this->male = User::where('gender', 'ຊາຍ')->get();
        $this->female = User::where('gender', 'ຍິງ')->get();


        $this->totalNews = News::query()->get();
        $this->type_1 = News::where('type_id', 1)->get();
        $this->type_2 = News::where('type_id', 2)->get();
    }
    public function render()
    {
        return view('livewire.admin.admin-index');
    }
}
