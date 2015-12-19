<?php namespace App\Http\Controllers;

use App\Classes\Report;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use mPDF;
use Html;
use URL;
use File;
use Carbon\Carbon;
use App\Classes\Dummy;

class Reportes extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$data = User::all();
		$workers = Dummy::workers();
		return view('templates.reportes.lista', ['workers'=>$workers, 'current'=>2]);
	}

    /**
     * Genera un reporte a partir de la ID de un usuario
     *
     * @param int $id La ID del usuario que se desea obtener
     */
	public function generate($id)
	{
		//$data = User::find($id);
		$data = Dummy::worker($id);
        $report = new Report('Diciembre', '2015');
        $report->setWorker($data);

		$ds = DIRECTORY_SEPARATOR;
		$gp = str_replace('/index.php', '', url('assets'.$ds.'generator').$ds);


		$mpdf=new mPDF("en", "Letter", "15");
		$stylesheet = file_get_contents($gp.'liquidacion.css');
		$html = view('templates.reportes.report', ['gp'=>$gp, 'report'=>$report])->render();
		$mpdf->WriteHTML($stylesheet, 1);
		$mpdf->WriteHTML($html,	2);
		$mpdf->Output('planilla-'.$data->rut.'-'.str_replace(' ', '_', $data->name).'-12-15'.'.pdf', 'D');
		exit();
	}

    public function xmlReport()
    {
        $workers = Dummy::workers();
        $isapres = [];
        $meta = array(
            'count' => 0,
            'total' => 0
        );
        foreach ($workers as $worker) {
            if (array_key_exists($worker->isapre, $isapres)) {
                $isapres[$worker->isapre]['amount'] += $worker->isapre_val;
                $isapres[$worker->isapre]['count']++;
            } else {
                $isapres[$worker->isapre]['amount'] = $worker->isapre_val;
                $isapres[$worker->isapre]['count'] = 1;
            }
            $meta['count']++;
            $meta['total'] += $worker->isapre_val;
        }
        return view('templates.reportes.xml', ['current'=> 2, 'isapres'=>$isapres, 'meta'=>$meta]);
    }

    /**
     * CONSTRUYENDO (no usar)
     */
    public function generate_all()
    {
        $data = User::all();
        $ds = DIRECTORY_SEPARATOR;
        $gp = str_replace('/index.php', '', url('assets'.$ds.'generator').$ds);
        $stylesheet = file_get_contents($gp.'liquidacion.css');
        $html = file_get_contents($gp.'liquidacion.php');
        $time = time();
        mkdir(storage_path($time), 777);

        foreach ($data as $user) {
            $mpdf=new mPDF("en", "Letter", "15");
            $mpdf->WriteHTML($stylesheet, 1);
            $mpdf->WriteHTML(
                str_replace(
                    ['%GP%', '%NOMBRE%', '%RUT%', '%CARGO%'],
                    [$gp, $user->name, $user->rut, '-'],
                    $html
                ),
                2
            );
            $mpdf->Output(storage_path($time.'/planilla-'.$user->rut.'-'.str_replace(' ', '_', $user->name).'-12-15'.'.pdf'), 'F');
        }

        $mytime = Carbon::now();
        $files = glob(storage_path($time.$ds.'*'));
        $filename = str_replace([' ', ':'], ['_', '-'], storage_path().$ds.$mytime->toDateTimeString().'.zip');
        echo $filename;
        \Zipper::make($filename)->add($files);
        File::deleteDirectory(storage_path($time).$ds.$time);

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
        $data = Dummy::worker($id);
        $report = new Report('Diciembre', '2015');
        $report->setWorker($data);
        $ds = DIRECTORY_SEPARATOR;
        $gp = str_replace('/index.php', '', url('assets'.$ds.'generator').$ds);

        return view('templates.reportes.details', ['gp'=>$gp, 'report'=>$report, 'render'=>true, 'id'=>$id, 'current'=>2]);
        //return view('templates.reportes.report', ['gp'=>$gp, 'report'=>$report, 'id'=>$id]);
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
