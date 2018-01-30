import { Routes } from '@angular/router';

import { DashboardComponent } from './dashboard.component';
import { AuthGuard } from '../authentication/auth-guard.service';


export const DashboardRoutes: Routes = [{
  path: '',
  canActivate: [AuthGuard],
  component: DashboardComponent
}];
