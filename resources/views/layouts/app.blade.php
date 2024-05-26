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
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/libs/@form-validation/form-validation.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/css/pages/page-profile.css') }}" />
    <!-- <script src="{{ asset('vendor/js/helpers.js') }}"></script> -->
    <!-- <script src="{{ asset('js/config.js') }}"></script> -->
    <link rel="stylesheet" href="{{ asset('vendor/libs/spinkit/spinkit.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }}" />
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('vendor/js/template-customizer.js') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
    </head>
    <style>
            .preloader-container {
              display: none; /* Initially hide the preloader */
              position: fixed;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
              background-color: rgba(255, 255, 255, 0.3); /* Transparent background */
              display: flex;
              justify-content: center;
              align-items: center;
              z-index: 9999;
            }

            .preloader {
              font-family: Arial, sans-serif;
              font-size: 24px;
              font-weight: bold;
              color: #333; /* Change the color as needed */
            }

            .preloader span {
              display: inline-block;
              animation: preloader-anim 2s infinite ease-in-out;
            }

            @keyframes preloader-anim {
              0% {
                transform: scale(1);
              }
              50% {
                transform: scale(1.2);
              }
              100% {
                transform: scale(1);
              }
            }
</style>
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
    <script src="{{ asset('vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('vendor/libs/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('vendor/libs/@form-validation/auto-focus.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/app-ecommerce-product-add.js') }}"></script>
    <script src="{{ asset('js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('js/app-academy-dashboard.js') }}"></script>
    <script src="{{ asset('js/app-ecommerce-category-list.js') }}"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js') }}"></script>
    <script src="{{ asset('js/tables-datatables-basic.js') }}"></script>
    <script src="{{ asset('js/form-wizard-numbered.js') }}"></script>
    <script src="{{ asset('vendor/libs/jquery-repeater/jquery-repeater.js') }}"></script>
    </body>
</html>
<script type="text/javascript">
     $(document).ready( function () {
        $('#users_list').DataTable();
});

$(document).ready( function () {
        $('#employee_details').DataTable();
});

$(document).ready( function () {
        $('#product_list').DataTable();
});
</script>

<script type="text/javascript">
   $(document).ready(function() {
    $('.product_search').select2();
    $('#employee_add').submit(function(e) {
        e.preventDefault(); 

        // Collect form data
        var formData = new FormData(this);
        var title = $('#title').val();
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var gender = $('#gender').val();
        var telephone = $('#telephone').val();
        var birth_date = $('#birth_date').val();
        var portfolio = $('#portfolio').val();
        var department = $('#department').val();
        var designation = $('#designation').val();
        var religion = $('#religion').val();
        var address = $('#address').val();
        var region = $('#region').val();
        var bank = $('#bank').val();
        var bank_account = $('#bank_account').val();
        var ssnit_number = $('#ssnit_number').val();
        // var user_id = $('#user_id').val();
        var file_number = $('#file_number').val();
        var staff_type = $('#staff_type').val();
        var gh_card = $('#gh_card').val();
        // Client-side validation

        if (!title) {
            // Display SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Title is required.'
            });
            return;
        }

        if (firstname.length < 3 ) {
            // Display SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'First name must be at least 3 characters long.'
            });
            return;
        }
         if (lastname.length < 3) {
            // Display SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Last name must be at least 3 characters long.'
            });
            return;
        }

         if (!gender) {
            // Display SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Gender is required'
            });
            return;
        }
        if (telephone.length < 10) {
            // Display SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Telephone number must be at least 10 characters long'
            });
            return;
        }
        if (!birth_date) {
            // Display SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Birth date is required.'
            });
            return;
        }
        if (!portfolio) {
            // Display SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Portfolio is required.'
            });
            return;
        }
         if (!department) {
            // Display SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Department is required.'
            });
            return;
        }
        if (!designation) {
            // Display SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Designation is required.'
            });
            return;
        }
        if (!religion) {
            // Display SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Religion is required.'
            });
            return;
        } 
        if (address.length < 3) {
            // Display SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Address must be at least 3 characters long.'
            });
            return;
        }
       
        if (!region) {
            // Display SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Region is required.'
            });
            return;
        }

        if (!staff_type) {
            // Display SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                text: 'Staff type must be specified.'
            });
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
                
                // Display SweetAlert success message
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data submitted successfully.'
                });
                // reset form
                $('#employee_add')[0].reset();
            },
            error: function(xhr, status, error) {
                // Handle error response
                // Display SweetAlert error message
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while submitting the form. Please try again later.'
                });
            }
        });
    });
});
 </script>
 <script type="text/javascript">
         // JavaScript
      document.addEventListener('DOMContentLoaded', function() {
          // Get the birth date input field
          var birthDateInput = document.getElementById('birth_date');

          // Add event listener for input change
          birthDateInput.addEventListener('input', function() {
              // Get the selected birth date value
              var dob = new Date(this.value);
              if (!isValidDate(dob)) return;

              // Calculate the age
              var age = calculateAge(dob);

              // Set the calculated age to the age input field
              document.getElementById('age').value = age;
          });
      });

      // Function to calculate age based on birth date
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

      // Function to check if date is valid
      function isValidDate(date) {
          return !isNaN(date.getTime());
      }


 </script>
 <script>
//     $(document).ready(function() {
   
// });
    // $('.').select2();
 </script>
  
