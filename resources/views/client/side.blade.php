<aside>
      <div id="sidebar" class="nav-collapse ">
      
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="{{route('client_home')}}">
                  <i class="icon_house_alt"></i>
                  <span>Home</span>
            </a>
          </li>

          <li >
            <a class="" href="{{route('client_profile')}}">
                  <i class="icon_house_alt"></i>
                  <span>Profile</span>
            </a>
          </li>

          <li >
            <a class="" href="{{route('client_current_balance')}}">
                  <i class="icon_house_alt"></i>
                  <span>Current Balance</span>
            </a>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Request Services</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{route('client_request_pending')}}">Pending</a></li>
              <li><a class="" href="{{route('client_request_approved')}}">Approved</a></li>
            </ul>
          </li>

          <li >
            <a class="" href="{{route('client_trans_history')}}">
                  <i class="icon_house_alt"></i>
                  <span>Transaction History</span>
            </a>
          </li>
         
        
          
        </ul>
        
      </div>
    </aside>