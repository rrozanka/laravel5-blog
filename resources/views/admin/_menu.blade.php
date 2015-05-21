<ul class="sidebar-menu">
    <li class="header">
        MAIN NAVIGATION
    </li>

    @if(Entrust::can(Helper::getActionByRoute('admin.index.index')))
        <li class="@if(Request::is('admin')) active @endif">
            <a href="{{ URL::to('admin') }}">
                <i class="fa fa-dashboard"></i>

                <span>
                    Dashboard
                </span>
            </a>
        </li>
    @endif

    @if(Entrust::can(Helper::getActionByRoute('admin.users.index')))
        <li class="treeview @if(Request::is('admin/users*') || Request::is('admin/roles*')) active @endif">
            <a href="#">
                <i class="fa fa-users"></i>

                <span>
                    Users
                </span>

                <i class="fa fa-angle-left pull-right"></i>
            </a>

            <ul class="treeview-menu">
                @if(Entrust::can(Helper::getActionByRoute('admin.users.index')))
                    <li class="@if(Request::is('admin/users') || in_array(Route::currentRouteName(), [
                        'admin.users.edit'
                    ])) active @endif">
                        <a href="{{ URL::route('admin.users.index') }}">
                            <i class="fa fa-list"></i> List
                        </a>
                    </li>
                @endif

                @if(Entrust::can(Helper::getActionByRoute('admin.users.create')))
                    <li class="@if(Request::is('admin/users/create')) active @endif">
                        <a href="{{ URL::route('admin.users.create') }}">
                            <i class="fa fa-plus"></i> Add New User
                        </a>
                    </li>
                @endif

                @if(Entrust::can(Helper::getActionByRoute('admin.roles.index')))
                    <li class="@if(Request::is('admin/roles*')) active @endif">
                        <a href="#">
                            <i class="fa fa-cogs"></i>

                            Roles

                            <i class="fa fa-angle-left pull-right"></i>
                        </a>

                        <ul class="treeview-menu">
                            @if(Entrust::can(Helper::getActionByRoute('admin.roles.index')))
                                <li class="@if(Request::is('admin/roles') || in_array(Route::currentRouteName(), [
                                    'admin.roles.edit',
                                    'admin.roles.permissions.index'
                                ])) active @endif">
                                    <a href="{{ URL::route('admin.roles.index') }}">
                                        <i class="fa fa-list"></i> List
                                    </a>
                                </li>
                            @endif

                            @if(Entrust::can(Helper::getActionByRoute('admin.roles.create')))
                                <li class="@if(Request::is('admin/roles/create')) active @endif">
                                    <a href="{{ URL::route('admin.roles.create') }}">
                                        <i class="fa fa-plus"></i> Add New Role
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </li>
    @endif

    @if(Entrust::can(Helper::getActionByRoute('admin.articles.index')))
        <li class="treeview @if(Request::is('admin/articles*')) active @endif">
            <a href="#">
                <i class="fa fa-newspaper-o"></i>

                <span>
                    Articles
                </span>

                <i class="fa fa-angle-left pull-right"></i>
            </a>

            <ul class="treeview-menu">
                @if(Entrust::can(Helper::getActionByRoute('admin.articles.index')))
                    <li class="@if(Request::is('admin/articles') || Route::currentRouteName() == 'admin.articles.edit') active @endif">
                        <a href="{{ URL::route('admin.articles.index') }}">
                            <i class="fa fa-list"></i> List
                        </a>
                    </li>
                @endif

                @if(Entrust::can(Helper::getActionByRoute('admin.articles.create')))
                    <li class="@if(Request::is('admin/articles/create')) active @endif">
                        <a href="{{ URL::route('admin.articles.create') }}">
                            <i class="fa fa-plus"></i> Add New Article
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif

    @if(Entrust::can(Helper::getActionByRoute('admin.categories.index')))
        <li class="treeview @if(Request::is('admin/categories*')) active @endif">
            <a href="#">
                <i class="fa fa-folder"></i>

                <span>
                    Categories
                </span>

                <i class="fa fa-angle-left pull-right"></i>
            </a>

            <ul class="treeview-menu">
                @if(Entrust::can(Helper::getActionByRoute('admin.categories.index')))
                    <li class="@if(Request::is('admin/categories') || Route::currentRouteName() == 'admin.categories.edit') active @endif">
                        <a href="{{ URL::route('admin.categories.index') }}">
                            <i class="fa fa-list"></i> List
                        </a>
                    </li>
                @endif

                @if(Entrust::can(Helper::getActionByRoute('admin.categories.create')))
                    <li class="@if(Request::is('admin/categories/create')) active @endif">
                        <a href="{{ URL::route('admin.categories.create') }}">
                            <i class="fa fa-plus"></i> Add New Category
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif

    @if(Entrust::can(Helper::getActionByRoute('admin.tags.index')))
        <li class="treeview @if(Request::is('admin/tags*')) active @endif">
            <a href="#">
                <i class="fa fa-tags"></i>

                <span>
                    Tags
                </span>

                <i class="fa fa-angle-left pull-right"></i>
            </a>

            <ul class="treeview-menu">
                @if(Entrust::can(Helper::getActionByRoute('admin.tags.index')))
                    <li class="@if(Request::is('admin/tags') || Route::currentRouteName() == 'admin.tags.edit') active @endif">
                        <a href="{{ URL::route('admin.tags.index') }}">
                            <i class="fa fa-list"></i> List
                        </a>
                    </li>
                @endif

                @if(Entrust::can(Helper::getActionByRoute('admin.tags.create')))
                    <li class="@if(Request::is('admin/tags/create')) active @endif">
                        <a href="{{ URL::route('admin.tags.create') }}">
                            <i class="fa fa-plus"></i> Add New Tag
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
</ul>