import { Routes } from '@angular/router';

import { MapGoogleComponent } from './map-google/map-google.component';
import { MapLeafletComponent } from './map-leaflet/map-leaflet.component';

export const MapRoutes: Routes = [
  {
    path: '',
    children: [{
      path: 'google',
      component: MapGoogleComponent
    }, {
      path: 'leaflet',
      component: MapLeafletComponent
    }]
  }
];
