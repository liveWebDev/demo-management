import { Component } from '@angular/core';

@Component({
  selector: 'app-progress',
  templateUrl: './progress.component.html',
  styleUrls: ['./progress.component.scss']
})
export class ProgressComponent {

  progressValue = 40;
  determinateProgressValue = 30;
  bufferProgressValue = 30;
  bufferBufferValue = 40;

  step(val: number) {
    this.progressValue += val;
  }

  stepDeterminateProgressVal(val: number) {
    this.determinateProgressValue += val;
  }

  stepBufferProgressVal(val: number) {
    this.bufferProgressValue += val;
  }

  stepBufferBufferVal(val: number) {
    this.bufferBufferValue += val;
  }

  constructor() { }
}
