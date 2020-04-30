
<div class="settings-box hide-settings">
    <div class="toggle-settings"><i class="fas fa-cog "></i></div>
    <div class="setting-content chiller-theme toggled">

    {{-- start nav --}}
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">

              <div class="sidebar-header">

                 <h2 class="text-danger text-center m-4 "> <i class="fa fa-tachometer-alt fa-x4 text-danger"></i> &nbsp; <span style="color: white;" > EL<span class="text-danger">Com</span> </span></h2>
              </div>
              <!-- sidebar-header  -->


              <div class="sidebar-menu">
                <ul>
                  <li class="header-menu">
                    <span>الاعدادات</span>
                  </li>
                  <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fas fa-home"></i>
                        <span>الصفحة الرئيسية</span>
{{--                       <span class="badge badge-pill badge-warning">جديد</span>--}}
                    </a>
                    <div class="sidebar-submenu">
                      <ul>
                        <li>
                          <a href='{{ url("/customers/create") }}'>اضافة مشترك
                          </a>
                        </li>
                        <li>
                          <a href='{{ url('/customers') }}'>قائمة المشتركين</a>
                        </li>
                        <li>
                          <a href='{{ url('/customers/trashed') }}'>الحسابات المحذوفة</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fas fa-user-tag"></i>
                        <span>صلاحيات المستخدمين</span>
{{--                       <span class="badge badge-pill badge-danger">3</span>--}}
                    </a>
                    <div class="sidebar-submenu">
                      <ul>
                        <li>
                          <a href="{{ url('/roles/3')}}">محدودة</a>
                        </li>
                        <li>
                          <a href="{{ url('/roles/2')}}">متوسطة</a>
                        </li>
                        <li>
                          <a href="{{ url('/roles/1')}}">مدير</a>
                        </li>
                      </ul>
                    </div>
                  </li>

                    <li class="sidebar-dropdown">
                        <a href="#">
                            <i class="fas fa-users-cog"></i>
                            <span>متقدم</span>
                        </a>
                        <div class="sidebar-submenu">
                            <ul>
                                <li>
                                    <a href="#">ترحيل الحسابات</a>
                                </li>
                                <li>
                                    <a href="#">تصفير الصناديق</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                  <li class="header-menu">
                    <span>اوامر</span>
                  </li>
                <li>
                    <a href="{{url('/settings/branches')}}">
                        <i class="fas fa-map-marked-alt"></i>
                        <span>مسؤولي القطاعات</span>
                    </a>
                </li>

                  <li>
                    <a href="{{url("/branch")}}">
                        <i class="fas fa-store-alt"></i>
                        <span>اضافة قطاع</span>
                      {{-- <span class="badge badge-pill badge-primary">Beta</span> --}}
                    </a>
                  </li>
                    <li>
                        <a href="{{url("/editTelegram")}}">
{{--                        <i class="fa fa-chart-line"></i> --}}
                            <i class="fab fa-telegram-plane"></i>
                            <span>اعدادات التلغرام</span>
                            {{-- <span class="badge badge-pill badge-primary">Beta</span> --}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/register')}}">
                            <i class="fas fa-user-plus"></i>
                            <span>اضافة مستخدم</span>
                            {{-- <span class="badge badge-pill badge-primary">Beta</span> --}}
                        </a>
                    </li>

                  <li>
                    <a href="{{ url("/prices")}}">
                        <i class="fa fa-shopping-cart"></i>
                        <span>تحرير الاسعار</span>
                    </a>
                  </li>
                  <li>
                    <a href='#'>
                        <i class="fas fa-search-location"></i>
                        <span> اضافة مركز</span>
                    </a>
                  </li>
                  <li>
                    <a href='#'>
                        <i class="far fa-credit-card"></i>
                        <span> اضافة بطاقة</span>
                    </a>
                  </li>
                </ul>
              </div>
              <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
              <a href="#">
                <i class="fa fa-bell"></i>
                <span class="badge badge-pill badge-warning notification">3</span>
              </a>
              <a href="#">
                <i class="fa fa-envelope"></i>
                <span class="badge badge-pill badge-success notification">7</span>
              </a>
              <a href="#">
                <i class="fa fa-cog"></i>
                <span class="badge-sonar"></span>
              </a>
              <a href="#">
                <i class="fa fa-power-off"></i>
              </a>

            </div>
        </nav>
    {{-- end nav --}}

    </div>
</div>

