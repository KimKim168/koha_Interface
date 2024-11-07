<?php

namespace App\Livewire;

use App\Models\VideosPosition;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Video;
use App\Models\VideoCategory;

use Image;

class VideoCreate extends Component
{
    use WithFileUploads;

    public $image;
    public $file;

    public $video_category_id = null;

    public $name = null;
    public $position = null;
    public $duration = null;
    public $link = null;
    public $description = null;

    // ==========Add New Category============
    public $newCategoryName = null;
    public $newCategoryNameKh = null;

    public function saveNewCategory()
    {
        try {
            $this->validate([
                'newCategoryName' => 'required|string|max:255|unique:video_categories,name',
                // Add validation rules for 'newCategoryNameKh' if needed
            ]);

            VideoCategory::create([
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
            'image' => 'required|image|max:2048',
            'file' => 'nullable|file|max:20480',
            'position' => 'required',
            'duration' => 'nullable',
            'link' => 'nullable|string|max:255',
            'video_category_id' => 'nullable|exists:video_categories,id',
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

            $image_path = public_path('assets/images/videos/'.$filename);
            $image_thumb_path = public_path('assets/images/videos/thumb/'.$filename);
            $imageUpload = Image::make($this->image->getRealPath())->save($image_path);
            $imageUpload->resize(400,null,function($resize){
                $resize->aspectRatio();
            })->save($image_thumb_path);
            $validated['image'] = $filename;
        }

        if (!empty($this->file)) {
            // $filename = time() . '_' . $this->file->getClientOriginalName();
            $filename = time() . str()->random(10) . '.' . $this->file->getClientOriginalExtension();
            $this->file->storeAs('videos', $filename, 'publicForPdf');
            $validated['file'] = $filename;
        }

        $createdVideo = Video::create($validated);

        // dd($createdVideo);
        return redirect()->route('admin.videos.index')->with('success', 'Successfully uploaded!');

        // session()->flash('message', 'Image successfully uploaded!');
    }

    public function render()
    {
        $positions = VideosPosition::orderBy('name')->get();
       
        return view('livewire.video-create', [
            'positions' => $positions,
        ]);
    }
}