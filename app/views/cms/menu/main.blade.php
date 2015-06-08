<header>

    <nav class="navbar navbar-default" role="navigation">

        <div class="navbar-header">

            {{HTML::linkRoute('cmsHome', 'CMS LaravelBlog', array(), array('class' => 'navbar-brand'))}}

        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">

                <li>{{HTML::linkRoute('cmsHome', 'Home')}}</li>
                <li>{{HTML::linkRoute('cmsLogout', 'Logout')}}</li>

            </ul>

        </div>

    </nav>

</header>