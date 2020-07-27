<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = Usuario::where('perfil', '2')->get();
        return $doctor;
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
        // Verificamos si hay un file con nombre avatar
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $nombre_imagen = time() . "_" . $image->getClientOriginalName();
            $image->move('img/usuarios', $nombre_imagen);
            $imagenBD = $nombre_imagen;
        }
        else{
            $imagenBD = 'default.png';
        }
        $doctor = new Usuario();
        $doctor->nombre_usuario = $request->nombre_usuario;
        $doctor->apellido_usuario = $request->apellido_usuario;
        $doctor->direccion = $request->direccion;
        $doctor->telefono = $request->telefono;
        $doctor->sexo = $request->sexo;
        $doctor->email = $request->email;
        $doctor->usuario = $request->usuario;
        $doctor->contrasena = $request->contrasena;
        $doctor->foto = $imagenBD;
        $doctor->perfil = 2;
        $doctor->save();
        return $doctor;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Usuario::where('id','=',$id)->first();
        return $doctor;
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
        $doctor = Usuario::find($id);
        $doctor->nombre_usuario = $request->nombre_usuario;
        $doctor->apellido_usuario = $request->apellido_usuario;
        $doctor->direccion = $request->direccion;
        $doctor->telefono = $request->telefono;
        $doctor->sexo = $request->sexo;
        $doctor->email = $request->email;
        $doctor->usuario = $request->usuario;
        if (!empty($request->contrasena)) {
            $doctor->contrasena = $request->contrasena;
        }
        // Verificamos si hay un file con nombre avatar
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $nombre_imagen = time() . "_" . $image->getClientOriginalName();
            $image->move('img/usuarios', $nombre_imagen);
            $doctor->foto = $nombre_imagen;
        }
        $doctor->update();
        return $doctor;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Usuario::find($id);
        $doctor->delete();
    }
}
