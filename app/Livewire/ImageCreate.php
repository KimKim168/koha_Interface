<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image;
use App\Models\ImageCategory;

use Image as ImageClass;

class ImageCreate extends Component
{
    use WithFileUploads;

    public $image;

    public $image_category_id = null;
    public $name = null;
    public $description = null;

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
            'image' => 'required|image|max:2048',
            'image_category_id' => 'nullable|exists:image_categories,id',
            'description' => 'nullable',
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

            $image_path = public_path('assets/images/images/'.$filename);
            $image_thumb_path = public_path('assets/images/images/thumb/'.$filename);
            $imageUpload = ImageClass::make($this->image->getRealPath())->save($image_path);
            $imageUpload->resize(400,null,function($resize){
                $resize->aspectRatio();
            })->save($image_thumb_path);
            $validated['image'] = $filename;
        }

        $createdImage = Image::create($validated);
        return redirect()->route('admin.images.index')->with('success', 'Successfully uploaded!');
    }

    public function render()
    {
        $categories = ImageCategory::latest()->get();

        return view('livewire.image-create', [
            'categories' => $categories,
        ]);
    }
}
