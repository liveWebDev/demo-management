import { Component, OnInit, ViewChild ,EventEmitter,Input,Output } from '@angular/core';
import { NG_VALUE_ACCESSOR, ControlValueAccessor } from '@angular/forms';

import { Router } from '@angular/router';
import { Logger } from "angular2-logger/core";

import { ManagementService } from './../../management/management.service';
import { AppsService } from '../apps.service';
import { SharedService } from '../shared.service';
import { LocalStorage } from '../../libs/localstorage';


@Component({
  selector: 'app-links',
  templateUrl: './links.component.html',
  styleUrls: ['./links.component.scss']
})
export class LinksComponent implements OnInit {
  rows = [];
  count = 0;
  offset = 0;
  limit = 10;
  public currentId;
  public current_forklift_id;
  public currentTransport :any ={
    shipmint:[{
      shipmint_id:1
    }],
    fahrers:'',
    fahrzeughalter:'',
    destination:''
  };
  public width: number = 300;
  public height: number = 300;
  public user: any;
  public selectedIndex: number = 0;
  public noFooter: boolean = false;
  public label: string = 'Sign above';
  opentabs = false;
  public selectedObject:any={

  };
	@Input('parentData') incomingData: any;

	@Output('childData') outgoingData = new EventEmitter<any>();
  public sendData(data:any){
		   data.from = 'links'
       this._sharedService.publishData(data);
	}
  public user_id: 1;
  public transport_id: 1;
  public fahrzeugausweis_21: 1;
  public adr_schulungsbescheinigung_22: 1;
  public adr_schulungsbescheinigung_22_answeis_nr: 1;
  public adr_schulungsbescheinigung_22_gultig_bis: 1;
  public lichtbildausweis_23: 1;
  public arbeitsbescheinigung_fahrer_24: 1;
  public vertrauensabfertigung_25: 1;
  public orangefarbene_warntafeln_26: 1;
  public schriftliche_weisungen_27: 1;
  public bewegungssicherung_31: 1;
  public visuelle_ueberpruefung_32: 1;
  public ladungsbruecke_besenrein_33: 1;
  public ladungssicherungsmittel_34: 1;
  public ladungssicherungsmittel_34_gurte: 1;
  public ladungssicherungsmittel_34_spannstangen: 1;
  public ladungssicherungsmittel_34_antirutschmatten: 1;
  public ladungssicherungsmittel_34_leerpaletten: 1;
  public werbefrei_fuer_tierfutter_41: 1;
  public lebensmittel_futtermittel_42: 1;
  public persoenliche_schutzausruestung_43: 1;
  public persoenliche_schutzausruestung_43_plomben_nr: 1;
  public persoenliche_schutzausruestung_43_schutzbrille: 1;
  public persoenliche_schutzausruestung_43_chem_handschuhe: 1;
  public persoenliche_schutzausruestung_43_warnweste: 1;
  public persoenliche_schutzausruestung_43_vollschutzmaske: 1;
  public persoenliche_schutzausruestung_43_augenspuelflasche: 1;
  public persoenliche_schutzausruestung_43_handlampe: 1;
  public pulverloescher_plombiert_441: 1;
  public pulverloescher_plombiert_441_pruefung: 1;
  public unterkeil_schaufel_442: 1;
  public warnzeichen_warndreiecke_443: 1;
  public auffangbehaelter_444: 1;
  public kanalisationsabdeckung_445: 1;
  public ibc_prueffrist_51: 1;
  public ibc_prueffrist_51_date: 1;
  public unbeschaedigte_verandstuecke_un_cod_52: 1;
  public wirksame_ladungssicherung_53: 1;
  public ladungssicherung_foto_54: 1;
  public signature: 1;
  prozess: 1

