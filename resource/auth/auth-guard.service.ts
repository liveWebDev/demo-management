import { Injectable }     from '@angular/core';
import { 
	CanActivate, 
	Router, 
	ActivatedRouteSnapshot,
  	RouterStateSnapshot }    from '@angular/router';
//import { LocalStorage }      from '../libs/localstorage';
import { AuthService }      from './auth.service';
import { Logger } from "angular2-logger/core";

@Injectable()
export class AuthGuard implements CanActivate {

	constructor(private _localstorage: LocalStorage, private _authService: AuthService, private _router: Router, private _logger: Logger) {
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
      '/login',
      '/daira/register',
      '/forgotpassword',
      '/password-reset',
      '/daira/confirm-email-link'
    ];

    if (this._authService.isLoggedIn || this._localstorage.get('user')) {
      // already login, redirect to default page
      if (url == '/login' || url == '/daira/register') {
        this._router.navigate(['/daira']);  // r
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
      this._authService.redirectUrl = url;

      this._router.navigate(['/home']);
      // window.location.href = 'login.html';
      return false;
    }
  }

}
