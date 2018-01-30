<?php

namespace App\Models;

use Eloquent as Model;
use Plank\Mediable\Mediable;

/**
 * Class Forklift
 * @package App\Models
 * @version September 8, 2017, 4:56 pm UTC
 * @method static Forklift find($id=null, $columns = array())
 * @method static Forklift|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection userHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection userHasRoles
 * @property integer transport_id
 * @property integer fahrzeugausweis_21
 * @property integer adr_schulungsbescheinigung_22
 * @property string adr_schulungsbescheinigung_22_answeis_nr
 * @property string adr_schulungsbescheinigung_22_gultig_bis
 * @property integer lichtbildausweis_23
 * @property integer arbeitsbescheinigung_fahrer_24
 * @property integer vertrauensabfertigung_25
 * @property integer orangefarbene_warntafeln_26
 * @property integer schriftliche_weisungen_27
 * @property integer bewegungssicherung_31
 * @property integer visuelle_ueberpruefung_32
 * @property integer ladungsbruecke_besenrein_33
 * @property integer ladungssicherungsmittel_34
 * @property integer ladungssicherungsmittel_34_gurte
 * @property integer ladungssicherungsmittel_34_spannstangen
 * @property integer ladungssicherungsmittel_34_antirutschmatten
 * @property integer ladungssicherungsmittel_34_leerpaletten
 * @property integer werbefrei_fuer_tierfutter_41
 * @property integer lebensmittel_futtermittel_42
 * @property integer persoenliche_schutzausruestung_43
 * @property string persoenliche_schutzausruestung_43_plomben_nr
 * @property integer persoenliche_schutzausruestung_43_schutzbrille
 * @property integer persoenliche_schutzausruestung_43_chem_handschuhe
 * @property integer persoenliche_schutzausruestung_43_warnweste
 * @property integer persoenliche_schutzausruestung_43_vollschutzmaske
 * @property integer persoenliche_schutzausruestung_43_augenspuelflasche
 * @property integer persoenliche_schutzausruestung_43_handlampe
 * @property integer pulverloescher_plombiert_441
 * @property string pulverloescher_plombiert_441_pruefung
 * @property integer unterkeil_schaufel_442
 * @property integer warnzeichen_warndreiecke_443
 * @property integer auffangbehaelter_444
 * @property integer kanalisationsabdeckung_445
 * @property integer ibc_prueffrist_51
 * @property string ibc_prueffrist_51_date
 * @property integer unbeschaedigte_verandstuecke_un_cod_52
 * @property integer wirksame_ladungssicherung_53
 * @property integer ladungssicherung_foto_54
 * @property string signature
 */
class Forklift extends Model
{
    use Mediable;
    
    public $table = 'forklift';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
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
        'signature',
        'prozess'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'transport_id' => 'integer',
        'fahrzeugausweis_21' => 'integer',
        'adr_schulungsbescheinigung_22' => 'integer',
        'adr_schulungsbescheinigung_22_answeis_nr' => 'string',
        'adr_schulungsbescheinigung_22_gultig_bis' => 'string',
        'lichtbildausweis_23' => 'integer',
        'arbeitsbescheinigung_fahrer_24' => 'integer',
        'vertrauensabfertigung_25' => 'integer',
        'orangefarbene_warntafeln_26' => 'integer',
        'schriftliche_weisungen_27' => 'integer',
        'bewegungssicherung_31' => 'integer',
        'visuelle_ueberpruefung_32' => 'integer',
        'ladungsbruecke_besenrein_33' => 'integer',
        'ladungssicherungsmittel_34' => 'integer',
        'ladungssicherungsmittel_34_gurte' => 'integer',
        'ladungssicherungsmittel_34_spannstangen' => 'integer',
        'ladungssicherungsmittel_34_antirutschmatten' => 'integer',
        'ladungssicherungsmittel_34_leerpaletten' => 'integer',
        'werbefrei_fuer_tierfutter_41' => 'integer',
        'lebensmittel_futtermittel_42' => 'integer',
        'persoenliche_schutzausruestung_43' => 'integer',
        'persoenliche_schutzausruestung_43_plomben_nr' => 'string',
        'persoenliche_schutzausruestung_43_schutzbrille' => 'integer',
        'persoenliche_schutzausruestung_43_chem_handschuhe' => 'integer',
        'persoenliche_schutzausruestung_43_warnweste' => 'integer',
        'persoenliche_schutzausruestung_43_vollschutzmaske' => 'integer',
        'persoenliche_schutzausruestung_43_augenspuelflasche' => 'integer',
        'persoenliche_schutzausruestung_43_handlampe' => 'integer',
        'pulverloescher_plombiert_441' => 'integer',
        'pulverloescher_plombiert_441_pruefung' => 'string',
        'unterkeil_schaufel_442' => 'integer',
        'warnzeichen_warndreiecke_443' => 'integer',
        'auffangbehaelter_444' => 'integer',
        'kanalisationsabdeckung_445' => 'integer',
        'ibc_prueffrist_51' => 'integer',
        'ibc_prueffrist_51_date' => 'string',
        'unbeschaedigte_verandstuecke_un_cod_52' => 'integer',
        'wirksame_ladungssicherung_53' => 'integer',
        'ladungssicherung_foto_54' => 'integer',
        'signature' => 'string',
        'prozess' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
    
    /**
     * Morph many relation to image.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function image()
    {
        
        return $this->morphMany( 'App\Models\Image', 'image' );
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function transport(){
        return $this->belongsTo('App\Models\Transport', 'transport_id');
    }
    
    /**
     * @param      $files
     * @param      $carObj
     * @param null $destinationPath
     */
    public static function imageUpload( $files, $carObj, $destinationPath = null )
    {
        
        if ( count( $files ) == 0 ) {
            return;
        }
        
        for ( $i = 0; $i < count( $files ); $i++ ) {
            $file = $files[ $i ];
            $filename = uniqid() . str_replace(' ', '_', $file->getClientOriginalName());
            $destinationPath = ( isset( $destinationPath ) ? $destinationPath : 'storage/uploads/forklift' );
            $url = $file->store($destinationPath);
            $file->move( $destinationPath, $filename );
            $imageObj = new Image();
            $imageObj->image = (isset($destinationPath) ? $destinationPath. '/' . $filename : $url );
            $carObj->image()->save( $imageObj );
        }
    }
    
    
    /**
     * @param      $files
     * @param null $destinationPath
     *
     * @return string|void
     */
    public static function signatureUpload( $files, $destinationPath = null )
    {
        
        $file = $files;
        $filename = uniqid() . str_replace(' ', '_', $file->getClientOriginalName());
        $destinationPath = ( isset( $destinationPath ) ? $destinationPath : 'storage/uploads/signature' );
        $url = $file->store($destinationPath);
        $file->move( $destinationPath, $filename );
        $result =  (isset($destinationPath) ? $destinationPath. '/' . $filename : $url );
        return $result;
    }
    
    
}
