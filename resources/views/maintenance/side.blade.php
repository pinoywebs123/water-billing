<aside>
      <div id="sidebar" class="nav-collapse ">
      
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="{{route('maintenance_home')}}">
                  <i class="icon_house_alt"></i>
                  <span>Home</span>
            </a>
          </li>

          <li >
            <a class="" href="{{route('maintenance_client_records')}}">
                  <i class="icon_house_alt"></i>
                  <span>Client Records</span>
            </a>
          </li>


          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Request Service</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{route('maintenance_pending_bills')}}">Pending</a></li>
              <li><a class="" href="{{route('maintenance_approved_bills')}}">Approved</a></li>
            </ul>
          </li>
          
        
          
        </ul>
        
      </div>
    </aside>