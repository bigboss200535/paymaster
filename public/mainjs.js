
  $(document).ready(function() {
    // Handle form submission for saving and updating
    $('#category_save').on('submit', function(e) {
      e.preventDefault();

      // Collect form data
      var category_id = $('#category_id').val();
      var category_name = $('#category_name').val();
      var category_status = $('#category_status').val();
      var url = category_id ? '/category/' + category_id : '/category';
      var method = category_id ? 'PUT' : 'POST';

      // Client-side validation
      if (category_name.length < 3) {
        toastr.warning('Category name must be at least 3 characters long');
        return;
      }

      if (!category_status) {
        toastr.warning('Status is required');
        return;
      }

      // Check if category_id has a value before update
      if (category_id && method === 'PUT') {
        $.ajax({
          url: category_id ? '/category/' + category_id : '/category',
          type: method,
          data: $(this).serialize(),
          success: function(response) {
            toastr.success('Data updated successfully!');
            $("#product_list").load(location.href + " #product_list");
            $('#category_save')[0].reset();
            $('#category_id').val('');
          },
          error: function(xhr, status, error) {
            toastr.error('Error updating category! Try again.');
          }
        });
      } else {
        $.ajax({
          url: '/category',
          type: 'POST',
          data: $(this).serialize(),
          success: function(response) {
            var result = JSON.parse(response);
              if (result == 201) {
                $("#product_list").load(location.href + " #product_list");
                $('#category_save')[0].reset();
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

    // Handle delete
    $(document).on('click', '.delete-btn', function() {
      var category_id = $(this).data('id');

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
            url: '/category/' + category_id,
            type: 'DELETE',
            data: {
              _token: '{{ csrf_token() }}',
              category_id: category_id
            },
            success: function(response) {
              var result = JSON.parse(response);
              if (result == 201) {
                $("#product_list").load(location.href + " #product_list");
                toastr.success('Data deleted successfully!');
              } else if (result == 200) {
                toastr.warning('Data is attached to a product');
              }
            },
            error: function(xhr, status, error) {
              toastr.error('Error deleting item! Try again');
            }
          });
        }
      });
    });

    // Handle edit functionality
    $(document).on('click', '.edit-btn', function() {
      var category_id = $(this).data('id');

      $.ajax({
        url: '/category/' + category_id + '/edit',
        type: 'GET',
        success: function(response) {
          $('#category_id').val(response.category.category_id);
          $('#category_name').val(response.category.category_name);
          $('#category_status').val(response.category.status).trigger('change');
        },
        error: function(xhr, status, error) {
          toastr.error('Error fetching data! Try again.');
        }
      });
    });
  });
