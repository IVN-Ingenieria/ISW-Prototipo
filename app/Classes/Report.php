<?php
namespace App\Classes;

/**
 * Class Report
 * @package App\Classes
 *
 * Representa internamente un reporte en proceso de ser generado.
 */
class Report
{
    // Report information
    public $year;
    public $month;

    // Information objects
    public $information;
    public $taxable_assets;
    public $non_taxable_assets;
    public $discounts;
    public $extra_discounts;

    public $cash_advance;


    public function __construct($month, $year)
    {
        $this->year = $year;
        $this->month = $month;

        // Personal information
        $this->information = new \stdClass();
        $this->information->name = ['Anónimo', 'Nombre'];
        $this->information->rut = ['-', 'RUT'];
        $this->information->position = ['Sin cargo', 'Cargo'];

        // Taxable assets
        $this->taxable_assets = new \stdClass();
        $this->taxable_assets->worked = [0, 'Dias trabajados'];
        $this->taxable_assets->proportional_salary = [0, 'Sueldo proporcional'];
        $this->taxable_assets->extra_hours = [0, 'Horas extra'];

        // Non-taxable assets
        $this->non_taxable_assets = new \stdClass();
        $this->non_taxable_assets->mobilization = [0, 'Movilización'];
        $this->non_taxable_assets->collation = [0, 'Colación'];
        $this->non_taxable_assets->family_responsibility = [0, 'Asignación familiar'];

        // Discounts
        $this->discounts = new \stdClass();
        $this->discounts->pension_funds = [0, 'AFP'];
        $this->discounts->pension_extra = [0, 'Fondos de pensión voluntarios'];
        $this->discounts->health_funds = [0, 'Previsión de salud'];

        // Extra discounts
        $this->extra_discounts = new \stdClass();
        $this->extra_discounts->other_discounts = [0, 'Otros descuentos'];

        $this->cash_advance = 0;
    }

    /**
     * Obtiene el total de algun criterio en particular. Los índices que se utilizan para
     * decidir el total que se debe calcular se define a continuación:
     *
     *      0:    Haberes imponibles
     *      1:    Haberes no imponibles
     *      2:    Descuentos
     *      3:    Otros descuentos
     *      9001: Total (sin considerar adelantos)
     *
     * @param int $category La categoría que se desea calcular (ver descripción arriba).
     * @return int El total (en forma de entero).
     */
    public function getTotal($category)
    {
        $sum = 0;
        switch ($category) {
            case 0:
                foreach ($this->taxable_assets as $amount) {
                    $sum += $amount[0];
                }
                break;
            case 1:
                foreach ($this->non_taxable_assets as $amount) {
                    $sum += $amount[0];
                }
                break;
            case 2:
                foreach ($this->discounts as $amount) {
                    $sum += $amount[0];
                }
                break;
            case 3:
                foreach ($this->extra_discounts as $amount) {
                    $sum += $amount[0];
                }
                break;
            case 9001:
                $sum += $this->getTotal(0);
                $sum += $this->getTotal(1);
                $sum -= $this->getTotal(2);
                $sum -= $this->getTotal(3);
        }
        return $sum;
    }

    /**
     * Agrega un trabajador desde un objeto con su información. Compatible con uso de base de datos.
     *
     * @param object $worker El trabajador, en formato de objeto.
     */
    public function setWorker($worker)
    {
        if (!empty($worker->name))
            $this->information->name[0] = $worker->name;
        if (!empty($worker->rut))
            $this->information->rut[0] = \Common::getFormattedRut($worker->rut);
        if (!empty($worker->position))
            $this->information->position[0] = $worker->position;
    }

}