<table class="table table-responsive" id="forklifts-table">
    <thead>
        <th>Transport Id</th>
        <th>Fahrzeugausweis 21</th>
        <th>Adr Schulungsbescheinigung 22</th>
        <th>Adr Schulungsbescheinigung 22 Answeis Nr</th>
        <th>Adr Schulungsbescheinigung 22 Gultig Bis</th>
        <th>Lichtbildausweis 23</th>
        <th>Arbeitsbescheinigung Fahrer 24</th>
        <th>Vertrauensabfertigung 25</th>
        <th>Orangefarbene Warntafeln 26</th>
        <th>Schriftliche Weisungen 27</th>
        <th>Bewegungssicherung 31</th>
        <th>Visuelle Ueberpruefung 32</th>
        <th>Ladungsbruecke Besenrein 33</th>
        <th>Ladungssicherungsmittel 34</th>
        <th>Ladungssicherungsmittel 34 Gurte</th>
        <th>Ladungssicherungsmittel 34 Spannstangen</th>
        <th>Ladungssicherungsmittel 34 Antirutschmatten</th>
        <th>Ladungssicherungsmittel 34 Leerpaletten</th>
        <th>Werbefrei Fuer Tierfutter 41</th>
        <th>Lebensmittel Futtermittel 42</th>
        <th>Persoenliche Schutzausruestung 43</th>
        <th>Persoenliche Schutzausruestung 43 Plomben Nr</th>
        <th>Persoenliche Schutzausruestung 43 Schutzbrille</th>
        <th>Persoenliche Schutzausruestung 43 Chem Handschuhe</th>
        <th>Persoenliche Schutzausruestung 43 Warnweste</th>
        <th>Persoenliche Schutzausruestung 43 Vollschutzmaske</th>
        <th>Persoenliche Schutzausruestung 43 Augenspuelflasche</th>
        <th>Persoenliche Schutzausruestung 43 Handlampe</th>
        <th>Pulverloescher Plombiert 441</th>
        <th>Pulverloescher Plombiert 441 Pruefung</th>
        <th>Unterkeil Schaufel 442</th>
        <th>Warnzeichen Warndreiecke 443</th>
        <th>Auffangbehaelter 444</th>
        <th>Kanalisationsabdeckung 445</th>
        <th>Ibc Prueffrist 51</th>
        <th>Ibc Prueffrist 51 Date</th>
        <th>Unbeschaedigte Verandstuecke Un Cod 52</th>
        <th>Wirksame Ladungssicherung 53</th>
        <th>Ladungssicherung Foto 54</th>
        <th>Signature</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($forklifts as $forklift)
        <tr>
            <td>{!! $forklift->transport_id !!}</td>
            <td>{!! $forklift->fahrzeugausweis_21 !!}</td>
            <td>{!! $forklift->adr_schulungsbescheinigung_22 !!}</td>
            <td>{!! $forklift->adr_schulungsbescheinigung_22_answeis_nr !!}</td>
            <td>{!! $forklift->adr_schulungsbescheinigung_22_gultig_bis !!}</td>
            <td>{!! $forklift->lichtbildausweis_23 !!}</td>
            <td>{!! $forklift->arbeitsbescheinigung_fahrer_24 !!}</td>
            <td>{!! $forklift->vertrauensabfertigung_25 !!}</td>
            <td>{!! $forklift->orangefarbene_warntafeln_26 !!}</td>
            <td>{!! $forklift->schriftliche_weisungen_27 !!}</td>
            <td>{!! $forklift->bewegungssicherung_31 !!}</td>
            <td>{!! $forklift->visuelle_ueberpruefung_32 !!}</td>
            <td>{!! $forklift->ladungsbruecke_besenrein_33 !!}</td>
            <td>{!! $forklift->ladungssicherungsmittel_34 !!}</td>
            <td>{!! $forklift->ladungssicherungsmittel_34_gurte !!}</td>
            <td>{!! $forklift->ladungssicherungsmittel_34_spannstangen !!}</td>
            <td>{!! $forklift->ladungssicherungsmittel_34_antirutschmatten !!}</td>
            <td>{!! $forklift->ladungssicherungsmittel_34_leerpaletten !!}</td>
            <td>{!! $forklift->werbefrei_fuer_tierfutter_41 !!}</td>
            <td>{!! $forklift->lebensmittel_futtermittel_42 !!}</td>
            <td>{!! $forklift->persoenliche_schutzausruestung_43 !!}</td>
            <td>{!! $forklift->persoenliche_schutzausruestung_43_plomben_nr !!}</td>
            <td>{!! $forklift->persoenliche_schutzausruestung_43_schutzbrille !!}</td>
            <td>{!! $forklift->persoenliche_schutzausruestung_43_chem_handschuhe !!}</td>
            <td>{!! $forklift->persoenliche_schutzausruestung_43_warnweste !!}</td>
            <td>{!! $forklift->persoenliche_schutzausruestung_43_vollschutzmaske !!}</td>
            <td>{!! $forklift->persoenliche_schutzausruestung_43_augenspuelflasche !!}</td>
            <td>{!! $forklift->persoenliche_schutzausruestung_43_handlampe !!}</td>
            <td>{!! $forklift->pulverloescher_plombiert_441 !!}</td>
            <td>{!! $forklift->pulverloescher_plombiert_441_pruefung !!}</td>
            <td>{!! $forklift->unterkeil_schaufel_442 !!}</td>
            <td>{!! $forklift->warnzeichen_warndreiecke_443 !!}</td>
            <td>{!! $forklift->auffangbehaelter_444 !!}</td>
            <td>{!! $forklift->kanalisationsabdeckung_445 !!}</td>
            <td>{!! $forklift->ibc_prueffrist_51 !!}</td>
            <td>{!! $forklift->ibc_prueffrist_51_date !!}</td>
            <td>{!! $forklift->unbeschaedigte_verandstuecke_un_cod_52 !!}</td>
            <td>{!! $forklift->wirksame_ladungssicherung_53 !!}</td>
            <td>{!! $forklift->ladungssicherung_foto_54 !!}</td>
            <td>{!! $forklift->signature !!}</td>
            <td>
                {!! Form::open(['route' => ['forklifts.destroy', $forklift->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('forklifts.show', [$forklift->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('forklifts.edit', [$forklift->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>