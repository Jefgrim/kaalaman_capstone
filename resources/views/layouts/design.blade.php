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
        
       <a href="/"> <img src="images/kaalaman-logo.png" class="logo" alt="" /></a>

       @yield('UserIcon')
      </header>
      
      <div class="noSidePanelSubContainer">

        <div class="threadContainer">
          <div class="threadContentContainer">
            @yield('faqContent')
            @yield('privacy-policy')
            @yield('Terms-Condition')
            @yield('forum-rules')
            @yield('accountSettings')
            @yield('vision')
            @yield('mission')
            @yield('contact-us')
          </div>

          <div class="creatorContainer">
              <div class="donate">
                Donate
                <p class="donation">Your donations will be use for maintaining the website. We truly appreciate your support</p>
                
                <img class="gcash" src="./images/gcash-logo-square-180x180.jpg">
                
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
                  <p class="links-2"><a href="/contactUs" class="footerLinks">Contact-us</a></p>
                
                  

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
                    <img class="pic-creator" src="./images/5.png">
                  </div>
                  <div class="creatorDetailsNameContainer">
                    <span class="name">Nicky Esteban</span>
                  </div>
                </div>
                
                <div class="creatorDetailsContainer">
                  <div>
                    <img class="pic-creator" src="./images/3.png">
                  </div>
                  <div class="creatorDetailsNameContainer">
                    <span class="name">Jefgrim Alvar</span>
                  </div>
                </div> 
                <div class="creatorDetailsContainer">   
                  <div>
                    <img class="pic-creator" src="./images/6.png">
                  </div>
                  <div class="creatorDetailsNameContainer">
                    <span class="name">Jomarie Cailing</span>
                  </div>
                </div> 
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