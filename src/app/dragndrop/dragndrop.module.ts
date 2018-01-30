import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { CommonModule } from '@angular/common';
import { MdIconModule, MdCardModule, MdCheckboxModule, MdListModule } from '@angular/material';
import { FlexLayoutModule } from '@angular/flex-layout';

import { DragulaModule } from 'ng2-dragula/ng2-dragula';

import { DragndropRoutes } from './dragndrop.routing';
import { DragndropComponent } from './dragndrop.component';

@NgModule({
  imports: [
    CommonModule,
    RouterModule.forChild(DragndropRoutes),
    MdIconModule,
    MdCardModule,
    MdCheckboxModule,
    MdListModule,
    FlexLayoutModule,
    DragulaModule
  ],
  declarations: [DragndropComponent]
})

export class DragndropModule {}
