<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateAfpRequest;
use App\Http\Controllers\Controller;
use App\Afp;

use Request;

class AfpController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $afps = Afp::all();
		$current = 3;
		return view('afp.index',compact('afps', 'current'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('afp.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateAfpRequest $request)
	{
		Afp::create($request->all());
        return redirect('afp');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$afp = Afp::find($id);
        return view('afp.show',compact('afp'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$afp = Afp::find($id);
        return view('afp.edit',compact('afp'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CreateAfpRequest $request)
	{
        $afp = Afp::find($id);
        $afp->update($request->all());
        return redirect('afp');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $afp = Afp::find($id);
        $afp->delete();
        return redirect('afp');
	}

}
