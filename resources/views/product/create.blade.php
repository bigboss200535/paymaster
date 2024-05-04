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
    <div class="d-flex align-content-center flex-wrap gap-3">
      <!-- <button class="btn btn-label-secondary">Discard</button>
      <button class="btn btn-label-primary">Save draft</button>
      <button type="submit" class="btn btn-primary">Publish product</button> -->
    </div>

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
          <div class="mb-3">
            <label class="form-label" for="ecommerce-product-name">Product Name</label>
            <input type="text" class="form-control" id="ecommerce-product-name" placeholder="Product Name" name="productTitle" aria-label="Product title">
          </div>
          <div class="row mb-3">
            <div class="col"><label class="form-label" for="ecommerce-product-sku">Description</label>
              <input type="text" class="form-control" id="ecommerce-product-sku" placeholder="Other Descrption" name="productSku" aria-label="Product SKU"></div>
            <div class="col"><label class="form-label" for="ecommerce-product-barcode">Barcode</label>
              <input type="text" class="form-control" id="ecommerce-product-barcode" placeholder="0123-4567" name="productBarcode" aria-label="Product barcode"></div>
          </div>
          <div class="row mb-3">
            <div class="col"><label class="form-label" for="ecommerce-product-sku">Category</label>
            <select name="" id="" class="form-control">
                   <option value="" disabled selected>-Select-</option>
                 @foreach($category as $categories)                                        
                  <option value="{{ $categories->category_id }}">{{ $categories->category_name }}</option>
                 @endforeach
            </select>
              <!-- <input type="number" class="form-control" id="ecommerce-product-sku" placeholder="SKU" name="productSku" aria-label="Product SKU"> -->
            </div>
            <div class="col"><label class="form-label" for="ecommerce-product-barcode">Barcode</label>
              <input type="text" class="form-control" id="ecommerce-product-barcode" placeholder="0123-4567" name="productBarcode" aria-label="Product barcode">
            </div>
          </div>
          <!-- Description -->
          
        </div>
      </div>
     
      <!-- Inventory -->
    </div>
    <!-- /Second column -->

    <!-- Second column -->
    <div class="col-12 col-lg-4">
    
      <!-- Organize Card -->
      <div class="card mb-4">
        
        <div class="card-body">
          <!-- Vendor -->
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

          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="vendor">
              Stockable
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
              <option value="Inactive">Disable</option>
              <!-- <option value="Electronics">Electronics</option> -->
            </select>
          </div>
        </div>
      </div>
      <!-- /Organize Card -->
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