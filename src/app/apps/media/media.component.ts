import { Component } from '@angular/core';

@Component({
  selector: 'app-media',
  templateUrl: './media.component.html',
  styleUrls: ['./media.component.scss']
})
export class MediaComponent {

  images: any[] = [];
  num = 1;

  constructor() {
    for (this.num; this.num <= 21; this.num += 1) {
      this.images.push(this.num);
    }
  }
}
