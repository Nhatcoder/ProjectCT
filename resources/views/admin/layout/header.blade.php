 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item nav-profile">
             <a href="#" class="nav-link">
                 <div class="profile-image">
                     <img class="img-xs rounded-circle" src="{{ asset('admin') }}/images/faces/face8.jpg"
                         alt="profile image">
                     <div class="dot-indicator bg-success"></div>
                 </div>
                 <div class="text-wrapper">
                     <p class="profile-name">Allen Moreno</p>
                     <p class="designation">Administrator</p>
                 </div>
                 <div class="icon-container">
                     <i class="icon-bubbles"></i>
                     <div class="dot-indicator bg-danger"></div>
                 </div>
             </a>
         </li>
         <li class="nav-item nav-category">
             <span class="nav-link">Dashboard</span>
         </li>
         <li class="nav-item">
             <a class="nav-link" href="index.html">
                 <span class="menu-title">Dashboard</span>
                 <i class="icon-screen-desktop menu-icon"></i>
             </a>
         </li>
         {{-- <li class="nav-item nav-category"><span class="nav-link">Danh mục</span></li> --}}
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="{{ route('category.index') }}" aria-expanded="false" aria-controls="ui-basic">
                 <span class="menu-title">Danh mục</span>
                 <i class="icon-layers menu-icon"></i>
             </a>
             
         </li>
        
         
     </ul>
 </nav>
