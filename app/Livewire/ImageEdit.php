<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image;
use App\Models\ImageCategory;

use Image as ImageClass;
use Illuminate\Support\Facades\File;

class ImageEdit extends Component
{
    use WithFileUploads;

    public $item;
    public $image;

    public $image_category_id = null;
    public $name = null;
    public $description = null;

    public function mount($id)
    {
        $this->item = Image::findOrFail($id);

        $this->image_category_id = $this->item->image_category_id;
        $this->name = $this->item->name;
        $this->description = $this->item->description;
    }

    // ==========Add New Category============
    public $newCategoryName = null;
    public $newCategoryNameKh = null;

    public function saveNewCategory()
    {
        try {
            $this->validate([
                'newCategoryName' => 'required|string|max:255|unique:image_categories,name',
                // Add validation rules for 'newCategoryNameKh' if needed
            ]);

            ImageCategory::create([
                'name' => $this->newCategoryName,
                'name_kh' => $this->newCategoryNameKh,
            ]);

            session()->flash('success', 'Add New Category successfully!');

            $this->reset(['newCategoryName', 'newCategoryNameKh']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('error', $e->validator->errors()->all());
        }
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
            'image_category_id' => 'nullable',
            'description' => 'nullable',
        ]);

        foreach ($validated as $key => $value) {
            if (is_null($value) || $value === '') {
                $validated[$key] = null;
            }
        }

        if (!empty($this->image)) {
            // $filename = time() . '_' . $this->image->getClientOriginalName();
            $filename = time() . str()->random(10) . '.' . $this->image->getClientOriginalExtension();

            $image_path = public_path('assets/images/images/' . $filename);
            $image_thumb_path = public_path('assets/images/images/thumb/' . $filename);
            $imageUpload = ImageClass::make($this->image->getRealPath())->save($image_path);
            $imageUpload->resize(400, null, function ($resize) {
                $resize->aspectRatio();
            })->save($image_thumb_path);

            $validated['image'] = $filename;

            $old_path = public_path('assets/images/images/' . $this->item->image);
            $old_thumb_path = public_path('assets/images/images/thumb/' . $this->item->image);
            if (File::exists($old_path)) {
                File::delete($old_path);
            }
            if (File::exists($old_thumb_path)) {
                File::delete($old_thumb_path);
            }
        }

        $this->item->update($validated);

        return redirect()->route('admin.images.index')->with('success', 'Successfully updated!');
    }

    public function render()
    {
        $categories = ImageCategory::latest()->get();

        return view('livewire.image-edit', [
            'categories' => $categories,
        ]);
    }
}
