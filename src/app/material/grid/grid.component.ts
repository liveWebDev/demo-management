import { Component } from '@angular/core';

@Component({
  selector: 'app-grid',
  templateUrl: './grid.component.html',
  styleUrls: ['./grid.component.scss']
})
export class GridComponent {

  tiles: any[] = [{
    text: 'One',
    cols: 3,
    rows: 1,
    color: 'lightblue'
  }, {
    text: 'Two',
    cols: 1,
    rows: 2,
    color: 'lightgreen'
  }, {
    text: 'Three',
    cols: 1,
    rows: 1,
    color: 'lightpink'
  }, {
    text: 'Four',
    cols: 2,
    rows: 1,
    color: '#DDBDF1'
  }];

  dogs: Object[] = [{
    name: 'Porter',
    human: 'Kara'
  }, {
    name: 'Mal',
    human: 'Jeremy'
  }, {
    name: 'Koby',
    human: 'Igor'
  }, {
    name: 'Razzle',
    human: 'Ward'
  }, {
    name: 'Molly',
    human: 'Rob'
  }, {
    name: 'Husi',
    human: 'Matias'
  }];

  basicRowHeight = 80;
  fixedCols = 4;
  fixedRowHeight = 200;
  ratioGutter = 1;
  fitListHeight = '400px';
  ratio = '4:1';

  addTileCols() {
    this.tiles[2].cols++;
  }

  constructor() {}
}
