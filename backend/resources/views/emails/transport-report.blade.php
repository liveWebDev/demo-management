@extends('emails.layout')

@section('content')
  <table width="90%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center" colspan="2">
        <!-- padding -->
        <div style="height: 60px; line-height: 60px; font-size: 10px;"></div>
        <div style="line-height: 44px;">
          <font face="Arial, Helvetica, sans-serif" size="5" color="#57697e" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;">
						Here is Transport Detail
					</span></font>
        </div>
        <!-- padding -->
        <div style="height: 40px; line-height: 40px; font-size: 10px;"></div>
      </td>
    </tr>
    <tr>
      <td colspan="2"><h2>Transport Detail</h2></td>
    </tr>
    <tr>
      <td>user_id</td>
      <td>{!! $transport->user_id !!}</td>
    </tr>
    <tr>
      <td>forklift_id</td>
      <td>{!! $transport->forklift_id !!}</td>
    </tr>
    <tr>
      <td>fahrzeughalter</td>
      <td>{!! $transport->fahrzeughalter !!}</td>
    </tr>
    <tr>
      <td>destination</td>
      <td>{!! $transport->destination !!}</td>
    </tr>
    <tr>
      <td>lkw_nr</td>
      <td>{!! $transport->lkw_nr !!}</td>
    </tr>
    <tr>
      <td>fahrer</td>
      <td>{!! $transport->fahrer !!}</td>
    </tr>
    <tr>
      <td>container</td>
      <td>{!! $transport->container !!}</td>
    </tr>
    <tr>
      <td>plomben_nr</td>
      <td>{!! $transport->plomben_nr !!}</td>
    </tr>
    <tr>
      <td>adr</td>
      <td>{!! $transport->adr !!}</td>
    </tr>
    <tr>
      <td>luftfracht</td>
      <td>{!! $transport->luftfracht !!}</td>
    </tr>
    <tr>
      <td>rampe</td>
      <td>{!! $transport->rampe !!}</td>
    </tr>
    <tr>
      <td>ankunft</td>
      <td>{!! $transport->ankunft !!}</td>
    </tr>
    <tr>
      <td>abfahrt</td>
      <td>{!! $transport->abfahrt !!}</td>
    </tr>
    <tr>
      <td>status</td>
      <td>{!! $transport->status !!}</td>
    </tr>
    <tr>
      <td>created_at</td>
      <td>{!! $transport->created_at !!}</td>
    </tr>
    <tr>
      <td>updated_at</td>
      <td>{!! $transport->updated_at !!}</td>
    </tr>
    <tr>
      <td colspan="2"><h2>Forklift Detail</h2></td>
    </tr>
    <tr>
      <td colspan="2">
        fahrzeugausweis_21 :: {!! $transport->forklift->fahrzeugausweis_21 !!} <br />
        adr_schulungsbescheinigung_22  :: {!! $transport->forklift->adr_schulungsbescheinigung_22 !!} <br />
        adr_schulungsbescheinigung_22_answeis_nr ::  {!! $transport->forklift->adr_schulungsbescheinigung_22_answeis_nr !!} <br />
        adr_schulungsbescheinigung_22_gultig_bis ::  {!! $transport->forklift->adr_schulungsbescheinigung_22_gultig_bis !!} <br />
        lichtbildausweis_23 ::  {!! $transport->forklift->lichtbildausweis_23 !!} <br />
        arbeitsbescheinigung_fahrer_24 ::  {!! $transport->forklift->arbeitsbescheinigung_fahrer_24 !!} <br />
        vertrauensabfertigung_25 ::  {!! $transport->forklift->vertrauensabfertigung_25 !!} <br />
        orangefarbene_warntafeln_26 ::  {!! $transport->forklift->orangefarbene_warntafeln_26 !!} <br />
        schriftliche_weisungen_27 ::  {!! $transport->forklift->schriftliche_weisungen_27 !!} <br />
        bewegungssicherung_31 ::  {!! $transport->forklift->bewegungssicherung_31 !!} <br />
        visuelle_ueberpruefung_32 ::  {!! $transport->forklift->visuelle_ueberpruefung_32 !!} <br />
        ladungsbruecke_besenrein_33 ::  {!! $transport->forklift->ladungsbruecke_besenrein_33 !!} <br />
        ladungssicherungsmittel_34 ::  {!! $transport->forklift->ladungssicherungsmittel_34 !!} <br />
        ladungssicherungsmittel_34_gurte ::  {!! $transport->forklift->ladungssicherungsmittel_34_gurte !!} <br />
        ladungssicherungsmittel_34_spannstangen ::  {!! $transport->forklift->ladungssicherungsmittel_34_spannstangen !!} <br />
        ladungssicherungsmittel_34_antirutschmatten ::  {!! $transport->forklift->ladungssicherungsmittel_34_antirutschmatten !!} <br />
        ladungssicherungsmittel_34_leerpaletten ::  {!! $transport->forklift->ladungssicherungsmittel_34_leerpaletten !!} <br />
        werbefrei_fuer_tierfutter_41 ::  {!! $transport->forklift->werbefrei_fuer_tierfutter_41 !!} <br />
        lebensmittel_futtermittel_42 ::  {!! $transport->forklift->lebensmittel_futtermittel_42 !!} <br />
        persoenliche_schutzausruestung_43 ::   {!! $transport->forklift->persoenliche_schutzausruestung_43 !!} <br />
        persoenliche_schutzausruestung_43_plomben_nr ::  {!! $transport->forklift->persoenliche_schutzausruestung_43_plomben_nr !!} <br />
        persoenliche_schutzausruestung_43_schutzbrille ::  {!! $transport->forklift->persoenliche_schutzausruestung_43_schutzbrille !!} <br />
        persoenliche_schutzausruestung_43_chem_handschuhe ::  {!! $transport->forklift->persoenliche_schutzausruestung_43_chem_handschuhe !!} <br />
        persoenliche_schutzausruestung_43_warnweste ::  {!! $transport->forklift->persoenliche_schutzausruestung_43_warnweste !!} <br />
        persoenliche_schutzausruestung_43_vollschutzmaske ::  {!! $transport->forklift->persoenliche_schutzausruestung_43_vollschutzmaske !!} <br />
        persoenliche_schutzausruestung_43_augenspuelflasche ::  {!! $transport->forklift->persoenliche_schutzausruestung_43_augenspuelflasche !!} <br />
        persoenliche_schutzausruestung_43_handlampe ::  {!! $transport->forklift->persoenliche_schutzausruestung_43_handlampe !!} <br />
        pulverloescher_plombiert_441 ::  {!! $transport->forklift->pulverloescher_plombiert_441 !!} <br />
        pulverloescher_plombiert_441_pruefung ::  {!! $transport->forklift->pulverloescher_plombiert_441_pruefung !!} <br />
        unterkeil_schaufel_442 ::  {!! $transport->forklift->unterkeil_schaufel_442 !!} <br />
        warnzeichen_warndreiecke_443 ::  {!! $transport->forklift->warnzeichen_warndreiecke_443 !!} <br />
        auffangbehaelter_444  :: {!! $transport->forklift->auffangbehaelter_444 !!} <br />
        kanalisationsabdeckung_445 ::  {!! $transport->forklift->kanalisationsabdeckung_445 !!} <br />
        ibc_prueffrist_51 ::  {!! $transport->forklift->ibc_prueffrist_51 !!} <br />
        ibc_prueffrist_51_date ::  {!! $transport->forklift->ibc_prueffrist_51_date !!} <br />
        unbeschaedigte_verandstuecke_un_cod_52 ::  {!! $transport->forklift->unbeschaedigte_verandstuecke_un_cod_52 !!} <br />
        wirksame_ladungssicherung_53 ::  {!! $transport->forklift->wirksame_ladungssicherung_53 !!} <br />
        ladungssicherung_foto_54 ::  {!! $transport->forklift->ladungssicherung_foto_54 !!} <br />
        signature ::  {!! $transport->forklift->signature !!} <br />
        prozess ::  {!! $transport->forklift->prozess !!} <br />
        created_at :: {!! $transport->forklift->created_at !!} <br />
        updated_at ::  {!! $transport->forklift->updated_at !!} <br />
      </td>
    </tr>
    <tr>
      <td colspan="2"><h2>Forklift images Detail</h2></td>
    </tr>
    <tr>
      @if(!empty($transport->forklift->image))
        @foreach($transport->forklift->image as $image)
          <td colspan="2"><img src="{!! asset($image->image) !!}" alt=""/></td>
        @endforeach
      @endif
    </tr>
    <tr>
      <td colspan="2"><h2>Transport Shipment Detail</h2></td>
    </tr>
    <tr>
      @if(!empty($transport->shipment))
        @foreach($transport->shipment as $shipment)
          <td colspan="2">Shipment ID {!! $shipment->shipment_id !!}</td>
        @endforeach
      @endif
    </tr>

    <tr>
      <td align="center" colspan="2">
        <div style="line-height: 24px;">
          <font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
        <span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
          Lorem ipsum dolor sit amet consectetuer sed<br> diam nonumy nibh elit dolore.
        </span></font>
        </div>
        <!-- padding -->
        <div style="height: 40px; line-height: 40px; font-size: 10px;"></div>
      </td>
    </tr>
    <tr>
      <td align="center" colspan="2">
        <div style="line-height: 24px;">
          <a href="#" target="_blank" class="btn btn-danger block-center">
            click
          </a>
        </div>
        <!-- padding -->
        <div style="height: 60px; line-height: 60px; font-size: 10px;"></div>
      </td>
    </tr>
  </table>
@endsection