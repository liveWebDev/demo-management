import { Routes } from '@angular/router';

import { UserAddComponent } from './useradd/useradd.component';
import { UserEditComponent } from './useredit/useredit.component';
import { UserListComponent } from './userlist/userlist.component';
import { AuthGuard } from '../authentication/auth-guard.service';

export const MaterialRoutes: Routes = [
  {
    path: '',
    canActivate: [AuthGuard],
    children: [{
      path: 'useradd',
      component: UserAddComponent
    }, {
      path: 'useredit',
      component: UserEditComponent
    }, {
      path: 'userlist',
      component: UserListComponent
    }]
  }
];
