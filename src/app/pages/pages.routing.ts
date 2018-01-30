import { Routes } from '@angular/router';

import { BlankComponent } from './blank/blank.component';
import { InvoiceComponent } from './invoice/invoice.component';
import { TimelineComponent } from './timeline/timeline.component';
import { EditComponent } from './edit/edit.component';
import { PricingComponent } from './pricing/pricing.component';

export const PagesRoutes: Routes = [
  {
    path: '',
    children: [{
      path: 'blank',
      component: BlankComponent
    }, {
      path: 'invoice',
      component: InvoiceComponent
    }, {
      path: 'timeline',
      component: TimelineComponent
    }, {
      path: 'user',
      component: EditComponent
    }, {
      path: 'pricing',
      component: PricingComponent
    }]
  }
];
