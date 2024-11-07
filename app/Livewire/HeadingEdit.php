<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Heading;
use App\Models\HeadingPosition;

use Image;
use Illuminate\Support\Facades\File;

class HeadingEdit extends Component
{
    use WithFileUploads;

    public $item;

    public $position = null;
    public $name = null;
    public $short_description = null;

    public function mount($id)
    {
        $this->item = Heading::findOrFail($id);

        $this->position = $this->item->position;
        $this->name = $this->item->name;
        $this->short_description = $this->item->short_description;
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
            'position' => 'required',
            'short_description' => 'nullable',
        ]);

        foreach ($validated as $key => $value) {
            if (is_null($value) || $value === '') {
                $validated[$key] = null;
            }
        }

        $this->item->update($validated);

        return redirect()->route('admin.headings.index')->with('success', 'Successfully updated!');
    }

    public function render()
    {
        $positions = HeadingPosition::latest()->get();

        return view('livewire.heading-edit', [
            'positions' => $positions,
        ]);
    }
}
