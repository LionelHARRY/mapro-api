<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleCathegoriesResource;
use App\Models\ArticleCathegory;
use Illuminate\Http\Request;

class ArticleCathegoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ArticleCathegoriesResource::collection(ArticleCathegory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cathegory = ArticleCathegory::create($request->all());

        return new ArticleCathegoriesResource($cathegory);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleCathegory $cathegory)
    {
        return new ArticleCathegoriesResource($cathegory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleCathegory $cathegory)
    {
        $cathegory->update($request->all());

        return new ArticleCathegoriesResource($cathegory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleCathegory $cathegory)
    {
        $cathegory->delete();

        return response(null, 204);
    }
}
