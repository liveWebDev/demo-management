<?php

use Faker\Factory as Faker;
use App\Models\Forklift;
use App\Repositories\ForkliftRepository;

trait MakeForkliftTrait
{
    /**
     * Create fake instance of Forklift and save it in database
     *
     * @param array $forkliftFields
     * @return Forklift
     */
    public function makeForklift($forkliftFields = [])
    {
        /** @var ForkliftRepository $forkliftRepo */
        $forkliftRepo = App::make(ForkliftRepository::class);
        $theme = $this->fakeForkliftData($forkliftFields);
        return $forkliftRepo->create($theme);
    }

    /**
     * Get fake instance of Forklift
     *
     * @param array $forkliftFields
     * @return Forklift
     */
    public function fakeForklift($forkliftFields = [])
    {
        return new Forklift($this->fakeForkliftData($forkliftFields));
    }

    /**
     * Get fake data of Forklift
     *
     * @param array $postFields
     * @return array
     */
    public function fakeForkliftData($forkliftFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'transport_id' => $fake->randomDigitNotNull,
            'fahrzeugausweis_21' => $fake->randomDigitNotNull,
            'adr_schulungsbescheinigung_22' => $fake->randomDigitNotNull,
            'adr_schulungsbescheinigung_22_answeis_nr' => $fake->word,
            'adr_schulungsbescheinigung_22_gultig_bis' => $fake->word,
            'lichtbildausweis_23' => $fake->randomDigitNotNull,
            'arbeitsbescheinigung_fahrer_24' => $fake->randomDigitNotNull,
            'vertrauensabfertigung_25' => $fake->randomDigitNotNull,
            'orangefarbene_warntafeln_26' => $fake->randomDigitNotNull,
            'schriftliche_weisungen_27' => $fake->randomDigitNotNull,
            'bewegungssicherung_31' => $fake->randomDigitNotNull,
            'visuelle_ueberpruefung_32' => $fake->randomDigitNotNull,
            'ladungsbruecke_besenrein_33' => $fake->randomDigitNotNull,
            'ladungssicherungsmittel_34' => $fake->randomDigitNotNull,
            'ladungssicherungsmittel_34_gurte' => $fake->randomDigitNotNull,
            'ladungssicherungsmittel_34_spannstangen' => $fake->randomDigitNotNull,
            'ladungssicherungsmittel_34_antirutschmatten' => $fake->randomDigitNotNull,
            'ladungssicherungsmittel_34_leerpaletten' => $fake->randomDigitNotNull,
            'werbefrei_fuer_tierfutter_41' => $fake->randomDigitNotNull,
            'lebensmittel_futtermittel_42' => $fake->randomDigitNotNull,
            'persoenliche_schutzausruestung_43' => $fake->randomDigitNotNull,
            'persoenliche_schutzausruestung_43_plomben_nr' => $fake->word,
            'persoenliche_schutzausruestung_43_schutzbrille' => $fake->randomDigitNotNull,
            'persoenliche_schutzausruestung_43_chem_handschuhe' => $fake->randomDigitNotNull,
            'persoenliche_schutzausruestung_43_warnweste' => $fake->randomDigitNotNull,
            'persoenliche_schutzausruestung_43_vollschutzmaske' => $fake->randomDigitNotNull,
            'persoenliche_schutzausruestung_43_augenspuelflasche' => $fake->randomDigitNotNull,
            'persoenliche_schutzausruestung_43_handlampe' => $fake->randomDigitNotNull,
            'pulverloescher_plombiert_441' => $fake->randomDigitNotNull,
            'pulverloescher_plombiert_441_pruefung' => $fake->word,
            'unterkeil_schaufel_442' => $fake->randomDigitNotNull,
            'warnzeichen_warndreiecke_443' => $fake->randomDigitNotNull,
            'auffangbehaelter_444' => $fake->randomDigitNotNull,
            'kanalisationsabdeckung_445' => $fake->randomDigitNotNull,
            'ibc_prueffrist_51' => $fake->randomDigitNotNull,
            'ibc_prueffrist_51_date' => $fake->word,
            'unbeschaedigte_verandstuecke_un_cod_52' => $fake->randomDigitNotNull,
            'wirksame_ladungssicherung_53' => $fake->randomDigitNotNull,
            'ladungssicherung_foto_54' => $fake->randomDigitNotNull,
            'signature' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $forkliftFields);
    }
}