  constructor(
    private _router: Router,
    private _logger: Logger,
    private _managementService: ManagementService,
    public appServie: AppsService,
    public _localstorage: LocalStorage,
    public _sharedService :SharedService
  ) { 
     this._sharedService.caseNumber$.subscribe(
            data => {

                if(data && data['from'] == 'links'){
                  console.log("Same Componenets");
                }else{
                  console.log('transport send to links' , data);
                  debugger;
                  this.customData.count++;
                  let __newCustomList:any = [data];

                  this.customData.rows.forEach((object)=>{
                    __newCustomList.push(object);
                  })
                  this.customData.rows = __newCustomList
                  
                }
            }
            );
  }

  
  customData = {
    rows: [
      {
        name: "Eintrag in Farhanzagfer 'Grafkdbsey Guter' fur in der Schwiz immaasadsadsdse Bef" +
        "oradwfdiunxjadj"
      }, {
        name: "Eintrag in Farhanzagfer 'Grafkdbsey Guter' fur in der Schwiz immaasadsadsdse Bef" +
        "oradwfdiunxjadj"
      }, {
        name: "Eintrag in Farhanzagfer 'Grafkdbsey Guter' fur in der Schwiz immaasadsadsdse Bef" +
        "oradwfdiunxjadj"
      }, {
        name: "Eintrag in Farhanzagfer 'Grafkdbsey Guter' fur in der Schwiz immaasadsadsdse Bef" +
        "oradwfdiunxjadj"
      }, {
        name: "Eintrag in Farhanzagfer 'Grafkdbsey Guter' fur in der Schwiz immaasadsadsdse Bef" +
        "oradwfdiunxjadj"
      }, {
        name: "Eintrag in Farhanzagfer 'Grafkdbsey Guter' fur in der Schwiz immaasadsadsdse Bef" +
        "oradwfdiunxjadj"
      }, {
        name: "Eintrag in Farhanzagfer 'Grafkdbsey Guter' fur in der Schwiz immaasadsadsdse Bef" +
        "oradwfdiunxjadj"
      }
    ],
    count: 7,
    offset: 0,
    limit: 10
  }

  customDatas = {
    rows: [
      {
        name: "Eintrag in Farhanzagfer 'Grafkdbsey Guter' fur in der Schwiz immaasadsadsdse Bef" +
        "oradwfdiunxjadj"
      }, {
        name: "Eintrag in Farhanzagfer 'Grafkdbsey Guter' fur in der Schwiz immaasadsadsdse Bef" +
        "oradwfdiunxjadj"
      }, {
        name: "Eintrag in Farhanzagfer 'Grafkdbsey Guter' fur in der Schwiz immaasadsadsdse Bef" +
        "oradwfdiunxjadj"
      }, {
        name: "Eintrag in Farhanzagfer 'Grafkdbsey Guter' fur in der Schwiz immaasadsadsdse Bef" +
        "oradwfdiunxjadj"
      }, {
        name: "Eintrag in Farhanzagfer 'Grafkdbsey Guter' fur in der Schwiz immaasadsadsdse Bef" +
        "oradwfdiunxjadj"
      }, {
        name: "Eintrag in Farhanzagfer 'Grafkdbsey Guter' fur in der Schwiz immaasadsadsdse Bef" +
        "oradwfdiunxjadj"
      }, {
        name: "Eintrag in Farhanzagfer 'Grafkdbsey Guter' fur in der Schwiz immaasadsadsdse Bef" +
        "oradwfdiunxjadj"
      }
    ],
    count: 7,
    offset: 0,
    limit: 10
  }

