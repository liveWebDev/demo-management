@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pages
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pages, ['route' => ['admin.pages.update', $pages->id], 'method' => 'patch']) !!}

                        @include('admin.pages.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection