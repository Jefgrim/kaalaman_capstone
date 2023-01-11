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

@section('accountSettings')
<div class="centerContainer">
<div class="centerContent">

    
</div>
</div>

@endsection

