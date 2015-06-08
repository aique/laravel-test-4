<?php

class CmsController extends BaseController
{
    public function login()
    {
        return View::make('cms.login');
    }

    public function doLogin()
    {
        if(!Sentry::check())
        {
            $validator = Validator::make(Input::all(), User::$loginRules, User::$loginMessages);

            if($validator->passes())
            {
                $credentials = array
                (
                    'email' => Input::get('email'),
                    'password' => Input::get('password')
                );

                try
                {
                    $user = Sentry::authenticate($credentials, false);

                    if($user->hasAccess('superadmin') || $user->hasAccess('admin'))
                    {
                        Sentry::login($user, false);
                    }
                    else
                    {
                        $validator->getMessageBag()->add('authenticate_failed', 'Los permisos son insuficientes');

                        return View::make('cms.login')->withErrors($validator)->withInput(Input::all());
                    }
                }
                catch(Exception $ex)
                {
                    $validator->getMessageBag()->add('authenticate_failed', 'Los datos de acceso no son correctos');

                    return View::make('cms.login')->withErrors($validator)->withInput(Input::all());
                }
            }
            else
            {
                return View::make('cms.login')->withErrors($validator)->withInput(Input::all());
            }
        }

        return Redirect::route('cmsHome');
    }

    public function logout()
    {
        Sentry::logout();

        return View::make('cms.login');
    }

    public function home()
    {
        return View::make('cms.home');
    }
}