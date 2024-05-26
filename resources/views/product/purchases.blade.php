    <x-app-layout>
    @include ('layouts.preloader')
      <div class="container-xxl flex-grow-1 container-p-y">    
                  <!-- <h4 class="py-3 mb-4">
                    <span class="text-muted fw-light">Product Category/</span> List
                  </h4> -->
<div class="app-ecommerce">
  <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
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
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label" for="ecommerce-product-name">Search Product</label>
                  <select class="product_search form-control" name="product_search" id="product_search">
                      <option selected disabled>-Scan Barcode or Enter Item-</option>
                          @foreach($products as $product)                                        
                              <option value="{{ $product->product_id }}">{{ $product->product_name }}</option>
                          @endforeach
                  </select>
          </div>
          <table class="table table-bordered table-striped" style="white-space: nowrap;">
              <tr style="background-color: #ffffff;">
                <th colspan="7" class="text text-info">SALES TRANSACTION <i></i> <label id="texting" hidden=""></label><i></i></th>
              </tr>
              <tr>
                  <th>SN</th>
                  <th colspan="2">Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Action</th>
              </tr>
              <tr>
                  <td>1</td>
                  <td colspan="2">A set of Ten Pencil with eraser</td>
                  <td>3.00</td>
                  <td>
                    <input type="number" class="form-control item-qty" placeholder="1" min="1" max="50" />
                  </td>
                  <td>3.00</td>
                  <td>
                      <button type='submit' class='btn btn-primary btn-sm remove_product ' data-id='".$data->TransactionCode."' name='remove_product' align='center'>
                        <i class='bx bx-plus'></i>
                      </button>
                  </td>
              </tr>
              <!-- <tr>              
                  <td>2</td>
                  <td colspan="2">Carbocistein</td>
                  <td>10.00</td>
                  <td>3</td>
                  <td>30.00</td>
                  <td>
                      <button type='submit' class='btn btn-primary btn-sm remove_product ' data-id='".$data->TransactionCode."' name='remove_product' align='center'>
                    <i class='bx bx-plus'></i>
                      </button>
                  </td>
              </tr> -->
          </table>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="card mb-4">
        <div class="card-body">
          <table class="table table" border="2">
            <tr>
              <td style="color: black;"><b>Amount Due</b></td>
              <td style="color: black;"><b>Amount Payable</b></td>
            </tr>
            <tr>
              <td style="font-size:30px; color: green;" align="right">1,000.00</td>
              <td style="font-size:30px; color: red;" align="right">1,000.00</td>
            </tr>
            <tr>
              <td>
                  <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="category-org">
                    <span>Payment Mode</span>
                </label>
                <select id="category-org" class="select2 form-select" data-placeholder="Select Category">              
                    <option value="Cash" selected>Cash</option>
                    <option value="Telecel">Telecel Cash</option>
                    <option value="Mtn Momo">MTN Momo</option>
                  </select>
              </td>
              <td>
              <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="category-org">
                    <span>Discount(%)</span>
                </label>
                <select id="category-org" class="select2 form-select" data-placeholder="Select Category">              
                    <option value="Cash" selected>Cash</option>
                    <option value="Telecel">Telecel Cash</option>
                    <option value="Mtn Momo">MTN Momo</option>
                  </select>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
   <!-- First column-->
   <div class="col-12 col-lg-8">
      <div class="card mb-4">
        <div class="card-body">
          <table class="table table-bordered table-striped" style="white-space: nowrap;">
              <tr style="background-color: black;">
                <th colspan="7" class="text text-info" style="background-color: black;">ITEMS IN CART <i></i> <label id="texting" hidden=""></label><i></i></th>
              </tr>
              <tr>
                  <th>Sn</th>
                  <th colspan="2">Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Action</th>
              </tr>
              <tr>
                  <td>1</td>
                  <td colspan="2">Carbocistein</td>
                  <td>10.00</td>
                  <td>3</td>
                  <td>30.00</td>
                  <td>
                      <button type='submit' class='btn btn-danger btn-sm remove_product ' data-id='".$data->TransactionCode."' name='remove_product' align='center'>
                    <i class='bx bx-trash'></i>
                      </button>
                  </td>
              </tr>
             <!--  <tr>
                  <th colspan="6">No Item added</th> 
              </tr>-->
          </table>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="card mb-4">
        <div class="card-body">
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1" for="vendor">
              Customer
            </label>
            <input type="text" class="form-control" value="New Customer">
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="category-org">
              <span>Transaction No</span>
            </label>
              <input type="text" class="form-control" >
          </div>
          <div class="mb-3 col ecommerce-select2-dropdown">
            <label class="form-label mb-1 d-flex justify-content-between align-items-center" for="category-org">
              <span>Amount Tendered</span>
            </label>
              <input type="number" class="form-control" value="0.00" >
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
      <button type="reset" class="btn btn-label-info">New Transaction</button>
      <button class="btn btn-label-danger">Hold Transaction</button>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</div>
</div>           
</x-app-layout>