<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} | Anywhere, Everywhere</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/favicon.ico') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/typeahead-js/typeahead.css') }}" /> 
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/dropzone/dropzone.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/tagify/tagify.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}" /> -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/@form-validation/form-validation.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/pages/page-profile.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/spinkit/spinkit.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('vendor/js/template-customizer.js') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('preloader.css') }}">
    </head>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
            <!-- Menu -->
            @include('layouts.aside')
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('layouts.topmenu')
                    <!-- Content wrapper -->
                    <div class="content-wrapper">
            
                            <!-- Content -->
                                {{ $slot }}
                             <!-- / Content -->

                              <!-- Footer -->
                             @include('layouts.footer')
                            <!-- / Footer -->
                       <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
            </div>
           <!-- / Layout page -->
      </div>
      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('vendor/js/menu.js') }}"></script>
    <!-- <script src="{{ asset('vendor/libs/quill/katex.js') }}"></script> -->
    <!-- <script src="{{ asset('vendor/libs/quill/quill.js') }}"></script> -->
    <script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('vendor/libs/tagify/tagify.js') }}"></script>
    <!-- <script src="{{ asset('vendor/libs/dropzone/dropzone.js') }}"></script> -->
    <script src="{{ asset('vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('vendor/libs/@form-validation/auto-focus.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- <script src="{{ asset('js/app-ecommerce-product-add.js') }}"></script> -->
    <script src="{{ asset('js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('js/app-academy-dashboard.js') }}"></script>
    <script src="{{ asset('js/app-ecommerce-category-list.js') }}"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js') }}"></script>
    <!-- <script src="{{ asset('js/tables-datatables-basic.js') }}"></script> -->
    <!-- <script src="{{ asset('js/form-wizard-numbered.js') }}"></script> -->
    <script src="{{ asset('vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
    <script src="{{ asset('mainjs.js') }}"></script>
    </body>
</html>

 <!-- Livewire Scripts -->
 @livewireScripts 
 
<script type="text/javascript">
     $(document).ready( function () {
        $('#users_list').DataTable();
        $('#employee_details').DataTable();
        $('#product_list').DataTable();

        $('.product_search').select2();

});

$(document).ready( function () {
        // $('#employee_details').DataTable();
});

$(document).ready( function () {
        // $('#product_list').DataTable();
});
</script>

<script type="text/javascript">
    $(document).ready(function() {

      // $('.product_search').select2();

        $('#employee_add').submit(function(e) {
            e.preventDefault();

            // Collect form data
            var formData = new FormData(this);

            // Client-side validation
            var title = $('#title').val();
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var gender = $('#gender').val();
            var telephone = $('#telephone').val();
            var birth_date = $('#birth_date').val();
            var portfolio = $('#portfolio').val();
            var department = $('#department_id').val();
            var designation = $('#designation_id').val();
            var religion = $('#religion').val();
            var address = $('#address').val();
            var region = $('#region').val();
            var bank = $('#bank').val();
            var bank_account = $('#bank_account').val();
            var ssnit_number = $('#ssnit_number').val();
            var file_number = $('#file_number').val();
            var staff_type = $('#staff_type').val();
            var gh_card = $('#gh_card').val();

            if (!title) {
                toastr.warning('Title is required.', 'Validation Error');
                return;
            }

            if (firstname.length < 3) {
                toastr.warning('First name must be at least 3 characters long.', 'Validation Error');
                return;
            }

            if (lastname.length < 3) {
                toastr.warning('Last name must be at least 3 characters long.', 'Validation Error');
                return;
            }

            if (!gender) {
                toastr.warning('Gender is required.', 'Validation Error');
                return;
            }

            if (telephone.length < 10) {
                toastr.error('Telephone number must be at least 10 characters long.', 'Validation Error');
                return;
            }

            if (!birth_date) {
                toastr.error('Birth date is required.', 'Validation Error');
                return;
            }

            if (!portfolio) {
                toastr.error('Portfolio is required.', 'Validation Error');
                return;
            }

            if (!department) {
                toastr.error('Department is required.', 'Validation Error');
                return;
            }

            if (!designation) {
                toastr.error('Designation is required.', 'Validation Error');
                return;
            }

            if (!religion) {
                toastr.error('Religion is required.', 'Validation Error');
                return;
            }

            if (address.length < 3) {
                toastr.error('Address must be at least 3 characters long.', 'Validation Error');
                return;
            }

            if (!region) {
                toastr.error('Region is required.', 'Validation Error');
                return;
            }

            if (!staff_type) {
                toastr.error('Staff type must be specified.', 'Validation Error');
                return;
            }

            $.ajax({
                url: '/storeemployee',
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {
                    toastr.success('Data submitted successfully.', 'Success');
                    $('#employee_add')[0].reset();
                    $('#addUser').modal('hide');
                },
                error: function(xhr, status, error) {
                    toastr.error('An error occurred while submitting the form. Please try again later.', 'Error');
                }
            });
        });
    });
