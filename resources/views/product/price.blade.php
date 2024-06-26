<x-app-layout>
         <div class="container-xxl flex-grow-1 container-p-y">    
          <div class="app-ecommerce">
      <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="d-flex flex-column justify-content-center">
          <h4 class="mb-1 mt-3">Add Product Prices</h4>
          <p class="text-muted">New Product Pricing Setup</p>
        </div>
      </div>
  <div class="row">
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
            <label class="form-label" for="product_name">Search Product</label>
                    <select class="form-control product_search" name="product_search" id="product_search">
                      <option value="">-Select-</option>
                      @foreach($products as $product)                                        
                        <option value="{{ $product->product_id }}">{{ $product->product_name }}</option>
                      @endforeach
                    </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="product_name">Product Name</label>
                   <input type="text" class="form-control" name="product_id" id="product_id" hidden>
                   <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name">
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="product_description">Cost Price</label>
              <input type="number" class="form-control" id="cost_price" name="cost_price" placeholder="0.00" >
            </div>
            <div class="col">
              <label class="form-label" for="selling_price">Selling Price</label>
              <input type="number" class="form-control" id="selling_price" name="selling_price" placeholder="0.00">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label" for="distribution_price">Distribution Price</label>
              <input type="text" class="form-control" id="distribution_price" name="distribution_price" placeholder="0.00">
            </div>
            <div class="col">
              <label class="form-label" for="wholesale_price"> Wholesale Price</label>
              <input type="text" class="form-control" id="wholesale_price" name="wholesale_price" placeholder="0.00">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="card mb-4">
        <div class="card-body">
        <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="effective_date">Effective Date</label>
            <input type="date" id="effective_date" name="effective_date" class="form-control" placeholder="0.00">
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="end_date">End Date</label>
           <input type="date" class="form-control" placeholder="0.00" id="end_date" name="end_date">
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="status">
              <span>Status</span>
            </label>
            <select id="status" name="status" class="select2 form-select">
              <option disabled selected>-Select-</option>
              <option value="Active">Publish</option>
              <option value="Inactive" style="color: #ff0000;">Disable</option>
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
                            @foreach($prices as $product)
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