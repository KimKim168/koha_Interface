<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\news;
use App\Models\newsImage;
use App\Models\newsCategory;
use Illuminate\Support\Facades\File;

class NewsTableData extends Component
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
        $item = news::findOrFail($id);

        if($item->image !== 'image.png') {
            $imagePathThumb = public_path('assets/images/news/thumb/' . $item->image);
            $imagePath = public_path('assets/images/news/' . $item->image);
            // Delete the image file from the filesystem
            if (File::exists($imagePathThumb)) {
                File::delete($imagePathThumb);
            }
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        if($item->pdf) {
            $filePath = public_path('assets/pdf/news/' . $item->pdf);
            // Delete the image file from the filesystem
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $multiImages = newsImage::where('news_id', $item->id)->get();
        if($multiImages){
            foreach($multiImages as $image) {
                $imagePathThumb = public_path('assets/images/news/thumb/' . $image->image);
                $imagePath = public_path('assets/images/news/' . $image->image);
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

        $items = news::where(function($query){
                                $query->where('name', 'LIKE', "%$this->search%")
                                    ->orWhere('description', 'LIKE', "%$this->search%");
                            })
                            ->when($this->filter != 0, function($query){
                                $query->where('news_category_id', $this->filter);
                            })
                            ->orderBy($this->sortBy, $this->sortDir)
                            ->paginate($this->perPage);
        $categories = newsCategory::latest()->get();
        $selectedCategory = newsCategory::find($this->filter);

        return view('livewire.news-table-data', [
            'items' => $items,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
        ]);
    }
}