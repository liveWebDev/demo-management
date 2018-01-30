<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForkliftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forklift', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transport_id');
            $table->integer('fahrzeugausweis_21')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('adr_schulungsbescheinigung_22')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->string('adr_schulungsbescheinigung_22_answeis_nr')->comment('answeis_nr');
            $table->string('adr_schulungsbescheinigung_22_gultig_bis')->comment('gultig_bis');
            $table->integer('lichtbildausweis_23')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('arbeitsbescheinigung_fahrer_24')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('vertrauensabfertigung_25')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('orangefarbene_warntafeln_26')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('schriftliche_weisungen_27')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            
            $table->integer('bewegungssicherung_31')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('visuelle_ueberpruefung_32')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('ladungsbruecke_besenrein_33')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('ladungssicherungsmittel_34')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('ladungssicherungsmittel_34_gurte')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('ladungssicherungsmittel_34_spannstangen')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('ladungssicherungsmittel_34_antirutschmatten')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('ladungssicherungsmittel_34_leerpaletten')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            
            $table->integer('werbefrei_fuer_tierfutter_41')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('lebensmittel_futtermittel_42')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('persoenliche_schutzausruestung_43')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->string('persoenliche_schutzausruestung_43_plomben_nr')->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('persoenliche_schutzausruestung_43_schutzbrille')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('persoenliche_schutzausruestung_43_chem_handschuhe')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('persoenliche_schutzausruestung_43_warnweste')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('persoenliche_schutzausruestung_43_vollschutzmaske')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('persoenliche_schutzausruestung_43_augenspuelflasche')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('persoenliche_schutzausruestung_43_handlampe')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            
            $table->integer('pulverloescher_plombiert_441')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->string('pulverloescher_plombiert_441_pruefung')->comment('pruefung input text');
            $table->integer('unterkeil_schaufel_442')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('warnzeichen_warndreiecke_443')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('auffangbehaelter_444')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('kanalisationsabdeckung_445')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            
            $table->integer('ibc_prueffrist_51')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->string('ibc_prueffrist_51_date')->comment('input date');
            $table->integer('unbeschaedigte_verandstuecke_un_cod_52')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('wirksame_ladungssicherung_53')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->integer('ladungssicherung_foto_54')->default(0)->comment('0=Ja, 1=Nein, 2=N.A.');
            $table->string('signature')->comment('signature');
            $table->integer('prozess')->comment('process tracking');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forklift');
    }
}
