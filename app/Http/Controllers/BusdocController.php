<?php

namespace App\Http\Controllers;

use App\Models\busdoc;
use Illuminate\Http\Request;
use App\Models\Bus;


class BusdocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buss = Bus::all();
        $busdocs = busdoc::all();
        return view('busdocs.index',compact('busdocs','buss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buss = Bus::all();
        $busdocs = busdoc::all();
        return view('busdocs.add',compact('busdocs','buss'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new busdoc([

            'bus_id' => $request->get('bus_id')

        ]);
        $file = $request->file('pdf');
        $name = $file->getClientOriginalName();
        $file->move(public_path() . '/documents/', $name);
        $data->pdf = $name;
        
        $data->save();
        return redirect('/busdocs')->with('success', 'Fichier a été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\busdoc  $busdoc
     * @return \Illuminate\Http\Response
     */
    public function show(busdoc $busdoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\busdoc  $busdoc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        $buss = Bus::all();
        $busdocs = busdoc::find($id);
        return view('busdocs.edit', compact('busdocs','buss'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\busdoc  $busdoc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $busdocs = busdoc::findOrFail($id);
        if ($request->has('pdf')) {
            $file = $request->file('pdf');
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/documents/', $name);
            $busdocs->pdf = $name;
        }
        $busdocs->bus_id = $request->bus_id;
        $busdocs->update();
        return redirect('/busdocs')->with('success', 'Success de mise a jour des donnée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\busdoc  $busdoc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $busdocs = busdoc::find($id);
        $busdocs->delete();
        return redirect()->back()->with('danger', 'Fichier supprimer');
    }
}
