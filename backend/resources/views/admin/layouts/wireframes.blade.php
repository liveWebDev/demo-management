@if(isset($wireFrames) AND count($wireFrames) > 0)
    @foreach($wireFrames as $wireFrame)
        <div class="col-md-4">
            <div class="thumbnail">
                <img src="{!! $wireFrame->wireframe !!}" alt="Lights" style="width:100%">
                <div class="caption">
                    <a href="{!! url('/admin/cars/wireframe/delete') !!}/{!! $wireFrame->id !!}" onclick="return confirm('Are you sure');">Delete</a>
                    @if($wireFrame->default == 0)
                        <a href="{!! url('/admin/cars/wireframe/default') !!}/{!! $wireFrame->id !!}/{!! $wireFrame->wire_id !!}" class="pull-right" onclick="return confirm('Are you sure');">Make Default</a>
                    @else
                        <a href="javascript:void(0);" class="pull-right">Default</a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endif