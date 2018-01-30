@extends('admin.layouts.app')

@section('content')
  <section class="content-header">
    <h1>
      Settings
    </h1>
  </section>
  <div class="content">
    @include('flash::message')


    <div class="box box-primary">
      <div class="box-body">
        <div class="row">
          {!! Form::open(['route' => 'admin.settings.store']) !!}
            @include('admin.settings.fields')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
