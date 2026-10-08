    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="{{Route('front.index')}}" class="navbar-brand p-0">
                    <h1 class="m-0">BizConsult</h1>
                    <!-- <img src="{{asset('assets-front')}}/img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{Route('front.index')}}" class="nav-item nav-link @yield('active_home')">Home</a>
                        <a href="{{Route('front.about')}}" class="nav-item nav-link @yield('active_about')">About</a>
                        <a href="{{Route('front.service')}}" class="nav-item nav-link @yield('active_service')">Service</a>
                        <a href="{{Route('front.contact')}}" class="nav-item nav-link @yield('active_contact')">Contact</a>
                    </div>
                </div>
            </nav>
