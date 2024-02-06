<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Postingan;
use Livewire\WithPagination;

class PostinganTable extends Component
{
    public $search = '';
    public $executionTime = 0;
    public $totalPostingan = 0; 

    use WithPagination;

    protected $listeners = ['triggerSearch' => 'updatingSearch'];

    public function mount()
    {
        $this->totalPostingan = Postingan::count();
    }

    public function render()
    {
        $start = microtime(true); 

        $postingans = Postingan::where('judul_postingan', 'like', '%'.$this->search.'%')
                                ->orWhere('kategori', 'like', '%'.$this->search.'%')
                                ->orWhere('deskripsi', 'like', '%'.$this->search.'%')
                                ->orWhere('lokasi', 'like', '%'.$this->search.'%')
                                ->orWhere('sumber', 'like', '%'.$this->search.'%')
                                ->orWhere('highlights', 'like', '%'.$this->search.'%')
                                ->paginate(4);

        $end = microtime(true); 
        $executionTime = round($end - $start, 5); 

        $this->executionTime = $executionTime;

        return view('livewire.postingan-table', [
            'postingans' => $postingans,
            'totalPostingan' => $this->totalPostingan, 
        ]);
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
        return 'livewire.custom-pagination-links'; 
    }
}
