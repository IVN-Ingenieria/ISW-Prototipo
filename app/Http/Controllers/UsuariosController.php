<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\CrearUsuarioRequest;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Muestra todos los usuarios
     *
     * @return Response
     */
    public function index()
    {
        $usuarios = Usuario::all();

        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Muestra formulario para crear nuevo usuario
     *
     * @return Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Almacena un nuevo usuario
     *
     * @return Response
     */

    public function store(Request $request)
    {

        $usuario = new Usuario();
        $usuario->name = \Input::get('name');
        $usuario->email = \Input::get('email');
        $exito = $usuario->save();
         Usuario::create($request -> all());

        return view('usuarios.index');

        //if ($exito) {
         //   return "Almacenado con exito";
        //} else {
        //    return "No se guardo";
       // }


    }

    /**
     * Muestra usuario especifico
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);


        return view('usuarios.show', compact('usuario'));

return $usuario;
    }

    /**
     * Muestra el formulario para editar un usuario
     *
     * @param  int $ide
     * @return Response
     */
    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return view('usuarios.edit', compact('usuario', $usuario));
    }

    /**
     * Actualiza un usuario identificado con 'id'
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $usuario = Usuario::find($id);
        $usuario->name = $request->input('name');

        $usuario->email = $request->input('email');
        $exito= $usuario->save();
        if ($exito){
            return "Actualizado correctamente";
        } else {
            return "No se actualizo";
        }

    }

    /**
     * Elimina un usuario identificado con 'id'
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
