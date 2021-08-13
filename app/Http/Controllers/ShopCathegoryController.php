<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShopCathegoriesResource;
use App\Models\ShopCathegory;
use Illuminate\Http\Request;

class ShopCathegoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ShopCathegoriesResource::collection(ShopCathegory::all());
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
        $shopCathegory = ShopCathegory::create($request->all());

        return new ShopCathegoriesResource($shopCathegory);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ShopCathegoriesResource(ShopCathegory::findOrFail($id));
    }

    public function shopsByCathegory($id)
    {
        return ShopCathegory::find($id)->shops();
        // return ['test'];
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
    public function update(Request $request, $id)
    {
        $shopCathegory = ShopCathegory::findOrFail($id);
        $shopCathegory->update($request->all());

        return new ShopCathegoriesResource($shopCathegory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shopCathegory = ShopCathegory::findOrFail($id);
        $shopCathegory->delete();

        return response(null, 204);
    }
}
