import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { HttpModule } from '@angular/http';
import { CommonModule } from '@angular/common';
import { MaterialModule } from '@angular/material';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { FlexLayoutModule } from '@angular/flex-layout';

import 'hammerjs';

import { NgxDatatableModule } from '@swimlane/ngx-datatable';

import { MaterialRoutes } from './management.routing';
import { UserAddComponent } from './useradd/useradd.component';
import { UserEditComponent } from './useredit/useredit.component';
import { UserListComponent } from './userlist/userlist.component';
import { AuthGuard } from '../authentication/auth-guard.service';

@NgModule({
  imports: [
    CommonModule,
    RouterModule.forChild(MaterialRoutes),
    MaterialModule,
    HttpModule,
    FormsModule,
    ReactiveFormsModule,
    FlexLayoutModule,
    NgxDatatableModule
  ],
  declarations: [
    UserAddComponent,
    UserEditComponent,
    UserListComponent
  ],
})

export class ManagementComponentsModule {}
