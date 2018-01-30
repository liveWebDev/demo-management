<table class="table table-responsive" id="transports-table">
    <thead>
        <th>Fahrzeughalter</th>
        <th>Lkw Nr</th>
        <th>Fahrer</th>
        <th>Container</th>
        <th>Plomben Nr</th>
        <th>Adr</th>
        <th>Luftfracht</th>
        <th>Rampe</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($transports as $transport)
        <tr>
            <td>{!! $transport->fahrzeughalter !!}</td>
            <td>{!! $transport->lkw_nr !!}</td>
            <td>{!! $transport->fahrer !!}</td>
            <td>{!! $transport->container !!}</td>
            <td>{!! $transport->plomben_nr !!}</td>
            <td>{!! $transport->adr !!}</td>
            <td>{!! $transport->luftfracht !!}</td>
            <td>{!! $transport->rampe !!}</td>
            <td>
                {!! Form::open(['route' => ['transports.destroy', $transport->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('transports.show', [$transport->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('transports.edit', [$transport->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>