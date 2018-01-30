<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $user->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $user->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $user->email !!}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{!! $user->password !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $user->deleted_at !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $user->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $user->updated_at !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{!! $user->type !!}</p>
</div>
<h2>Your Bookings</h2>
@if(isset($user->booking) AND count($user->booking))
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Date</th>
                <th>Card</th>
                <th>Car</th>
                <th>Start</th>
                <th>End</th>
                <th>Total Cost</th>
                <th>Deposit</th>
                <th>Insurance</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($user->booking as $booking)
          <tr>
              <td>{!! Carbon\Carbon::parse($booking->date)->format('d-m-Y') !!}</td>
              <td>{!! $booking->cards->name !!}</td>
              <td>{!! $booking->car->title !!}</td>
              <td>{!! $booking->start !!}</td>
              <td>{!! $booking->end !!}</td>
              <td>&pound; {!! $booking->total_cost !!}</td>
              <td>&pound; {!! $booking->deposit !!}</td>
              <td>&pound; {!! $booking->insurance !!}</td>
              <td>
                  <div class='btn-group'>
                      <a href="javascript:void(0)" class='btn btn-default btn-xs clsEditSchedule'><i class="glyphicon glyphicon-eye-open"></i></a>
                  </div>
              </td>
          </tr>
          @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-info">
       No Booking found.
    </div>
@endif

<h2>Your Refunds</h2>
@if(isset($user->refund) AND count($user->refund))
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>Date</th>
            <th>Car</th>
            <th>Booking</th>
            <th>Amount</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user->refund as $refund)
            <tr>
                <td>{!! Carbon\Carbon::parse($refund->created_at)->format('d-m-Y') !!}</td>
                <td>{!! $refund->cars->title !!}</td>
                <td>{!! $refund->booking_id !!}</td>
                <td>&pound; {!! $refund->amount !!}</td>
                <td>{!! $refund->description !!}</td>
                <td>
                    <div class='btn-group'>
                        <a href="javascript:void(0)" class='btn btn-default btn-xs clsEditSchedule'><i class="glyphicon glyphicon-eye-open"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <div class="alert alert-info">
        No Refund found.
    </div>
@endif