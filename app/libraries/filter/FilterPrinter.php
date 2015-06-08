<?php

class FilterPritner
{
    public static function printFilters(SectionFilter $filter, $route, $fieldName)
    {
        $output = '';

        if($filter->getOrderField() == $fieldName)
        {
            if($filter->getOrderValue() == 'asc')
            {
                $output .= '<a class="order-filter-ico active" href="' . $route . '/' . $fieldName . '/asc"><i class="glyphicon glyphicon-arrow-up"></i></a>';
                $output .= '<a class="order-filter-ico" href="' . $route . '/' . $fieldName . '/desc"><i class="glyphicon glyphicon-arrow-down"></i></a>';
            }
            else
            {
                $output .= '<a class="order-filter-ico" href="' . $route . '/' . $fieldName . '/asc"><i class="glyphicon glyphicon-arrow-up"></i></a>';
                $output .= '<a class="order-filter-ico active" href="' . $route . '/' . $fieldName . '/desc"><i class="glyphicon glyphicon-arrow-down"></i></a>';
            }
        }
        else
        {
            $output .= '<a class="order-filter-ico" href="' . $route . '/' . $fieldName . '/asc"><i class="glyphicon glyphicon-arrow-up"></i></a>';
            $output .= '<a class="order-filter-ico" href="' . $route . '/' . $fieldName . '/desc"><i class="glyphicon glyphicon-arrow-down"></i></a>';
        }

        return $output;
    }
}