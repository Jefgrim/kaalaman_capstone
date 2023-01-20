{{-- @extends('layouts.design')

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
    
   
  </div>
  @endguest
@endsection

@section('contact-us')
<div class="centerContainer">
  <div class="centerContent">
    <a class="footerLinks mb-50" href="/"></a>
      <div class="contactUsPage">
        <div class="mb-3 enter-email1">
            <label for="exampleFormControlInput1" class="form-label">Email Address</label>
            <input type="email" class="form-control enter-email" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label ">Your Message</label>
      <textarea class="form-control enter-message" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    </div>
  </div>
</div>
@endsection --}}