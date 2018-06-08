<?php

namespace Holdingglobe\Http\Controllers\Api;

use Illuminate\Http\Request;
use Holdingglobe\Models\Property;
use Holdingglobe\Http\Controllers\Controller;

class PropertyController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();

        return response()->json($properties);
    }
}
