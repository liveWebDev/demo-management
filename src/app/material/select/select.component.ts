import { Component } from '@angular/core';
import { FormControl } from '@angular/forms';

@Component({
  selector: 'app-select',
  templateUrl: './select.component.html',
  styleUrls: ['./select.component.scss']
})
export class SelectComponent {
  isRequired = false;
  isDisabled = false;
  currentDrink: string;

  drinks = [{
    value: 'coke-0',
    viewValue: 'Coke'
  }, {
    value: 'sprite-1',
    viewValue: 'Sprite'
  }, {
    value: 'water-2',
    viewValue: 'Water'
  }, {
    value: 'pepper-3',
    viewValue: 'Dr. Pepper'
  }, {
    value: 'coffee-4',
    viewValue: 'Coffee'
  }, {
    value: 'tea-5',
    viewValue: 'Tea'
  }, {
    value: 'juice-6',
    viewValue: 'Orange juice'
  }, {
    value: 'wine-7',
    viewValue: 'Wine'
  }, {
    value: 'milk-8',
    viewValue: 'Milk'
  }];
}
