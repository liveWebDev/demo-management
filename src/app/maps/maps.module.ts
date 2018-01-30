import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { CommonModule } from '@angular/common';
import { MdCardModule, MdToolbarModule, MdTabsModule } from '@angular/material';
import { FormsModule } from '@angular/forms';
import { FlexLayoutModule } from '@angular/flex-layout';

import { AgmCoreModule } from 'angular2-google-maps/core';

import { MapRoutes } from './maps.routing';
import { MapGoogleComponent } from './map-google/map-google.component';
import { MapLeafletComponent } from './map-leaflet/map-leaflet.component';

@NgModule({
  imports: [
    CommonModule,
    RouterModule.forChild(MapRoutes),
    MdCardModule,
    MdToolbarModule,
    MdTabsModule,
    FormsModule,
    FlexLayoutModule,
    AgmCoreModule.forRoot({apiKey: 'YOURAPIKEY'})
  ],
  declarations: [
    MapGoogleComponent,
    MapLeafletComponent
  ]
})

export class MapModule {}
