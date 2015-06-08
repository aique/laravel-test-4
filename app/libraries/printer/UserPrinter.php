<?php

class UserPrinter
{
    /**
     * Muestra los grupos a los que pertenece el usuario en el listado
     * de usuarios del CMS, con el formato adecuado.
     *
     * @param User $user
     *
     *      Objeto que contiene la información del usuario que se está
     *      mostrando.
     *
     * @return string
     */
    public static function printGroups(User $user)
    {
        $output = '';

        $groups = $user->getGroups();

        foreach($groups as $group)
        {
            $output .= $group->name;
        }

        return $output;
    }
}