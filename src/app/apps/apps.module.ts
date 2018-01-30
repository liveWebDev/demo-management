import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { CommonModule } from '@angular/common';
/*import {
  MdToolbarModule,
  MdIconModule,
  MdCardModule,
  MdInputModule,
  MdButtonModule,
  MdButtonToggleModule,
  MdListModule, MdGridListModule,
  MdMenuModule,
  MdSidenavModule,
  MdProgressBarModule,
  MdTabsModule,
  MdDialogModule } from '@angular/material';*/
import { MaterialModule } from '@angular/material';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { FlexLayoutModule } from '@angular/flex-layout';
import { NgxDatatableModule } from '@swimlane/ngx-datatable';
import { SignaturePadModule } from 'angular2-signature-pad';
// import { NKDatetimeModule } from 'ng2-datetime/ng2-datetime';


// import { CalendarModule, CalendarDateFormatter } from 'angular-calendar';
// import { ChartsModule } from 'ng2-charts/ng2-charts';

import { AppsRoutes } from './apps.routing';
import { TransportComponent } from './transport/transport.component';
/*import { FullcalendarComponent } from './fullcalendar/fullcalendar.component';
import { MailComponent } from './mail/mail.component';
import { MediaComponent } from './media/media.component';
import { ChatComponent } from './chat/chat.component';
import { SocialComponent } from './social/social.component';*/
import { SharedModule } from '../shared/shared.module';
import { LinksComponent } from './links/links.component';

@NgModule({
  imports: [
    CommonModule,
    SharedModule,
    RouterModule.forChild(AppsRoutes),
    MaterialModule,
     SignaturePadModule,
    /*MdToolbarModule,
    MdIconModule,
    MdCardModule,
    MdInputModule,
    MdButtonModule,
    MdButtonToggleModule,
    MdListModule,
    MdGridListModule,
    MdMenuModule,
    MdSidenavModule,
    MdProgressBarModule,
    MdTabsModule,
    MdDialogModule,*/
    //CalendarModule.forRoot(),
    FormsModule,
    ReactiveFormsModule,
    FlexLayoutModule,
    NgxDatatableModule
   
    //ChartsModule
  ],
  declarations: [
    TransportComponent,
    LinksComponent
    /*FullcalendarComponent,
    MailComponent,
    MediaComponent,
    ChatComponent,
    SocialComponent*/
  ]
})

export class AppsModule {}
