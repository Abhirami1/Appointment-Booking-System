<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Styled Form</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    form {
      background: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #555;
    }

    input[type="text"],
    input[type="date"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    input[type="submit"] {
      background-color: #28a745;
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
      width: 100%;
    }

    input[type="submit"]:hover {
      background-color: #218838;
    }

    label.error {
      color: red;
      font-size: 0.85em;
      margin-top: -15px;
      margin-bottom: 10px;
      display: block;
    }
  </style>
</head>
<body>

  <form id="myForm" action="your_backend_script.php" method="post">
    <h2>Basic Information Form</h2>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name">

    <label for="mobile">Mobile Number:</label>
    <input type="text" id="mobile" name="mobile" maxlength="10">

    <input type="hidden" id="date" name="date">
    <input type="hidden" id="time" name="time">

    <input type="submit" value="Submit">
  </form>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    $(document).ready(function () {
      var urlParams = new URLSearchParams(window.location.search);
      var date = urlParams.get('date');  
      var time = urlParams.get('time'); 

    
      $('#date').val(date);
      $('#time').val(time);

      $("#myForm").validate({
        rules: {
          name: {
            required: true,
            minlength: 3
          },
          mobile: {
            required: true,
            digits: true,
            minlength: 10,
            maxlength: 10
          },
        },
        messages: {
          name: {
            required: "Please enter your name",
            minlength: "Name must be at least 3 characters"
          },
          mobile: {
            required: "Please enter your mobile number",
            digits: "Only digits are allowed",
            minlength: "Mobile number must be 10 digits",
            maxlength: "Mobile number must be 10 digits"
          },
        },
        submitHandler: function(form) {
         
          $.ajax({
            url: '<?php echo base_url('save_appointment');?>', 
            method: 'POST',
            data: {
              name: $('#name').val(),
              mobile: $('#mobile').val(),
              date: $('#date').val(),
              time: $('#time').val()
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        title: "Success",
                        text: 'Your appointment has been booked successfully!',
                        icon: "success"
                    }).then(function () {
                        window.location.href = "<?php echo base_url('save_appointment_time'); ?>";
                        });  
                } else {
                    Swal.fire({
                        title: "Error",
                        text: 'There was an error booking your appointment. Please try again.',
                        icon: "error"
                    });
        }
            },
            error: function(xhr, status, error) {
              alert('There was an error while submitting the form.');
            }
          });
        }
      });
    });
  </script>

</body>
</html>
