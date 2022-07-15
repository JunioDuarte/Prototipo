<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = \DB::select("SELECT * FROM properties");

        return view('property/index')->with('properties', $properties);
    }
    public function create()
    {
        return view('property/create');
    }
    public function store(Request $request)
    {
        echo $request->title;
        echo $request->description;
        echo $request->rental_price;
        echo $request->sale_price;
        var_dump($request);


        $property = [
            $request->title,
            $request->description,
            $request->rental_price,
            $request->sale_price
        ];


        \DB::insert("INSET INTO properties (title, description, rental_price, sale_price) values
                    (?, ?, ?, ?)", $property);


    }
}
