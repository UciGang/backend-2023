<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $animals = [
        ["name" => "Sapi"],
        ["name" => "Ayam"],
        ["name" => "Kambing"],
    ];
    public function index()
    {
        // show animals
        foreach ($this->animals as $hewan) {
            # code...
            echo "$hewan[name] <br>";
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // add animals
        array_push($this->animals, $request);
        $this->index();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // update animals
        $this->animals[$id] = $request;
        $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // remove animals
        unset($this->animals[$id]);
        $this->index();
    }
}
