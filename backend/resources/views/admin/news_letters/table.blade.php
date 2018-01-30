<table class="table table-responsive" id="newsLetters-table">
    <thead>
        <th>Name</th>
        <th>Email</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($newsLetters as $newsLetter)
        <tr>
            <td>{!! $newsLetter->name !!}</td>
            <td>{!! $newsLetter->email !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.newsLetters.destroy', $newsLetter->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.newsLetters.show', [$newsLetter->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.newsLetters.edit', [$newsLetter->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>