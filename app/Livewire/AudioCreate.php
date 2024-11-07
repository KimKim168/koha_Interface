<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Audio;
use App\Models\AudioCategory;

use Image as ImageClass;

class AudioCreate extends Component
{
    use WithFileUploads;

    public $image;
    public $file;

    public $audio_category_id = null;
    public $name = null;
    public $description = null;


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
            'image' => 'nullable|image|max:2048',
            'file' => 'required|file|max:51200',
            'audio_category_id' => 'nullable|exists:audio_categories,id',
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

            $audio_path = public_path('assets/images/audios/'.$filename);
            $audio_thumb_path = public_path('assets/images/audios/thumb/'.$filename);
            $imageUpload = ImageClass::make($this->image->getRealPath())->save($audio_path);
            $imageUpload->resize(400,null,function($resize){
                $resize->aspectRatio();
            })->save($audio_thumb_path);
            $validated['image'] = $filename;
        }

        if (!empty($this->file)) {
            // $filename = time() . '_' . $this->file->getClientOriginalName();
            $filename = time() . str()->random(10) . '.' . $this->file->getClientOriginalExtension();
            $this->file->storeAs('/', $filename, 'publicForAudio');
            $validated['file'] = $filename;
        }

        $createdImage = Audio::create($validated);

        return redirect()->route('admin.audios.index')->with('success', 'Successfully uploaded!');
    }

    public function render()
    {
        $categories = AudioCategory::latest()->get();
        return view('livewire.audio-create', [
            'categories' => $categories,
        ]);
    }
}
