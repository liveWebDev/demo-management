<?php $path = Route::getCurrentRoute()->getPath(); ?>
@role('administrator') {{-- // @if(Auth::check() && Auth::user()->isRole('admin|manager')) --}}
<li class="<?php if(starts_with($path, 'admin/users')) echo 'active' ?>">
    <a href="{!! route('admin.users.index') !!}"><i class="fa fa-user"></i><span>Manage Users</span></a>
</li>


<li class="<?php if(starts_with($path, 'admin/pages')) echo 'active' ?>">
    <a href="{!! route('admin.pages.index') !!}"><i class="fa fa-clock-o"></i><span>CMS Pages</span></a>
</li>

<li class="<?php if(starts_with($path, 'admin/newsLetters')) echo 'active' ?>">
    <a href="{!! route('admin.newsLetters.index') !!}"><i class="fa fa-newspaper-o"></i><span>News Letter</span></a>
</li>

<li class="<?php if(starts_with($path, 'admin/settings')) echo 'active' ?>">
    <a href="{!! route('admin.settings.index') !!}"><i class="fa fa-cog"></i><span>General Settings</span></a>
</li>
@endrole

@role('transport-officer') {{-- // @if(Auth::check() && Auth::user()->isRole('owner')) --}}
<li class="<?php if(starts_with($path, 'admin/settings')) echo 'active' ?>">
    <a href="{!! route('admin.settings.index') !!}"><i class="fa fa-cog"></i><span>General Settings</span></a>
</li>
@endrole

@role('forklift-driver')
<li class="<?php if(starts_with($path, 'admin/settings')) echo 'active' ?>">
    <a href="{!! route('admin.settings.index') !!}"><i class="fa fa-cog"></i><span>General Settings</span></a>
</li>
@endrole
