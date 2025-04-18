<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Appointment Booking</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: #f0f4f8;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .slot-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
      gap: 15px;
      max-width: 600px;
      margin: 0 auto;
    }

    .slot {
      background-color: #fff;
      border: 2px solid #007bff;
      color: #007bff;
      padding: 10px;
      text-align: center;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s;
    }

    .slot:hover {
      background-color: #007bff;
      color: #fff;
    }

    .slot.break {
      background-color: #ddd;
      color: #666;
      border-color: #ccc;
      cursor: not-allowed;
    }

    .slot.break:hover {
      background-color: #ddd;
      color: #666;
    }

	.slot {
  cursor: pointer;
  padding: 10px;
  border: 1px solid #ccc;
  display: inline-block;
  margin: 5px;
}
.slot.booked {
  background-color: green;
  color: white;
  pointer-events: none;
}
.slot.break {
  background-color: #f2f2f2;
  pointer-events: none;
}

  </style>
</head>
<body>

<h2>Appointment Booking</h2>
<div class="slot-container">
  <div class="slot" data-time="10:00 AM">10:00 AM</div>
  <div class="slot" data-time="10:30 AM">10:30 AM</div>
  <div class="slot" data-time="11:00 AM">11:00 AM</div>
  <div class="slot" data-time="11:30 AM">11:30 AM</div>
  <div class="slot" data-time="12:00 PM">12:00 PM</div>
  <div class="slot" data-time="12:30 PM">12:30 PM</div>
  <div class="slot break" data-time="1:00 PM">1:00 PM</div>
  <div class="slot break" data-time="1:30 PM">1:30 PM</div>
  <div class="slot" data-time="2:00 PM">2:00 PM</div>
  <div class="slot" data-time="2:30 PM">2:30 PM</div>
  <div class="slot" data-time="3:00 PM">3:00 PM</div>
  <div class="slot" data-time="3:30 PM">3:30 PM</div>
  <div class="slot" data-time="4:00 PM">4:00 PM</div>
  <div class="slot" data-time="4:30 PM">4:30 PM</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




<script>
$(document).ready(function() {
  $('.slot').not('.break').on('click', function() {
    let clickedSlot = $(this);
    let time = clickedSlot.data('time');

    $.ajax({
      url: '<?php echo base_url('check_slot_availability');?>', 
      method: 'POST',
      data: { time: time },
      dataType: 'json',
      success: function(response) {
        if (response.available == false) {
		  Swal.fire({
                    title: "Sorry!",
                    text: "This slot is already booked.!",
                    icon: "error"
                  }); 
        } else {
        
		
            window.location.href = "<?php echo base_url('booking_page'); ?>";
         
        }
      }
    });
  });
});

</script>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Appointment Booking</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background-color: #f0f4f8;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .slot-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
      gap: 15px;
      max-width: 600px;
      margin: 0 auto;
    }

    .slot {
      background-color: #fff;
      border: 2px solid #007bff;
      color: #007bff;
      padding: 10px;
      text-align: center;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s;
    }

    .slot:hover {
      background-color: #007bff;
      color: #fff;
    }

    .slot.break {
      background-color: #ddd;
      color: #666;
      border-color: #ccc;
      cursor: not-allowed;
    }

    .slot.break:hover {
      background-color: #ddd;
      color: #666;
    }

    .slot.booked {
      background-color: green;
      color: white;
      pointer-events: none;
    }

    .slot.break {
      background-color: #f2f2f2;
      pointer-events: none;
    }

    /* Additional styling for the date field */
    .date-field {
      display: block;
      margin: 20px auto;
      padding: 10px;
      font-size: 16px;
      width: 250px;
    }

    .selected-time {
      text-align: center;
      margin-top: 20px;
      font-size: 18px;
      color: #007bff;
    }
  </style>
</head>
<body>

<h2>Appointment Booking</h2>

<!-- Date field -->
<input type="date" id="appointment-date" class="date-field" />

<div class="slot-container">
  <div class="slot" data-time="10:00 AM">10:00 AM</div>
  <div class="slot" data-time="10:30 AM">10:30 AM</div>
  <div class="slot" data-time="11:00 AM">11:00 AM</div>
  <div class="slot" data-time="11:30 AM">11:30 AM</div>
  <div class="slot" data-time="12:00 PM">12:00 PM</div>
  <div class="slot" data-time="12:30 PM">12:30 PM</div>
  <div class="slot break" data-time="1:00 PM">1:00 PM</div>
  <div class="slot break" data-time="1:30 PM">1:30 PM</div>
  <div class="slot" data-time="2:00 PM">2:00 PM</div>
  <div class="slot" data-time="2:30 PM">2:30 PM</div>
  <div class="slot" data-time="3:00 PM">3:00 PM</div>
  <div class="slot" data-time="3:30 PM">3:30 PM</div>
  <div class="slot" data-time="4:00 PM">4:00 PM</div>
  <div class="slot" data-time="4:30 PM">4:30 PM</div>
</div>





<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$(document).ready(function() {
  $('.slot').not('.break').on('click', function() {
    let clickedSlot = $(this);
    let time = clickedSlot.data('time');
	let date = $('#appointment-date').val();


	if (!date) {
      Swal.fire({
        title: "Please select a date!",
        text: "You must choose a date before selecting a time slot.",
        icon: "warning"
      });
      return; 
    }




    $.ajax({
      url: '<?php echo base_url('check_slot_availability');?>', 
      method: 'POST',
      data: { time: time, date: date },
      dataType: 'json',
      success: function(response) {
        if (response.available == false) {
		  Swal.fire({
                    title: "Sorry!",
                    text: "This slot is already booked.!",
                    icon: "error"
                  }); 
        } else {
        
		
            // window.location.href = "<?php echo base_url('booking_page'); ?>";
			window.location.href = "<?php echo base_url('booking_page'); ?>?date=" + date + "&time=" + time;

         
        }
      }
    });
  });
});

</script>


<script>
	$('#appointment-date').on('change', function () {
    let selectedDate = $(this).val();

    $('.slot').removeClass('booked');

    $.ajax({
        url: "<?php echo base_url('get_booked_slots'); ?>",
        method: "POST",
        data: { date: selectedDate },
        dataType: "json",
        success: function (response) {
            if (response.booked_slots && response.booked_slots.length > 0) {
                response.booked_slots.forEach(function (bookedTime) {
                    $('.slot').each(function () {
                        if ($(this).data('time') === bookedTime) {
                            $(this).addClass('booked');
                        }
                    });
                });
            }
        }
    });
});

</script>


</body>
</html>

