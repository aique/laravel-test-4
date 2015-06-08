<?php

class FilterCollection
{
    /**
     * Objeto de la propia clase que será utilizado para
     * implementar el patrón singleton.
     *
     * @var FilterCollection
     */
    private static $instance;

    /**
     * Colección de filtros que se están aplicando.
     *
     * @var array
     */
    private $filters;

    private function __construct()
    {
        $this->filters = array();
    }

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = Session::get('filterCollection');

            if(!self::$instance)
            {
                self::$instance = new FilterCollection();

                Session::put('filterCollection', self::$instance);
            }
        }

        return self::$instance;
    }

    /**
     * Devuelve el filtro que se está aplicando sobre una sección,
     * modificando su valor si se ha recibido valor para el segundo
     * y tercer parámetro o estableciendo su valor por defecto con
     * el cuarto y quinto parámetro.
     *
     * @param $routeName
     *
     *      Nombre de la ruta sobre la que actúa el filtro.
     *
     * @param $orderField
     *
     *      Nuevo campo sobre el que se quiere aplicar el filtro.
     *
     * @param $orderValue
     *
     *      Nuevo valor a aplicar por el filtro.
     *
     * @param $defaultOrderField
     *
     *      Campo por defecto sobre el que debe actuar el filtro
     *      que se creará en caso de que esta sección aún no tenga
     *      ninguno definido.
     *
     * @param $defaultOrderValue
     *
     *      Valor por defecto que tomará el filtro que se creará
     *      en caso de que esta sección aún no tenga ninguno definido.
     *
     * @return SectionFilter
     *
     *      Objeto con la información del filtro que se aplicará
     *      sobre la sección.
     */
    public function getSectionFilter($routeName, $orderField, $orderValue, $defaultOrderField, $defaultOrderValue)
    {
        $filter = $this->getFilter($routeName);

        if($filter)
        {
            if($orderField && $orderValue)
            {
                $filter->setOrderField($orderField);
                $filter->setOrderValue($orderValue);
            }
        }
        else
        {
            $filter = new SectionFilter();

            $filter->setRouteName($routeName);
            $filter->setOrderField($defaultOrderField);
            $filter->setOrderValue($defaultOrderValue);

            $this->setFilter($filter);
        }

        return $filter;
    }

    public function getExtraFilter($routeName)
    {
        $filter = $this->getFilter($routeName);

        if(Request::isMethod('post'))
        {
            $inputData = Input::all();
        }
        else
        {
            $inputData = array();
        }

        if($filter)
        {
            if(count($inputData) > 0)
            {
                $filter->setExtraFilters($this->getExtraFiltersFromInput($inputData));
            }
        }
        else
        {
            $filter = new SectionFilter();

            $filter->setExtraFilters($this->getExtraFiltersFromInput($inputData));

            $this->setFilter($filter);
        }

        return $filter;
    }

    private function getExtraFiltersFromInput($input)
    {
        $extraFilters = array();

        foreach($input as $key => $value)
        {
            if(preg_match('/^extra_filter_\d+$/', $key))
            {
                $extraFilters[$key] = $value;
            }
        }

        return $extraFilters;
    }

    /**
     * Obtiene un filtro dentro de la colección de filtros aplicados
     * a partir del nombre de la ruta sobre la que se está aplicando.
     *
     * De no encontrarse se devuelve null.
     *
     * @param string $routeName
     *
     *      Cadena de texto con el nombre de la ruta.
     *
     * @return
     *
     *      Objeto SectionFilter con el filtro buscado o null en caso
     *      de no encontrar ningún filtro que se esté aplicando sobre
     *      la ruta deseada.
     */
    private function getFilter($routeName)
    {
        $filter = null;

        $numFilters = count($this->filters);

        for($i = 0 ; $i < $numFilters && $filter == null ; $i++)
        {
            $currentFilter = $this->filters[$i];

            if($currentFilter->getRouteName() == $routeName)
            {
                $filter = $currentFilter;
            }
        }

        return $filter;
    }

    private function setFilter(SectionFilter $filter)
    {
        $this->filters[] = $filter;
    }
}