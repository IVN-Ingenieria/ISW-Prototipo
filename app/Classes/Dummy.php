<?php
namespace App\Classes;

/**
 * Class Dummy
 * @package App\Classes
 *
 * Clase falsa utilizada para emular la base de datos mientras no exista.
 */
class Dummy
{

    protected static $worker_list = array(
        [1, 1234567, 'Manuel Jara', 523441, 2, 'Cuprum', 'Masvida', 23514],
        [2, 9564712, 'Mauricio Hass', 1524111, 0, 'Cuprum', 'Cruz Blanca', 15442],
        [3, 14873002, 'Javiera Figueroa', 291440, 0, 'Habitat', 'Masvida', 45222],
        [4, 16542889, 'Geraldinne Koch', 400000, 1, 'Capital', 'Fonasa', 32554],
    );

    /**
     * Obtiene un trabajador a partir de su ID
     *
     * @param int $id La ID del trabajador
     * @return object El trabajador en forma de objeto. Si no lo encuentra, devuelve un objeto vacío.
     */
    public static function worker($id)
    {
        foreach (self::$worker_list as $worker) {
            if ($id == $worker[0]) {
                return self::createWorkerObject($worker);
            }
        }
        return new \stdClass();
    }

    /**
     * Obtiene un arreglo con todos los trabajadores.
     *
     * @return array Los trabajadores.
     */
    public static function workers()
    {
        $output = array();
        foreach (self::$worker_list as $worker) {
            array_push($output, self::createWorkerObject($worker));
        }
        return $output;
    }

    /**
     * Crea un objeto de trabajador a partir del arreglo dummy.
     *
     * @param array $worker El trabajador seleccionado, en forma de arreglo.
     * @return object El trabajador seleccionado, en forma de objeto.
     */
    protected static function createWorkerObject($worker)
    {
        return (object)array(
            'id'    => $worker[0],
            'rut' => $worker[1],
            'name' => $worker[2],
            'salary' => $worker[3],
            'family' => $worker[4],
            'afp' => $worker[5],
            'isapre' => $worker[6],
            'isapre_val' => $worker[7]
        );
    }
}