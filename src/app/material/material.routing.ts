import { Routes } from '@angular/router';

import { ButtonsComponent } from './buttons/buttons.component';
import { CardsComponent } from './cards/cards.component';
import { InputComponent } from './input/input.component';
import { CheckboxComponent } from './checkbox/checkbox.component';
import { RadioComponent } from './radio/radio.component';
import { ToolbarComponent } from './toolbar/toolbar.component';
import { ListsComponent } from './lists/lists.component';
import { GridComponent } from './grid/grid.component';
import { ProgressComponent } from './progress/progress.component';
import { TabsComponent } from './tabs/tabs.component';
import { ToggleComponent } from './toggle/toggle.component';
import { TooltipComponent } from './tooltip/tooltip.component';
import { MenuComponent } from './menu/menu.component';
import { SliderComponent } from './slider/slider.component';
import { SnackbarComponent } from './snackbar/snackbar.component';
import { DialogComponent } from './dialog/dialog.component';
import { SelectComponent } from './select/select.component';
import { AutocompleteComponent } from './autocomplete/autocomplete.component';
import { ChipsComponent } from './chips/chips.component';

export const MaterialRoutes: Routes = [
  {
    path: '',
    children: [{
      path: 'button',
      component: ButtonsComponent
    }, {
      path: 'cards',
      component: CardsComponent
    }, {
      path: 'input',
      component: InputComponent
    }, {
      path: 'checkbox',
      component: CheckboxComponent
    }, {
      path: 'radio',
      component: RadioComponent
    }, {
      path: 'toolbar',
      component: ToolbarComponent
    }, {
      path: 'lists',
      component: ListsComponent
    }, {
      path: 'grid',
      component: GridComponent
    }, {
      path: 'progress',
      component: ProgressComponent
    }, {
      path: 'tabs',
      component: TabsComponent
    }, {
      path: 'switch',
      component: ToggleComponent
    }, {
      path: 'tooltip',
      component: TooltipComponent
    }, {
      path: 'menu',
      component: MenuComponent
    }, {
      path: 'slider',
      component: SliderComponent
    }, {
      path: 'snackbar',
      component: SnackbarComponent
    }, {
      path: 'dialog',
      component: DialogComponent
    }, {
      path: 'select',
      component: SelectComponent
    }, {
      path: 'autocomplete',
      component: AutocompleteComponent
    }, {
      path: 'chips',
      component: ChipsComponent
    }]
  }
];
