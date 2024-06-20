<x-app-layout>
        <div class="container-xxl flex-grow-1 container-p-y">                
        <div class="app-ecommerce">
          <!-- Add Product -->
          <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <div class="d-flex flex-column justify-content-center">
              <h4 class="mb-1 mt-3">Product Category</h4>
              <p class="text-muted">New Product Category Setup and Settings</p>
            </div>
            <div class="d-flex align-content-center flex-wrap gap-3">
            </div>
          </div>
          <div class="row">
   <!-- First column-->
   <div class="col-12 col-lg-8">
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-tile mb-0">Product Category</h5>
        </div>
        <div class="card">
                    <div class="card-datatable">
                      <table class="datatables-category-list table border-top" id="product_list">
                      <thead>
                          <tr>
                            <th>SN</th>
                            <th>Categories</th>
                            <th class="text-nowrap text-sm-end">Date Added</th>
                            <th>Status</th>
                            <th class="text-lg-center">Actions</th>
                          </tr>
                        </thead>
                            @php
                              $counter = 1;
                            @endphp
                        <tbody>

                            @foreach($category as $cat)
                          <tr>
                            <td>{{ $counter++ }}</td>
                            <td>{{ $cat->category_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($cat->added_date)->format('d-m-Y') }}</td>
                            <td>
                                @if($cat->status === 'Active')
                                <span class="badge bg-label-info me-1">Active</span>
                                  @elseif ($cat->status === 'Inactive')
                                <span class="badge bg-label-danger me-1">Inactive</span>
                                @endif
                            </td>
                            <td>
                            <div class="dropdown" align="center">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                              <i class="bx bx-dots-vertical-rounded"></i>
                                          </button>
                                            <div class="dropdown-menu">
                                                  <a class="dropdown-item edit-btn" data-id="{{ $cat->category_id}}" href="#">
                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                  </a>
                                                  <a class="dropdown-item delete-btn" data-id="{{ $cat->category_id}}" href="#">
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
                              <th>SN</th>
                              <th>Categories</th>
                              <th class="text-nowrap text-sm-end">Date Added</th>
                              <th>Status</th>
                              <th class="text-lg-center">Actions</th>
                            </tr>
                        </tfoot>
                      </table>
                    </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="card mb-4">
      <form method="post" id="category_save">
      @csrf
        <div class="card-body">
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="vendor">
              Category
            </label>
            <input type="text" name="category_id" id="category_id" value="" hidden>
            <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Product Category" maxlength="30" minlength="3" value="{{ old('category_name') }}">
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="category-org">
              <span>Status</span>
            </label>
            <select id="category_status" name="category_status" class="select2 form-select" data-placeholder="Select Category" value="{{ old('category_status') }}">
              <option disabled selected>-Select-</option>
              <option value="Active">Publish</option>
              <option value="Inactive">Disable</option>
            </select>
          </div>
          <div class="d-flex align-content-center flex-wrap gap-3">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-label-secondary">clear</button>
        </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>           
</x-app-layout>