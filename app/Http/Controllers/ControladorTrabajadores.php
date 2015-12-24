<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

use App\Trabajadores;
use App\Http\Requests\Crear;

class ControladorTrabajadores extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$datos = Trabajadores::all();
		return view('lista', compact('datos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('create');
	}

	/*public function listar()
	{
		$nombres = [
			'Juan', 'Felipe', 'Luis'
		];

		return view('lista', compact('nombres'));
	}*/


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	public function store(Crear $request)
	{

		//Trabajadores::create($request -> all());

		return redirect('lista');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$datos = Trabajadores::find($id);
		return view('show', compact('datos'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
