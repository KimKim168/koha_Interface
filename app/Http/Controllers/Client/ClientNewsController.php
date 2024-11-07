<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\news;
use App\Models\newsImage;

class ClientnewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.news.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         // Find the main news item
         $item = news::findOrFail($id);

         // Retrieve images related to the news
         $multi_images = newsImage::where('news_id', $id)
                                         ->latest()
                                         ->get();

         // Retrieve related newss excluding the item itself
         $related_items = news::where(function($query) use ($item) {
             $query->where('news_category_id', $item->news_category_id);
         })->where('id', '!=', $item->id) // Exclude the item itself
         ->inRandomOrder()
        ->limit(6)
         ->get();

         // Return the view with the data
         return view('client.news.show', [
             'item' => $item,
             'multi_images' => $multi_images,
             'related_items' => $related_items,
         ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
