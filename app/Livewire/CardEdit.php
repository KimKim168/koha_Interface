<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Card;
use App\Models\CardPosition;

use Image;
use Illuminate\Support\Facades\File;

class CardEdit extends Component
{
    use WithFileUploads;

    public $item;
    public $image;

    public $position = null;
    public $name = null;
    public $short_description = null;
    public $order_index = 0;

    public function mount($id)
    {
        $this->item = Card::findOrFail($id);

        $this->position = $this->item->position;
        $this->name = $this->item->name;
        $this->short_description = $this->item->short_description;
        $this->order_index = $this->item->order_index;
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048', // 2MB Max
        ]);

        session()->flash('success', 'Image successfully uploaded!');
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
            'order_index' => 'nullable',
        ]);

        foreach ($validated as $key => $value) {
            if (is_null($value) || $value === '') {
                $validated[$key] = null;
            }
        }

        if (!empty($this->image)) {
            $filename = time() . '_' . $this->image->getClientOriginalName();

            $image_path = public_path('assets/images/pages/' . $filename);
            $image_thumb_path = public_path('assets/images/pages/thumb/' . $filename);
            $imageUpload = Image::make($this->image->getRealPath())->save($image_path);
            $imageUpload->resize(400, null, function ($resize) {
                $resize->aspectRatio();
            })->save($image_thumb_path);
            $validated['image'] = $filename;

            $old_path = public_path('assets/images/pages/' . $this->item->image);
            $old_thumb_path = public_path('assets/images/pages/thumb/' . $this->item->image);
            if (File::exists($old_path)) {
                File::delete($old_path);
            }
            if (File::exists($old_thumb_path)) {
                File::delete($old_thumb_path);
            }
        }else {
            $validated['image'] = $this->item->image;
        }

        $this->item->update($validated);

        return redirect()->route('admin.cards.index')->with('success', 'Successfully updated!');
    }

    public function render()
    {
        $positions = CardPosition::latest()->get();

        return view('livewire.card-edit', [
            'positions' => $positions,
        ]);
    }
}
