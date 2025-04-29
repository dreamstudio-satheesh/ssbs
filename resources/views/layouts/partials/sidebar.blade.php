<!-- Sidebar -->
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
      <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="fw-semibold text-white tracking-wide" href="/">
          <span class="smini-visible">
            D<span class="opacity-75">x</span>
          </span>
          <span class="smini-hidden">
            SSBS<span class="opacity-75"> - Starlit</span>
          </span>
        </a>
        <!-- END Logo -->
  
        <!-- Options -->
        <div>
          <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');">
            <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
          </button>
          <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#dark-mode-toggler" data-class="far fa" onclick="Dashmix.layout('dark_mode_toggle');">
            <i class="far fa-moon" id="dark-mode-toggler"></i>
          </button>
          <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
            <i class="fa fa-times-circle"></i>
          </button>
        </div>
        <!-- END Options -->
      </div>
    </div>
    <!-- END Side Header -->
  
    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
      <!-- Side Navigation -->
      <div class="content-side content-side-full">
        <ul class="nav-main">
  
          <li class="nav-main-item">
            <a class="nav-main-link{{ request()->routeIs('dashboard') ? ' active' : '' }}" href="{{ route('dashboard') }}">
              <i class="nav-main-link-icon fa fa-location-arrow"></i>
              <span class="nav-main-link-name">Dashboard</span>
            </a>
          </li>
  
          <li class="nav-main-heading">About Us</li>
  
          <li class="nav-main-item">
            <a class="nav-main-link{{ request()->is('about') ? ' active' : '' }}" href="{{ url('about') }}">
              <i class="nav-main-link-icon fa fa-info-circle"></i>
              <span class="nav-main-link-name">About</span>
            </a>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link{{ request()->is('testimonials') ? ' active' : '' }}" href="{{ url('testimonials') }}">
              <i class="nav-main-link-icon fa fa-users-cog"></i>
              <span class="nav-main-link-name">Testimonials</span>
            </a>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link{{ request()->is('awards') ? ' active' : '' }}" href="{{ url('awards') }}">
              <i class="nav-main-link-icon fa fa-trophy"></i>
              <span class="nav-main-link-name">Awards</span>
            </a>
          </li>
  
          <li class="nav-main-heading">Products</li>
  
          <li class="nav-main-item">
            <a class="nav-main-link{{ request()->routeIs('categories.*') ? ' active' : '' }}" href="{{ route('categories.index') }}">
              <i class="nav-main-link-icon fa fa-list"></i>
              <span class="nav-main-link-name">Categories</span>
            </a>
          </li>
          <li class="nav-main-item">
            <a class="nav-main-link{{ request()->routeIs('products.*') ? ' active' : '' }}" href="{{ route('products.index') }}">
              <i class="nav-main-link-icon fa fa-box"></i>
              <span class="nav-main-link-name">Products</span>
            </a>
          </li>
  
          <li class="nav-main-item">
            <a class="nav-main-link{{ request()->routeIs('services.*') ? ' active' : '' }}" href="{{ route('services.index') }}">
              <i class="nav-main-link-icon fa fa-cogs"></i>
              <span class="nav-main-link-name">Services</span>
            </a>
          </li>
  
          <li class="nav-main-item">
            <a class="nav-main-link{{ request()->routeIs('projects.*') ? ' active' : '' }}" href="{{ route('projects.index') }}">
              <i class="nav-main-link-icon fa fa-project-diagram"></i>
              <span class="nav-main-link-name">Projects</span>
            </a>
          </li>
  
          <li class="nav-main-heading">Other Sections</li>
  
          <li class="nav-main-item">
            <a class="nav-main-link{{ request()->routeIs('galleries.*') ? ' active' : '' }}" href="{{ route('galleries.index') }}">
              <i class="nav-main-link-icon fa fa-images"></i>
              <span class="nav-main-link-name">Photo Gallery</span>
            </a>
          </li>
  
          <li class="nav-main-item">
            <a class="nav-main-link{{ request()->routeIs('testimonials.*') ? ' active' : '' }}" href="{{ route('testimonials.index') }}">
              <i class="nav-main-link-icon fa fa-comments"></i>
              <span class="nav-main-link-name">Client Feedback</span>
            </a>
          </li>
          
          <li class="nav-main-item">
            <a class="nav-main-link{{ request()->routeIs('contacts.*') ? ' active' : '' }}" href="{{ route('contacts.index') }}">
              <i class="nav-main-link-icon fa fa-envelope"></i>
              <span class="nav-main-link-name">Contact Enquiries</span>
            </a>
          </li>
  
          <li class="nav-main-item">
            <a class="nav-main-link{{ request()->routeIs('sliders.*') ? ' active' : '' }}" href="{{ route('sliders.index') }}">
              <i class="nav-main-link-icon fa fa-sliders-h"></i>
              <span class="nav-main-link-name">Home Slider</span>
            </a>
          </li>
  
          <li class="nav-main-item">
            <a class="nav-main-link{{ request()->routeIs('blogs.*') ? ' active' : '' }}" href="{{ route('blogs.index') }}">
              <i class="nav-main-link-icon fa fa-blog"></i>
              <span class="nav-main-link-name">Blog</span>
            </a>
          </li>
  
          <li class="nav-main-item">
            <a class="nav-main-link{{ request()->routeIs('steel-rates.*') ? ' active' : '' }}" href="{{ route('steel-rates.index') }}">
              <i class="nav-main-link-icon fa fa-industry"></i>
              <span class="nav-main-link-name">Steel Rate Submission</span>
            </a>
          </li>
  
          <li class="nav-main-item">
            <a class="nav-main-link{{ request()->routeIs('seo-settings.*') ? ' active' : '' }}" href="{{ route('seo-settings.index') }}">
              <i class="nav-main-link-icon fa fa-search"></i>
              <span class="nav-main-link-name">SEO Settings</span>
            </a>
          </li>
          
          <li class="nav-main-item">
            <a class="nav-main-link{{ request()->is('social-media') ? ' active' : '' }}" href="{{ url('social-media') }}">
              <i class="nav-main-link-icon fa fa-share-alt"></i>
              <span class="nav-main-link-name">Social Media Links</span>
            </a>
          </li>
  
          <li class="nav-main-item">
            <a class="nav-main-link" href="{{ url('logout') }}">
              <i class="nav-main-link-icon fa fa-sign-out-alt"></i>
              <span class="nav-main-link-name">Logout</span>
            </a>
          </li>
  
        </ul>
      </div>
      <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
  </nav>
  <!-- END Sidebar -->
  