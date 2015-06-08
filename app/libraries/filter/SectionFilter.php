<?php

class SectionFilter
{
    /**
     * Nombre de la ruta sobre la que se está aplicando el filtro.
     *
     * @var string
     */
    private $routeName;

    /**
     * Nombre del campo sobre el que se está aplicando el filtro
     * de ordenación.
     *
     * @var string
     */
    private $orderField;

    /**
     * Valor del orden que se tendrá en cuenta a la hora de aplicar
     * el filtro de ordenación.
     *
     * @var string
     */
    private $orderValue;

    /**
     * Valor de los filtros adicionales de la sección.
     *
     * Será un array asociativo en el que la clave corresponde
     * al nombre del filtro y el valor al propio valor del
     * mismo.
     *
     * @var array
     */
    private $extraFilters;

    public function __construct()
    {
        $this->extraFilters = array();
    }

    /**
     * @return string
     */
    public function getRouteName()
    {
        return $this->routeName;
    }

    /**
     * @param string $routeName
     */
    public function setRouteName($routeName)
    {
        $this->routeName = $routeName;
    }

    /**
     * @return string
     */
    public function getOrderField()
    {
        return $this->orderField;
    }

    /**
     * @param string $orderField
     */
    public function setOrderField($orderField)
    {
        $this->orderField = $orderField;
    }

    /**
     * @return string
     */
    public function getOrderValue()
    {
        return $this->orderValue;
    }

    /**
     * @param string $orderValue
     */
    public function setOrderValue($orderValue)
    {
        $this->orderValue = $orderValue;
    }

    /**
     * @return array
     */
    public function getExtraFilters()
    {
        return $this->extraFilters;
    }

    /**
     * @param array $extraFilters
     */
    public function setExtraFilters($extraFilters)
    {
        $this->extraFilters = $extraFilters;
    }

    /**
     * Obtiene el valor de uno de los filtros extra
     * a partir del número que forma parte del identificador
     * del mismo.
     *
     * Devolverá null en caso de que el filtro que se busca
     * no tenga valor asignado.
     *
     * @param $filterNum
     *
     *      Número entero que representa el número asociado
     *      al filtro adicional cuyo valor se quiere recuperar.
     *
     * @return null
     */
    public function getExtraFilterValue($filterNum)
    {
        $extraFilterValue = null;

        if(isset($this->extraFilters['extra_filter_' . $filterNum]))
        {
            $extraFilterValue = $this->extraFilters['extra_filter_' . $filterNum];
        }

        return $extraFilterValue;
    }
}