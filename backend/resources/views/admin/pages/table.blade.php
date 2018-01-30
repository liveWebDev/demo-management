<table class="table table-responsive" id="tblRecords">
    <thead>
    <th>Title</th>
    <th>Slug</th>
    <th>Meta Title</th>
    <th>Meta Description</th>
    <th>Meta Keywords</th>
    <th>Action</th>
    </thead>
    <tbody>
    @foreach($pages as $page)
        <tr>
            <td>{!! $page->title !!}</td>
            <td>{!! $page->slug !!}</td>
            <td>{!! $page->meta_title !!}</td>
            <td>{!! $page->meta_description !!}</td>
            <td>{!! $page->meta_keywords !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.pages.destroy', $page->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.pages.show', [$page->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.pages.edit', [$page->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>