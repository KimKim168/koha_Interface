<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Slide;
use App\Models\SlidePosition;

class SlideTableData extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';
    public $positions = '';

    #[Url(history: true)]
    public $perPage = 10;
    
    #[Url(history: true)]
    public $filter = 0;

    #[Url(history: true)]
    public $sortBy = 'order_index';

    #[Url(history: true)]
    public $sortDir = 'ASC';

    public function setFilter($value) {
        $this->filter = $value;
        $this->resetPage();
    }

    public function setSortBy($newsortBy) {
        if($this->sortBy == $newsortBy){
            $newsortDir = ($this->sortDir == 'DESC') ? 'ASC' : 'DESC';
            $this->sortDir = $newsortDir;
        }else{
            $this->sortBy = $newsortBy;
        }
    }
    public function delete($id) {
        $item = Slide::findOrFail($id);
        $item->delete();

        session()->flash('success', 'Successfully deleted!');
    }

    // ResetPage when updated search
    public function updatedSearch() {
        $this->resetPage();
    }

    public function render(){

        $items = Slide::where(function($query){
                                $query->where('name', 'LIKE', "%$this->search%");
                            })
                            ->when($this->filter != 0, function($query){
                                $query->where('position', $this->filter);
                            })
                            ->orderBy($this->sortBy, $this->sortDir)
                            ->paginate($this->perPage);
        $categories = SlidePosition::orderBy('name')->get();
        $selectedCategory = SlidePosition::find($this->filter);

        return view('livewire.slide-table-data', [
            'items' => $items,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
        ]);
    }
}