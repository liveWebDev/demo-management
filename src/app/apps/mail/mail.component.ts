import { Component, OnInit } from '@angular/core';

import { Message } from './message';
import { MailService } from './mail.service';

import * as Ps from 'perfect-scrollbar';

@Component({
  selector: 'app-mail',
  templateUrl: './mail.component.html',
  styleUrls: ['./mail.component.scss'],
  providers: [MailService]
})
export class MailComponent implements OnInit {

  messages: Message[];
  selectedMessage: Message;

  constructor(private mailService: MailService) { }

  ngOnInit(): void {
    this.getMessages();

    const elemSidebar = <HTMLElement>document.querySelector('.app-inner .mail-sidebar');
    const elemContent = <HTMLElement>document.querySelector('.app-inner .main-content');

    if (window.matchMedia(`(min-width: 960px)`).matches && !this.isMac()) {
      Ps.initialize(elemSidebar, { wheelSpeed: 2, suppressScrollX: true });
      Ps.initialize(elemContent, { wheelSpeed: 2, suppressScrollX: true });
    }
  }

  isOver(): boolean {
    return window.matchMedia(`(max-width: 960px)`).matches;
  }

  isMac(): boolean {
    let bool = false;
    if (navigator.platform.toUpperCase().indexOf('MAC') >= 0 || navigator.platform.toUpperCase().indexOf('IPAD') >= 0) {
      bool = true;
    }
    return bool;
  }

  getMessages(): void {
    this.mailService.getMessages().then(messages => this.messages = messages);
  }

  onSelect(message: Message): void {
    this.selectedMessage = message;
  }
}
