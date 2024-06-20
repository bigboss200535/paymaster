$(document).ready(function() {
  // Initialize DataTables
  $('#users_list').DataTable();
  $('#employee_details').DataTable();
  $('#product_list').DataTable();

  // Employee form submission
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
      Swal.fire({
        icon: 'error',
        title: 'Validation Error',
        text: 'Title name must be at least 3 characters long.'
      });
      return;
    }

    if (firstname.length < 3) {
      toastr.error('First name must be at least 3 characters long.', 'Validation Error');
      return;
    }

    if (lastname.length < 3) {
      toastr.error('Last name must be at least 3 characters long.', 'Validation Error');
      return;
    }

    if (!gender) {
      toastr.error('Gender is required.', 'Validation Error');
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

  // Category form submission
  $('#category_save').submit(function(e) {
    e.preventDefault();

    // Collect form data
    var formData = new FormData(this);
    var category_name = $('#category_name').val();
    var category_status = $('#category_status').val();

    // Client-side validation
    if (category_name.length < 3) {
      Swal.fire({
        icon: 'info',
        title: 'Validation Error',
        text: 'Category name must be at least 3 characters long.'
      });
      return;
    }

    if (!category_status) {
      Swal.fire({
        icon: 'info',
        title: 'Validation Error',
        text: 'Kindly select Status'
      });
      return;
    }

    $.ajax({
      url: '/category',
      type: 'POST',
      data: formData,
      dataType: 'json',
      contentType: false,
      processData: false,
      success: function(response) {
        var result = JSON.parse(response);
        if (result == 201) {
          $('#category_name').val('');
          $('#category_status').val('-Select-');
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Data submitted successfully.'
          });
        } else if (result == 200) {
          toastr.error('Data already exist');
          Swal.fire({
            icon: 'info',
            title: 'Unavialable',
            text: 'Data already exist'
          });
        }
      },
      error: function(xhr, status, error) {
        toastr.error('Error Saving Product!, Try again');
      }
    });
  });

  // Birth date input listener
  var birthDateInput = document.getElementById('birth_date');
  if (birthDateInput) {
    birthDateInput.addEventListener('input', function() {
      var dob = new Date(this.value);
      if (!isValidDate(dob)) return;
      var age = calculateAge(dob);
      document.getElementById('age').value = age;
    });
  }
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
