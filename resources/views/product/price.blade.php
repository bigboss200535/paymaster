<x-app-layout>
               <div class="container-xxl flex-grow-1 container-p-y">    
                  <h4 class="py-3 mb-4">
                    <span class="text-muted fw-light">Product/</span> List
                  </h4>
                  <div class="app-ecommerce-category">
                  <div class="card">
                    <div class="card-datatable table-responsive">
                      <div style="margin:15px">
                        <a class="btn btn-primary me-sm-3 me-1" href="">Add New Price</a>
                      </div>
                      <table class="datatables-category-list table border-top" id="product_list">
                        <thead>
                          <tr>
                            <th>SN</th>
                            <th>Product</th>
                            <th>Batch No</th>
                            <th>Cost Price</th>
                            <th class="text-nowrap text-sm-end">Retail Price &nbsp;</th>
                            <th class="text-nowrap text-sm-end">Wholesale Price</th>
                            <th class="text-nowrap text-sm-end">Effective Date</th>
                            <th class="text-nowrap text-sm-end">End Date</th>
                            <th>Status</th>
                            <th class="text-lg-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                           @php
                              $counter = 1;
                            @endphp
                            @foreach($product_prices as $product)
                            <tr>
                              <td>{{ $counter++ }}</td>
                              <td>{{ $product->product_name }}</td>
                              <td>{{ $product->batch_number }}</td>
                              <td>{{ number_format($product->cost_price, 2) }}</td>
                              <td>{{ number_format($product->retail_price, 2) }}</td>
                              <td>{{ number_format($product->wholesale_price, 2) }}</td>
                              <td>{{ \Carbon\Carbon::parse($product->effective_date)->format('d-m-Y') }}</td>
                              <td>{{ \Carbon\Carbon::parse($product->end_date)->format('d-m-Y') }}</td>
                              <td class="text-nowrap text-sm-end">
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
                            <th>SN</th>
                            <th>Product</th>
                            <th>Batch No</th>
                            <th>Cost Price</th>
                            <th class="text-nowrap text-sm-end">Retail Price &nbsp;</th>
                            <th class="text-nowrap text-sm-end">Wholesale Price</th>
                            <th class="text-nowrap text-sm-end">Effective Date</th>
                            <th class="text-nowrap text-sm-end">End Date</th>
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