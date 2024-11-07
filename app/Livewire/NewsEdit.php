<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\news;
use App\Models\newsCategory;

use Image;
use Illuminate\Support\Facades\File;

class NewsEdit extends Component
{
    use WithFileUploads;

    public $item;
    public $image;
    public $pdf;

    public $news_category_id = null;
    public $name = null;
    public $description = null;
    public $short_description = null;

    public function mount($id)
    {
        $this->item = news::findOrFail($id);

        $this->news_category_id = $this->item->news_category_id;
        $this->name = $this->item->name;
        $this->description = $this->item->description;
        $this->short_description = $this->item->short_description;
    }

    // ==========Add New Category============
    public $newCategoryName = null;
    public $newCategoryNameKh = null;

    public function saveNewCategory()
    {
        try {
            $this->validate([
                'newCategoryName' => 'required|string|max:255|unique:news_categories,name',
                // Add validation rules for 'newCategoryNameKh' if needed
            ]);

            newsCategory::create([
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
            'news_category_id' => 'nullable',
            'description' => 'nullable',
            'short_description' => 'nullable',
        ]);

        foreach ($validated as $key => $value) {
            if (is_null($value) || $value === '') {
                $validated[$key] = null;
            }
        }

        if (!empty($this->image)) {
            $filename = time() . '_' . $this->image->getClientOriginalName();

            $image_path = public_path('assets/images/news/' . $filename);
            $image_thumb_path = public_path('assets/images/news/thumb/' . $filename);
            $imageUpload = Image::make($this->image->getRealPath())->save($image_path);
            $imageUpload->resize(400, null, function ($resize) {
                $resize->aspectRatio();
            })->save($image_thumb_path);
            $validated['image'] = $filename;

            $old_path = public_path('assets/images/news/' . $this->item->image);
            $old_thumb_path = public_path('assets/images/news/thumb/' . $this->item->image);
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
            $this->pdf->storeAs('news', $filename, 'publicForPdf');
            $validated['pdf'] = $filename;

            $old_file = public_path('assets/pdf/news/' . $this->item->pdf);
            if (File::exists($old_file)) {
                File::delete($old_file);
            }
        }else {
            $validated['pdf'] = $this->item->pdf;
        }

        $this->item->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'Successfully updated!');
    }

    public function render()
    {
        $categories = newsCategory::latest()->get();

        return view('livewire.news-edit', [
            'categories' => $categories,
        ]);
    }
}