<?php

class UserController extends BaseController
{
    public function all($orderField = null, $orderValue = null)
    {
       $filter = FilterCollection::getInstance()->getSectionFilter(Route::currentRouteName(), $orderField, $orderValue, 'email', 'asc');

        $users = User::orderBy($filter->getOrderField(), $filter->getOrderValue())->get();

        return View::make('cms.users.list', array('users' => $users, 'filter' => $filter));
    }

    public function detail(User $user)
    {
        return View::make('cms.users.detail', array('user' => $user));
    }

    public function edit(User $user)
    {
        return View::make('cms.users.edit', array('user' => $user));
    }

    public function doEdit(User $user)
    {
        $validator = Validator::make(Input::all(), User::$editRules, User::$editMessages);

        if($validator->passes())
        {
            $user->update(Input::all());

            return Redirect::route('cmsUserDetail', $user->id);
        }
        else
        {
            return Redirect::route('cmsUserEdit', $user->id)->with('user', $user)->withErrors($validator);
        }
    }
}