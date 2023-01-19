@extends('layouts.design')

@section('title')
    {{$userProfile->name}}  {{--name came from the database  --}}
    
    
@endsection

@section('userProfile')

    <h2>Profile of {{$userProfile->name}}</h2>

    <div class="profile-Container">
        <div class="profiledetails-container1">
            
        </div>

        <div class="profiledetails-container2">
            <div class="profilePicture-container">
                {{-- <div class="profilepic">
                </div> --}}
                <div class="upload">
                   <img class="user-icon" src={{asset("./images/blankuser.png")}} width="100" height="100" alt="">
                   <div class="round">
                    <input class="upload-picture" type="file" accept="image/png, image/jpg">
                    <i class="fa fa-camera text-light"></i>
                   </div>
                </div>
                
            </div>

            <div class="mb-3 text-light user-profile">
                <h4>{{$userProfile->name}}</h4>
              </div>
              
              @if ($userProfile->id == Auth::id())
                <div class="mb-3 text-light user-profile">
                    <h4>{{$userProfile->email}}</h4>
                </div>
              @endif
              

          

              <div class="mb-3 text-light user-profile">
                <h4>{{$userProfile->dob}}</h4>
              </div>

             <div class="mb-3 text-light user-profile">
              <h4>{{$userProfile->gender}}</h4>
             </div>

             @if ($userProfile->id == Auth::id())
             <button type="button" class="btn btn-primary btnmodal" data-bs-toggle="modal" data-bs-target="#exampleModal"data-bs-whatever="@mdo">Edit Profile</button>

              @endif 
             
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="/profile/{{Auth::id()}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PATCH')
                        
                        <div class="mb-3">
                          <label class="form-label">Upload Profile Picture</label>
                          <input class="upload-picture" name="image" type="file" accept="image/*">
                        </div>
            
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" name="dob" id="exampleFormControlInput1">
                          </div>
                          <div class="mb-3">
                          <label>Gender</label>
                            <select class="form-select" name="gender" aria-label="Default select example">
                                <option disabled selected>select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                          
                          </select>
                        </div>

                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Favorite Quote</label>
                            <input type="text" class="form-control" name="quotes" id="exampleFormControlInput1">
                          </div>

                          <button type="submit" class="btn btn-primary">Save changes</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     
                    </div>
                  </div>
                </div>
              </div>

              

            
                {{-- <form class="form-control" action="#" method="#">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name"> 
                    </div> 
                    
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" id="email"> 
                    </div>
                    
                    <div>
                        <label>Date of Birth</label>
                        <input type="date" name="date" id="date" max="2007-12-31"> 
                    </div>
                    
                    <div>
                        <label for="gender">Gender</label>
                        <select id="gender">
                            <option disabled selected>Select gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>    
                    </div>    
                </form> --}}
                    
               
                      
            
            
            {{-- <div class="input-group">
                
                        <input type="text" class="form-control mb-3" placeholder="Name" aria-label="Recipient's username with two button addons">
                        <button class="btn btn-secondary mb-3" type="button">Edit</button>
                        <button class="btn btn-success mb-3" type="button">Save</button>
                    </div>

                    <div class="input-group">
              
                        <input type="email" class="form-control mb-3" placeholder="Email" aria-label="Recipient's       username with two button addons">
                        <button class="btn btn-secondary mb-3" type="button">Edit</button>
                        <button class="btn btn-success mb-3" type="button">Save</button>
                    </div>

                        <label for="date" class="Dob text-light">Date of Birth</label>
                        <input
                             type="date"
                             id="date"
                             name="date"
                             min="1940-01-01"
                             max="2007-12-31"
                             value="2022-09-30"
                             class="input-field"/>

                    
                         <select class="select-gender">
                            <option class="gender-option" disabled selected>Choose a gender</option>
                            <option class="gender-option" value="male">Male</option>
                            <option class="gender-option" value="female">Female</option>
                            <option class="gender-option" value="other">Other</option>
                        
                        </select> --}}

        </div>

        <div class="profiledetails-container1">
            
        </div>


    </div>
@endsection

