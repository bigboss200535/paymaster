    <x-app-layout>
               <div class="container-xxl flex-grow-1 container-p-y">    
                  <h4 class="py-3 mb-4">
                    <span class="text-muted fw-light">Employee /</span> List
                  </h4>                   
                  <div class="row g-4 mb-4">
                    <div class="col-sm-6 col-xl-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                              <span>Locum</span>
                              <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">{{ $countlocum }}</h4>
                                <!-- <small class="text-success">(+29%)</small> -->
                              </div>
                              <p class="mb-0">Active Members </p>
                            </div>
                            <div class="avatar">
                              <span class="avatar-initial rounded bg-label-primary">
                                <i class="bx bx-user bx-sm"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                              <span>Permanent</span>
                              <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">{{ $countpermanent }}</h4>
                                <!-- <small class="text-success">(+18%)</small> -->
                              </div>
                              <p class="mb-0">Active Members </p>
                            </div>
                            <div class="avatar">
                              <span class="avatar-initial rounded bg-label-danger">
                                <i class="bx bx-user-check bx-sm"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                              <span>Active</span>
                              <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">{{ $count_active }}</h4>
                                <!-- <small class="text-danger">(-14%)</small> -->
                              </div>
                              <p class="mb-0">Active Members </p>
                            </div>
                            <div class="avatar">
                              <span class="avatar-initial rounded bg-label-success">
                                <i class="bx bx-group bx-sm"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                              <span>Inactive </span>
                              <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">{{ $count_inactive }}</h4>
                                <!-- <small class="text-success">(+42%)</small> -->
                              </div>
                              <p class="mb-0">Active Members </p>
                            </div>
                            <div class="avatar">
                              <span class="avatar-initial rounded bg-label-warning">
                                <i class="bx bx-user-voice bx-sm"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Fixed Header -->
                  <div class="card">
                    <!-- <h5 class="card-header">List of Employees</h5> -->
                    <div class="card-datatable table-responsive">
                      <div style="margin:15px">
                        <a class="btn btn-primary me-sm-3 me-1 pull-right" data-bs-toggle="modal" data-bs-target="#addUser" style="color: white;">Add New Employee</a>
                      </div>
                      <table class="datatables-customers table border-top" id="users_list">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Employment Type</th>
                            <th>Joined Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php
                              $counter = 1;
                            @endphp

                          @foreach($workers as $employee)
                          <tr> 
                              <td align="center">{{ $counter++ }}</td>
                              <td><span class="fw-medium">{{ $employee->fullname }}</span></td>
                              <td><span class="fw-medium">{{ $employee->gender }}</span></td>
                              <td>{{ $employee->email }}</td>
                              <td>{{ $employee->staff_type }}</td>
                              <td>{{ \Carbon\Carbon::parse($employee->added_date)->format('d-m-Y') }}</td>
                              <td>
                                @if($employee->status === 'Active')
                                  <span class="badge bg-label-info me-1">Active</span>
                                @elseif ($employee->status === 'Inactive')
                                  <span class="badge bg-label-danger me-1">Inactive</span>
                                @endif
                              </td>
                              <td>
                                  <div class="dropdown" align="center">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                              <i class="bx bx-dots-vertical-rounded"></i>
                                          </button>
                                              <div class="dropdown-menu">
                                                  <a class="dropdown-item" href="{{ route('employee.show', ['employee_id' => $employee->employee_id]) }}">
                                                    <i class="bx bx-edit-alt me-1"></i> More
                                                  </a>
                                                  <!-- <a class="dropdown-item" href="{{ url('/modify-user')}}">
                                                    <i class="bx bx-lock-alt me-1"></i> Details 
                                                  </a> -->
                                                  <a class="dropdown-item" href="javascript:void(0);">
                                                      <i class="bx bx-trash me-1"></i> Delete
                                                  </a>
                                            </div>
                                  </div>
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>Employment Type</th>
                            <th>Joined Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
            </div>
          </div>

          