  documentsQuestions = {
    rows: [
      {
        sr: '2.1',
        question: "Eintrag in Fahrzeugausweis “Gefährliche Güter” für in der Schweiz immatrikulierten Beförderungseinheiten",
        ngModel: 'fahrzeugausweis_21'
      }, {
        sr: '2.2',
        question: "ADR-Schulungsbescheinigung für die Beförderung gefährlicher Güter ungeachtet der höchstzulässigen Gesamtmenge sowie Beförderungseinheiten oder MEGS über 3m3 Fassungsraum und Batterie-Fahrzeuge mit einem Fassungsraum über 1 m3?",
        question2: 'Ausweis Nr.?',
        question3: 'Gültig bis:',
        ngModel: 'adr_schulungsbescheinigung_22'
      }, {
        sr: '2.3',
        question: "Lichtbildausweis(Identitätskarte,Führerschein) von jedem Besatzungsmitglied vorhanden und kontrolliert?",
        ngModel: 'lichtbildausweis_23'
      }, {
        sr: '2.4',
        question: "Arbeitsbescheinigung des Fahrers: Personalausweis der Firma mit Foto und Firmennamen.",
        ngModel: 'arbeitsbescheinigung_fahrer_24'
      }, {
        sr: '2.5',
        question: "Hat die Beförderungseinheit eine Vertrauensabfertigung? (Die Vertrauensabfertigung ist für 1 Jahr ab Erstcheck gültig)",
        ngModel: 'vertrauensabfertigung_25'
      }, {
        sr: '2.6',
        question: "Orangefarbene Warntafeln an der Beförderungseinheit vorne und Hinten angebracht und sichtbar?",
        ngModel: 'orangefarbene_warntafeln_26'
      }, {
        sr: '2.7',
        question: "Sind Schriftliche Weisungen für die Fahrzeugbesatzung vorhanden?Die Schriftlichen Weisungen müssen vom Transporteur zur Verfügung gestellt werden",
        ngModel: 'schriftliche_weisungen_27'
      }
    ],
    count: 7,
    offset: 0,
    limit: 10
  }
  stateControl = {
    rows: [
      {
        sr: '3.1',
        question: "Ist das Fahrzeug gegen Bewegung gesichert, mit Unterlegkeilen"
      },
      {
        sr: '3.2',
        question: "Ergibt die visuelle Überprüfung der Beförderungseinheit offensichtlich sichtbare Mängel? (insbesondere hinsichtlich Pneus, Chassis Seitenladen, Blache (Nieten, Schrauben, Risse)  Sollten Mängel vorhanden sein mit ja beantwortet = Rückweisung des Beförderungsmittels."
      }, {
        sr: '3.3',
        question: "Ladungsbrücke besenrein? (keine Nägel, Löcher etc.)"
      }, {
        sr: '3.4',
        question: "Sind Ladungssicherungsmittel ausreichend vorhanden? ",
        question2: " - Gurte 1 Stk. pro Lademeter",
        question3: " - Spannstangen",
        question4: " - Antirutschmatten",
        question5: " - Leerpaletten"
      }
    ],
    count: 4,
    offset: 0,
    limit: 10
  }

  controlOfTransportUnit = {
    rows: [
      {
        sr: '4.1',
        question: "Ist die Beförderungseinheit frei von Werbeaufschriften für Lebensmittel/Tierfutter? Gefahrgut darf nicht transportiert werden, wenn mit NEIN beantwortet wird!"
      },
      {
        sr: '4.2',
        question: "Sind Lebensmittel geladen?  Es dürfen keine Lebensmittel oder Futtermittel zusammen mit Chemikalien transportiert werden!               Wenn mit Ja beantwortet,  Zurückweisung des Transportmittels !! Ausnahme: die Lebensmittel werden auf separate Transporteinheit verladen"
      },
      {
        sr: '4.3',
        question: "Persönliche Schutzausrüstung pro Besatzungsmitglied Entweder: Typengeprüftes, plombiertes Notbesteck mit Inhaltsverzeichnis",
        question2: "(gleicher Inhalt wie unten) , Plomben Nr. :",
        question3: "1 geschlossene Schutzbrille",
        question4: "1 Paar lange chemikalienbeständige Handschuhe EN374/EN388",
        question5: "1 Warnweste (EN 471) ",
        question6: "1 Vollschutzmaske (resp. Halbmaske) mit Mehrbereichsfilter wie ABEK (EN 141)",
        question7: "1 Augenspülflasche mit reinem Wasser",
        question8: "1 Handlampe Ex. sicher"

      }
    ],
    count: 4,
    offset: 0,
    limit: 10
  }

  protectionOfPublic = {
    rows: [
      {
        sr: '4.4',
        question: "Ist die Beförderungseinheit frei von Werbeaufschriften für Lebensmittel/Tierfutter? &nbsp; <ul><li>Gefahrgut darf nicht transportiert werden, wenn mit NEIN beantwortet wird!</li></ul>",
        question2: "Sind Lebensmittel geladen?  Es dürfen keine Lebensmittel oder Futtermittel zusammen mit Chemikalien transportiert werden!               Wenn mit Ja beantwortet,  Zurückweisung des Transportmittels !! Ausnahme: die Lebensmittel werden auf separate Transporteinheit verladen",
        question3: "Persönliche Schutzausrüstung pro Besatzungsmitglied Entweder: Typengeprüftes, plombiertes Notbesteck mit Inhaltsverzeichnis",
        question4: "(gleicher Inhalt wie unten) , Plomben Nr.:",
        question5: "1 geschlossene Schutzbrille",
        question6: "1 Paar lange chemikalienbeständige Handschuhe EN374/EN388",
        question7: "1 Warnweste (EN 471) ",
        question8: "1 Vollschutzmaske (resp. Halbmaske) mit Mehrbereichsfilter wie ABEK (EN 141)",
        question9: "1 Augenspülflasche mit reinem Wasser",
        question10: "1 Handlampe Ex. sicher"
      }
    ],
    count: 4,
    offset: 0,
    limit: 10
  }

