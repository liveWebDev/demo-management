<div class="form-group col-sm-12">
    <h3>Car Settings</h3>
</div>

<!-- Age Limit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('age_limit_more', 'Age: more than') !!}
    {!! Form::text('age_limit_more', (isset($settings->age_limit_more)) ? $settings->age_limit_more : '', ['class' => 'form-control']) !!}
</div>
<!-- Age Limit Field -->
<div class="form-group col-sm-6">
  {!! Form::label('age_limit_less', 'Age: less than') !!}
  {!! Form::text('age_limit_less', (isset($settings->age_limit_less)) ? $settings->age_limit_less : '', ['class' => 'form-control']) !!}
</div>
<!-- Age Limit Field -->
<div class="form-group col-sm-6">
  {!! Form::label('license_age', 'License: more than') !!}
  {!! Form::text('license_age', (isset($settings->license_age)) ? $settings->license_age : '', ['class' => 'form-control']) !!}
</div>

<!-- violations Field -->
<div class="form-group col-sm-6">
    {!! Form::label('violations', 'DVLA points:') !!}
    {!! Form::text('violations', (isset($settings->violations)) ? $settings->violations : '', ['class' => 'form-control']) !!}
</div>


<!-- Countries Field -->
<div class="form-group col-sm-6">
    {!! Form::label('countries', 'License country:') !!}
    {!! Form::select('countries[]', $countries, (isset($settings->countries)) ? $settings->countries : '', ['class' => 'form-control chosen-select', 'multiple', 'data-placeholder'=>'Select Country of driving license']) !!}
</div>

<div class="form-group col-sm-12">
    <h3>Payment gateway settings</h3>
</div>

<!-- paypal Field -->
<div class="form-group col-sm-12">
    {!! Form::label('paypal', 'PayPal Email Address:') !!}
    {!! Form::email('paypal', (isset($settings->paypal)) ? $settings->paypal : '', ['class' => 'form-control']) !!}
</div>

<!-- Stripe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stripe_public_key', 'Stripe Public Key:') !!}
    {!! Form::text('stripe_public_key', (isset($settings->stripe_public_key)) ? $settings->stripe_public_key : '', ['class' => 'form-control']) !!}
</div>

<!-- Stripe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stripe_secret_key', 'Stripe Secret Key:') !!}
    {!! Form::text('stripe_secret_key', (isset($settings->stripe_secret_key)) ? $settings->stripe_secret_key : '', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    <h3>General Settings</h3>
</div>

<!-- paypal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Notifications Email Address:') !!}
    {!! Form::email('email', (isset($settings->email)) ? $settings->email : '', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
  <h3>Showroom Time Settings</h3>
</div>

<!-- Age Limit Field -->
<div class="form-group col-sm-6">
  {!! Form::label('opening_time', 'Showroom Opening Time:') !!}
  {!! Form::time('opening_time', (isset($settings->opening_time)) ? $settings->opening_time : '', ['class' => 'form-control timePicker startTime']) !!}
</div>

<!-- violations Field -->
<div class="form-group col-sm-6">
  {!! Form::label('closing_time', 'Showroom Closing Time:') !!}
  {!! Form::time('closing_time', (isset($settings->closing_time)) ? $settings->closing_time : '', ['class' => 'form-control timePicker endTime']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.models.index') !!}" class="btn btn-default">Cancel</a>
</div>

@push('scripts')
<script type="text/javascript">
  var config = {
    '.chosen-select'           : {},
    '.chosen-select-deselect'  : {allow_single_deselect:true},
    '.chosen-select-no-single' : {disable_search_threshold:10},
    '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
    '.chosen-select-width'     : {width:"95%"}
  }
  for (var selector in config) {
    $(selector).chosen(config[selector]);
  }
</script>
@endpush