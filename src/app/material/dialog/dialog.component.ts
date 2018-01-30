import { Component } from '@angular/core';
import { MdDialog, MdDialogRef, MdDialogConfig } from '@angular/material';

@Component({
  selector: 'app-dialog',
  templateUrl: './dialog.component.html',
  styleUrls: ['./dialog.component.scss']
})
export class DialogComponent {

  dialogRef: MdDialogRef<JazzDialogComponent>;
  lastCloseResult: string;
  config: MdDialogConfig = {
    disableClose: false,
    width: '',
    height: '',
    position: {
      top: '',
      bottom: '',
      left: '',
      right: ''
    }
  };

  constructor(public dialog: MdDialog) {}

  open() {
    this.dialogRef = this.dialog.open(JazzDialogComponent, this.config);
    this.dialogRef.afterClosed().subscribe(result => {
      this.lastCloseResult = result;
      this.dialogRef = null;
    });
  }
}

@Component({
  selector: 'app-jazz-dialog',
  template: `
  <h5 class="mt-0">Maecenas faucibus mollis interdum.</h5>
  <md-input-container>
    <input mdInput placeholder="How much?" #howMuch type="number" style="width: 100%;">
  </md-input-container>
  <p> {{ jazzMessage }} </p>
  <button md-button type="button" (click)="dialogRef.close(howMuch.value)">Close dialog</button>`
})
export class JazzDialogComponent {
  jazzMessage = 'Jazzy jazz jazz';
  constructor(public dialogRef: MdDialogRef <JazzDialogComponent> ) {}
}
