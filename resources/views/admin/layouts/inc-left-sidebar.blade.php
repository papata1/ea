<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li {{ (Request::is('/bus') ? 'class="active"' : '') }}>
            <a href="{{ url ('/user') }}"><i class="fa fa-user  fa-fw"></i>บัญชีผู้ใช้</a>
            </li>
            </li>
            <li>
                <a href="{{ url ('/master') }}"><i class="fa fa-files-o fa-fw"></i>ข้อมูลตั้งต้น</a>
            </li>
            <li >
                <a href="#"><i class="fa fa-wrench fa-fw"></i>สถาปัตยกรรมองค์กร <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                    <a href="{{ url ('bus') }}">สถาปัตยกรรมกระบวนการ</a>
                    </li>
                    <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                    <a href="{{ url ('app' ) }}">สถาปัตยกรรมสารสนเทศ</a>
                    </li>
                    <li {{ (Request::is('*notifications') ? 'class="active"' : '') }}>
                    <a href="{{ url('dat') }}">สถาปัตยกรรมข้อมูล</a>
                    </li>
                    <li {{ (Request::is('*typography') ? 'class="active"' : '') }}>
                    <a href="{{ url ('tech') }}">สถาปัตยกรรมเทคโนโลยี</a>
                    </li>
                    </li>
                </ul>
                <!-- /.nav-second-level -->







        </ul>
    </div>
