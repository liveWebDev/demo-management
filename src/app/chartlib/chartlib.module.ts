import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { CommonModule } from '@angular/common';
import { MdCardModule } from '@angular/material';
import { FlexLayoutModule } from '@angular/flex-layout';

import { ChartsModule } from 'ng2-charts/ng2-charts';
import { ChartlibComponent } from './chartlib.component';
import { ChartlibRoutes } from './chartlib.routing';

@NgModule({
  imports: [
    CommonModule,
    RouterModule.forChild(ChartlibRoutes),
    ChartsModule,
    MdCardModule,
    FlexLayoutModule
   ],
  declarations: [ ChartlibComponent ]
})

export class ChartlibModule {}
