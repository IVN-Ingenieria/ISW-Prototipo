<?php

namespace App\Http\Controllers;

use App\Trabajadores;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Prototipo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(get_loaded_extensions());
        // Tests
        $tests = array();

        // Versión de PHP
        $phpversion = new \stdClass();
        $phpversion->label = 'Versión de PHP';
        $phpversion->status = false;
        $phpversion->required = '>= 5.4';
        $phpversion->message = phpversion();
        if (version_compare(PHP_VERSION, '5.4') >= 0) {
            $phpversion->status = true;
        }
        array_push($tests, $phpversion);

        // Extensions
        $mcrypt = new \stdClass();
        $mcrypt->label = 'MCrypt';
        $mcrypt->status = false;
        $mcrypt->required = 'Instalado';
        $mcrypt->message = 'NO INSTALADO';

        $openssl = new \stdClass();
        $openssl->label = 'OpenSSL';
        $openssl->status = false;
        $openssl->required = 'Instalado';
        $openssl->message = 'NO INSTALADO';

        $pdo = new \stdClass();
        $pdo->label = 'PDO';
        $pdo->status = false;
        $pdo->required = 'Instalado';
        $pdo->message = 'NO INSTALADO';

        $mbstring = new \stdClass();
        $mbstring->label = 'Mbstring';
        $mbstring->status = false;
        $mbstring->required = 'Instalado';
        $mbstring->message = 'NO INSTALADO';

        $tokenizer = new \stdClass();
        $tokenizer->label = 'Mbstring';
        $tokenizer->status = false;
        $tokenizer->required = 'Instalado';
        $tokenizer->message = 'NO INSTALADO';

        foreach(get_loaded_extensions() as $extension) {
            if($extension == 'mcrypt') {
                $mcrypt->status = true;
                $mcrypt->message = 'INSTALADO';
            } else if($extension == 'openssl') {
                $openssl->status = true;
                $openssl->message = 'INSTALADO';
            } else if(str_contains($extension, 'pdo_')) {
                $pdo->status = true;
                $pdo->message = 'INSTALADO';
            } else if($extension == 'mbstring') {
                $mbstring->status = true;
                $mbstring->message = 'INSTALADO';
            } else if($extension == 'tokenizer') {
                $tokenizer->status = true;
                $tokenizer->message = 'INSTALADO';
            }
        }
        array_push($tests, $mcrypt);
        array_push($tests, $openssl);
        array_push($tests, $pdo);
        array_push($tests, $mbstring);
        array_push($tests, $tokenizer);

        // Database
        $db_tests = array();
        $db_available = false;

        $db_connection = new \stdClass();
        $db_connection->label = 'Estado del servidor';
        $db_connection->status = false;
        $db_connection->message = 'ERROR';

        $db_database = new \stdClass();
        $db_database->label = 'Base de datos de prueba';
        $db_database->status = false;
        $db_database->message = 'ERROR';

        if ($dbc = mysqli_connect('localhost', 'root', '41739810')) {
            $db_connection->status = true;
            $db_connection->message = 'OK';
            if (mysqli_select_db($dbc, 'ieci7')) {
                $db_database->status = true;
                $db_database->message = 'OK';
                $db_available = true;
            }
        }
        array_push($db_tests, $db_connection);
        array_push($db_tests, $db_database);

        $tm = new Trabajadores();
        $trabajadores = $tm->all();


        return view('templates.php_info', ['tests' => $tests, 'db_tests' => $db_tests, 'trabajadores'=>$trabajadores, 'db_available' => $db_available]);
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
        $trabajador = new Trabajadores();
        $trabajador->nombre = $request->nuevo;
        $trabajador->save();

        return redirect('/');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trabajadores = Trabajadores::find($id);

        $trabajadores->delete();
        return redirect('/');
    }
}
