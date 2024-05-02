    <x-app-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4">
                      <span class="text-muted fw-light">User/</span> Registration
                  </h4>
                <div class="row">
                  <div class="col">
                    <div class="nav-align-top mb-3">
                      <ul class="nav nav-tabs" role="tablist">
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane fade active show" id="form-tabs-personal" role="tabpanel">
                          <form method="post" id="student_form_submission" action="{{ url('studentstore') }}">
                              @csrf
                            <div class="row">
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">First Name <label class="text-danger" style="font-size: 15px;">*</label></label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" placeholder="First name" name="firstname" id="firstname" />
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">Last Name <label class="text-danger" style="font-size: 15px;">*</label></label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control"  name="lastname" id="lastname" placeholder="Last name" aria-label="Last name" aria-describedby="basic-icon-default-fullname2"/>
                                  </div>
                              </div>
                               <div class="col-md-4 col-sm-4 p-1">
                                  <label class="col-form-label" for="basic-icon-default-fullname">Gender <label class="text-danger" style="font-size: 15px;">*</label></label>
                                    <div class="input-group input-group-merge">
                                      <span id="basic-icon-default-fullname2" class="input-group-text"
                                        ><i class="bx bx-user"></i></span>
                                      <select class="form-select" name="gender" id="gender">
                                        <option disabled selected>-select-</option>
                                        <option value="FEMALE">FEMALE</option>
                                        <option value="MALE">MALE</option>
                                      </select>
                                    </div>
                                </div>
                                 <div class="col-md-4 col-sm-4 p-1">
                                  <label class="col-form-label" for="basic-icon-default-fullname">Date of Birth <label class="text-danger" style="font-size: 15px;">*</label></label>
                                    <div class="input-group input-group-merge">
                                      <span id="basic-icon-default-fullname2" class="input-group-text">
                                        <i class="bx bx-book"></i></span>
                                      <input type="date" class="form-control" name="birth_date" id="birth_date" aria-label="John Doe" onchange="calculateAge()" aria-describedby="basic-icon-default-fullname2" />
                                    </div>
                                </div>
                                 <div class="col-md-4 col-sm-4 p-1">
                                  <label class="col-form-label" for="basic-icon-default-fullname">Address <label class="text-danger" style="font-size: 15px;">*</label></label>
                                    <div class="input-group input-group-merge">
                                      <span id="basic-icon-default-fullname2" class="input-group-text"
                                        ><i class="bx bx-book"></i></span>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 p-1">
                                  <label class="col-form-label" for="basic-icon-default-fullname">Access Level <label class="text-danger" style="font-size: 15px;">*</label></label>
                                    <div class="input-group input-group-merge">
                                      <span id="basic-icon-default-fullname2" class="input-group-text"
                                        ><i class="bx bx-book"></i></span>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"/>
                                    </div>
                                </div>
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">Username
                                   <label style="font-size: 15px;color: white;">*</label>
                               </label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-table"></i>
                                    </span>
                                    <input type="text" class="form-control" id="last_known_school" name="last_known_school" placeholder="Enter Previous School" aria-describedby="basic-icon-default-fullname2" autocomplete="off"/>
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">Password
                                 <label style="font-size: 15px;color: white;">*</label>
                               </label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-table"></i>
                                    </span>
                                    <input type="password" class="form-control" id="last_known_class" name="last_known_class" placeholder="" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"/>
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">Confirm Password
                                 <label style="font-size: 15px;color: white;">*</label>
                               </label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-table"></i>
                                    </span>
                                    <input type="password" class="form-control" id="last_known_class" name="last_known_class" placeholder="" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2"/>
                                  </div>
                              </div>
                               <div class="col-md-4 col-sm-4 p-1" hidden>
                                <label class="col-form-label" for="basic-icon-default-fullname">User
                                 <label class="text-danger" style="font-size: 15px;">*</label>
                               </label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-table"></i>
                                    </span>
                                    <input type="text" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id }}" aria-describedby="basic-icon-default-fullname2"/>
                                  </div>
                              </div>

                             <div class="row mt-4">
                              <div class="col-md-6">
                                <div class="row justify-content-end">
                                  <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary">Clear</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
    </x-app-layout>