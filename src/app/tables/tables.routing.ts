import { Routes } from '@angular/router';

import { DataTableComponent } from './data-table/data-table.component';
import { TableEditingComponent } from './table-editing/table-editing.component';
import { TableFilterComponent } from './table-filter/table-filter.component';
import { TablePagingComponent } from './table-paging/table-paging.component';
import { TablePinningComponent } from './table-pinning/table-pinning.component';
import { TableSelectionComponent } from './table-selection/table-selection.component';
import { TableSortingComponent } from './table-sorting/table-sorting.component';

export const TablesRoutes: Routes = [
  {
    path: '',
    children: [{
      path: 'fullscreen',
      component: DataTableComponent
    }, {
      path: 'editing',
      component: TableEditingComponent
    }, {
      path: 'filter',
      component: TableFilterComponent
    }, {
      path: 'paging',
      component: TablePagingComponent
    }, {
      path: 'pinning',
      component: TablePinningComponent
    }, {
      path: 'selection',
      component: TableSelectionComponent
    }, {
      path: 'sorting',
      component: TableSortingComponent
    }]
  }
];
