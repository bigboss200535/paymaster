<x-app-layout>
<div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4">
                              <span class="text-muted fw-light">Employee/</span> Add
                          </h4>
                <div class="row">
                  <div class="col">
                    <!-- <h6 class="mt-4"> Add New Student </h6> -->
                    <div class="nav-align-top mb-3">
                      <ul class="nav nav-tabs" role="tablist">
                       <!--  <li class="nav-item">
                          <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#form-tabs-personal" role="tab" aria-selected="true">Personal Info</button>
                        </li> -->
                       <!--  <li class="nav-item">
                          <button class="nav-link " data-bs-toggle="tab" data-bs-target="#form-tabs-account" role="tab" aria-selected="false">Academic Details</button>
                        </li> -->
                       <!--  <li class="nav-item">
                          <button class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-social" role="tab" aria-selected="false">Parents/Guardians Details</button>
                        </li> -->
                      </ul>
                      <div class="tab-content">
                        <!-- Personal Info -->
                        <div class="tab-pane fade active show" id="form-tabs-personal" role="tabpanel">
                          <form method="post" id="employee_add">
                              @csrf
                            <div class="row">
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">Title <label class="text-danger" style="font-size: 15px;">*</label></label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-user"></i></span>
                                      <select class="form-select" name="title" id="title">
                                        <option disabled selected>-select-</option>
                                      @foreach($title as $tit)                                        
                                        <option value="{{ $tit->title }}">{{ $tit->title }}</option>
                                        @endforeach
                                    </select>
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">First Name <label class="text-danger" style="font-size: 15px;">*</label></label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" placeholder="First name" name="firstname" id="firstname" autocomplete="off"/>
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">Middle Name <label class="" style="font-size: 15px; color: white;">*</label></label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control"  name="middlename" id="middlename" placeholder="Middle name" aria-label="Middle name" autocomplete="off"/>
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">Last Name <label class="text-danger" style="font-size: 15px;">*</label></label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control"  name="lastname" id="lastname" placeholder="Last name" aria-label="Last name"/>
                                  </div>
                              </div>
                               <div class="col-md-4 col-sm-4 p-1">
                                  <label class="col-form-label" for="basic-icon-default-fullname">Gender <label class="text-danger" style="font-size: 15px;">*</label></label>
                                    <div class="input-group input-group-merge">
                                      <span id="basic-icon-default-fullname2" class="input-group-text"
                                        ><i class="bx bx-user"></i></span>
                                      <select class="form-select" name="gender" id="gender">
                                        <option disabled selected>-select-</option>
                                        @foreach($gender as $g)                                        
                                        <option value="{{ $g->gender }}">{{ $g->gender }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 p-1">
                                  <label class="col-form-label" for="basic-icon-default-fullname">Telephone<label class="text-danger" style="font-size: 15px;">*</label></label>
                                    <div class="input-group input-group-merge">
                                      <span id="basic-icon-default-fullname2" class="input-group-text">
                                        <i class="bx bx-book"></i></span>
                                      <input type="number" class="form-control" name="telephone" id="telephone" aria-label="John Doe" onchange="calculateAge()" aria-describedby="basic-icon-default-fullname2" />
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
                                  <label class="col-form-label" for="basic-icon-default-fullname">Age <label class="text-danger" style="font-size: 15px;">*</label></label>
                                    <div class="input-group input-group-merge">
                                      <span id="basic-icon-default-fullname2" class="input-group-text">
                                        <i class="bx bx-book"></i></span>
                                      <input type="text" class="form-control" name="age" id="age" aria-describedby="basic-icon-default-fullname2" disabled />
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">Portfolio <label class="text-danger" style="font-size: 15px;">*</label></label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-globe"></i></span>
                                    <select class="form-select" name="portfolio" id="portfolio">
                                      <option value="" disabled selected>-select-</option>
                                      <option value="NURSE">Nurse</option>
                                      <option value="DOCTOR">Doctor</option>
                                      <option value="PA">Physician Assistant</option>
                                    </select>
                                  </div>
                              </div>
                               <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">Department <label class="text-danger" style="font-size: 15px;">*</label></label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-globe"></i></span>
                                    <select class="form-select" name="department" id="department">
                                      <option value="" disabled selected>-select-</option>
                                      <option value="MAIN OFFICE">MAIN OFFICE</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">Designation <label class="text-danger" style="font-size: 15px;">*</label></label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-globe"></i></span>
                                    <select class="form-select" name="designation" id="designation">
                                      <option value="" disabled selected>-select-</option>
                                      <option value="Community">Community Nurse</option>
                                    </select>
                                  </div>
                              </div>
                               <div class="col-md-4 col-sm-4 p-1">
                                  <label class="col-form-label" for="basic-icon-default-fullname">Religion <label class="text-danger" style="font-size: 15px;">*</label></label>
                                    <div class="input-group input-group-merge">
                                      <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-table"></i></span>
                                      <select class="form-select" name="religion" id="religion">
                                        <option value="" disabled selected>-select-</option>
                                        <option value="ISLAM">ISLAM</option>
                                        
                                      </select>
                                    </div>
                                </div>
                                 <div class="col-md-4 col-sm-4 p-1">
                                  <label class="col-form-label" for="basic-icon-default-fullname">Address <label class="text-danger" style="font-size: 15px;">*</label></label>
                                    <div class="input-group input-group-merge">
                                      <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-book"></i></span>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address"/>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">Region <label class="text-danger" style="font-size: 15px;">*</label></label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-table"></i>
                                    </span>
                                    <select class="form-select" name="region" id="region">
                                      <option disabled selected>-select-</option>
                                      <option value="ASHANTI">ASHANTI</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">Bank
                                   <label style="font-size: 15px;color: white;">*</label>
                               </label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-table"></i>
                                    </span>
                                    <input type="text" class="form-control" id="bank" name="bank" placeholder="Enter Bank" aria-describedby="basic-icon-default-fullname2"/>
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">Bank Account Number
                                   <label style="font-size: 15px;color: white;">*</label>
                               </label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-table"></i>
                                    </span>
                                    <input type="text" class="form-control" id="bank_account" name="bank_account" placeholder="Enter Bank Account Number" aria-describedby="basic-icon-default-fullname2"/>
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">SSNIT Number
                                 <label style="font-size: 15px;color: white;">*</label>
                               </label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-table"></i>
                                    </span>
                                    <input type="text" class="form-control" id="ssnit_number" name="ssnit_number" placeholder="Enter SSNIT Number"  aria-describedby="basic-icon-default-fullname2"/>
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">Ghana Card Number
                                 <label style="font-size: 15px;color: white;">*</label>
                               </label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-table"></i>
                                    </span>
                                    <input type="text" class="form-control" id="gh_card" name="gh_card" placeholder="Enter Ghana Card Number"  aria-describedby="basic-icon-default-fullname2"/>
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">Generated File Number
                                 <label style="font-size: 15px;color: white;">*</label>
                               </label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-table"></i>
                                    </span>
                                    <input type="text" class="form-control" id="file_number" name="file_number" placeholder="Enter File Number"  aria-describedby="basic-icon-default-fullname2"/>
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">Staff Type <label class="text-danger" style="font-size: 15px;">*</label></label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-table"></i>
                                    </span>
                                    <select class="form-select" name="staff_type" id="staff_type">
                                      <option disabled selected>-select-</option>
                                      <option value="FULL TIME">FULL TIME</option>
                                      <option value="PART TIME">PART TIME</option>
                                    </select>
                                  </div>
                              </div>
                               <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">User
                                 <label class="text-danger" style="font-size: 15px;">*</label>
                               </label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-table"></i>
                                    </span>
                                    <input type="text" class="form-control" maxlength="60" id="user_id" name="user_id" value="{{ Auth::user()->id }}" autocomplete="off"/>
                                  </div>
                              </div>
                              
                             <div class="row mt-4">
                              <div class="col-md-6">
                                <div class="row justify-content-end">
                                  <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                    <button type="submit" class="btn btn-secondary me-sm-3 me-1">Update</button>
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