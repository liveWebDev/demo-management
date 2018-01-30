import { Component } from '@angular/core';

@Component({
  selector: 'app-radio',
  templateUrl: './radio.component.html',
  styleUrls: ['./radio.component.scss']
})
export class RadioComponent {

  isDisabled = false;
  isAlignEnd = false;
  favoriteSeason = 'Autumn';
  seasonOptions: string[] = ['Winter', 'Spring', 'Summer', 'Autumn', ];

  constructor() {}
}