  packingAndClosingControl = {
    rows: [
      {
        sr: '5.1',
        question: "Intermediate Bulk Container (IBC); Datum der letzten Prüfung: (ADR 6.5.1)    Ist die Prüffrist von  2.5 Jahren seit letzter Prüfung eingehalten?  Wenn Nein, dürfen die IBCs nicht verladen werden."
      },
      {
        sr: '5.2',
        question: "Wurden nur unbeschädigte einwandfreie Versandstücke mit UN Codierung übergeben? "
      },
      {
        sr: '5.3',
        question: "Wurde eine wirksame Ladungssicherung angeracht? (Antirutschmatten, keine Leerräume, Formschluss der Ladung, Verteilung des Gewichts auf die Achsen, Ware festgemacht und verzurrt)"
      },
      {
        sr: '5.4',
        question: "Wurde die Ladungssicherung mit Foto dokumentiert"
      }
    ],
    count: 4,
    offset: 0,
    limit: 10
  }

  transportDocuments = {
    rows: [
      {
        sr: '6.1',
        question: "Sind die eförderungspapiere mit den Ladedokumenten identisch? (Lieferschein, Beförderungsinstruktionen, besondere Hinweise / Dokumente, usw.)"
      }
    ],
    count: 4,
    offset: 0,
    limit: 10
  }

  ngOnInit() {
    this.user = this._localstorage.getObject('user_token');
    this.currentId = 0;
    this.current_forklift_id = 0;
    var self = this;
    this.fetchData(function (data) {
      console.log(data);
      var arr = [];
      for (var i = 0; i < data.data.data.length; i++) {
        if (data.data.data[i]['forklift_id'] == 0 || data.data.data[i]['forklift_id'] == self.user.user.id) {
          arr.push(data.data.data[i])
        }
      }
      self.customData['rows'] = arr;
      self.customData.count = arr.length;
      self.customData.offset = 0;
      self.customData.limit = 10;
    },1);
  }

  page(offset, limit) {
    this._logger.log("offset, limit", offset, limit);
    const start = offset * limit;
    const end = start + limit;
     this.user = this._localstorage.getObject('user_token');
    this.currentId = 0;
    this.current_forklift_id = 0;
    var self = this;
    this.fetchData(function (data) {
      console.log(data);
      var arr = [];
      for (var i = 0; i < data.data.data.length; i++) {
        if (data.data.data[i]['forklift_id'] == 0 || data.data.data[i]['forklift_id'] == self.user.user.id) {
          arr.push(data.data.data[i]);
          self.customData['rows'].push(data.data.data[i]);  
        }
      }
      //self.customData['rows'] = arr;
      self.customData.count = self.customData['rows'].length;
      //self.customData.offset = 0;
      //self.customData.limit = 10;
    },2);
  }
  onPage(event) {
    console.log('Page Event', event);
    this.page(event.offset, event.limit);
  }
  fetch(cb) {
    this
      ._managementService
      .getUsers()
      .subscribe(res => {
        this
          ._logger
          .log("getUsers response");
        this
          ._logger
          .log(res);
        cb(res.data);
      }, err => {
        this
          ._logger
          .error("login error");
        this
          ._logger
          .error(err);
      });
  }

  fetchData(cb,page) {
    this
      .appServie
      .getAllTransporters(page)
      .subscribe(res => {
        this
          ._logger
          .log("getUsers Transports");
        this
          ._logger
          .log(res);
        cb(res);
      }, err => {
        this
          ._logger
          .error("Server Error");
        this
          ._logger
          .error(err);
      })
  }

