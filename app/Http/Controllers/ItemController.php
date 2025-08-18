<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Items::all(); // Fetch all data from the items table
        return view('items', compact('items'));
        // Make sure your view file is: resources/views/items.blade.php
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
        // resources/views/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Items::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'description' => $request->description,
            'quantity'    => $request->quantity,
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        return redirect()->route('items');
        // Make sure you defined a route name "items" in web.php
    }

    /**
     * Display the specified resource.
     */
    public function show(Items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function delete($id)
    {
        Items::destroy($id); // DELETE FROM `items` WHERE `id` = $id
        return redirect()->route('items');
    }
    public function edit($id)
    {
        $item = Items::find($id); // SELECT * FROM items WHERE id = $id
        return view('edit', compact('item'));
        // resources/views/edit.blade.php
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Items::where('id', $id)->update([
            'name'        => $request->name,
            'price'       => $request->price,
            'description' => $request->description,
            'quantity'    => $request->quantity,
            'updated_at'  => now(),
        ]);

        return redirect()->route('items');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Items::destroy($id);
        return redirect()->route('items');
    }

    /**
     * Custom view for showing a single item (not using resource show()).
     */
    public function view($id)
    {
        $item = Items::find($id); // SELECT * FROM items WHERE id = $id
        return view('view', compact('item'));
        // resources/views/item_view.blade.php
    }
}
