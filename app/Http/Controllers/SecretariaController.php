<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\Hash;

class SecretariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = Usuario::where('perfil', '1')->get();
        $secretaria = array('data' => $sql);
        return $secretaria;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $secretaria = new Usuario();
        $secretaria->nombre_usuario = $request->nombre_usuario;
        $secretaria->apellido_usuario = $request->apellido_usuario;
        $secretaria->direccion = $request->direccion;
        $secretaria->telefono = $request->telefono;
        $secretaria->sexo = $request->sexo;
        $secretaria->email = $request->email;
        $secretaria->usuario = $request->usuario;
        $secretaria->password = Hash::make($request->password);
        $secretaria->foto = $imagenBD;
        $secretaria->perfil = 1;
        $secretaria->save();
        return $secretaria;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$secretaria = Usuario::find($id);
        $secretaria = Usuario::where('id','=',$id)->first();
        return $secretaria;
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
        $secretaria = Usuario::find($id);
        $secretaria->nombre_usuario = $request->nombre_usuario;
        $secretaria->apellido_usuario = $request->apellido_usuario;
        $secretaria->direccion = $request->direccion;
        $secretaria->telefono = $request->telefono;
        $secretaria->sexo = $request->sexo;
        $secretaria->email = $request->email;
        $secretaria->usuario = $request->usuario;
        if (!empty($request->password)) {
            $secretaria->password =  Hash::make($request->password);
        }
        // Verificamos si hay un file con nombre avatar
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $nombre_imagen = time() . "_" . $image->getClientOriginalName();
            $image->move('img/usuarios', $nombre_imagen);
            $secretaria->foto = $nombre_imagen;
        }
        $secretaria->update();
        return $secretaria;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $secretaria = Usuario::find($id);
        $secretaria->delete();
    }
}
