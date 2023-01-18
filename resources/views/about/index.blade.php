@extends('layouts.design')

@section('UserIcon')

@guest
<div class="user">
    <div class="userDropDown headerIcons">
        <i class="fa-regular fa-user guestIcon">
            
        </i>
        <div class="guestUser-Section" id="userSection" style="display: none">
            <span>Guest Mode</span>
        </div>
 </div>
     <div class="headerIcon">
     <i class="fa-regular fa-lightbulb headerIcons" id="darkmodeBtn"></i>
    </div>
    
    {{-- sadasdas --}}
  </div>
@else
<div class="user">
    <div class="userDropDown headerIcons">
      <img src="./images/Avatar Users2_20.png" />
      <div class="user-Section" id="userSection" style="display: none">
        <span>Current User</span>
        <button>Account Profile</button>
       
        <button> <a class="lagout" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form></button>
      </div>
    </div>

  
    <div class="headerIcon">
      <i class="fa-regular fa-bell headerIcons" id="notification"></i>
      <i class="fa-regular fa-lightbulb headerIcons" id="darkmodeBtn"></i>
    
    </div>
    
    {{-- sadasdas --}}
  </div>
  @endguest
@endsection

@section ('vision')
<div class="centerContainer"> 
  <div class="centerContent"> 
    <a class="footerLinks" href="/"></a>
        
            <div class="about-us">
                <h2 class="">About Us</h2>
                    <p>Kaalaman started with three individuals who happened to be in the same class. Those folks aspire to be full-stack web developers. Fate brought them together and started a project called Kaalaman. Kaalaman was created in order to reach the Filipino community to uplift one another by teaching and sharing their thoughts and knowledge about a topic. Kaalaman is an online forum community where individuals can share their areas of expertise regarding a certain topic. </p>

                    <h2 class="vision">Vision</h2>
                        <p>Our vision is to be the most visited online forum that offers relevant information to Filipino people.</p>

                    <h2 class="mission">Mission</h2>
                        <p>Our mission is to provide free information to the people that seeks knowledge and enlightenment about a certain topic.</p>
            </div>
        
  </div>
</div>
@endsection