    <x-app-layout>
               <div class="container-xxl flex-grow-1 container-p-y">    
                  <h4 class="py-3 mb-4">
                    <span class="text-muted fw-light">Product/</span> List
                  </h4>
                  <div class="app-ecommerce-category">
                  <div class="card">
                    <div class="card-datatable table-responsive">
                      <div style="margin:15px">
                        <a class="btn btn-primary me-sm-3 me-1" href="">Add New Product</a>
                      </div>
                      <table class="datatables-category-list table border-top" id="product_list">
                        <thead>
                          <tr>
                            <th>Sn</th>
                            <th>Product</th>
                            <th>Categories</th>
                            <th>Barcode</th>
                            <th class="text-nowrap text-sm-end">Stocked &nbsp;</th>
                            <th class="text-nowrap text-sm-end">Expirable</th>
                            <th>Status</th>
                            <th class="text-lg-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                           @php
                              $counter = 1;
                            @endphp
                            @foreach($products as $product)
                            <tr>
                              <td>{{ $counter++ }}</td>
                              <td>{{ $product->product_name }}</td>
                              <td>{{ $product->category }}</td>
                              <td>{{ $product->barcode }}</td>
                              <td class="text-nowrap text-sm-end" align="left">
                                @if($product->stocked === '101')
                                <span class="badge bg-label-info me-1">Yes</span>
                                @elseif ($product->stocked === '404')
                                <span class="badge bg-label-danger me-1">No</span>
                                @endif
                              </td>
                              <td class="text-nowrap text-sm-end" style="padding-right: 10px;">
                                @if($product->expirable === 'Yes')
                                <span class="badge bg-label-info me-1">Yes</span>
                                @elseif ($product->expirable === 'No')
                                <span class="badge bg-label-danger me-1">No</span>
                                @endif
                              </td>
                              <td class="text-nowrap text-sm-end" align="left">
                                @if($product->status === 'Active')
                                <span class="badge bg-label-info me-1">Active</span>
                                @elseif ($product->status === 'Inactive')
                                <span class="badge bg-label-danger me-1">Inactive</span>
                                @endif
                              </td>
                              <td class="text-lg-center">
                              <div class="dropdown" align="center">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                              <i class="bx bx-dots-vertical-rounded"></i>
                                          </button>
                                            <div class="dropdown-menu">
                                                  <a class="dropdown-item" href="">
                                                    <i class="bx bx-edit-alt me-1"></i> More
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
                            <th>Sn</th>
                            <th>Product</th>
                            <th>Categories</th>
                            <th>Barcode</th>
                            <th class="text-nowrap text-sm-end">Stocked &nbsp;</th>
                            <th class="text-nowrap text-sm-end">Expirable </th>
                            <th>Status</th>
                            <th class="text-lg-center">Actions</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>   

          <!-- Offcanvas to add new customer -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEcommerceCategoryList" aria-labelledby="offcanvasEcommerceCategoryListLabel">
    <!-- Offcanvas Header -->
    <div class="offcanvas-header py-4">
      <h5 id="offcanvasEcommerceCategoryListLabel" class="offcanvas-title">Add Category</h5>
      <button type="button" class="btn-close bg-label-secondary text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <!-- Offcanvas Body -->
    <div class="offcanvas-body border-top">
      <form class="pt-0" id="eCommerceCategoryListForm" onsubmit="return true">
        <!-- Title -->
        <div class="mb-3">
          <label class="form-label" for="ecommerce-category-title">Title</label>
          <input type="text" class="form-control" id="ecommerce-category-title" placeholder="Enter category title" name="categoryTitle" aria-label="category title">
        </div>
        <!-- Slug -->
        <div class="mb-3">
          <label class="form-label" for="ecommerce-category-slug">Slug</label>
          <input type="text" id="ecommerce-category-slug" class="form-control" placeholder="Enter slug" aria-label="slug" name="slug">
        </div>
        <!-- Image -->
        <div class="mb-3">
          <label class="form-label" for="ecommerce-category-image">Attachment</label>
          <input class="form-control" type="file" id="ecommerce-category-image">
        </div>
        <!-- Parent category -->
        <div class="mb-3 ecommerce-select2-dropdown">
          <label class="form-label" for="ecommerce-category-parent-category">Parent category</label>
          <select id="ecommerce-category-parent-category" class="select2 form-select" data-placeholder="Select parent category">
            <option value="">Select parent Category</option>
            <option value="Household">Household</option>
            <option value="Management">Management</option>
            <option value="Electronics">Electronics</option>
            <option value="Office">Office</option>
            <option value="Automotive">Automotive</option>
          </select>
        </div>
        <!-- Description -->
        <div class="mb-3">
          <label class="form-label">Description</label>
          <div class="form-control p-0 pt-1">
            <div class="comment-editor border-0" id="ecommerce-category-description">
            </div>
            <div class="comment-toolbar border-0 rounded">
              <div class="d-flex justify-content-end">
                <span class="ql-formats me-0">
                  <button class="ql-bold"></button>
                  <button class="ql-italic"></button>
                  <button class="ql-underline"></button>
                  <button class="ql-list" value="ordered"></button>
                  <button class="ql-list" value="bullet"></button>
                  <button class="ql-link"></button>
                  <button class="ql-image"></button>
                </span>
              </div>
            </div>
          </div>

        </div>
        <!-- Status -->
        <div class="mb-4 ecommerce-select2-dropdown">
          <label class="form-label">Select category status</label>
          <select id="ecommerce-category-status" class="select2 form-select" data-placeholder="Select category status">
            <option value="">Select category status</option>
            <option value="Scheduled">Scheduled</option>
            <option value="Publish">Publish</option>
            <option value="Inactive">Inactive</option>
          </select>
        </div>
        <!-- Submit and reset -->
        <div class="mb-3">
          <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Add</button>
          <button type="reset" class="btn bg-label-danger" data-bs-dismiss="offcanvas">Discard</button>
        </div>
      </form>
    </div>
  </div>
</div>

          </div>
    </x-app-layout>