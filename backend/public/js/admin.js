
$(document).ready(function () {
    $("#tblRecords").DataTable({
        bSort: false
    });

    $(document).on('click', '#btn-file-browse', function (e) {
        $("#files").trigger("click");
    });

    $('.timePicker').datetimepicker({
        format: 'H'
    });

    $(document).on('change', '#car_id', function () {
        var $e = $(this);
        var carId = $e.val();

        $.ajax({
            method: "POST",
            data: {carId: carId, _token: appToken},
            url: "/admin/schedule/car-days",
            success: function (res) {
                $("#car-days").parent().show();
                $("#car-days").html(res);
                $('.toggle-button').bootstrapToggle();
                $('#frmReplicate').show();
                $('#frmReplicate').find('input[name="car_id"][type="hidden"]').val(carId);
            }
        });
    });

      $(document).on('change', '#carSchedule', function () {
        var $e = $(this);
        var dayId = $e.val();
        var carId = $('#cars').val();
        if (carId == ''){
            alert('Please select car first');
            return false;
        }

        $.ajax({
          method: "POST",
          data: {carId: carId, dayId: dayId, _token: appToken},
          url: "/admin/schedule/car-schedules",
          success: function (res) {
            $("#carSchedules").parent().show();
            $("#carSchedules").html(res);
            $('.toggle-button').bootstrapToggle();
            $('#frmReplicate').show();
            $('#frmReplicate').find('input[name="carSchedule"][type="hidden"]').val(carId);
          }
        });
      });




    $(document).on('change', '.toggle-button', function (e) {
        var $e = $(this);
        var carDayId = $e.data("id");
        var status = 0;
        if ($e.is(":checked")) {
            status = 1;
        }
        $.ajax({
            method: "POST",
            data: {carDayId: carDayId, _token: appToken, status: status},
            url: "/admin/schedule/days/status",
            success: function (res) {
                if (status == 1) {
                    swal("Day on", "Successfully updated.", "success");
                } else {
                    swal("Day off", "Successfully updated.", "error");
                }
            }
        });
    });

    $(document).on('click', '.clsAddSchedule', function (e) {
        var $e = $(this);
        var dayId = $e.data("day");
        var carId = $("#car_id option:selected").val();
        var $form = $("#scheduleModal form");
        $form.find("input[name='car_day_id']").val(dayId);
        $form.find("input[name='car_id']").val(carId);
        $("#scheduleModal").modal();
    });

    $(document).on('click', '#btnAddSchedule', function (e) {
        var $form = $("#scheduleModal form");
        $("#schedule-error-messages").empty();

        var start = $("input[name='start']").val();
        var end = $("input[name='end']").val();

        if(start == null || start == "") {
            appendValidationMessage("Start time is required.");
            return false;
        }
        if(end == null || end == "") {
            appendValidationMessage("End time is required.");
            return false;
        }

        var st = minFromMidnight(start);
        var et = minFromMidnight(end);
        if (st > et) {
            appendValidationMessage("End time must be greater than start time");
            return false;
        }

        $.ajax({
            method: $form.attr('method'),
            data: $form.serialize(),
            url: $form.attr('action'),
            success: function (res) {
                $("#scheduleModal").modal('hide');
                swal("Time schedule", "Time schedule inserted successfully.", "success");
                $("#car_id").change();
            },
            error: function (jqXHR, exception) {
                var response = JSON.parse(jqXHR.responseText);
                var errorString = '<ul>';
                $.each(response, function (key, value) {
                    errorString += '<li>' + value + '</li>';
                });
                errorString += '</ul>';
                $("#schedule-error-messages").html(errorString);
            }
        });
    });

    /* for edit schedule*/
      $(document).on('click', '.clsEditSchedule', function (e) {
        var $e = $(this);
        $("#schedule-error-messages").empty();
        //var dayId = $e.data("day");
        var carId = $("#cars option:selected").val();
        var dayId = $("#carSchedule option:selected").val();
        var startTime = $e.attr('data-start');
        var endTime = $e.attr('data-end');
        var $form = $("#scheduleModal form");
        $form.find("input[name='id']").val($e.attr('data-id'));
        $form.find("input[name='car_day_id']").val(dayId);
        $form.find("input[name='car_id']").val(carId);
        $form.find("input[name='start']").val(startTime);
        $form.find("input[name='end']").val(endTime);
        $("#scheduleModal").modal();
      });

      $(document).on('click', '#btnEditSchedule', function (e) {
        var $form = $("#scheduleModal form");
        $("#schedule-error-messages").empty();

        var start = $("input[name='start']").val();
        var end = $("input[name='end']").val();

        if(start == null || start == "") {
          appendValidationMessage("Start time is required.");
          return false;
        }
        if(end == null || end == "") {
          appendValidationMessage("End time is required.");
          return false;
        }

        var st = minFromMidnight(start);
        var et = minFromMidnight(end);
        if (st > et) {
          appendValidationMessage("End time must be greater than start time");
          return false;
        }

        $.ajax({
          method: $form.attr('method'),
          data: $form.serialize(),
          url: $form.attr('action'),
          success: function (res) {
            $("#scheduleModal").modal('hide');
            swal("Time schedule", "Time schedule inserted successfully.", "success");
            $("#car_id").change();
          },
          error: function (jqXHR, exception) {
            var response = JSON.parse(jqXHR.responseText);
            var errorString = '<ul>';
            $.each(response, function (key, value) {
              errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#schedule-error-messages").html(errorString);
          }
        });
      });

      $(document).on('click', '#btnDelSchedule', function (e) {
        var $form = $(this).closest('form');
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          method: $form.attr('method'),
          data: $form.serialize(),
          url: $form.attr('action'),
          dataType: 'json',
          success: function (res) {
            $("#scheduleModal").modal('hide');
            $("#row_"+res.id).remove();
            swal("Time schedule", "Time schedule deleted successfully.", "success");

          },
          error: function (jqXHR, exception) {
            var response = JSON.parse(jqXHR.responseText);
            var errorString = '<ul>';
            $.each(response, function (key, value) {
              errorString += '<li>' + value + '</li>';
            });
            errorString += '</ul>';
            $("#schedule-error-messages").html(errorString);
          }
        });
      });

    $(document).on('click', '#btnOpenGoogleMap', function (e) {
       $("#googleMapModal").modal('show');
    });
});

