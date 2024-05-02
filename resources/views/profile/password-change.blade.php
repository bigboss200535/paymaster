<x-app-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="py-3 mb-4">
                      <span class="text-muted fw-light">Users/</span> Update Password
                  </h4>
                <div class="row">
                  <div class="col">
                    <div class="nav-align-top mb-3">
                      <ul class="nav nav-tabs" role="tablist">
                      </ul>
                      <div class="tab-content">
                      @if (session('status') === 'password-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Success!</strong> Password changes successfully.
                                        </div>
                            </p>
                                @endif
                        <div class="tab-pane fade active show" id="form-tabs-personal" role="tabpanel">
                        <p class="mt-1 text-sm text-gray-600"><b>Note:</b>
                            {{ __('Ensure your account is using a long, random password to stay secure.') }}
                        </p>
                        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                       
                        @csrf
                        @method('put')
                            <div class="row">
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="current_password" >Current Password<label class="text-danger" style="font-size: 15px;">*</label></label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-user"></i>
                                    </span>
                                    <x-text-input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="password">New Password <label class="text-danger" style="font-size: 15px;">*</label></label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                      <i class="bx bx-user"></i>
                                    </span>
                                      <x-text-input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />
                                      <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                  </div>
                              </div>
                              <div class="col-md-4 col-sm-4 p-1">
                                <label class="col-form-label" for="basic-icon-default-fullname">Confirm Password
                                   <label style="font-size: 15px;color: white;">*</label>
                               </label>
                                  <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text">
                                        <i class="bx bx-user"></i>
                                    </span>
                                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />  
                                </div>
                              </div>
                              <br> <br>
                            <div class="row mt-4">
                            <div class="col-md-6">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
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