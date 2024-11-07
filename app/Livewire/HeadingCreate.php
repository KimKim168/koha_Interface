<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Heading;
use App\Models\HeadingPosition;

use Image as ImageClass;

class HeadingCreate extends Component
{
    use WithFileUploads;

    public $position = null;
    public $name = null;
    public $short_description = null;

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

        $validated['create_by_user_id'] = request()->user()->id;

        foreach ($validated as $key => $value) {
            if (is_null($value) || $value === '') {
                $validated[$key] = null;
            }
        }

        $createdImage = Heading::create($validated);

        return redirect()->route('admin.headings.index')->with('success', 'Successfully uploaded!');
    }

    public function render()
    {
        $positions = HeadingPosition::orderBy('name')->get();

        return view('livewire.heading-create', [
            'positions' => $positions,
        ]);
    }
}