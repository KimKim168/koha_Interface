<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\CustomerSubmit;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;

class CustomerSubmitTableData extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $perPage = 10;
    #[Url(history: true)]
    public $name = null;

    #[Url(history: true)]
    public $filter = '';

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';
    

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
        $this->dispatch('livewire:updated');
        $this->resetPage();

    }
    public function updatingPage(){
        $this->dispatch('livewire:updated');
    }


    public function delete($id) {
        $CustomerSubmit = CustomerSubmit::findOrFail($id);
        $CustomerSubmit->delete();

        session()->flash('success', 'Delete Successfully!');
    }

    public function render(){

        $items = CustomerSubmit::where(function($query) {
                            $query->where('full_name', 'LIKE', "%{$this->search}%")
                                ->orWhere('gender', 'LIKE', "%{$this->search}%")
                                ->orWhere('phone_number', 'LIKE', "%{$this->search}%")
                                ->orWhere('location', 'LIKE', "%{$this->search}%");
                        })
                        
                        ->orderBy($this->sortBy, $this->sortDir)
                        ->paginate($this->perPage);


        return view('livewire.customer-submit-table-data', [
            'items' => $items,
            
        ]);
    }
}