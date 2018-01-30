import { Component, OnInit, OnDestroy, ViewChild, HostListener } from '@angular/core';
import { Router, NavigationEnd } from '@angular/router';
import { MenuItems } from '../../shared/menu-items/menu-items';
import { Subscription } from 'rxjs/Subscription';

import { TranslateService } from 'ng2-translate/ng2-translate';
import * as Ps from 'perfect-scrollbar';
import { Logger } from "angular2-logger/core";

import { SessionService } from '../../session/session.service';
import { LocalStorage }      from '../../libs/localstorage';

@Component({
  selector: 'app-layout',
  templateUrl: './admin-layout.component.html'
})
export class AdminLayoutComponent implements OnInit, OnDestroy {

  private _router: Subscription;
  myMenu: any[];
  today: number = Date.now();
  url: string;
  showSettingsBtn = false;
  showSettings = false;
  dark: boolean;
  boxed: boolean;
  collapseSidebar: boolean;
  compactSidebar: boolean;
  currentLang = 'en';
  root = 'ltr';

  @ViewChild('sidemenu') sidemenu;

  constructor(
    private router: Router, 
    public menuItems: MenuItems, 
    public translate: TranslateService, 
    private _sessionService: SessionService, 
    private _logger: Logger,
    private _localstorage: LocalStorage ) {

    const browserLang: string = translate.getBrowserLang();
    translate.use(browserLang.match(/en|fr/) ? browserLang : 'en');
  }

  ngOnInit(): void {

    // Update sidebar menu based on user permission
    this.implementACl();

    const elemSidebar = <HTMLElement>document.querySelector('.app-inner > .sidebar-panel');
    const elemContent = <HTMLElement>document.querySelector('.app-inner > .mat-sidenav-content');

    if (window.matchMedia(`(min-width: 960px)`).matches && !this.isMac() && !this.compactSidebar) {
      Ps.initialize(elemSidebar, { wheelSpeed: 2, suppressScrollX: true });
      Ps.initialize(elemContent, { wheelSpeed: 2, suppressScrollX: true });
    }

    this._router = this.router.events.filter(event => event instanceof NavigationEnd).subscribe((event: NavigationEnd) => {
      this.url = event.url;
      if (this.isOver()) {
        this.sidemenu.close();
      }

      if (window.matchMedia(`(min-width: 960px)`).matches && !this.isMac() && !this.compactSidebar) {
        Ps.update(elemContent);
      }
    });
  }

  @HostListener('click', ['$event'])
  onClick(e: any) {
    const elemSidebar = <HTMLElement>document.querySelector('.app-inner > .sidebar-panel');
    setTimeout(() => {
      if (window.matchMedia(`(min-width: 960px)`).matches && !this.isMac() && !this.compactSidebar) {
        Ps.update(elemSidebar);
      }
    }, 350);
  }

  ngOnDestroy() {
    this._router.unsubscribe();
  }

  implementACl(): void {
    let user_token = this._localstorage.getObject('user_token');
    let myMenu = this.menuItems.getAll();
    myMenu.forEach(function(value: any, index: number){
      // set default display value to TRUE
      value['display'] = true;
      // Set display values for sub menu
      if(value['type'] == "sub") {
        value['children'].forEach(function(val: any, i: number){
          val['display'] = true;
        });
      }

      // State specific ACL
      if(value['state'] == "management") {

        // set TRUE or FALSE based on user type
        if(user_token.user.type > 2) {
          value['display'] = false;
          // Set display values for sub menu
          if(value['type'] == "sub") {
            value['children'].forEach(function(val: any, i: number){
              val['display'] = false;
            });
          }        
        }
        
      }


    });
    this.myMenu = myMenu;
  }

  isOver(): boolean {
    if (this.url === '/apps/messages' || this.url === '/apps/calendar' || this.url === '/apps/media' || this.url === '/maps/leaflet') {
      return true;
    } else {
      return window.matchMedia(`(max-width: 960px)`).matches;
    }
  }

  isMac(): boolean {
    let bool = false;
    if (navigator.platform.toUpperCase().indexOf('MAC') >= 0 || navigator.platform.toUpperCase().indexOf('IPAD') >= 0) {
      bool = true;
    }
    return bool;
  }

  menuMouseOver(): void {
    if (window.matchMedia(`(min-width: 960px)`).matches && this.collapseSidebar) {
      this.sidemenu.mode = 'over';
    }
  }

  menuMouseOut(): void {
    if (window.matchMedia(`(min-width: 960px)`).matches && this.collapseSidebar) {
      this.sidemenu.mode = 'side';
    }
  }

  addMenuItem(): void {
    this.menuItems.add({
      state: 'menu',
      name: 'MENU',
      type: 'sub',
      icon: 'trending_flat',
      children: [
      {state: 'menu', name: 'MENU'},
      {state: 'timelmenuine', name: 'MENU'}
      ]
    });
  }

  signout(): void {
    this._logger.log("signout called");
    if(this._sessionService.signout()) {
      // Navigate to the signin page
      this.router.navigate(['/session/signin']);
    }
  }
}
