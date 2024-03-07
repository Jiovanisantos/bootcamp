<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Http\Request;

class ChirpController extends Controller
{

    public function index()
    {

        return view('chirps.index',[
            'chirps' => Chirp::with('user')->latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation
         $datos = $request->validate([
            'message' => ['required', 'min:5', 'max:255']
        ]);

        //insert into base de datos
        $request->user()->relacion()->create($datos);

        //session()->flash('status', 'Chirp Created, Successfully!!!');
        return to_route('chirps.index')->with('status', __('Chirp Created, Successfully!!!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        $this->authorize('update',$chirp);
        //verifica si el usuario es diferente al chirp que lo creo
       /* if (auth()->user()->isNot($chirp->user)){
            abort(403);
        }*/
        return view('chirps.edit',[
            'chirp' => $chirp
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update',$chirp);
        //verifica si el usuario es diferente al chirp que lo creo
       /* if (auth()->user()->isNot($chirp->user)){
            abort(403);
        }*/
        //validation
         $datos = $request->validate([
            'message' => ['required', 'min:5', 'max:255']
        ]);

        $chirp->update($datos);
        return to_route('chirps.index')->with('status', __('Chirp Updated, Successfully!!!'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete',$chirp);

        $chirp->delete();

        return to_route('chirps.index')->with('status', __('Chirp Deleted, Successfully!!!'));

    }
}
