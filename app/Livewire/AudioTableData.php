<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Audio;
use App\Models\AudioImage;
use App\Models\AudioCategory;

use Illuminate\Support\Facades\File;

class AudioTableData extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $perPage = 10;

    #[Url(history: true)]
    public $filter = 0;

    #[Url(history: true)]
    public $sortBy = 'created_at';

    #[Url(history: true)]
    public $sortDir = 'DESC';

    public function setFilter($value) {
        $this->filter = $value;
        $this->resetPage();
    }

    public function setSortBy($newsortBy) {
        if($this->sortBy == $newsortBy){
            $newsortDir = ($this->sortDir == 'DESC') ? 'ASC' : 'DESC';
            $this->sortDir = $newsortDir;
        }else{
            $this->sortBy = $newsortBy;
        }
    }

    // ResetPage when updated search
    public function updatedSearch() {
        $this->resetPage();
    }

    public function delete($id) {
        $item = Audio::findOrFail($id);

        if($item->image !== 'image.png') {
            $imagePathThumb = public_path('assets/images/audios/thumb/' . $item->image);
            $imagePath = public_path('assets/images/audios/' . $item->image);
            // Delete the image file from the filesystem
            if (File::exists($imagePathThumb)) {
                File::delete($imagePathThumb);
            }
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        if($item->file) {
            $filePath = public_path('assets/audios/' . $item->file);
            // Delete the image file from the filesystem
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $multiImages = AudioImage::where('audio_id', $item->id)->get();
        if($multiImages){
            foreach($multiImages as $image) {
                $imagePathThumb = public_path('assets/images/audios/thumb/' . $image->image);
                $imagePath = public_path('assets/images/audios/' . $image->image);
                // Delete the image file from the filesystem
                if (File::exists($imagePathThumb)) {
                    File::delete($imagePathThumb);
                }
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
                }
            }
        }

        $item->delete();

        session()->flash('success', 'Delete Successfully!');
    }

    public function render(){

        $items = Audio::where(function($query){
                                $query->where('name', 'LIKE', "%$this->search%")
                                    ->orWhere('description', 'LIKE', "%$this->search%");
                            })
                            ->when($this->filter != 0, function($query){
                                $query->where('audio_category_id', $this->filter);
                            })
                            ->orderBy($this->sortBy, $this->sortDir)
                            ->paginate($this->perPage);
        $categories = AudioCategory::latest()->get();
        $selectedCategory = AudioCategory::find($this->filter);

        return view('livewire.audio-table-data', [
            'items' => $items,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
        ]);
    }
}
