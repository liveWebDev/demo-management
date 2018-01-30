import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { RouterModule } from '@angular/router';
import { NgModule, APP_INITIALIZER } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule, Http } from '@angular/http';
import { SignaturePadModule } from 'angular2-signature-pad';



import { TranslateModule, TranslateLoader, TranslateStaticLoader } from 'ng2-translate/ng2-translate';
import { MaterialModule } from '@angular/material';
import { FlexLayoutModule } from '@angular/flex-layout';
import { Logger, Options as LoggerOptions, Level as LoggerLevel } from "angular2-logger/core";

import { JazzDialogComponent } from './material/dialog/dialog.component';
import { CalendarDialogComponent } from './apps/fullcalendar/fullcalendar.component';

import { AppRoutes } from './app.routing';
import { AppComponent } from './app.component';
import { AdminLayoutComponent } from './layouts/admin/admin-layout.component';
import { AuthLayoutComponent } from './layouts/auth/auth-layout.component';

// Common Module
import { SharedModule } from './shared/shared.module';
import { Config } from './config/config';
import { LocalStorage } from './libs/localstorage';
import { SessionService } from './session/session.service';
import { ManagementService } from './management/management.service';
import { AppsService } from './apps/apps.service';
import { AuthGuard } from './authentication/auth-guard.service';
import { SharedService } from './apps/shared.service';


export function createTranslateLoader(http: Http) {
  return new TranslateStaticLoader(http, './assets/i18n', '.json');
}

@NgModule({
  declarations: [
    AppComponent,
    AdminLayoutComponent,
    AuthLayoutComponent,
    JazzDialogComponent,
    CalendarDialogComponent
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    SharedModule,
    RouterModule.forRoot(AppRoutes),
    FormsModule,
    SignaturePadModule,
    HttpModule,
    TranslateModule.forRoot({
      provide: TranslateLoader,
      useFactory: (createTranslateLoader),
      deps: [Http]
    }),
    MaterialModule,
    FlexLayoutModule
      ],
  providers: [
    Logger,
    { provide: LoggerOptions, useValue: { level: LoggerLevel.LOG } },
    LocalStorage,
    Config,
    //{ provide: APP_INITIALIZER, useFactory: (config: Config) => () => config.load(), deps: [Config], multi: true },
    SessionService,
    ManagementService,
    AppsService,
    AuthGuard,
    SharedService
  ],
  entryComponents: [ JazzDialogComponent, CalendarDialogComponent ],
  bootstrap: [AppComponent]
})
export class AppModule { }
