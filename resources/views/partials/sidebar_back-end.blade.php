  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#akun-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Kelola Akun</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="akun-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                  <a href="/tambah-akun">
                    <i class="bi bi-circle"></i><span>Tambah Akun</span>
                  </a>
                </li>
                <li>
                  <a href="">
                    <i class="bi bi-circle"></i><span>Data Akun</span>
                  </a>
                </li>
              </ul>
            </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Cuti</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            @if (Auth::user()->id_roles != 3 )
                <li>
                <a href="/jenis-cuti">
                    <i class="bi bi-circle"></i><span>Jenis Cuti</span>
                </a>
                </li>
            @endif
          <li>
            <a href="/pengajuan-cuti">
              <i class="bi bi-circle"></i><span>Pengajuan Cuti</span>
            </a>
          </li>
          <li>
            <a href="/data-cuti">
              <i class="bi bi-circle"></i><span>Semua Data Cuti</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

    </ul>

  </aside><!-- End Sidebar-->
