  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
          <i class="fas fa-user-tie"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin
        @role("ekraf")
        Ekraf
        @endrole

        @role("super")
         Super
        @endrole

        @role("guest")
         Guest
        @endrole

        @role("pariwisata")
         Pariwisata
        @endrole




        </div>
      </a>

    

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item dashboard">
        <a class="nav-link" href="{{ URL::to('/dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Record
      </div>

      <li class="nav-item admin">
        <a class="nav-link" href="{{ URL::to('/admin') }}">
          <i class="fas fa-fw fa-user-tie"></i>
          <span>Admin</span>
        </a>
      </li>




  

      <!-- Nav Item - Ekraf Collapse Menu -->
      <li class="nav-item ekraf">
        <a class="nav-link collapsed ekraf" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
         <i class="fas fa-store"></i>
          <span>Ekraf</span>
        </a>


        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Ekraf :</h6>
            <a class="collapse-item" href="{{ URL::to('/umkm') }}">UMKM</a>
            <a class="collapse-item" href="{{ URL::to('/event/ekraf') }}">Event Ekraf</a>
          </div>
        </div>
      </li>

     
  

      <!-- Nav Item - Budaya Collapse Menu -->
      <li class="nav-item budaya">
        <a class="nav-link collapsed budaya" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fas fa-fw fa-palette"></i>
          <span>Budaya</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Budaya :</h6>
            <a class="collapse-item" href="{{ URL::to('/culture') }}">Situs Budaya</a>
            <a class="collapse-item" href="{{ URL::to('/event/budaya') }}">Event Budaya</a>
          </div>
        </div>
      </li>


  <!-- Nav Item - Pariwista Collapse Menu -->
   <li class="nav-item pariwisata">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          <i class="fas fa-fw fa-umbrella-beach"></i>
          <span>Pariwisata</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Parwisata:</h6>
            <a class="collapse-item" href="{{ URL::to('/penginapan') }}">Penginapan</a>
            <a class="collapse-item" href="{{ URL::to('/event/pariwisata') }}">Event Pariwisata</a>
            <a class="collapse-item" href="{{ URL::to('/destinasiwisata') }}">Destinasi Wisata</a>
          </div>
        </div>
      </li>

          <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Internal
      </div>
         <li class="nav-item rapat">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
          <i class="fa fa-handshake" aria-hidden="true"></i>
          <span>Rapat</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Rapat:</h6>
            <a class="collapse-item" href="{{ URL::to('/rapat/kadis') }}">Rapat Kadis</a>
            <a class="collapse-item" href="{{ URL::to('/rapat/kadis/kalender') }}">Kalender Rapat Kadis</a>
            <a class="collapse-item" href="{{ URL::to('/rapat/sekbid') }}">Rapat Sekbid-Bidang</a>
            <a class="collapse-item" href="{{ URL::to('/rapat/sekbid/kalender') }}">Kalender Rapat Sekbid-<br>Bidang</a>
          </div>
        </div>
      </li>




   


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>