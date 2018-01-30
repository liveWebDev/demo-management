@if(isset($images) AND count($images) > 0)
    @foreach($images as $image)
        <div class="col-md-4">
            <div class="thumbnail">
                <img src="{!! $image->image !!}" alt="Lights" style="width:100%">
                <div class="caption">
                    <a href="{!! url('/admin/cars/image/delete') !!}/{!! $image->id !!}" onclick="return confirm('Are you sure');">Delete</a>
                    @if($image->default == 0)
                        <a href="{!! url('/admin/cars/image/default') !!}/{!! $image->id !!}/{!! $image->image_id !!}" class="pull-right" onclick="return confirm('Are you sure');">Make Default</a>
                    @else
                        <a href="javascript:void(0);" class="pull-right">Default</a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endif