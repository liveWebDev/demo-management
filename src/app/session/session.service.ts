import { Injectable } from '@angular/core';
import { Http, Response, Headers, RequestOptions } from '@angular/http';

import { Observable } from 'rxjs/Observable';
import 'rxjs/add/observable/of';
import 'rxjs/add/operator/do';
import 'rxjs/add/operator/delay';
import 'rxjs/Rx';

import { Logger } from "angular2-logger/core";
import { LocalStorage }      from '../libs/localstorage';
import { Config } from '../config/config';

@Injectable()
export class SessionService {

  constructor( private _http: Http, private _localstorage: LocalStorage, private _config: Config, private _logger: Logger) {
    this._logger.log("SessionService constructor called");    
  }

  isLoggedIn: boolean = false;

  // store the URL so we can redirect after logging in
  redirectUrl: string;

  login(formData:Object): Observable<any> {
  	this._logger.log("login called.");

    let headers      = new Headers({ 'Content-Type': 'application/json' }); // ... Set content type to JSON
    let options       = new RequestOptions({ headers: headers }); // Create a request option

    //let url = this._config.getConfig('apiUrl')+"";
    let url = "https://erbium.ch/backend/api/user/login";

    // Extra params
    // formData['grant_type'] = "password";
    // formData['client_id'] = "2";
    // formData['client_secret'] = "m3KtgNAKxq6Cm1WC6cDAXwR0nj3uPMxoRn3Ifr8L";

    return this._http.post(url, formData, options) // ...using post request
    .map((res:Response) => {
      let response = res.json(); // ...and calling .json() on the response to return data
      this._logger.log(response);
      if(response && response.success) {
        this.isLoggedIn = true;

        // store user details and jwt token in local storage to keep user logged in between page refreshes
        this._localstorage.setObject('user_token', response.data);
      }
      return response;
    })
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));    
  }

  register(formData:Object): Observable<any> {
    this._logger.log("register called.");

    let headers      = new Headers({ 'Content-Type': 'application/json' }); // ... Set content type to JSON
    let options       = new RequestOptions({ headers: headers }); // Create a request option

    //let url = this._config.getConfig('apiUrl')+"";
    let url = "https://erbium.ch/backend/api/user/signup";

    // Extra params
    //formData['type'] = "2";
    //formData['api_token'] = "$2y$10$WIHlyATgZScBaSJK.r0OQOtlZK.fypMQd/S1LDUYPNfdMMNqaQnGesse";

    return this._http.post(url, formData, options) // ...using post request
    .map((res:Response) => {
      let response = res.json(); // ...and calling .json() on the response to return data
      this._logger.log(response);
      if(response) {
        this.isLoggedIn = true;

        // store user details and token in local storage to keep user logged in between page refreshes
        this._localstorage.setObject('user', response);
      }
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));    
  }

  forgot(formData:Object): Observable<any> {
    this._logger.log("forgot called.");

    let headers      = new Headers({ 'Content-Type': 'application/json' }); // ... Set content type to JSON
    let options       = new RequestOptions({ headers: headers }); // Create a request option

    //let url = this._config.getConfig('apiUrl')+"";
    let url = "https://erbium.ch/backend/api/user/forgot";

    return this._http.post(url, formData, options) // ...using post request
    .map((res:Response) => {
      let response = res.json(); // ...and calling .json() on the response to return data
      this._logger.log(response);      
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));    
  }

  signout(): boolean {
    // delete user token and object
    this._localstorage.remove('user_token');
    this._localstorage.remove('user');
    return true;
  }
}