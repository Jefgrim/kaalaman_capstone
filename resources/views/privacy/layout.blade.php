<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kaalaman</title>
    <link rel="stylesheet" href={{asset('css/app.css')}}>
  </head>

  <body>
    <div class="mainContainer">
     
      <header>
        
        <img src="images/kaalaman-logo.png" class="logo" alt="" />

        <div class="user">
          <div class="userDropDown headerIcons">
            <img src=".//images/Avatar Users2_20.png" />
            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

            <div class="user-Section" id="userSection" style="display: none">
              <span>Current User</span>
              <button>Account Profile</button>
              <button>Settings and Privacy</button>
              <button>Customize</button>
              <button>Help and Support</button>
              <button>Give Feedback</button>
              <button>Display and Accessibility</button>
              <button>log-out</button>
            </div>
          </div>

          <div class="headerIcon">
            <i class="fa-regular fa-bell headerIcons" id="notification"></i>
            <i class="fa-regular fa-lightbulb headerIcons" id="darkmodeBtn"></i>
          </div>
          {{-- sadasdas --}}
        </div>

      </header>
      
      <div class="subContainer">

        <div class="modular">
          
          <div class="expandPostThread"> 
            <div class="postThreadContainer" >
              <form class="postThreadContent">
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
                    required
                  />
                  <select id="expandedSelectCategory" class="selectCategory" required>
                    <option value=""selected disabled>Select Category</option>
                    <option value="Technology">Technology</option>
                    <option value="E-commerce">E-Commerce</option>
                    <option value="Health-Lifestyle">Health & Lifestyle</option>
                    <option value="Games">Games</option>
                    <option value="Food-Beverages">Food & Beverages</option>
                  </select>
                </div>
                <div class="threadInpContainer">
                  <textarea id="expandedThreadInp" class="threadInp" required></textarea>
                </div>
                <div class="threadBtnContainer">
                  
                  
                  <button type="button" id="expandedPostBtn" class="postBtn">Post</button>
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
                
                <img class="gcash" src=".//images/gcash-logo-square-180x180.jpg">
                
              </div>
                

              <div class="links">
             
                <div>Links
                <p class="links-2">FAQs</p>
                  <p class="links-2">Forum Rules</p>
                  <p class="links-2">Privacy Policy</p>
                  <p class="links-2">Terms and Conditions</p>
                  </div>
                  <div class="other-links">
                  <p class="links-2">Vision</p>
                  <p class="links-2">Mission</p>
                  <p class="links-2">Contact Us</p>
                  <p class="links-2">Affiliate</p>
                  

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
                    <img class="pic-creator" src=".//images/5.png">
                  </div>
                  <div class="creatorDetailsNameContainer">
                    <span class="name">Nicky Esteban</span>
                  </div>
                </div>
                
                <div class="creatorDetailsContainer">
                  <div>
                    <img class="pic-creator" src=".//images/3.png">
                  </div>
                  <div class="creatorDetailsNameContainer">
                    <span class="name">Jefgrim Alvar</span>
                  </div>
                </div> 
                <div class="creatorDetailsContainer">   
                  <div>
                    <img class="pic-creator" src=".//images/6.png">
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

    <script type="module" src="main.js"></script>
    <script
      src="https://kit.fontawesome.com/26177573c7.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>