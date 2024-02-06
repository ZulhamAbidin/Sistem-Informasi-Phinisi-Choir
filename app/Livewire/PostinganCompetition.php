<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Postingan;
use Livewire\WithPagination;

class PostinganCompetition extends Component
{
    public $search = '';

    use WithPagination;

    protected $listeners = ['triggerSearch' => 'updatingSearch'];

    public function render()
{
    $postingans = Postingan::where('kategori', 'competition')
                            ->where(function ($query) {
                                $query->where('judul_postingan', 'like', '%'.$this->search.'%')
                                      ->orWhere('deskripsi', 'like', '%'.$this->search.'%')
                                      ->orWhere('lokasi', 'like', '%'.$this->search.'%')
                                      ->orWhere('sumber', 'like', '%'.$this->search.'%')
                                      ->orWhere('highlights', 'like', '%'.$this->search.'%');
                            })
                            ->paginate(4);
    return view('livewire.postingan-competition', ['postingans' => $postingans]);
}


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function triggerSearch()
    {
        $this->updatingSearch();
    }

    public function paginationView()
    {
        return 'livewire.custom-pagination-links'; // This is the custom pagination view
    }
}
