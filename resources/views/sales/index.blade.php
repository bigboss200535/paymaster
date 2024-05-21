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
      <!-- <p class="text-muted">New Product Setup and Settings</p> -->
    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
      <!-- <button class="btn btn-label-secondary">Discard</button>
      <button class="btn btn-label-primary">Save draft</button>
      <button type="submit" class="btn btn-primary">Publish product</button> -->
    </div>

  </div>
  <div class="row">

   <!-- First column-->
   <div class="col-12 col-lg-8">
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="card-tile mb-0">Product information</h5>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <!-- <label class="form-label" for="ecommerce-product-name">Search Product</label> -->
                  <select class="form-control product_search" name="product_search" id="product_search">
                      <option selected disabled>-Scan Barcode or Enter Item-</option>
                      <option>-Barcode-</option>
                      <option>-Scan Item-</option>
                  </select>
            <!-- <input type="text" class="form-control" id="ecommerce-product-name" placeholder="Enter Product Name" name="productTitle" aria-label="Product title"> -->
          </div>
          <table class="table table-bordered table-striped" style="white-space: nowrap;">
              <tr style="background-color: #ffffff;">
                <th colspan="6" class="text text-info">SALES TRANSACTION <i></i> <label id="texting" hidden=""></label><i></i></th>
              </tr>
              <tr>
                  <th colspan="2">Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Action</th>
              </tr>
              <tr>
                  <th colspan="6">No Item Selected</th>
              </tr>
          </table>
        </div>
      </div>
    </div>
    <!-- Second column -->
    <div class="col-12 col-lg-4">
      <!-- Organize Card -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="vendor">
              Customer
            </label>
            <select id="vendor" class="select2 form-select customer_search" data-placeholder="Select Vendor">
              <option value="" disabled selected>-Enter Customer-</option>
              <option value="men-clothing">Yes</option>
              <option value="kid-clothing">No</option>
            </select>
          </div>
          <!-- Category -->
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="category-org">
              <span>Payment Mode</span>
            </label>
            <select id="category-org" class="select2 form-select" data-placeholder="Select Category">
              <!-- <option disabled selected>-Select-</option> -->
              <option value="Cash" selected>Cash</option>
              <option value="Telecel">Telecel Cash</option>
              <option value="Mtn Momo">Mtn Momo</option>
            </select>
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="category-org">
              <span>Payment Mode</span>
            </label>
            <select id="category-org" class="select2 form-select" data-placeholder="Select Category">
              <!-- <option disabled selected>-Select-</option> -->
              <option value="Cash" selected>Cash</option>
              <option value="Telecel">Telecel Cash</option>
              <option value="Mtn Momo">Mtn Momo</option>
            </select>
          </div>
          
        </div>
      </div>
    </div>
    
   <!-- First column-->
   <div class="col-12 col-lg-8">
      <div class="card mb-4">
        <div class="card-body">
          <table class="table table-bordered table-striped" style="white-space: nowrap;">
              <tr style="background-color: #ffffff;">
                <th colspan="6" class="text text-info">ITEMS IN CART <i></i> <label id="texting" hidden=""></label><i></i></th>
              </tr>
              <tr>
                  <th colspan="2">Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Action</th>
              </tr>
              <tr>
                  <th colspan="6">No Item added</th>
              </tr>
          </table>
        </div>
      </div>
    </div>
    <!-- Second column -->
    <div class="col-12 col-lg-4">
      <!-- Organize Card -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="vendor">
              Expirable
            </label>
            <select id="vendor" class="select2 form-select" data-placeholder="Select Vendor">
              <option value="" disabled selected>-Select-</option>
              <option value="men-clothing">Yes</option>
              <option value="kid-clothing">No</option>
            </select>
          </div>
          <!-- Category -->
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="category-org">
              <span>Status</span>
            </label>
            <select id="category-org" class="select2 form-select" data-placeholder="Select Category">
              <option disabled selected>-Select-</option>
              <option value="Active">Publish</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="d-flex align-content-center flex-wrap gap-3">
      <button type="reset" class="btn btn-label-secondary">clear</button>
      <!-- <button class="btn btn-label-primary">Save draft</button> -->
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <!-- /Second column -->
  </div>
</div>
</div>           
</x-app-layout>