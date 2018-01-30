/**
 * Created by HP on 3/27/2017.
 */
$('#make_id').on('change', function(e){
  console.log(e);
  var make_id = e.target.value;
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.get('/ajax/models/' + make_id, function(data) {
    var models = $('#model_id').empty().html('<option>Select model</option>');
    $.each(data, function(index,subCatObj){
      models.append($('<option>').text(subCatObj).attr('value', index));
    });
    $(".simple-select").chosen().trigger("chosen:updated");
  });

});

$('#models').on('click', function(e){
  /*var data = {
    client_id: '2',
      client_secret: 'lvi8BdQ4qlrCauzMciOH7NuOHlhbgFZ3ZYOSC5Mu',
    grant_type: 'password',
    username: 'support@leadcar.co.uk',
    password: 'pass22'
  };
  $.post('/oauth/token', data, function(data) {
    console.log(data);
  });*/
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      'Accept':'application/json',
      'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImJjNjQyNzlkNjExYjdjOTA1ODI4NGYxMjUyMzQ2MGM1MjY0YTI2NTU3MTFkNGRhNmYwNDFiNGU2NWYzODYwNzFjODMzM2RmMmFiNTQwODA5In0.eyJhdWQiOiIyIiwianRpIjoiYmM2NDI3OWQ2MTFiN2M5MDU4Mjg0ZjEyNTIzNDYwYzUyNjRhMjY1NTcxMWQ0ZGE2ZjA0MWI0ZTY1ZjM4NjA3MWM4MzMzZGYyYWI1NDA4MDkiLCJpYXQiOjE0OTEyODY4MTksIm5iZiI6MTQ5MTI4NjgxOSwiZXhwIjoxNDkyNTgyODE5LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.ARqMWkhRDLvVqYxTwPPHoP8oyh5hHBn-XiCohyzvs6I3d1P5Tk23rNSF2POrH_dxMIU4F-ZXX1Y09MQD2YfBcxa64Zgr6L0sj7s14ORX_W0HvpUfVUPiVnzWCcjv6YyeGp4g7mOyqNhTXjnqjJhMx7iCqI9EWxwzTxXdjxNRWPKFuGth4Ne5WFVtQ0Iq7VPowccN6hcjF7kcjVm62e8BmtNKIi-HVvzMNlCZ8ThTHUTd2y2MpmXn-9KZrDGqTxZIiTX2cIvDN9LSmcoe8PWVdmgzC8_D_Irb9vJd5mx-tvnHAi5UgFoHW_0xnjxPngz-GEn2fLk6l2arTy-XSvZbFojigLLiGYLZHvBcHMDp8ZtK-21Ti3MqCvSrAk_cDnhmuE0ZJ0A3S5Ck6zrSSPmPmT9lMWYDu8JkkdISEb_NwbFKIYD-6E1D58Stetoer-usYzmcuNC_bWd3N8JlE0lH13dh_gfTBPxV-eTkHsfLvOUN7KStd8wnKRQ0_YJcIJn_4PUOMfpfI5Y36jegdGa9gtqZTF9fxfDgDkIemU1hv3YNn1NiO8TOOduyF8RKfTwwLXpv5pOsBHTEY4dhWyrrLzuAfM2g3Za1rk-HHuhXNWcJtmVsm2W6NDR5JmP7Uxt3keWbo8enXR1cmnLwg85bkyYK9RmqQ84W5EOx3UdBLm4'
    }
  });
  $.get('/api/admin/models', function(data) {
    console.log(data);
  });
});