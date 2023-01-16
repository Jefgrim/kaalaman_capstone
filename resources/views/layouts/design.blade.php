<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kaalaman | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href={{asset('css/app.css')}}>
  </head>

  <body>
    <div class="mainContainer">
     
      <header>
        <a href="/"><img src={{asset("images/kaalaman-logo.png")}} class="logo" alt="" /></a>
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
                      <img src={{asset("images/AvatarUsers2_20.png")}} />
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
      
      <div class="noSidePanelSubContainer">

        <div class="threadContainer">
          <div class="threadContentContainer">
            @yield('faqContent')
            @yield('privacy-policy')
            @yield('Terms-Condition')
            @yield('forum-rules')
            @yield('userProfile')
            @yield('vision')
            @yield('mission')
            @yield('contact-us')
            @yield('commentContent')
            @yield('login')
            @yield('fPassword')
            @yield('register')
            @yield('404')
          </div>

          <div class="creatorContainer">
              <div class="donate">
                Donate
                <p class="donation">Your donations will be use for maintaining the website. We truly appreciate your support</p>
                
                <img class="gcash" src={{asset("images/gcash-logo-square-180x180.jpg")}}>
                
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
                    <img class="pic-creator" src={{asset("images/5.png")}}>
                  </div>
                  <div class="creatorDetailsNameContainer">
                    <span class="name">Nicky Esteban</span>
                  </div>
                </div>
                
                <div class="creatorDetailsContainer">
                  <div>
                    <img class="pic-creator" src={{asset("images/3.png")}}>
                  </div>
                  <div class="creatorDetailsNameContainer">
                    <span class="name">Jefgrim Alvar</span>
                  </div>
                </div> 
                <div class="creatorDetailsContainer">   
                  <div>
                    <img class="pic-creator" src={{asset("images/6.png")}}>
                  </div>
                  <div class="creatorDetailsNameContainer">
                    <span class="name">Jomarie Cailing</span>
                  </div>
                </div> 
            </div>
          </div>
        </div>
      </div>
      @yield('replyModal')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="module" src={{asset("main.js")}}></script>
    <script
      src="https://kit.fontawesome.com/26177573c7.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>