<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Audio;
use App\Models\AudioCategory;

use Image;
use Illuminate\Support\Facades\File;

class AudioEdit extends Component
{
    use WithFileUploads;

    public $item;
    public $image;
    public $file;

    public $audio_category_id = null;
    public $name = null;
    public $description = null;

     public function mount($id)
    {
        $this->item = Audio::findOrFail($id);

        $this->audio_category_id = $this->item->audio_category_id;
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
                'newCategoryName' => 'required|string|max:255|unique:audio_categories,name',
                // Add validation rules for 'newCategoryNameKh' if needed
            ]);

            AudioCategory::create([
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

    public function updatedFile()
    {
        $this->validate([
            'file' => 'file|max:51200', // 2MB Max
        ]);

        session()->flash('success', 'File successfully uploaded!');
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
            'audio_category_id' => 'nullable',
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

            $image_path = public_path('assets/images/audios/' . $filename);
            $image_thumb_path = public_path('assets/images/audios/thumb/' . $filename);
            $imageUpload = Image::make($this->image->getRealPath())->save($image_path);
            $imageUpload->resize(400, null, function ($resize) {
                $resize->aspectRatio();
            })->save($image_thumb_path);
            $validated['image'] = $filename;

            $old_path = public_path('assets/images/audios/' . $this->item->image);
            $old_thumb_path = public_path('assets/images/audios/thumb/' . $this->item->image);
            if (File::exists($old_path)) {
                File::delete($old_path);
            }
            if (File::exists($old_thumb_path)) {
                File::delete($old_thumb_path);
            }
        }else {
            $validated['image'] = $this->item->image;
        }

        if (!empty($this->file)) {
            // $filename = time() . '_' . $this->file->getClientOriginalName();
            $filename = time() . str()->random(10) . '.' . $this->file->getClientOriginalExtension();
            $this->file->storeAs('/', $filename, 'publicForAudio');
            $validated['file'] = $filename;

            $old_file = public_path('assets/audios/' . $this->item->file);
            if (File::exists($old_file)) {
                File::delete($old_file);
            }
        }else {
            $validated['file'] = $this->item->file;
        }

        $this->item->update($validated);

        return redirect()->route('admin.audios.index')->with('success', 'Successfully updated!');
    }

    public function render()
    {
        $categories = AudioCategory::latest()->get();

        return view('livewire.audio-edit', [
            'categories' => $categories,
        ]);
    }
}
