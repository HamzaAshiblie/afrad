<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="#">Brand</a> -->
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">

                    <li id="navDashboard" class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a href=""><i class="glyphicon glyphicon-list-alt"></i>  الرئيسية</a></li>

                    <li id="" class="{{ Request::is('category*') ? 'active' : '' }}"><a href="{{ route('category') }}"><i class="glyphicon glyphicon-th-list"></i>  التصنيف والبنود</a></li>

                    <li id="nav-clients" class="{{ Request::is('beneficiary*') ? 'active' : '' }}"><a href=""><i class="glyphicon glyphicon-th-list"></i>  المستفيدين</a></li>

                    <li id="nav-clients" class="{{ Request::is('product') ? 'active' : '' }}"><a href=""><i class="glyphicon glyphicon-th-list"></i>  الحالات</a></li>

                    <li id="navReport"><a href="#"> <i class="glyphicon glyphicon-check"></i> الاستعلام والتقارير </a></li>

                    <li class="dropdown" id="navSetting">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li id="topNavSetting"><a href=""> <i class="glyphicon glyphicon-wrench"></i> الإعدادات</a></li>
                            <li id="topNavLogout"><a href=""> <i class="glyphicon glyphicon-log-out"></i> تسجيل الخروج</a></li>
                        </ul>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>