  openTabs(id, event, forklift_id,row) {
    if(row){
      this.currentTransport = row;
       row.from = 'links'
       this._sharedService.publishData(row);

    }
    if (event == 'edit') {
      this.opentabs = true;
      this.currentId = id;
      this.current_forklift_id = forklift_id;
      return;
    }
    console.log(id);
    var obj = {
      id: id
    }
    this.currentId = id;
    this.current_forklift_id = forklift_id;
    this.appServie.pickAndstart(obj)
      .subscribe(res => {
        this
          ._logger
          .log("pickAndstart Transports");
        this
          ._logger
          .log(res);
        console.log(res);
        this.opentabs = true;
        console.log(res);
      }, err => {
        this
          ._logger
          .error("pickAndstart Error");
        this
          ._logger
          .error(err);
      })

  }

  closeTabs() {
    this.opentabs = false;
  }

  editTransport(obj) {

  }

  onClearHandler() {
    console.log('onclear clicked...');
    this.opentabs = false;
  }

  onSaveHandler(data) {
    console.log('onsave clicked');
    console.log(data);
    var image = this.dataURLtoFile(data, 'a.png')
    console.log(image);
    this.postSignatue(image);
  }
  changeTab(event) {
    if (event == 'back' && this.selectedIndex > 0) {
      this.selectedIndex = this.selectedIndex - 1;
    }
    if (event == 'next' && (this.selectedIndex == 0 || this.selectedIndex > 0)) {
      console.log(this.selectedObject);
      this.selectedIndex = this.selectedIndex + 1;
    }
    this.currentDate = this.getDate();
  }
  currentDate = this.getDate();
  changeListener($event, row): void {
    this.postFile($event.target);
  }

  //send post file to server 
  postFile(inputValue: any): void {
    var formData = new FormData();
    formData.append("picture[]", inputValue.files[0]);
    this.appServie.uploadForkliftImage(formData, this.user.user.id)
      .subscribe(res => {
        this
          ._logger
          .log("postFile Transports");
        this
          ._logger
          .log(res);
        console.log(res);
        this.opentabs = true;
        console.log(res);
      }, err => {
        this
          ._logger
          .error("postFile Error");
        this
          ._logger
          .error(err);
      })
  }


  postSignatue(inputValue): void {
    var formData = new FormData();
    formData.append("signature", inputValue);
    this.appServie.uploadForkliftImage(formData, this.user.user.id)
      .subscribe(res => {
        this
          ._logger
          .log("postSignatue Transports");
        this
          ._logger
          .log(res);
        console.log(res);
        this.closeTabs();
      }, err => {
        this
          ._logger
          .error("postSignatue Error");
        this
          ._logger
          .error(err);
      })
  }

  dataURLtoFile(dataurl, filename) {
    var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
      bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
    while (n--) {
      u8arr[n] = bstr.charCodeAt(n);
    }
    return new File([u8arr], filename, { type: mime });
  }

//   convertDate() {
//     var today = new Date();
//     var day = today.getDate() + "";
//     var month = (today.getMonth() + 1) + "";
//     var year = today.getFullYear() + "";
//     var hour = today.getHours() + "";
//     var minutes = today.getMinutes() + "";
//     var seconds = today.getSeconds() + "";
//     day = this.checkZero(day);
//     month = this.checkZero(month);
//     year = this.checkZero(year);
//     hour = this.checkZero(hour);
//     var minutes = this.checkZero(minutes);
//     seconds = this.checkZero(seconds);
//     console.log(day + "/" + month + "/" + year + " " + hour + ":" + minutes + ":" + seconds);
//     return day + "/" + month + "/" + year + " " + hour + ":" + minutes;
//   }


//  checkZero(data){
//   if(data.length == 1){
//     data = "0" + data;
//   }
//   return data;
// }

 getDate() {
  var date = new Date(),
    year = date.getFullYear(),
    month = (date.getMonth() + 1).toString(),
    formatedMonth = (month.length === 1) ? ("0" + month) : month,
    day = date.getDate().toString(),
    formatedDay = (day.length === 1) ? ("0" + day) : day,
    hour = date.getHours().toString(),
    formatedHour = (hour.length === 1) ? ("0" + hour) : hour,
    minute = date.getMinutes().toString(),
    formatedMinute = (minute.length === 1) ? ("0" + minute) : minute,
    second = date.getSeconds().toString(),
    formatedSecond = (second.length === 1) ? ("0" + second) : second;
  return formatedDay + "." + formatedMonth + "." + year + " | " + formatedHour + ':' + formatedMinute +" Uhr";
}
}
