<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Publication;
use App\Models\PublicationImage;
use App\Models\PublicationCategory;

class ClientPublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('client.publications.index');
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
        // Find the main publication item
        $item = Publication::findOrFail($id);

        // Retrieve images related to the publication
        $multi_images = PublicationImage::where('publication_id', $id)
                                        ->latest()
                                        ->get();

        // Retrieve related publications excluding the item itself
        $related_items = Publication::where(function($query) use ($item) {
            $query->where('publication_category_id', $item->publication_category_id);
        })->where('id', '!=', $item->id) // Exclude the item itself
        ->inRandomOrder()
        ->limit(6)
        ->get();

        // Return the view with the data
        return view('client.publications.show', [
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
