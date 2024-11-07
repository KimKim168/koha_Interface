<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Gallery as Page;
use App\Models\GalleryPosition as PagePosition;

use Image;
use Illuminate\Support\Facades\File;

class GalleryEdit extends Component
{
    use WithFileUploads;

    public $item;
    public $image;
    public $pdf;

    public $position = null;
    public $name = null;
    public $link = null;
    public $short_description = null;
    public $description = null;
    public $order_index = null;

    public function mount($id)
    {
        $this->item = Page::findOrFail($id);

        $this->position = $this->item->position;
        $this->name = $this->item->name;
        $this->link = $this->item->link;
        $this->short_description = $this->item->short_description;
        $this->description = $this->item->description;
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
            'position' => 'required',
            'link' => 'nullable',
            'short_description' => 'nullable',
            'description' => 'nullable',
            'order_index' => 'nullable',
        ]);

        foreach ($validated as $key => $value) {
            if (is_null($value) || $value === '') {
                $validated[$key] = null;
            }
        }

        if (!empty($this->image)) {
            $filename = time() . '_' . $this->image->getClientOriginalName();

            $image_path = public_path('assets/images/gallery/' . $filename);
            $image_thumb_path = public_path('assets/images/gallery/thumb/' . $filename);
            $imageUpload = Image::make($this->image->getRealPath())->save($image_path);
            $imageUpload->resize(400, null, function ($resize) {
                $resize->aspectRatio();
            })->save($image_thumb_path);
            $validated['image'] = $filename;

            $old_path = public_path('assets/images/gallery/' . $this->item->image);
            $old_thumb_path = public_path('assets/images/gallery/thumb/' . $this->item->image);
            if (File::exists($old_path)) {
                File::delete($old_path);
            }
            if (File::exists($old_thumb_path)) {
                File::delete($old_thumb_path);
            }
        }else {
            $validated['image'] = $this->item->image;
        }

        if (!empty($this->pdf)) {
            $filename = time() . '_' . $this->pdf->getClientOriginalName();
            $this->pdf->storeAs('gallery', $filename, 'publicForPdf');
            $validated['pdf'] = $filename;

            $old_file = public_path('assets/pdf/gallery/' . $this->item->pdf);
            if (File::exists($old_file)) {
                File::delete($old_file);
            }
        }else {
            $validated['pdf'] = $this->item->pdf;
        }

        $this->item->update($validated);

        return redirect()->route('admin.gallery.index')->with('success', 'Successfully updated!');
    }

    public function render()
    {
        $positions = PagePosition::orderBy('name')->get();

        return view('livewire.gallery-edit', [
            'positions' => $positions,
        ]);
    }
}