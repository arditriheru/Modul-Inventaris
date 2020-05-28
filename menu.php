<?php include "readme.php";?>
<!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="https://instagram.com/arditriheru" class="navbar-brand">S I M E T R I S</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-plus"></i> Inventaris <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="inventaris-filter">Lihat</a></li>
                <li><a href="inventaris-tambah">Tambah</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-plus"></i> Jenis <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="inventaris-filter">Lihat</a></li>
                <li><a href="inventaris-tambah">Tambah</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-plus"></i> Ruangan <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="inventaris-filter">Lihat</a></li>
                <li><a href="inventaris-tambah">Tambah</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i>&nbsp;<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="divider"></li>
                <li>
                  <a href="../"><i class="fa fa-power-off">
                  </i> Log Out</a>
                </li>
              </ul>
            </li>
          </ul>