</script>

 <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', function() {
          var birthDateInput = document.getElementById('birth_date');
          birthDateInput.addEventListener('input', function() {
              var dob = new Date(this.value);
              if (!isValidDate(dob)) return;
              var age = calculateAge(dob);
              document.getElementById('age').value = age;
          });
      });

      function calculateAge(birthDate) {
          var now = new Date();
          var dob = new Date(birthDate);
          var age = now.getFullYear() - dob.getFullYear();
          var monthDiff = now.getMonth() - dob.getMonth();

          if (monthDiff < 0 || (monthDiff === 0 && now.getDate() < dob.getDate())) {
              age--;
          }

          return age;
      }

      function isValidDate(date) {
          return !isNaN(date.getTime());
      }
 </script>
  <script>
    // Handle delete functionality
    $(document).on('click', '.product_delete_btn', function() {
      var product_id = $(this).data('id');

      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to undo this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: '/product/' + product_id,
            type: 'DELETE',
            data: {
              _token: '{{ csrf_token() }}',
              product_id: product_id
            },
            success: function(response) {
              var result = JSON.parse(response);
              if (result == 201) {
                $("#product_list").load(location.href + " #product_list");
                toastr.success('Data deleted successfully!');
              } else if (result == 200) {
                toastr.warning('Data is attached to stock or prices');
              }
            },
            error: function(xhr, status, error) {
              toastr.error('Error deleting item! Try again');
            }
          });
        }
      });
    });


    $(document).on('click', '.product_edit_btn', function() {
      var product_id = $(this).data('id');

      $.ajax({
        url: '/product/' + product_id + '/edit',
        type: 'GET',
        success: function(response) {
          $('#product_id').val(response.product.product_id)[0];
          $('#product_name').val(response.product.product_name)[0];
          $('#category').val(response.product.category_id).trigger('change');
          $('#product_description').val(response.product.description);
          $('#manufacturer').val(response.product.manufacturer);
          $('#expirable').val(response.product.expirable);
          $('#stockable').val(response.product.stocked);
          $('#sales_type').val(response.product.sales_type);
          $('#status').val(response.product.status);
          
        },
        error: function(xhr, status, error) {
          toastr.error('Error fetching data! Try again.');
        }
      });
    });


    $('#product_save').on('submit', function(e) {
      e.preventDefault();

      // Collect form data
      var product_id = $('#product_id').val();
      var product_name = $('#product_name').val();
      var product_description = $('#product_description').val();
      var manufacturer = $('#manufacturer').val();
      var category = $('#category').val();
      var sales_type = $('#sales_type').val();
      var expirable = $('#expirable').val();
      var stockable = $('#stockable').val();
      var status = $('#status').val();

      var url = product_id ? '/product/' + product_id : '/product';
      var method = product_id ? 'PUT' : 'POST';

      // Client-side validation
      if(product_name.length < 3) {
          toastr.warning('Product name must be at least 3 characters long');
        return;
      }

      if (manufacturer.length < 3) {
        toastr.warning('Manufacturer is required');
        return;
      }

      if (!category) {
        toastr.warning('Category is required.');
        return;
      }

      if (!sub_category) {
        toastr.warning('Sub Category is required.');
        return;
      }
      
      if (!sales_type) {
        toastr.warning('Sales Type is required');
        return;
      }
    
      if (!expirable) {
        toastr.warning('Expirable is required');
        return;
      }

      if (!stockable) {
        toastr.warning('Stockable is required');
        return;
      }
    

      if (!status) {
        toastr.warning('Status is required');
        return;
      }


      // Check if product_id has a value before update
      if (product_id && method === 'PUT') {
        $.ajax({
          url: product_id ? '/product/' + product_id : '/product',
          type: method,
          data: $(this).serialize(),
          success: function(response) {
            toastr.success('Data updated successfully!');
            $("#product_list").load(location.href + " #product_list");
            $('#product_save')[0].reset();
            $('#product_id').val('');
          },
          error: function(xhr, status, error) {
            toastr.error('Error updating category! Try again.');
          }
        });
      } else {
        $.ajax({
          url: '/product',
          type: 'POST',
          data: $(this).serialize(),
          success: function(response) {
            var result = JSON.parse(response);
              if (result == 201) {
                $("#product_list").load(location.href + " #product_list");
                $('#product_save')[0].reset();
                toastr.success('Data save successfully!');
              } else if (result == 200) {
                toastr.warning('Ops');
              }    
          },
          error: function(xhr, status, error) {
            toastr.error('Error saving data! Try again.');
          }
        });
      }
    });



  </script>

