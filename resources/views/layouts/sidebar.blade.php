<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/">RFM Computer</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="/">RFM</a>
      </div>
      <ul class="sidebar-menu">
        
        @if(auth()->user()->role == 'admin')
        <li class="menu-header">Dashboard</li>
        <li class="nav-item dropdown {{ ($title == "Dashboard") ? 'active' : '' }}">
          <a href="/" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
        </li>

          <li class="menu-header">Data</li>
          <li class="nav-item dropdown {{ ($title == "Jenis" || $title == "Satuan") ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th"></i> <span>Kategori</span></a>
            <ul class="dropdown-menu">
              <li class="{{ ($title == "Jenis") ? 'active' : '' }}"><a class="nav-link" href="/admin/jenis">Jenis</a></li>
              <li class="{{ ($title == "Satuan") ? 'active' : '' }}"><a class="nav-link" href="/admin/satuan">Satuan</a></li>
            </ul>
          </li>

          <li class="nav-item dropdown {{ ($title === "Barang") ? 'active' : '' }}">
            <a href="/admin/barang" class="nav-link"><i class="fas fa-boxes"></i><span>Barang</span></a>
          </li>
          <li class="nav-item dropdown {{ ($title === "Stock") ? 'active' : '' }}">
            <a href="/admin/stock" class="nav-link"><i class="fas fa-cubes"></i><span>Stock</span></a>
          </li>
          
          <li class="menu-header">Inventaris</li>
          <li class="nav-item dropdown {{ ($title == "Barang Masuk") ? 'active' : '' }}">
            <a href="/admin/barang_masuk" class="nav-link"><i class="fas fa-box-open"></i><span>Barang Masuk</span></a>
          </li>

          <li class="nav-item dropdown {{ ($title == "Barang Keluar") ? 'active' : '' }}">
            <a href="/admin/barang_keluar" class="nav-link"><i class="fas fa-truck-loading"></i><span>Barang Keluar</span></a>
          </li>
          
          <li class="nav-item dropdown {{ ($title == "Laporan") ? 'active' : '' }}">
            <a href="/admin/laporan" class="nav-link"><i class="fas fa-clipboard-list"></i><span>Laporan</span></a>
          </li>
          @else
          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown {{ ($title == "Dashboard") ? 'active' : '' }}">
            <a href="/" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
          </li>

          <li class="nav-item dropdown {{ ($title == "Karyawan") ? 'active' : '' }}">
            <a href="/pemilik/karyawan" class="nav-link"><i class="fas fa-user"></i><span>Karyawan</span></a>
          </li>

          <li class="nav-item dropdown {{ ($title == "Laporan") ? 'active' : '' }}">
            <a href="/pemilik/laporan" class="nav-link "><i class="fas fa-clipboard-list"></i><span>Laporan</span></a>
          </li>
          @endif
          
        </ul>

    </aside>
  </div>