import { Component } from '@angular/core';

@Component({
  selector: 'app-table-pinning',
  templateUrl: './table-pinning.component.html',
  styleUrls: ['./table-pinning.component.scss']
})
export class TablePinningComponent {
  rows = [];

  constructor() {
    this.fetch((data) => {
      this.rows = data;
    });
  }

  fetch(cb) {
    const req = new XMLHttpRequest();
    req.open('GET', `assets/data/100k.json`);

    req.onload = () => {
      cb(JSON.parse(req.response));
    };

    req.send();
  }
}
