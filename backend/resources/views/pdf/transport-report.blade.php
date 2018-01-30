<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Generate PDF with DOMPDF</title>

  <style>
    @page{
      margin: 1px;
    }
    .page1 th, td {
      border: 1px solid black;
      width: 160px;
      height: 40px;
    }

    .page2 th, td, .page3 th, td, .page4 th, td, .page5 th, td {
      border: 1px solid black;
      height: 40px;
    }

    .page2 .nrwh, .page3 .nrwh, .page4 .nrwh, .page5 .nrwh{
      width: 50px;
      height: 70px;
    }

    .page2 .w, .page3 .w, .page4 .w, .page5 .w{
      width: 50px;
    }

    th {
      background-color: #f5f5f5;
    }

    .page-break {
      page-break-after: always;
    }

    .page2, .page1, .page3, .page4, .page5 { position: relative;}
    footer { position: absolute; bottom: 1px; left: 1px; width: 750px}

  </style>
</head>
<body>

<div class="page1" style="width: 595px; height: 842px;">

  <div class="header" style="background-color: #b9cde5;width: 800px;height: 110px;">
    <img src="{!! asset('images/logo.jpg') !!}" width="150px" style="margin-left: 20px;margin-top: 14px;">
    <h2 style="float: right;margin-right: 30px; margin-top: 36px;">Chemikalientransport & ADR Report</h2>
  </div>
  <h3 style="color: #1f497d;">1. Transprtdaten</h3>
  <ul style="list-style: none;display:inline;">
    <li>
      <table style="border:1px solid black">
        <tr>
          <th>Primary shipment-ID</th>
          <td>
            @if(count($content->shipment) > 0)
              @foreach($content->shipment as $shipment)
              {!! $shipment->shipment_id.', ' !!}
              @endforeach
            @endif
          </td>
        </tr>
        <tr>
          <th>Fahzeughalter</th>
          <td>{!! $content->fahrzeughalter !!}</td>
        </tr>
        <tr>
          <th>LKW Nr</th>
          <td>{!! $content->lkw_nr !!}</td>
        </tr>

        <tr>
          <th>Destination</th>
          <td>{!! $content->destination !!}</td>
        </tr>

        <tr>
          <th>Ankunft</th>
          <td>{!! $content->ankunft !!}</td>
        </tr>

        <tr>
          <th>Gefahrengut</th>
          <td>{!! $content->fahrzeughalter !!}</td>
        </tr>


        <tr>
          <th>Verlader</th>
          <td>{!! $content->fahrzeughalter !!}</td>
        </tr>
      </table>
    </li>
    <!-- t2 -->

    <li>
      <table style="margin-left: 341px;margin-top: -323px; ">
        <tr>
          <th>Weitere Shipments</th>
          <td>{!! $content->fahrzeughalter !!}</td>
        </tr>
        <tr>
          <th>Fahrer</th>
          <td>{!! $content->fahrer !!}</td>
        </tr>
        <tr>
          <th>Container</th>
          <td>{!! $content->container !!}</td>
        </tr>
        <tr>
          <th>Plomben Nr</th>
          <td>{!! $content->plomben_nr !!}</td>
        </tr>
        <tr>
          <th>Anbfahrt</th>
          <td>{!! $content->abfahrt !!}</td>
        </tr>
        <tr>
          <th>Luftfracht</th>
          <td>{!! $content->luftfracht !!}</td>
        </tr>
        <tr>
          <th>Unterschrift</th>
          <td>{!! $content->fahrzeughalter !!}</td>
        </tr>
      </table>
    </li>
    <!-- t2end -->
  </ul>
  <footer style="margin-top: 400px;
    margin-left: 20px;">
    <hr>
    <p style="display: inline-flex;">Seite 1 von 5</p>
    <img src="{!! asset('images/foterlogo.png') !!}" style="width: 100px;float: right;">
  </footer>
</div>

<div class="page-break"></div>

