<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kaalaman | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('./favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <link rel="stylesheet" href={{asset('./css/app.css')}}>
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
                      <div class="guestUser-Section-design" id="userSection" style="display: none">
                          <span>Guest Mode</span>
                      </div>
                  </div>
                  <div class="headerIcon">
                      {{-- <i class="fa-regular fa-lightbulb headerIcons" id="darkmodeBtn"></i> --}}
                  </div>
              </div>
          @else
              <div class="user">
                  <div class="userDropDown headerIcons">
                    @if (Auth::user()->image == null)
                      <img class="user-icon" src="{{asset("./images/defaultDp.png")}}" width="100" height="100" alt="" style="border-radius: 100%">
                    @else
                     <img class="user-icon" src="{{asset(Auth::user()->image)}}" width="100" height="100" alt="" style="border-radius: 100%">
                    @endif
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
                      {{-- <i class="fa-regular fa-bell headerIcons" id="notification"></i>
                      <i class="fa-regular fa-lightbulb headerIcons" id="darkmodeBtn"></i> --}}
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
            @yield('about')
            @yield('contact-us')
            @yield('threadContent')
            @yield('commentContent')
            @yield('login')
            @yield('fPassword')
            @yield('register')
            @yield('404')
            @yield('edit')
            @yield('editComment')
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
                                <li><a href="/faq">FAQs</a></li>
                                <li><a href="/rules">Forum Rules</a></li>
                      </div>          
                      <div class="footer-col">         
                                <ul class="footer-links">
                                <li><a href="/privacy-policy">Privacy Policy</a></li>
                                <li><a href="/terms-condition">Terms and Conditions</a></li>
                              </ul>
                      </div>       
                      

                      <!-- 2nd Column -->

                      <div class="footer-col">
                        <ul class="footer-links">
                            <li><a href="/about">About Us</a></li>
                            <li><a href="/about">Vision</a></li>
                      </div>
                      <div class="footer-col">         
                        <ul class="footer-links">    
                            <li><a href="/about">Mission</a></li>
                            {{-- <li><a href="/ContactUs">Contact Us</a></li> --}}
                        </ul>
                      </div>

                      {{-- <div class="footer-col">  
                        <h6 class="newsletter">Newsletter</h6>
                        <input type="text" placeholder="Your Name" class="inputname">
                        <input type="email" placeholder="Enter Email" class="inputemail">
                        <input type="submit" placeholder="Submit" class="inputsubmit">
                      </div> --}}
                  </div>  
              </div> 
            </footer> 
            
            
            {{-- <div class="donate">
                {{-- Donate
                <p class="donation">Your donations will be use for maintaining the website. We truly appreciate your support</p>
                
                <img class="gcash" src={{asset("./images/gcash-logo-square-180x180.jpg")}}>
                
              </div> --}}
                

              {{-- <div class="links">
             
                <div>Links
                  <p class="links-2"><a class="footerLinks" href="/about">About</a></p>
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
              </div> --}} 
              

              {{-- <div class="about" >
                <a href="/about" class="footerLinks">About</a>
              
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
                </div>  --}}
            </div>
          </div>
        </div>
      </div>
      @yield('replyModal')
    </div>
    <script type="text/javascript">
      function replyClick(){
          $replyToName = event.srcElement.id;
          $replyToId = event.srcElement.parentNode.id
          modalReplyToId = document.querySelector(`#modalReplyToId`);
          modalReplyToId.value = $replyToId
          modalReplyTo = document.querySelector(`#modalReplyTo`);
          modalReplyTo.value = $replyToName
          txt = document.querySelector("#modalReplyToTxt");
          txt.textContent = `Replying To ${$replyToName}`;
      }
  </script>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    @if (request()->is('thread/comments/*'))
      <script type="module" src={{asset("./js/newCommentToast.js")}}></script>
    @endif
    <script type="module" src={{asset("./main.js")}}></script>
    <script
      src="https://kit.fontawesome.com/26177573c7.js"
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript">
      $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
       </script> 
  </body>
</html>