<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
  @can('admin_panel_access')
  <li class="nav-item">
    <a href="{{ route('admin.home') }}" class="nav-link @if(request()->is('admin')) active @endif">
      <i class="nav-icon fas fa-home"></i>
      <p>
        Dashboard
      </p>
    </a>
  </li>
  @endcan
  @canany(['product_access','satuan_access','pelanggan_access'])
  <li class="nav-item">
    <a href="#" class="nav-link
        @if(request()->is('admin/master/product') || request()->is('admin/master/product/*')) active @endif
        @if(request()->is('admin/master/satuan') || request()->is('admin/master/satuan/*')) active @endif
        @if(request()->is('admin/master/pelanggan') || request()->is('admin/master/pelanggan/*')) active @endif
        ">
      <i class="nav-icon fas fa-book"></i>
      <p>
        Master Data
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      @can('product_access')
      <li class="nav-item">
        <a href="{{ route('admin.product.index') }}" class="nav-link @if(request()->is('admin/master/product') || request()->is('admin/master/product/*')) active @endif" aria-expanded="true">
          <i class="far fa-circle nav-icon"></i>
          <p>Produk</p>
        </a>
      </li>
      @endcan
      @can('satuan_access')
      <li class="nav-item">
        <a href="{{ route('admin.satuan.index') }}" class="nav-link @if(request()->is('admin/master/satuan') || request()->is('admin/master/satuan/*')) active @endif">
          <i class="far fa-circle nav-icon"></i>
          <p>Satuan</p>
        </a>
      </li>
      @endcan
      @can('pelanggan_access')
      <li class="nav-item">
        <a href="{{ route('admin.pelanggan.index') }}" class="nav-link @if(request()->is('admin/master/pelanggan') || request()->is('admin/master/pelanggan/*')) active @endif" >
          <i class="far fa-circle nav-icon"></i>
          <p>Pelanggan</p>
        </a>
      </li>
      @endcan
    </ul>
  </li>
  @endcanany
  @canany(['users_access','roles_access','permissions_access'])
  <li class="nav-item">
    <a href="#" class="nav-link
        @if(request()->is('admin/acl/users') || request()->is('admin/acl/users/*')) active @endif
        @if(request()->is('admin/acl/roles') || request()->is('admin/acl/roles/*')) active @endif
        @if(request()->is('admin/acl/permissions') || request()->is('admin/master/permissions/*')) active @endif
        ">
      <i class="nav-icon fas fa-users"></i>
      <p>
        Users Management
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      @can('users_access')
      <li class="nav-item">
        <a href="{{ route('admin.users.index') }}" class="nav-link @if(request()->is('admin/acl/users') || request()->is('admin/acl/users/*')) active @endif" aria-expanded="true">
          <i class="far fa-circle nav-icon"></i>
          <p>Users</p>
        </a>
      </li>
      @endcan
      @can('roles_access')
      <li class="nav-item">
        <a href="{{ route('admin.roles.index') }}" class="nav-link @if(request()->is('admin/acl/roles') || request()->is('admin/acl/roles/*')) active @endif">
          <i class="far fa-circle nav-icon"></i>
          <p>Roles</p>
        </a>
      </li>
      @endcan
      @can('permissions_access')
      <li class="nav-item">
        <a href="{{ route('admin.permissions.index') }}" class="nav-link @if(request()->is('admin/acl/permissions') || request()->is('admin/acl/permissions/*')) active @endif" >
          <i class="far fa-circle nav-icon"></i>
          <p>Permissions</p>
        </a>
      </li>
      @endcan
    </ul>
  </li>
  @endcanany
  <li class="nav-item">
    <a href="javascript:void(0)" onclick="return logout(event);" class="nav-link">
      <form action="{{ route('logout') }}" method="POST" id="logout-form">
        @csrf
      </form>
        <i class="nav-icon fa fa-sign-out-alt"></i>
        <p>
          Logout
        </p>
      </a>
  </li>
</ul>
<script type="text/javascript">
  function logout(event){
          event.preventDefault();
          var check = confirm("Apakah anda yakin ingin keluar?");
          if(check){ 
             document.getElementById('logout-form').submit();
          }
   }
</script>