<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Card;
use App\Models\CardPosition;

use Image as ImageClass;

class CardCreate extends Component
{
    use WithFileUploads;

    public $image;

    public $position = null;
    public $name = null;
    public $short_description = null;
    public $order_index = 0;

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
            'image' => 'nullable|image|max:2048',
            'position' => 'required',
            'short_description' => 'nullable',
            'order_index' => 'nullable',
        ]);

        $validated['create_by_user_id'] = request()->user()->id;

        foreach ($validated as $key => $value) {
            if (is_null($value) || $value === '') {
                $validated[$key] = null;
            }
        }

        if(!empty($this->image)){
            // $filename = time() . '_' . $this->image->getClientOriginalName();
            $filename = time() . str()->random(10) . '.' . $this->image->getClientOriginalExtension();

            $pages_path = public_path('assets/images/cards/'.$filename);
            $pages_thumb_path = public_path('assets/images/cards/thumb/'.$filename);
            $imageUpload = ImageClass::make($this->image->getRealPath())->save($pages_path);
            $imageUpload->resize(512,null,function($resize){
                $resize->aspectRatio();
            })->save($pages_thumb_path);
            $validated['image'] = $filename;
        }

        Card::create($validated);

        return redirect()->route('admin.cards.index')->with('success', 'Successfully uploaded!');
    }

    public function render()
    {
        $positions = CardPosition::latest()->get();

        return view('livewire.card-create', [
            'positions' => $positions,
        ]);
    }
}