<!-- Edit User Modal -->
<div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg modal-simple modal-edit-user">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3>Add New Employee</h3>
          <p>Kindly fill out the form to register. <b style="color:red">All fields marked (*) are mandatory.</b></p>
        </div>
        <form id="employee_add" class="row g-3" onsubmit="return false" method="post">
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserFirstName">Title</label>
            <select class="form-select" name="title" id="title">
                 <option disabled selected>-select-</option>
                     @foreach($title as $tit)                                        
                 <option value="{{ $tit->title }}">{{ $tit->title }}</option>
                     @endforeach
            </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserLastName">First Name <label class="text-danger" style="font-size: 15px;">*</label></label>
            <input type="text" name="modalEditUserLastName" class="form-control" placeholder="Doe" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserName">Middle Name</label>
            <input type="text" name="modalEditUserName" class="form-control" placeholder="john.doe.007" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserName">Lastname <label class="text-danger" style="font-size: 15px;">*</label></label>
            <input type="text" name="modalEditUserName" class="form-control" placeholder="john.doe.007" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserEmail">Gender <label class="text-danger" style="font-size: 15px;">*</label></label>
            <select class="form-select" name="gender" id="gender">
              <option disabled selected>-select-</option>
                   @foreach($gender as $g)                                        
                   <option value="{{ $g->gender }}">{{ $g->gender }}</option>
                   @endforeach
             </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserStatus">Telephone <label class="text-danger" style="font-size: 15px;">*</label></label>
            <input type="text" name="modalEditUserName" class="form-control" placeholder="john.doe.007" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditTaxID">Date Of Birth <label class="text-danger" style="font-size: 15px;">*</label></label>
            <input type="text" id="modalEditTaxID" name="modalEditTaxID" class="form-control modal-edit-tax-id" placeholder="123 456 7890" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserPhone">Portfolio</label>
            <div class="input-group input-group-merge">
              <!-- <span class="input-group-text">+1</span> -->
              <select class="form-select" name="portfolio" id="portfolio">
                   <option value="" disabled selected>-select-</option>
                   <option value="NURSE">Nurse</option>
                    <option value="DOCTOR">Doctor</option>
                    <option value="PA">Physician Assistant</option>
              </select>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserLanguage">Department <label class="text-danger" style="font-size: 15px;">*</label></label>
            <select id="modalEditUserCountry" name="modalEditUserCountry" class="select2 form-select" data-allow-clear="true">
              <option disabled selected>-Select-</option>
              @foreach($department as $depart)                                        
                   <option value="{{ $depart->department_id }}">{{ $depart->department }}</option>
                   @endforeach
            </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserCountry">Designation <label class="text-danger" style="font-size: 15px;">*</label></label>
            <select id="modalEditUserCountry" name="modalEditUserCountry" class="select2 form-select" data-allow-clear="true">
            <option disabled selected>-select-</option>
                @foreach($designation as $designate)                                        
                   <option value="{{ $designate->designation }}">{{ $designate->designation }}</option>
                   @endforeach
            </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserLanguage">Religion <label class="text-danger" style="font-size: 15px;">*</label></label>
            <select id="modalEditUserCountry" name="modalEditUserCountry" class="select2 form-select" data-allow-clear="true">
              <option disabled selected>-Select-</option>
              <option value="United Arab Emirates">Islam</option>
              <option value="United Kingdom">Christian</option>
              <option value="United States">Traditional</option>
            </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserCountry">Address <label class="text-danger" style="font-size: 15px;">*</label></label>
            <input type="text" id="modalEditTaxID" name="modalEditTaxID" class="form-control modal-edit-tax-id" placeholder="123 456 7890" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserCountry">Region <label class="text-danger" style="font-size: 15px;">*</label></label>
            <select id="modalEditUserCountry" name="modalEditUserCountry" class="select2 form-select" data-allow-clear="true">
              <option value="" disabled selected>-Select-</option>
              <option value="United Arab Emirates">Ashanti</option>
              <!-- <option value="United Kingdom">United Kingdom</option> -->
              <!-- <option value="United States">United States</option> -->
            </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserCountry">Bank <label class="text-danger" style="font-size: 15px;">*</label></label>
            <select id="modalEditUserCountry" name="modalEditUserCountry" class="select2 form-select" data-allow-clear="true">
              <option disabled selected>-Select-</option>
              <option value="United Arab Emirates">GCB</option>
              <option value="United Kingdom">Republic</option>
              <!-- <option value="United States">United States</option> -->
            </select>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserCountry">Bank Account Number <label class="text-danger" style="font-size: 15px;">*</label></label>
            <input type="text" id="modalEditTaxID" name="modalEditTaxID" class="form-control modal-edit-tax-id" placeholder="123 456 7890" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserCountry">SSNIT No</label>
            <input type="text" id="modalEditTaxID" name="modalEditTaxID" class="form-control modal-edit-tax-id" placeholder="123 456 7890" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserCountry">Ghana Card Number</label>
            <input type="text" id="modalEditTaxID" name="modalEditTaxID" class="form-control modal-edit-tax-id" placeholder="123 456 7890" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="modalEditUserCountry">Staff Type <label class="text-danger" style="font-size: 15px;">*</label></label>
            <select id="modalEditUserCountry" name="modalEditUserCountry" class="select2 form-select" data-allow-clear="true">
              <option disabled selected>-Select-</option>
              <option value="United Arab Emirates">Fulltime</option>
              <option value="United Kingdom">Parttime</option>
              <!-- <option value="United States">United States</option> -->
            </select>
          </div>
          <div class="col-12">
            <label class="switch">
              <input type="checkbox" class="switch-input">
              <span class="switch-toggle-slider">
                <span class="switch-on"></span>
                <span class="switch-off"></span>
              </span>
              <span class="switch-label">Status</span>
            </label>
          </div>
          <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--/ Add employee Modal -->

</x-app-layout>