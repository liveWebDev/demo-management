import { Component } from '@angular/core';

@Component({
  selector: 'app-lists',
  templateUrl: './lists.component.html',
  styleUrls: ['./lists.component.scss']
})
export class ListsComponent {

  todos: Object[] = [{
    finished: true,
    name: 'Learn Angular 2.0',
  }, {
    finished: true,
    name: 'Learn Angular Material 2.0',
  }, {
    finished: false,
    name: 'Build examples',
  }, {
    finished: false,
    name: 'Documentation',
  }, {
    finished: false,
    name: 'Write about your findings',
  }, {
    finished: false,
    name: 'Contribute back to the community',
  }];

  items: string[] = ['Pepper', 'Salt', 'Paprika'];

  contacts: any[] = [{
    name: 'Nancy',
    headline: 'Software engineer'
  }, {
    name: 'Mary',
    headline: 'TPM'
  }, {
    name: 'Bobby',
    headline: 'UX designer'
  }];

  messages: any[] = [{
    from: 'Nancy',
    subject: 'Brunch?',
    message: 'Did you want to go on Sunday? I was thinking that might work.',
    image: 'https://angular.io/resources/images/bios/julie-ralph.jpg'
  }, {
    from: 'Mary',
    subject: 'Summer BBQ',
    message: 'Wish I could come, but I have some prior obligations.',
    image: 'https://angular.io/resources/images/bios/juleskremer.jpg'
  }, {
    from: 'Bobby',
    subject: 'Oui oui',
    message: 'Do you have Paris reservations for the 15th? I just booked!',
    image: 'https://angular.io/resources/images/bios/jelbourn.jpg'
  }];

  links: any[] = [{
    name: 'Inbox'
  }, {
    name: 'Outbox'
  }, {
    name: 'Spam'
  }, {
    name: 'Trash'
  }];

  thirdLine = false;
  infoClicked = false;

  constructor() {}
}
