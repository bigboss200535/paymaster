    <x-app-layout>
         <div class="container-xxl flex-grow-1 container-p-y">    
              <!-- <h4 class="py-3 mb-4">
                 <span class="text-muted fw-light">Product Category/</span> List
               </h4> -->
          <div class="app-ecommerce">
      <!-- Add Product -->
      <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="d-flex flex-column justify-content-center">
          <h4 class="mb-1 mt-3">Add a new Product</h4>
          <p class="text-muted">New Product Setup and Settings</p>
        </div>
        <!-- <div class="d-flex align-content-center flex-wrap gap-3">
          <button class="btn btn-label-secondary">Discard</button>
          <button class="btn btn-label-primary">Save draft</button>
          <button type="submit" class="btn btn-primary">Publish product</button>
        </div> -->
      </div>
  <div class="row">
   <!-- First column-->
   <div class="col-12 col-lg-8">
      <!-- Product Information -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-tile mb-0">Product information</h5>
        </div>
        <div class="card-body">
          <form id="product_save" enctype="multipart/form-data" method="post"> 
          @csrf
          <div class="mb-3">
            <label class="form-label" for="product_name">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                    <input type="text" name="product_id" id="product_id" hidden>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="product_description">Description</label>
              <input type="text" class="form-control" id="product_description" name="product_description" placeholder="Other Descrption" >
            </div>
            <div class="col">
              <label class="form-label" for="manufacturer">Manufacturer</label>
              <input type="text" class="form-control" id="manufacturer" name="manufacturer" placeholder="Manufacturer">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="category">Category</label>
            <select name="category" id="category" class="form-control">
                   <option value="" disabled selected>-Select-</option>
                 @foreach($category as $categories)                                        
                  <option value="{{ $categories->category_id }}">{{ $categories->category_name }}</option>
                 @endforeach
            </select>
            </div>
            <div class="col">
              <label class="form-label" for="sub_category"> Sub Category</label>
             <select name="sub_category" id="sub_category" class="form-control">
              <option disable selected>-Select-</option>
              <option value="All">All</option>
              <option value="Wholesale">Wholesale</option>
              <option value="Resale">Resale</option>
             </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="card mb-4">
        <div class="card-body">
        <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="expirable">
              Sales Type
            </label>
            <select name="sales_type" id="sales_type" class="form-control">
              <option disable selected>-Select-</option>
              <option value="All">All</option>
              <option value="Wholesale">Wholesale</option>
              <option value="Resale">Resale</option>
            </select>
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="expirable">
              Expirable
            </label>
            <select id="expirable" name="expirable" class="select2 form-select">
              <option value="" disabled selected>-Select-</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="stockable">
              Stockable
            </label>
            <select id="stockable" name="stockable" class="select2 form-select">
              <option value="" disabled selected>-Select-</option>
              <option value="101">Yes</option>
              <option value="404">No</option>
            </select>
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="status">
              <span>Status</span>
            </label>
            <select id="status" name="status" class="select2 form-select">
              <option disabled selected>-Select-</option>
              <option value="Active">Publish</option>
              <option value="Inactive">Disable</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
      <button type="submit" class="btn btn-primary">Submit</button>
      <button type="reset" class="btn btn-label-secondary">clear</button>
    </div>
  </form>
  </div>
</div>
<br>
      <div class="app-ecommerce-category">
                  <div class="card">
                    <div class="card-datatable table-responsive">
                      <div style="margin:15px">
                        <!-- <a class="btn btn-primary me-sm-3 me-1" href="{{ url('add-product') }}">Add New Product</a> -->
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
                              <td>
                                  {!! DNS1D::getBarcodeHTML('this_barc', "C128",1.4,22) !!}
                              </td>
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
                                                 <a class="dropdown-item product_edit_btn" data-id="{{ $product->product_id}}" href="#">
                                                   <i class="bx bx-edit-alt me-1"></i> Edit
                                                 </a>
                                                 <a class="dropdown-item product_delete_btn" data-id="{{ $product->product_id}}" href="#">
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
             </div>
</div>   
        
</x-app-layout>