<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Part;
use App\Models\Car;
use App\Http\Requests\PartFormRequest;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('part.index', [
            'parts' => Part::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('part.create',[
            'car_ids' => Car::pluck('id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartFormRequest $request)
    {
        if (Part::create($request->validated())) return redirect()->route('parts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Part $part)
    {
        return view('part.create', [
            'part' => $part,
            'car_ids' => Car::pluck('id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartFormRequest $request, Part $part)
    {
        if ($part->update($request->validated())) return redirect()->route('parts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Part $part)
    {
        if (Part::destroy($part->id)) return redirect()->route('parts.index');
    }

    public function search($str)
    {
        return response(Part::search($str));
    }
}
