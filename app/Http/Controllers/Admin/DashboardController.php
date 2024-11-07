<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Carbon\Carbon;
use DB;

use App\Models\Publication;
use App\Models\Video;
use App\Models\Image;
use App\Models\Audio;
use App\Models\news;
use App\Models\Thesis;
use App\Models\Journal;
use App\Models\Article;
use App\Models\User;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Database;


class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view dashboard', ['only' => ['index', 'show']]);
        // $this->middleware('permission:create dashboard', ['only' => ['create', 'store']]);
        // $this->middleware('permission:update dashboard', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete dashboard', ['only' => ['destroy']]);
    }

    public function index()
    {
        return redirect('admin/users');
        return view('admin.dashboard.index');
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
        //
    }
}