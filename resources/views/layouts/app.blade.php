<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kaalaman</title>
    <link rel="stylesheet" href={{asset('css/app.css')}}>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>

  <body>
    <div class="mainContainer">
     
      <header>
        
        <img src="images/kaalaman-logo.png" class="logo" alt="" />

        <div class="user">
         
        </div>

      </header>
      
      <div class="subContainer">


        <div class="sidebar">
         
        </div>

        <div class="threadContainer">
          <div class="threadNavContainer">
           
           
          </div>

          <div class="threadContentContainer">

        @yield('login')
        @yield('register')
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