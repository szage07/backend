<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Http\Controllers\Controller;
use App\Http\Requests\carouselItemRequest;


class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Carousel:: all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(carouselItemRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
 
        $carousel = Carousel::create($validated);
        return  $carousel;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Carousel::findOrFail($id);

         
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
        $carousel = Carousel::findOrFail($id);
 
        $carousel->delete();

        return  $carousel; 
    }
}
