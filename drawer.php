

<aside  class="mdc-drawer">
                            <div id="mySidenav" class="sidenav">
                          <div class="mdc-drawer__content">
                            <nav class="mdc-list">
                              <a class="mdc-list-item mdc-list-item--activated" href="#" aria-selected="true">
                                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">dashboard</i>
                                <span class="mdc-list-item__text">Dashboard</span>
                              </a>
                              <a class="mdc-list-item" href="#">
                                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">format_list_bulleted</i>
                                <span class="mdc-list-item__text">Listing</span>
                              </a>
                              <a class="mdc-list-item" href="#">
                                <i class="material-icons mdc-list-item__graphic" aria-hidden="true">person</i>
                                <span class="mdc-list-item__text">Accounts</span>
                              </a>
                              <hr class="mb-4">
                                
                              <a class="nav-link" href="<?php echo $home_url; ?>logout.php">
                                <span class="mdc-top-app-bar__section--align-end">Logout</span>
                              </a>
                            </nav>
                            
                          </div>
                           </div>
                        </aside>
       

        <div class="mdc-drawer-app-content">
          <header class="mdc-top-app-bar">
            <div class="mdc-top-app-bar__row">
                
              <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">

                <a type="button" onclick="openNav()" id="sidebarCollapse" class="demo-menu material-icons mdc-top-app-bar__navigation-icon">menu</a>
                <h3>Dashboard</h3>
                <!-- <h3 class="headtitle"><strong>Dashboard</strong></h3> -->
              </section>
              <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" role="toolbar">
                <a class="material-icons mdc-top-app-bar__action-item" aria-label="Search" alt="Search">search</a>
              </section>
            </div>
          </header>
      
          <main onclick="closeNav()" class="main-content">
            <div class="mdc-top-app-bar--fixed-adjust">


            </div>
          </main>
        </div>