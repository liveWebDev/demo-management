import { Routes } from '@angular/router';

import { TransportComponent } from './transport/transport.component';
// import { LinksComponent } from "./links/links.component";
/*import { FullcalendarComponent } from './fullcalendar/fullcalendar.component';
import { MediaComponent } from './media/media.component';
import { MailComponent } from './mail/mail.component';
import { SocialComponent } from './social/social.component';
import { ChatComponent } from './chat/chat.component';*/


export const AppsRoutes: Routes = [{
  path: '',
  children: [{
    path: 'transport',
    component: TransportComponent
  }
  /*, {
    path: 'calendar',
    component: FullcalendarComponent
  }, {
    path: 'messages',
    component: MailComponent
  }, {
    path: 'media',
    component: MediaComponent
  }, {
    path: 'chat',
    component: ChatComponent
  }, {
    path: 'social',
    component: SocialComponent
  }*/]
}];
