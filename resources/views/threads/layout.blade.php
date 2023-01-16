<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kaalaman</title>
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
                          <button> 
                              <a class="userDropDownButton" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </button>
                      </div>
                  </div>

                  <div class="headerIcon">
                      <i class="fa-regular fa-bell headerIcons" id="notification"></i>
                      <i class="fa-regular fa-lightbulb headerIcons" id="darkmodeBtn"></i>
                  </div>
              </div>
          @endguest
      </header>
      
      <div class="subContainer">

        <div class="modular">
          
          <div class="expandPostThread"> 
            <div class="postThreadContainer" >
              <form class="postThreadContent" action="/thread" method="post">
                {{ csrf_field() }}
                <div class="h2Container">
                  <h2 class="thread-post">CREATE A THREAD</h2>
                  <i id="closeBtn" class="fa-regular fa-circle-xmark expandBtn"></i>
                </div>
  
                <div class="category-title">
                  <input
                    type="text"
                    placeholder="Title"
                    id="expandedTitleInp"
                    class="titleInp"
                    name="title"
                    required
                  />
                  <select id="expandedSelectCategory" class="selectCategory"  name="category" required>
                    <option value=""selected disabled>Select Category</option>
                    <option value="Technology">Technology</option>
                    <option value="E-commerce">E-Commerce</option>
                    <option value="Health-Lifestyle">Health & Lifestyle</option>
                    <option value="Games">Games</option>
                    <option value="Food-Beverages">Food & Beverages</option>
                  </select>
                </div>
                <div class="threadInpContainer">
                  <textarea id="expandedThreadInp" class="threadInp" name="threadpost" required></textarea>
                </div>
                <div class="threadBtnContainer">
                  
                  
                  <button type="submit" id="expandedPostBtn" class="postBtn">Post</button>
                </div>
              </form>
            </div>
            </div>
        </div>

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
              <div class="hidePostThreadBtn"><i class="fa-solid fa-pen-to-square"></i></div>
            </div>
          </div>

          <div class="threadContentContainer">

            @yield('threadContent')
          </div>

          <div class="creatorContainer">
              <div class="donate">
                Donate
                <p class="donation">Your donations will be use for maintaining the website. We truly appreciate your support</p>
                
                <img class="gcash" src={{asset("./images/gcash-logo-square-180x180.jpg")}}>
                
              </div>
                

              <div class="links">
             
                <div>Links
                  <p class="links-2"><a class="footerLinks" href="/faq">FAQs</a></p>
                  <p class="links-2"><a  class="footerLinks" href="/rules">Forum Rules</a></p>
                  <p class="links-2"><a class="footerLinks" href="/privacy-policy">Privacy Policy</a></p>
                  <p class="links-2"><a class="footerLinks" href="/terms-condition"> Terms and Conditions</a></p>
                  </div>
                  <div class="other-links">
                    <p class="links-2"><a href="/vision" class="footerLinks">Vision</a></p>
                    <p class="links-2"><a href="/mission" class="footerLinks">Mission</a></p>
                    <p class="links-2"><a href="/contactUs" class="footerLinks">Contact Us</a></p>
                 

                  </div>
              </div>
              

              <div class="about">
                About
              
              <p class="about-kaalaman">Kaalaman is an online forum community where people can get to share their knowledge and experiences regarding a certain topic. </p>
              </div>

              <div class="creator">
                Creators
                <div class="creatorDetailsContainer">
                  <div>
                    <img class="pic-creator" src={{asset("./images/AvatarUsers2_49.png")}}>
                  </div>
                  <div class="creatorDetailsNameContainer">
                    <span class="name">Nicky Esteban</span>
                  </div>
                </div>
                
                <div class="creatorDetailsContainer">
                  <div>
                    <img class="pic-creator" src={{asset('./images/AvatarUsers2_38.png')}}> 
                  </div>
                  <div class="creatorDetailsNameContainer">
                    <span class="name">Jefgrim Alvar</span>
                  </div>
                </div> 
                <div class="creatorDetailsContainer">   
                  <div>
                    <img class="pic-creator" src={{asset("./images/AvatarUsers2_36.png")}}>
                  </div>
                  <div class="creatorDetailsNameContainer">
                    <span class="name">Jomarie Cailing</span>
                  </div>
                </div> 
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
    <script type="module" src={{asset("./main.js")}}></script>
    
    
    <script
    
      src="https://kit.fontawesome.com/26177573c7.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>