<div class="page2" style="width: 595px; height: 842px;">
  <h3 style="color: #1f497d;">2.Dokumentenkontrlle </h3>
  <ul style="list-style: none;display:inline;">
    <li>
      <table style="border:1px solid black">
        <tr>
          <th>Nr</th>
          <th> Prufung</th>
          <th> Ergebnis</th>
        </tr>

        <tr>
          <td class="nrwh">2.1</td>
          <td>Eintrag in <b> Fahrzeugausweis “Gefährliche Güter” </b> für in der Schweiz immatrikulierten
            Beförderungseinheiten
          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->fahrzeugausweis_21 : 'N/A') !!}</td>
        </tr>


        <tr>
          <td class="nrwh">2.2</td>
          <td><b> ADR-Schulungsbescheinigung </b> für die Beförderung gefährlicher Güter ungeachtet der höchstzulässigen
            Gesamtmenge sowie Beförderungseinheiten oder MEGS über 3m3 Fassungsraum und Batterie-Fahrzeuge mit einem
            Fassungsraum über 1 m3?
          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->adr_schulungsbescheinigung_22 : 'N/A') !!}</td>
        </tr>

        <tr>
          <td class="nrwh">2.3</td>
          <td>Ausweis Nr.
            Gültig bis: {!! (isset($content->forklift) ? $content->forklift->adr_schulungsbescheinigung_22_gultig_bis : 'N/A') !!}
            <p style="color: #4f81bd;"> Schulungsbescheinigung auf 5 Jahre beschränkt </p>
          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->adr_schulungsbescheinigung_22_answeis_nr : 'N/A') !!}</td>
        </tr>

        <tr>
          <td class="nrwh">2.4</td>
          <td><b> Lichtbildausweis </b> (Identitätskarte, Führerschein) von jedem Besatzungsmitglied vorhanden und
            kontrolliert?
          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->lichtbildausweis_23 : 'N/A') !!}</td>
        </tr>

        <tr>
          <td class="nrwh">2.5</td>
          <td><b> Arbeitsbescheinigung des Fahrers:</b> Personalausweis der Firma mit Foto und Firmennamen.</td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->arbeitsbescheinigung_fahrer_24 : 'N/A') !!}</td>
        </tr>


        <tr>
          <td class="nrwh">2.6</td>
          <td>Hat die Beförderungseinheit eine Vertrauensabfertigung? (Die Vertrauensabfertigung ist für 1 Jahr ab
            Erstcheck gültig)
          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->vertrauensabfertigung_25 : 'N/A') !!}</td>
        </tr>

        <tr>
          <td class="nrwh">2.7</td>
          <td><b> Orangefarbene Warntafeln </b> an der Beförderungseinheit vorne und Hinten angebracht und sichtbar?
          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->orangefarbene_warntafeln_26 : 'N/A') !!}</td>
        </tr>
        <tr>
          <td class="nrwh">2.8</td>
          <td> Sind Schriftliche <b> Weisungen </b>für die Fahrzeugbesatzung vorhanden?
            Die Schriftlichen Weisungen müssen vom Transporteur zur Verfügung gestellt werden
          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->schriftliche_weisungen_27 : 'N/A') !!}</td>
        </tr>

      </table>
    </li>

  </ul>


  <footer style="margin-top: 170px; margin-left: 20px;">
    <hr>
    <p style="display: inline-flex;">Seite 2 von 5</p>
    <img src="{!! asset('images/foterlogo.png') !!}" style="width: 100px;
    float: right;">
  </footer>
</div>

<div class="page-break"></div>

<div class="page3" style="width: 595px; height: 842px;">
  <h3 style="color: #1f497d;">3. Zustandskontrolle </h3>

  <ul style="list-style: none;display:inline;">

    <li>
      <table style="border:1px solid black">
        <tr>
          <th>Nr</th>
          <th> Prufung</th>
          <th> Ergebnis</th>
        </tr>

        <tr>
          <td class="nrwh">3.1</td>
          <td>Ist das Fahrzeug gegen Bewegung gesichert, mit Unterlegkeilen?</td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->bewegungssicherung_31 : 'N/A') !!}</td>
        </tr>


        <tr>
          <td class="nrwh">3.2</td>
          <td>Ergibt die <b> visuelle Überprüfung </b>der Beförderungseinheit offensichtlich sichtbare Mängel? Insb.
            hinsichtlich Pneus, Chassis Seiten-laden, Blache (Nieten, Schrauben, Risse)?
            <span style="color: #4f81bd;"> Sollten Mängel vorhanden sein, Rückweisung
des Beförderungsmittels.</span>
          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->visuelle_ueberpruefung_32 : 'N/A') !!}</td>
        </tr>

        <tr>
          <td class="nrwh">3.3</td>
          <td>Ladungsbrücke besenrein? Keine Nägel, Löcher etc.
          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->ladungsbruecke_besenrein_33 : 'N/A') !!}</td>
        </tr>

        <tr>
          <td class="nrwh">3.4</td>
          <td>Sind Ladungssicherungsmittel ausreichend vorhanden?
            <br>
            - Gurte 1 Stk. pro Lademeter <br>
            - Spannstangen <br>
            - Antirutschmatten <br>
            - Leerpaletten
          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->ladungssicherungsmittel_34 : 'N/A') !!}</td>
        </tr>


      </table>
    </li>

  </ul>


  <footer style="margin-top: 400px; margin-left: 20px;">
    <hr>
    <p style="display: inline-flex;">Seite 3 von 5</p>
    <img src="{!! asset('images/foterlogo.png') !!}" style="width: 100px;
    float: right;">
  </footer>

</div>

<div class="page-break"></div>

