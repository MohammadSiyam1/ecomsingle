<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bolder ms-2">EcomSingle</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item active">
        <a href="{{route('admin.dashboard')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>



      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Category</span>
      </li>
      <li class="menu-item">
        <a href="{{route('admin.allcategory')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">All Category</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{route('admin.addcategory')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Add Category</div>
        </a>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Sub Category</span>
      </li>
      <li class="menu-item">
        <a href="{{route('admin.allsubcategory')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">All Sub Category</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{route('admin.addsubcategory')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Add Sub Category</div>
        </a>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Product</span>
      </li>
      <li class="menu-item">
        <a href="{{route('admin.allproduct')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">All Products</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{route('admin.addproduct')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Add Product</div>
        </a>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Orders</span>
      </li>
      <li class="menu-item">
        <a href="{{route('admin.pendingorder')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Pending Orders</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="index.html" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Completed Orders</div>
        </a>
      </li>


      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Settings</span>
      </li>

      <li class="menu-item">
        <form id="logout-form" action="{{route('logout')}}" method="POST">
            @csrf</form>
            <a href="{{route('logout')}}" class="menu-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Logout</div>
        </a>
      </li>


    </ul>
  </aside>
