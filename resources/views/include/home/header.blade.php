  <header class="top-header">
      <nav class="navbar navbar-expand align-items-center gap-4">
          <div class="btn-toggle">
              <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
          </div>
          <div class="search-bar flex-grow-1">
              <div class="position-relative">
                  <div class="search-popup p-3">
                      <div class="card rounded-4 overflow-hidden">
                          <div class="card-body search-content">
                              <div class="d-flex align-items-start flex-wrap gap-2 kewords-wrapper">
                                  <a href="javascript:;"></a>
                                  <a href="javascript:;"></a>
                                  <a href="javascript:;"></a>
                                  <a href="javascript:;"></a>
                                  <a href="javascript:;"></a>
                                  <a href="javascript:;"></a>
                                  <a href="javascript:;"></a>
                              </div>
                              <hr>
                          </div>
                          <div class="card-footer text-center bg-transparent">
                              <a href="javascript:;"></a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <ul class="navbar-nav gap-1 nav-right-links align-items-center">
              <li class="nav-item d-lg-none mobile-search-btn">
                  <a class="nav-link" href="javascript:;"></a>
              </li>
              <li class="nav-item dropdown">
                  <a href="javascript:;">
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                      <li><a href="javascript:;"></a></li>
                      <li><a href="javascript:;"></a></li>
                      <li><a href="javascript:;"></a></li>
                      <li><a href="javascript:;"></a></li>
                      <li><a href="javascript:;"></a></li>
                      <li><a href="javascript:;"></a></li>
                      <li><a href="javascript:;"></a></li>
                      <li><a href="javascript:;"></a></li>
                  </ul>
              </li>

              <li>
                  <a href="javascript:;"></a>
              </li>
              <li class="nav-item dropdown">
                  <a href="javascript:;"></a>

              </li>
              <li class="nav-item dropdown">
                  <a href="javascript:;">
                  </a>
                  <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
                      <div class="px-3 py-1 d-flex align-items-center justify-content-between border-bottom">
                          <h5 class="notiy-title mb-0"></h5>
                          <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle dropdown-toggle-nocaret option"
                                  type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <span class="material-icons-outlined">
                                      more_vert
                                  </span>
                              </button>
                              <div class="dropdown-menu dropdown-option dropdown-menu-end shadow">
                                  <div><a href="javascript:;"></a></div>
                                  <div><a href="javascript:;"></a></div>
                                  <div><a href="javascript:;"></a></div>
                                  <div><a href="javascript:;"></a></div>
                                  <div>
                                      <hr class="dropdown-divider">
                                  </div>
                                  <div><a href="javascript:;"></a></div>
                              </div>
                          </div>
                      </div>
                      <div class="notify-list">
                          <div><a href="javascript:;"></a></div>
                          <div><a href="javascript:;"></a></div>
                          <div><a href="javascript:;"></a></div>
                          <div><a href="javascript:;"></a></div>
                          <div><a href="javascript:;"></a></div>
                          <div><a href="javascript:;"></a></div>
                      </div>
                  </div>
              </li>
              <li class="nav-item dropdown">
                  <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                      <img src="https://placehold.co/110x110/png" class="rounded-circle p-1 border" width="45"
                          height="45" alt="">
                  </a>
                  <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                      <a class="dropdown-item  gap-2 py-2" href="javascript:;">
                          <div class="text-center">
                              <img src="https://placehold.co/110x110/png" class="rounded-circle p-1 shadow mb-3"
                                  width="90" height="90" alt="">
                              <h5 class="user-name mb-0 fw-bold">Hello, {{ Auth::user()->name }}</h5>
                          </div>
                      </a>
                      <hr class="dropdown-divider">
                      <a href="javascript:;"></a>
                      <a href="javascript:;"></a>
                      <a href="javascript:;"></a>
                      <a href="javascript:;"></a>
                      <a href="javascript:;"></a>
                      <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                          <i class="material-icons-outlined">power_settings_new</i>
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
              </li>
          </ul>
      </nav>
  </header>
