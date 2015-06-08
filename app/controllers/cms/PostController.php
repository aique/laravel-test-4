<?php

class PostController extends BaseController
{
    public function all($orderField = null, $orderValue = null)
    {
        $filter = FilterCollection::getInstance()->getSectionFilter(Route::currentRouteName(), $orderField, $orderValue, 'title', 'asc');

        if($filter->getOrderField() == 'user')
        {
            $posts = Post::join('users', 'posts.user_id', '=', 'users.id')->orderBy('email', $filter->getOrderValue());
        }
        else
        {
            $posts = Post::orderBy($filter->getOrderField(), $filter->getOrderValue());
        }

        $filter = FilterCollection::getInstance()->getExtraFilter(Route::currentRouteName());

        $posts = $this->applyAllExtraFilters($posts, $filter);

        return View::make('cms.posts.list', array
        (
            'posts' => $posts->paginate(10),
            'filter' => $filter,
            'usersFilter' => $this->getUsersFilterArray(Sentry::findAllUsersInGroup(Sentry::findGroupByName('Authors'))))
        );
    }

    private function applyAllExtraFilters($query, SectionFilter $filter)
    {
        if(count($filter->getExtraFilters()) > 0)
        {
            foreach($filter->getExtraFilters() as $filterKey => $filterValue)
            {
                switch($filterKey)
                {
                    case('extra_filter_1'):

                        $query->where('title', 'like', '%' . $filterValue . '%');

                        break;

                    case('extra_filter_2'):

                        if($filterValue)
                        {
                            $query->whereHas('user', function ($q) use ($filterValue)
                            {
                                $q->where('id', '=', $filterValue);
                            });
                        }

                        break;
                }
            }
        }

        return $query;
    }

    private function getUsersFilterArray($users)
    {
        $usersFilter = array("" => 'Cualquiera');

        $numUsers = count($users);

        for($i = 0 ; $i < $numUsers ; $i++)
        {
            $currentUser = $users[$i];

            $usersFilter[$currentUser->id] = $currentUser->email;
        }

        return $usersFilter;
    }

    /**
     * Devuelve los posts escritos por un usuario concreto.
     *
     * @param $userId
     *
     *      Número entero que identifica al usuario autor de
     *      los post.
     *
     * @return mixed
     */
    public function userPosts($userId, $orderField = null, $orderValue = null)
    {
        $filter = FilterCollection::getInstance()->getSectionFilter(Route::currentRouteName(), $orderField, $orderValue, 'title', 'asc');

        $user = User::find($userId);

        $user->posts = $user->posts()->orderBy($filter->getOrderField(), $filter->getOrderValue())->paginate(10);

        return View::make('cms.posts.user_posts_list', array('user' => $user, 'filter' => $filter));
    }

    public function detail(Post $post)
    {
        return View::make('cms.posts.detail', array('post' => $post));
    }
}