<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use mPDF;
use Html;

class Reportes extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = User::all();
		return view('templates.reportes.lista', ['data'=>$data]);
	}

	public function generate($id)
	{
		$data = User::find($id);
		$mpdf=new mPDF("en", "Letter", "15");
		$ds = DIRECTORY_SEPARATOR;
		$gp = public_path().$ds.'assets'.$ds.'generator'.$ds;
		$stylesheet = file_get_contents($gp.'liquidacion.css');
		$html = file_get_contents($gp.'liquidacion.php');
		$mpdf->WriteHTML($stylesheet, 1);
		$mpdf->WriteHTML(
				str_replace(
						['%GP%', '%NOMBRE%', '%RUT%', '%CARGO%'],
						[$gp, $data->name, $data->rut, '-'],
						$html
				),
				2
		);
		$mpdf->Output();
		exit();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
