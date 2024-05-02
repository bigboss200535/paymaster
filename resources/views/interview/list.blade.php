    <x-app-layout>
               <div class="container-xxl flex-grow-1 container-p-y">    
                  <h4 class="py-3 mb-4">
                    <span class="text-muted fw-light">Applicants /</span> List
                  </h4>
                                    
                  <div class="row g-4 mb-4">
                    <div class="col-sm-6 col-xl-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                              <span>Locum</span>
                              <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">11</h4>
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
                                <h4 class="mb-0 me-2">11</h4>
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
                                <h4 class="mb-0 me-2">11</h4>
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
                                <h4 class="mb-0 me-2">11</h4>
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
                    <h5 class="card-header">List of Employees</h5>
                    
                    <div class="card-datatable table-responsive">
                    <!-- <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button> -->
                      <table class="table" id="users_list">
                        <thead>
                          <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Port Folio</th>
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

                          @foreach($applicant_list as $apl)
                          <tr> 
                              <td align="center">{{ $counter++ }}</td>
                              <td><span class="fw-medium">{{ $apl->surname." ".$apl->firstname }}</span></td>
                              <td><span class="fw-medium">{{ $apl->gender }}</span></td>
                              <td><span class="fw-medium">{{ $apl->portfolio }}</span></td>
                              <td>{{ $apl->email }}</td>
                              <td>{{ $apl->telephone }}</td>
                              <td>{{ \Carbon\Carbon::parse($apl->added_date)->format('d-m-Y') }}</td>
                              <td><span class="badge bg-label-info me-1">Active</span></td>
                              <td>
                                  <div class="dropdown" align="center">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                              <i class="bx bx-dots-vertical-rounded"></i>
                                          </button>
                                              <div class="dropdown-menu">
                                                  <a class="dropdown-item" href="{{ url('/modify-user') }}">
                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                  </a>
                                                  <a class="dropdown-item" href="javascript:void(0);">
                                                    <i class="bx bx-lock-alt me-1"></i> Review 
                                                  </a>
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
                            <th>Port Folio</th>
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
    </x-app-layout>