<script>
$('#price_save').on('submit', function(e) {
      e.preventDefault();
      // Collect form data
      var product_id = $('#product_id').val();
      var cost_price = $('#cost_price').val();
      var selling_price = $('#selling_price').val();
      var distribution_price = $('#distribution_price').val();
      var wholesale_price = $('#wholesale_price').val();
      var effective_date = $('#effective_date').val();
      var end_date = $('#end_date').val();
      var status = $('#status').val();

      // var url = product_id ? '/product/' + product_id : '/product';
      // var method = product_id ? 'PUT' : 'POST';

      // Client-side validation
      if(!cost_price) {
          toastr.warning('Cost price is needed');
        return;
      }

      if (!selling_price) {
        toastr.warning('Selling price is require');
        return;
      }

      if (!wholesale_price) {
        toastr.warning('Wholesale price is required.');
        return;
      }
      
      // Check if product_id has a value before update
      // if (product_id && method === 'PUT') {
      //   $.ajax({
      //     url: product_id ? '/price/' + product_id : '/price',
      //     type: method,
      //     data: $(this).serialize(),
      //     success: function(response) {
      //       toastr.success('Data updated successfully!');
      //       $("#product_list").load(location.href + " #product_list");
      //       $('#product_save')[0].reset();
      //       $('#product_id').val('');
      //     },
      //     error: function(xhr, status, error) {
      //       toastr.error('Error updating category! Try again.');
      //     }
      //   });
      // } else {
        $.ajax({
          url: '/price',
          type: 'POST',
          data: $(this).serialize(),
          success: function(response) {
            var result = JSON.parse(response);
              if (result == 201) {
                $("#product_list").load(location.href + " #product_list");
                $('#price_save')[0].reset();
                toastr.success('Data save successfully!');
              } else if (result == 200) {
                // toastr.warning('Ops');
                $("#product_list").load(location.href + " #product_list");
                $('#price_save')[0].reset();
                toastr.success('Data Updated successfully!');
              }    
          },
          error: function(xhr, status, error) {
            toastr.error('Error saving data! Try again.');
          }
        });
      // }
    });

    $(document).on('change', '#product_search', function() {
      var product_id = $(this).val(); // Get the selected product ID from the dropdown
  
      $.ajax({
        url: '/price/' + product_id,
      
        type: 'GET',
        success: function(response) {
          $('#price_id').val(response.product.pp_id); // Update product ID input field
          $('#product_id').val(response.product.product_id); // Update product ID input field
          $('#product_name').val(response.product.product_name); // Update product name input field
          $('#cost_price').val(response.product.cost_price); // Update cost price input field
          $('#selling_price').val(response.product.retail_price); // Update selling price input field
          $('#distribution_price').val(response.product.distribution_price); // Update distribution price input field
          $('#wholesale_price').val(response.product.wholesale_price); // Update wholesale price input field
          $('#effective_date').val(response.product.effective_date); // Update effective date input field
          $('#end_date').val(response.product.end_date); // Update end date input field
          $('#status').val(response.product.status).trigger('change'); // Update status select field
  
          // Optionally, trigger any other necessary updates or actions based on response
        },
        error: function(xhr, status, error) {
          toastr.error('Error fetching data! Try again.'); // Display error message if AJAX request fails
        }
      });
    });

</script>