function minFromMidnight(tm) {
    var ampm = tm.substr(-2)
    var clk = tm.substr(0, 5);
    var m = parseInt(clk.match(/\d+$/)[0], 10);
    var h = parseInt(clk.match(/^\d+/)[0], 10);
    h += (ampm.match(/pm/i)) ? 12 : 0;
    return h * 60 + m;
}

function appendValidationMessage(message) {
    var errorString = '<ul>';
    errorString += '<li>' + message + '</li>';
    errorString += '</ul>';
    $("#schedule-error-messages").html(errorString);
}

$('#make_id').on('change', function(e){
  console.log(e);
  var make_id = e.target.value;
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.get('/admin/cars/models/' + make_id, function(data) {
    console.log(data);
    $('#model_id').empty();
    $.each(data, function(index,subCatObj){
      console.log(index);
      //alert(index);
      $('#model_id').append($('<option>').text(subCatObj).attr('value', index));
      //$('#model_id').append(''+subCatObj.name+'');
    });
  });
});

$(".chosen-select").chosen();

$('#filter_by_car').on('change', function(e){
  console.log(e);
  var car_id = e.target.value;
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.get('/admin/discountSlots/car/' + car_id, function(data) {
    $('#discountSlots-table-body').html(data);
  });
});


$('#filter_by_user').on('change', function(e){
  console.log(e);
  var car_id = e.target.value;
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  if (car_id != '') {
    $.get('/admin/chauffeurs/getByFleet/' + car_id, function (data) {
      $('#chauffeurs-table-body').html(data);
    });
  }
});

$(document).on('change', '.toggle-buttons', function (e) {
  var $e = $(this);
  var chauffeurId = $e.data("id");
  var status = 0;
  if ($e.is(":checked")) {
    status = 1;
  }
  $.ajax({
    method: "POST",
    data: {chauffeurId: chauffeurId, _token: appToken, status: status},
    url: "/admin/chauffeurs/status",
    success: function (res) {
      if (status == 1) {
        swal("Chauffeurs Active", "Successfully updated.", "success");
      } else {
        swal("Chauffeurs Inactive", "Successfully updated.", "error");
      }
    }
  });
});

$(document).on('change', '.toggle-button-user', function (e) {
  var $e = $(this);
  var userId = $e.data("id");
  var status = 0;
  if ($e.is(":checked")) {
    status = 1;
  }
  $.ajax({
    method: "POST",
    data: {userId: userId, _token: appToken, status: status},
    url: "/admin/users/status",
    success: function (res) {
      if (status == 1) {
        swal("User Active", "Successfully updated.", "success");
      } else {
        swal("User Inactive", "Successfully updated.", "error");
      }
    }
  });
});


$(document).on('change', '.toggle-button-car', function (e) {
  var $e = $(this);
  var carId = $e.data("id");
  var status = 0;
  if ($e.is(":checked")) {
    status = 1;
  }
  $.ajax({
    method: "POST",
    data: {carId: carId, _token: appToken, status: status},
    url: "/admin/cars/status",
    success: function (res) {
      if (status == 1) {
        swal("Car Active", "Successfully updated.", "success");
      } else {
        swal("Car Inactive", "Successfully updated.", "error");
      }
    }
  });
});