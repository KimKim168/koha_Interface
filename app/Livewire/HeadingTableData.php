<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Heading;
use App\Models\HeadingPosition;
use Illuminate\Support\Facades\File;

class HeadingTableData extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $perPage = 10;

    #[Url(history: true)]
    public $filter = 0;

    #[Url(history: true)]
    public $sortBy = 'position';

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

    // ResetPage when updated search
    public function updatedSearch() {
        $this->resetPage();
    }

    public function delete($id) {
        $item = Heading::findOrFail($id);
        $item->delete();

        session()->flash('success', 'Delete Successfully!');
    }

    public function render(){

        $items = Heading::where(function($query){
                                $query->where('name', 'LIKE', "%$this->search%")
                                    ->orWhere('short_description', 'LIKE', "%$this->search%");
                            })
                            ->when($this->filter != 0, function($query){
                                $query->where('position', $this->filter);
                            })
                            ->orderBy($this->sortBy, $this->sortDir)
                            ->paginate($this->perPage);
        $categories = HeadingPosition::orderBy('name')->get();
        $selectedCategory = HeadingPosition::find($this->filter);

        return view('livewire.heading-table-data', [
            'items' => $items,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
        ]);
    }
}