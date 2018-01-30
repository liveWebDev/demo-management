<?php

namespace App\Repositories;

use App\Models\Forklift;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ForkliftRepository
 * @package App\Repositories
 * @version September 8, 2017, 4:56 pm UTC
 *
 * @method Forklift findWithoutFail($id, $columns = ['*'])
 * @method Forklift find($id, $columns = ['*'])
 * @method Forklift first($columns = ['*'])
*/
class ForkliftRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'transport_id',
        'fahrzeugausweis_21',
        'adr_schulungsbescheinigung_22',
        'adr_schulungsbescheinigung_22_answeis_nr',
        'adr_schulungsbescheinigung_22_gultig_bis',
        'lichtbildausweis_23',
        'arbeitsbescheinigung_fahrer_24',
        'vertrauensabfertigung_25',
        'orangefarbene_warntafeln_26',
        'schriftliche_weisungen_27',
        'bewegungssicherung_31',
        'visuelle_ueberpruefung_32',
        'ladungsbruecke_besenrein_33',
        'ladungssicherungsmittel_34',
        'ladungssicherungsmittel_34_gurte',
        'ladungssicherungsmittel_34_spannstangen',
        'ladungssicherungsmittel_34_antirutschmatten',
        'ladungssicherungsmittel_34_leerpaletten',
        'werbefrei_fuer_tierfutter_41',
        'lebensmittel_futtermittel_42',
        'persoenliche_schutzausruestung_43',
        'persoenliche_schutzausruestung_43_plomben_nr',
        'persoenliche_schutzausruestung_43_schutzbrille',
        'persoenliche_schutzausruestung_43_chem_handschuhe',
        'persoenliche_schutzausruestung_43_warnweste',
        'persoenliche_schutzausruestung_43_vollschutzmaske',
        'persoenliche_schutzausruestung_43_augenspuelflasche',
        'persoenliche_schutzausruestung_43_handlampe',
        'pulverloescher_plombiert_441',
        'pulverloescher_plombiert_441_pruefung',
        'unterkeil_schaufel_442',
        'warnzeichen_warndreiecke_443',
        'auffangbehaelter_444',
        'kanalisationsabdeckung_445',
        'ibc_prueffrist_51',
        'ibc_prueffrist_51_date',
        'unbeschaedigte_verandstuecke_un_cod_52',
        'wirksame_ladungssicherung_53',
        'ladungssicherung_foto_54',
        'signature'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Forklift::class;
    }
}
