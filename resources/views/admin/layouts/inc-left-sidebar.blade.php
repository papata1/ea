<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li {{ (Request::is('/bus') ? 'class="active"' : '') }}>
            <a href="{{ url ('/user') }}"><i class="fa fa-dashboard fa-fw"></i>account</a>
            </li>
            <li >
                <a href="#"><i class="fa fa-wrench fa-fw"></i> EA Elements<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                    <a href="{{ url ('bus') }}">Business</a>
                    </li>
                    <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                    <a href="{{ url ('app' ) }}">Application</a>
                    </li>
                    <li {{ (Request::is('*notifications') ? 'class="active"' : '') }}>
                    <a href="{{ url('dat') }}">Data</a>
                    </li>
                    <li {{ (Request::is('*typography') ? 'class="active"' : '') }}>
                    <a href="{{ url ('T') }}">Technology</a>
                    </li>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>





        </ul>
    </div>