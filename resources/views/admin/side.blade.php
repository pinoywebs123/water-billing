<aside>
      <div id="sidebar" class="nav-collapse ">
      
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="{{route('admin_home')}}">
                  <i class="icon_house_alt"></i>
                  <span>Home</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Users</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{route('admin_staffs')}}">Staff</a></li>
              <li><a class="" href="{{route('admin_clients')}}">Client</a></li>
            </ul>
          </li>
          
           <li >
            <a class="" href="{{route('admin_water_rates')}}">
                  <i>&#8369;</i>
                  <span>Water Rates</span>
            </a>
          </li>

           <li >
            <a class="" href="{{route('admin_reports')}}">
                  <i class="icon_documents_alt"></i>
                  <span>Reports</span>
            </a>
          </li>
        
          
        </ul>
        
      </div>
    </aside>