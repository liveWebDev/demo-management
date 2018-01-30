import { Injectable }     from '@angular/core';
import { 
	CanActivate, 
	Router, 
	ActivatedRouteSnapshot,
  	RouterStateSnapshot }    from '@angular/router';
import { LocalStorage }      from '../libs/localstorage';
import { SessionService }      from '../session/session.service';
import { Logger } from "angular2-logger/core";

@Injectable()
export class AuthGuard implements CanActivate {

	constructor(private _localstorage: LocalStorage, private _sessionService: SessionService, private _router: Router, private _logger: Logger) {
		this._logger.log('AuthGuard#constructor');
	}


  canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot): boolean {
    this._logger.log(route);
    this._logger.log(state);
    let url: string = state.url;
    this._logger.log(url);

    return this.checkLogin(url);
  }

  checkLogin(url: string): boolean {
    let isUnProtected: boolean = false;
    // Array fo all un protected routes
    let unProtectedRoutes = [
      '/session/signin',
      '/session/forgot'
    ];
    this._logger.log(this._sessionService.isLoggedIn);
    this._logger.log(this._localstorage.getObject('user_token'));

    if (this._sessionService.isLoggedIn || Object.keys(this._localstorage.getObject('user_token')).length) {
      // already login, redirect to default page
      if (url == '/session/signin' || url == '/session/forgot') {
        this._router.navigate(['/home']);  // r
        // window.location.href = 'index.html';
        return false;
      }

      return true;
    }
    
    // not login; check if url is unprotected
    unProtectedRoutes.forEach(function(current_value, index, initial_array) {
        if (current_value == url) {
            isUnProtected = true;
        }        
    });

    if (isUnProtected) {
      return true;
    }
    // restrict the page
    else {
      // Store the attempted URL for redirecting
      this._sessionService.redirectUrl = url;

      this._router.navigate(['/session/signin']);
      // window.location.href = 'login.html';
      return false;
    }
  }

}
