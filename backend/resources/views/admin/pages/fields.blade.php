<!-- Code Field -->


<div class="form-group col-sm-6">
    {!! Form::label('title', ' Page Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slug', 'Page Slug (URL):') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-md-12">
    <br><h2>Metas</h2><hr>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('meta_title', 'Meta Title:') !!}
    {!! Form::text('meta_title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('meta_description', 'Meta Description:') !!}
    {!! Form::text('meta_description', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('meta_keywords', 'Meta Keywords:') !!}
    {!! Form::text('meta_keywords', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-md-12">
    <br><h2>Content</h2><hr>
</div>
<div class="form-group col-md-12">
    <label>Content</label>
    <textarea name="content" class="form-control"></textarea>

</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.pages.index') !!}" class="btn btn-default">Cancel</a>
</div>
