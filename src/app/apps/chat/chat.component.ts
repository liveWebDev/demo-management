import { Component } from '@angular/core';

@Component({
  selector: 'app-chat',
  templateUrl: './chat.component.html',
  styleUrls: ['./chat.component.scss']
})
export class ChatComponent {

  // MESSAGE
  selectedMessage: any;
  messages: Object[] = [{
      from: 'Bobby Sullivan',
      photo: 'assets/images/face1.jpg',
      subject: 'Egestas Elit Vestibulum',
    }, {
      from: 'Bryan Morgan',
      photo: 'assets/images/face2.jpg',
      subject: 'Ultricies Sem Cursus',
    }, {
      from: 'Phillip Carroll',
      photo: 'assets/images/face3.jpg',
      subject: 'Condimentum Adipiscing Ultricies',
    }, {
      from: 'Brandon Boyd',
      photo: 'assets/images/face4.jpg',
      subject: 'Commodo Pharetra Egestas',
    }, {
      from: 'Laura Mason',
      photo: 'assets/images/face5.jpg',
      subject: 'Justo Pellentesque Sollicitudin',
    }, {
      from: 'Barbara Chapman',
      photo: 'assets/images/face6.jpg',
      subject: 'Sem Purus Cursus',
    }, {
      from: 'Doris Baker',
      photo: 'assets/images/face7.jpg',
      subject: 'Sollicitudin Mattis Commodo',
    }
  ];

  constructor() {
    this.selectedMessage = this.messages[1];
  }

  isOver(): boolean {
    return window.matchMedia(`(max-width: 960px)`).matches;
  }

  onSelect(message: Object[]): void {
    this.selectedMessage = message;
  }
}
