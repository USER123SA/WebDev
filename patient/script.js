$(document).ready(function() {
    $('#specialty').change(function() {
      var specialty_id = $(this).val();
      $.ajax({
        type: "POST",
        url: "get_doctors.php",
        data: {specialty: specialty_id},
        dataType: "json",
        success: function(data) {
          var options = '<option value="">Select a doctor</option>';
          for (var i = 0; i < data.length; i++) {
            options += '<option value="' + data[i] + '">' + data[i] + '</option>';
          }
          $('#doctor').html(options);
        }
      });
    });
  });
  