<div class="page4" style="width: 595px; height: 842px;">
  <h3 style="color: #1f497d;">4. ADR </h3>


  <ul style="list-style: none;display:inline;">

    <li>
      <table style="border:1px solid black">
        <tr>
          <th>Nr</th>
          <th> Prufung</th>
          <th> Ergebnis</th>
        </tr>

        <tr>
          <td class="nrwh">4.1</td>
          <td>Ist die Beförderungseinheit <b> frei </b> von <b> Werbeaufschriften für Lebensmittel/Tierfutter? </b>
            <span
                style="color: #4f81bd;"> Gefahrgut darf nicht transportiert werden, wenn mit Nein beantwortet wird. </span>
          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->werbefrei_fuer_tierfutter_41 : 'N/A') !!}</td>
        </tr>


        <tr>
          <td class="nrwh">4.2</td>
          <td><b> Sind Lebensmittel geladen? </b>

            Es dürfen keine Lebensmittel oder Futtermittel zusammen mit Chemikalien transportiert werden! <span
                style="color: #4f81bd;"> Wenn mit Ja beantwortet,  Zurückweisung des Transportmittels. Ausnahme: die Lebensmittel werden auf separate Transporteinheit verladen. </span>

          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->lebensmittel_futtermittel_42 : 'N/A') !!}</td>
        </tr>

        <tr>
          <td class="nrwh">4.3</td>
          <td><b> Persönliche Schutzausrüstung pro Besatzungsmitglied </b> Entweder: Typengeprüftes, plombiertes
            Notbesteck mit Inhaltsverzeichnis.
            <b>
              Plomben-Nr.
            </b> <br>

            - 1x geschlossene Schutzbrille <br>
            - 1x Paar lange chemikalienbeständige Handschuhe EN374/EN388 <br>
            - 1x Warnweste (EN 471) <br>
            - 1x Vollschutzmaske (resp. Halbmaske) mit Mehrbereichsfilter wie ABEK (EN 141) <br>
            - 1x Augenspülflasche mit reinem Wasser <br>
            - 1 Handlampe Ex. sicher
          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->persoenliche_schutzausruestung_43 : 'N/A') !!}</td>
        </tr>

        <tr>
          <td class="nrwh">4.4</td>
          <td>
            Pulverlöscher plombiert. <b>
              Fälligkeit der nächsten Prüfung: </b>
            <br>
            - 1x Unterkeil pro Fahrzeug <br>
            - 1x Schaufel <br>
            - 2x selbststehende Warnzeichen <br>
            - 1x Auffangbehälter <br>
            - 1 Kanalisationsabdeckung

          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->pulverloescher_plombiert_441 : 'N/A') !!}</td>
        </tr>


      </table>
    </li>

  </ul>


  <footer style="margin-top: 200px;margin-left: 20px;">
    <hr>
    <p style="display: inline-flex;">Seite 4 von 5</p>
    <img src="{!! asset('images/foterlogo.png') !!}" style="width: 100px;float: right;">
  </footer>
</div>

<div class="page-break"></div>

<div class="page5" style="width: 595px; height: 842px;">
  <h3 style="color: #1f497d;">5. Verpackung und Bildnachweise</h3>


  <ul style="list-style: none;display:inline;">

    <li>
      <table style="border:1px solid black">
        <tr>
          <th>Nr</th>
          <th> Prufung</th>
          <th> Ergebnis</th>

        </tr>

        <tr>
          <td class="nrwh">5.1</td>
          <td>Intermediate Bulk Container (IBC); Datum der letzten Prüfung: <b> Ist die Prüffrist von 2.5 Jahren seit
              letzter Prüfung eingehalten? </b>
            <span style="color: #4f81bd;"> Wenn Nein, dürfen die IBCs nicht verladen werden. </span>
          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->ibc_prueffrist_51 : 'N/A') !!}</td>
        </tr>


        <tr>
          <td class="nrwh">5.2</td>
          <td>Wurden nur <b> unbeschädigte einwandfreie Versandstücke mit UN Codierung </b> übergeben?
          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->unbeschaedigte_verandstuecke_un_cod_52 : 'N/A') !!}</td>
        </tr>

        <tr>
          <td class="nrwh">5.3</td>
          <td> Wurde eine wirksame <b> Ladungssicherung </b> angebracht? <span style="color: #4f81bd;">
Antirutschmatten, keine Leerräume, Formschluss der Ladung, Verteilung des Gewichts auf die Achsen, Ware festgemacht und verzurrt.
</span>
          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->wirksame_ladungssicherung_53 : 'N/A') !!}</td>
        </tr>

        <tr>
          <td class="nrwh">5.4</td>
          <td>Wurde die Ladungssicherung mit Foto dokumentiert?
          </td>
          <td class="w">{!! (isset($content->forklift) ? $content->forklift->ladungssicherung_foto_54 : 'N/A') !!}</td>
        </tr>

      </table>
      <img src="{!! asset('images/boxs.png') !!}" width="595px">


    </li>

  </ul>


  <footer style="margin-top: 200px;margin-left: 20px;">
    <hr>
    <p style="display: inline-flex;">Seite 5 von 5</p>
    <img src="{!! asset('images/foterlogo.png') !!}" style="width: 100px;    float: right;">
  </footer>
</div>

</body>
</html>