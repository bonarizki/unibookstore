<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublisherRequest;
use App\Http\Requests\UpdatePulisherRequest;
use App\Models\publisher;
use Illuminate\Http\Request;
use DataTables;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::eloquent(publisher::query())
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
    public function store(PublisherRequest $request)
    {
        publisher::create($request->all());

        return response()->json([
            "status" => "success",
            "message" => "Penerbit Berhasil Ditambahkan"
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(publisher $publisher)
    {
        return response()->json([
            "status" => "success",
            "data" => $publisher
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePulisherRequest $request, string $id)
    {
        publisher::find($id)
            ->update($request->all());

        return response()->json([
            "status" => "success",
            "message" => "Penerbit Berhasil di Update"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        publisher::find($id)
            ->delete();

        return response()->json([
            "status" => "success",
            "message" => "Penerbit Berhasil di Hapus"
        ], 200);
    }
}
