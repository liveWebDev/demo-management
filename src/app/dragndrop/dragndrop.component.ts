import { Component } from '@angular/core';

@Component({
  selector: 'app-dragndrop',
  templateUrl: './dragndrop.component.html',
  styleUrls: ['./dragndrop.component.scss']
})
export class DragndropComponent {

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
  }, ];

  links: any[] = [{
    name: 'Inbox'
  }, {
    name: 'Outbox'
  }, {
    name: 'Spam'
  }, {
    name: 'Priority'
  }, {
    name: 'Drafts'
  }, {
    name: 'Trash'
  }];

  constructor() {}
}
