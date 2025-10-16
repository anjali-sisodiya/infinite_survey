
<div class="container-fluid page-body-wrapper">
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="{{ asset('images/user4.jpg') }}" alt="profile">
          <span class="login-status online"></span>        
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">Admin</span>
          
          <span class="text-secondary text-small">Project Manager</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
     <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basicc" aria-expanded="false" aria-controls="ui-basicc">
        <span class="menu-title">Fill Up Survey Forms</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basicc">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/beneficiary_form">Beneficiary Data Form</a></li>
          <li class="nav-item"> <a class="nav-link" href="/baseline_info_form">Baseline Information Form</a></li>
          <li class="nav-item"> <a class="nav-link" href="/ujwala_scheme_form">Ujwala Scheme Form</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Survey tables Data</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/show_beneficiary_data">Beneficiary Data List</a></li>
          <li class="nav-item"> <a class="nav-link" href="/show_baseline_data">Baseline Information Data List</a></li>
          <li class="nav-item"> <a class="nav-link" href="/show_ujwala_data">Ujwala Scheme Data List</a></li>

        </ul>
      </div>
    </li>
   
     <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Infinite Tables</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/infinite_tables">All Tables Lists</a></li>

        </ul>
      </div>
    </li>
  </ul>
</nav>
<div class="main-panel">