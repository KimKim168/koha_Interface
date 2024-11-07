<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Page;
use App\Models\PagePosition;
use App\Models\Category;

use Image;
use Illuminate\Support\Facades\File;

class PageEdit extends Component
{
    use WithFileUploads;

    public $item;
    public $position;
    public $category_id = null;
    public $parent_id = null;
    public $name = null;
    public $name_kh = null;

    public $description = null;
    public $description_kh = null;
    public $order_index = null;

    public function mount($id)
    {
        $this->item = Page::findOrFail($id);

        // $this->position = $this->item->position;
        $this->name = $this->item->name;
        $this->name_kh = $this->item->name_kh;
        $this->description_kh = $this->item->description_kh;
        $this->description = $this->item->description;
        $this->category_id = $this->item->category_id;
        $this->parent_id = $this->item->parent_id;
        $this->order_index = $this->item->order_index;
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048', // 2MB Max
        ]);

        session()->flash('success', 'Image successfully uploaded!');
    }

    public function updatedPdf()
    {
        $this->validate([
            'pdf' => 'file|max:51200', // 2MB Max
        ]);

        session()->flash('success', 'file successfully uploaded!');
    }

    public function updated()
    {
        $this->dispatch('livewire:updated');
    }

    public function save()
    {
        $this->dispatch('livewire:updated');
        $validated = $this->validate([
           'name' => 'required|string|max:255',
            'name_kh' => 'required|string|max:255',

            'parent_id' => 'nullable',
            'category_id' => 'required',

            'description' => 'nullable',
            'description_kh' => 'nullable',
            'order_index' => 'nullable',
        ]);

        foreach ($validated as $key => $value) {
            if (is_null($value) || $value === '') {
                $validated[$key] = null;
            }
        }


        $this->item->update($validated);

        return redirect()->route('admin.pages.index')->with('success', 'Successfully updated!');
    }

    public function render()
    {
        $positions = PagePosition::latest()->get();

        $categories = Category::all();

        if($this->category_id){
            $pages = Page::where('category_id', $this->category_id)->get();
        }else {
            $pages = [];
        }
        return view('livewire.page-edit', [
            'positions' => $positions,
            'categories' => $categories,
            'pages' => $pages,
        ]);
    }
}
