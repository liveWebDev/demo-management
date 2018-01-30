import { Routes } from '@angular/router';

import { FormUploadComponent } from './form-upload/form-upload.component';
import { FormValidationComponent } from './form-validation/form-validation.component';
import { FormTreeComponent } from './form-tree/form-tree.component';
import { EditorComponent } from './editor/editor.component';

export const FormRoutes: Routes = [
  {
    path: '',
    children: [{
      path: 'upload',
      component: FormUploadComponent
    }, {
      path: 'validation',
      component: FormValidationComponent
    }, {
      path: 'editor',
      component: EditorComponent
    }, {
      path: 'tree',
      component: FormTreeComponent
    }]
  }
];
