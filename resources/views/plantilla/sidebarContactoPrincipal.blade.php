 <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    
   <!---AQUI SE VE LO DEL SIDE BAR--->
   <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li  class="app-sidebar__heading">Inicio</li>
                                <li @click="menu=0">
                                    <a  class="mm-active">
                                        <i class="metismenu-icon pe-7s-display1"></i>
Tablero Principal
                                    </a>
                                </li>
                           
                              <li   @click="menu=4">
                                     <a  >
                                        <i class="metismenu-icon pe-7s-users"></i>
                                        Resultados de cursos
                                    </a>
                                </li>
                               <li  @click="menu=7">
                              
                                    <a  >
                                        <i class="metismenu-icon  "> <i class="fa fa-fw" aria-hidden="true" title="Copy to use commenting"></i></i>
Tickets                                  </a>
                                  </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>  