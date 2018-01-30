import { Component } from '@angular/core';

@Component({
  selector: 'app-layout',
  styles: [':host /deep/ .mat-sidenav-content {padding: 0;} .mat-sidenav-container {z-index: 1000}'],
  templateUrl: './auth-layout.component.html'
})
export class AuthLayoutComponent {}
