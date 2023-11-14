<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use DataTables;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(books::query())
                ->addIndexColumn() 
                ->toJson();
        }
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
    public function store(BookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BookRequest $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookRequest $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, books $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(books $books)
    {
        //
    }
}
