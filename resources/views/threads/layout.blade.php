<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kaalaman</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href={{asset('./css/app.css')}}>
    <link rel="shortcut icon" href="{{ asset('./favicon.ico') }}">
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
  </head>

  <body>
    <div class="mainContainer">
     
      <header> 
       <a href="/"><img src={{asset("./images/kaalaman-logo.png")}} class="logo" alt="" /></a>
        @guest
              <div class="user">
                  <div class="userDropDown headerIcons">
                      <i class="fa-regular fa-user guestIcon"></i>
                      <div class="guestUser-Section" id="userSection" style="display: none">
                          <span>Guest Mode</span>
                      </div>
                  </div>
                  <div class="headerIcon">
                      <i class="fa-regular fa-lightbulb headerIcons" id="darkmodeBtn"></i>
                  </div>
              </div>
          @else
              <div class="user">
                  <div class="userDropDown headerIcons">
                      <img src={{asset("./images/AvatarUsers2_20.png")}} />
                      <div class="user-Section" id="userSection" style="display: none">
                          <span>{{Auth::user()->name}}</span>
                          <button><a href="{{url('/profile/' . Auth::id())}}" class="userDropDownButton">Account Profile</a></button>
                          
                              <a class="userDropDownButton" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                        
                      </div>
                  </div>

                  <div class="headerIcon">
                    <i class="fa-regular fa-bell headerIcons" id="notification"></i>
                    
                    @yield('notificationSection')
                  
                      <i class="fa-regular fa-lightbulb headerIcons" id="darkmodeBtn"></i>
                  </div>
              </div>
          @endguest
      </header>
      
      <div class="subContainer">
        @yield('modular')

        <div class="sidebar">
          <div class="categoriesContainer">
            <div class="categoryContainer">
              <h2 class="categories-h2">Categories</h2>
            </div>
            <div class="categoryContainer">
              <input type="checkbox" name="category" id="technologyBtn" /><label
                for="Technology"
                >Technology <span id="technologyCategoryCounter">0</span></label
              >
            </div>
            <div class="categoryContainer">
              <input type="checkbox" name="category" id="ecommerceBtn" /><label
                for="E-Commerce"
                >E-Commerce <span id="ecommCategoryCounter">0</span></label
              >
            </div>
            <div class="categoryContainer">
              <input type="checkbox" name="category" id="healthBtn" /><label
                for="Health & lifestyle"
                >Health & lifestyle <span id="healthCategoryCounter">0</span></label
              >
            </div>
            <div class="categoryContainer">
              <input type="checkbox" name="category" id="gameBtn" /><label
                for="Games"
                >Games <span id="gamesCategoryCounter">0</span></label
              >
            </div>
            <div class="categoryContainer">
              <input type="checkbox" name="category" id="foodBtn" /><label
                for="Food"
                >Food <span id="foodCategoryCounter">0</span></label
              >
            </div>
            <div>
              <button class="sideBarBtn">close</button>
            </div>
          </div>
        </div>

        <div class="threadContainer">
          <div class="threadNavContainer">
            <div class="sideBar-toggle"><i class="fa-solid fa-bars"></i></div>
            <div class="searchBar">
              <input
                type="text"
                class="input searchBarinput"
                placeholder="search"
                id="seacrhInput"
                name="seacrhInput"
              />
              <i class="fa-solid fa-magnifying-glass searchBarLogo"></i>

              
             @yield('hidePostThreadBtn')
             
            </div>
          </div>

          <div class="threadContentContainer">

            @yield('threadContent')
          </div>

          <div class="creatorContainer">
           
            <footer>  
              <div class="footer-container">
                <div class="footer-row">
                    {{-- <div class="footer-col">
                        <p>Your donations will be use for maintaining Kaalaman.<br> We truly appreciate yor support.</p>
                        <img class="gcash" src={{asset("./images/gcash-logo-square-180x180.jpg")}}>
                    </div> --}}
                       
                    <div class="footer-col">         
                              <ul class="footer-links">
                              <li><a href="">FAQs</a></li>
                              <li><a href="">Forum Rules</a></li>
                              <li><a href="">Privacy Policy</a></li>
                              <li><a href="">Terms and Conditions</a></li>
                            </ul>
                    </div>       
                    

                    <!-- 2nd Column -->

                    <div class="footer-col">
                      
                      <ul class="footer-links">
                          <li><a href="">About Us</a></li>
                          <li><a href="">Vision</a></li>
                          <li><a href="">Mission</a></li>
                          <li><a href="">Contact Us</a></li>
                      </ul>
                    </div>

                    <div class="footer-col">  
                      <h6 class="newsletter">Newsletter</h6>
                      <input type="text" placeholder="Your Name" class="inputname">
                      <input type="email" placeholder="Enter Email" class="inputemail">
                      <input type="submit" placeholder="Submit" class="inputsubmit">
                    </div>
                </div>  
            </div> 
          </footer> 

          </div>
              
              
          </div>
        </div>

        <div class="rightContainer">
          <div class="postThreadContainer" >
            @yield('postThreadContent')
          </div>
        <div class="latestContainer">
            <h3 class="latest">Latest post</h3>
            <div class="latestContent">
                @yield('latestContent')
            </div>
          </div>
        </div>
      </div>
    </div>


    <script type="text/javascript">
        
      $('#seacrhInput').on('keyup',function() {
     
       $value=$(this).val();
        $.ajax({
          type:'get',
          url:'{{URL::to('/')}}',
          data:{'seacrhInput':$value},

          success:function(data){
            console.log(data);
            $('.threadContentContainer').html(data)
          }

        })
      })
      
    </script> 

       <script type="text/javascript">
       $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        </script> 

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src={{asset("./main.js")}}></script>
    <script src="https://kit.fontawesome.com/26177573c7.js" crossorigin="anonymous"></script>
  </body>
</html>