<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CustomerSubmit;
use Illuminate\Http\Request;

class CustomerSubmitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        // dd($types, $shopId);
        return view('admin.customer_submit.index', [
          
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validatedData = $request->validate([
           'full_name' => 'required|max:255',
            'gender' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'location' => 'required|max:255',
        ]);

        CustomerSubmit::create($validatedData);

        return redirect('/customer_joinded#focus')->with('status', 'Add type Successful');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        // Type::destroy($id);
        // return redirect()->back()->with('status', 'Delete Successful');
    }
}