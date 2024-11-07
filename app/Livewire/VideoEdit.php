<?php

namespace App\Livewire;

use App\Models\VideosPosition;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Video;
use App\Models\VideoCategory;

use Image;
use Storage;
use Illuminate\Support\Facades\File;

class VideoEdit extends Component
{
    use WithFileUploads;

    public $item;
    public $image;
    public $file;

    public $video_category_id = null;

    public $name = null;
    public $position = null;
    public $duration = null;
    public $link = null;
    public $description = null;

    public function mount($id)
    {
        $this->item = Video::findOrFail($id);

        $this->video_category_id = $this->item->video_category_id;
        $this->position = $this->item->position;
        $this->name = $this->item->name;
        $this->duration = $this->item->duration;
        $this->link = $this->item->link;
        $this->description = $this->item->description;
    }

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
            'duration' => 'nullable',
            'position' => 'required',
            'link' => 'nullable|string|max:255',
            'video_category_id' => 'nullable',
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

            $image_path = public_path('assets/images/videos/' . $filename);
            $image_thumb_path = public_path('assets/images/videos/thumb/' . $filename);
            $imageUpload = Image::make($this->image->getRealPath())->save($image_path, 70);
            $imageUpload->resize(400, null, function ($resize) {
                $resize->aspectRatio();
            })->save($image_thumb_path, 70);
            $validated['image'] = $filename;

            $old_path = public_path('assets/images/videos/' . $this->item->image);
            $old_thumb_path = public_path('assets/images/videos/thumb/' . $this->item->image);
            if (File::exists($old_path)) {
                File::delete($old_path);
            }
            if (File::exists($old_thumb_path)) {
                File::delete($old_thumb_path);
            }
        } else {
            $validated['image'] = $this->item->image;
        }

        if (!empty($this->file)) {
            // $filename = time() . '_' . $this->file->getClientOriginalName();
            // Define the directory path (root directory in this case)
            $directory = '';

            // Check if the directory exists, if not, create it
            if (!Storage::disk('publicForVideo')->exists($directory)) {
                Storage::disk('publicForVideo')->makeDirectory($directory);
            }

            // Generate a unique filename
            $filename = time() . str()->random(10) . '.' . $this->file->getClientOriginalExtension();

            // Store the file
            $this->file->storeAs($directory, $filename, 'publicForVideo');

            // Save the filename to the validated array
            $validated['file'] = $filename;

            $old_file = public_path('assets/videos/' . $this->item->file);
            if (File::exists($old_file)) {
                File::delete($old_file);
            }
        } else {
            $validated['file'] = $this->item->file;
        }

        $this->item->update($validated);

        return redirect()->route('admin.videos.index')->with('success', 'Successfully updated!');
    }


    public function render()
    {
        $positions = VideosPosition::orderBy('name')->get();

        return view('livewire.video-edit', [
            'positions' => $positions,
        ]);
    }
}