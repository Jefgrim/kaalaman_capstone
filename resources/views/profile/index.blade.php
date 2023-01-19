@extends('layouts.design')

@section('title')
    {{$userProfile->name}}  {{--name came from the database  --}}
@endsection

@section('userProfile')
    <div class="profile-Container mt-4">
        <div class="profiledetails-container1">
            
        </div>

        <div class="profiledetails-container2">
            <div class="profilePicture-container"> {{-- <div class="profilepic"> </div> --}}
                <div class="upload">
                  @if ($userProfile->image == null)
                    <img class="user-icon" src="{{asset("./images/defaultDp.png")}}" width="100" height="100" alt="" style="border-radius: 100%">
                  @else
                    <img class="user-icon" src="{{asset($userProfile->image)}}" width="100" height="100" alt="" style="border-radius: 100%">
                  @endif
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
        </div>

        <div class="profiledetails-container1">
            
        </div>


    </div>
@endsection

