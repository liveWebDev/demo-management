import { Injectable } from '@angular/core';
import { Http, Response, Headers, RequestOptions } from '@angular/http';

import { Observable } from 'rxjs/Observable';
import 'rxjs/add/observable/of';
import 'rxjs/add/operator/do';
import 'rxjs/add/operator/delay';
import 'rxjs/Rx';

import { Logger } from "angular2-logger/core";
import { UUID } from 'angular2-uuid';
import { LocalStorage }      from '../libs/localstorage';
import {Config} from '../config/config';

@Injectable()
export class AuthService {

  constructor( private _http: Http, private _localstorage: LocalStorage, private _config: Config, private _logger: Logger) {
    this._logger.log("AuthService constructor called");    
  }

  isLoggedIn: boolean = false;

  // store the URL so we can redirect after logging in
  redirectUrl: string;

  login(formData:Object): Observable<any> {
  	this._logger.log("login called.");

    let headers      = new Headers({ 'Content-Type': 'application/json' }); // ... Set content type to JSON
    let options       = new RequestOptions({ headers: headers }); // Create a request option

    let url = this._config.getConfig('apiUrl')+"daira_api/login";

    // Create UUID if not exist
    let uuid = UUID.UUID();
    formData['uuid'] = uuid;   
    formData['platform_id'] = 1;
    this._localstorage.set('uuid', uuid);

    return this._http.post(url, formData, options) // ...using post request
    .map((res:Response) => {
      let response = res.json(); // ...and calling .json() on the response to return data
      this._logger.log(response);
      if(response && response.status) {
        this.isLoggedIn = true;

        // store user details and jwt token in local storage to keep user logged in between page refreshes
        this._localstorage.setObject('user', response);
      }
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));    
  }

  logout(): Observable<any> {

    this._logger.log("logout called.");

    let headers      = new Headers({ 'Content-Type': 'application/json' }); // ... Set content type to JSON
    let options       = new RequestOptions({ headers: headers }); // Create a request option
    
    let url = this._config.getConfig('apiUrl')+"daira_api/auth/logout";
    let currentUser = this._localstorage.getObject('user');
    this._logger.log(currentUser);
    let token = currentUser.data.user.token;
    this._logger.log(token);

    return this._http.post(url, {"token":token}, options) // ...using post request
    .map((res:Response) => {
      let response = res.json(); // ...and calling .json() on the response to return data
      this._logger.log(response);
      //we have to delete localstorage in any case even in case of db error.
      //if(response && response.status) {
        this.isLoggedIn = false;
        // remove user and uuid from local storage to log user out
        this._localstorage.remove('user');
        this._localstorage.remove('uuid');
      //}
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));
  }

  password_change_request(formData:Object): Observable<any> {
    this._logger.log("forgotpassword called.");

    let headers      = new Headers({ 'Content-Type': 'application/json' }); // ... Set content type to JSON
    let options       = new RequestOptions({ headers: headers }); // Create a request option

    let url = this._config.getConfig('apiUrl')+"daira_api/password_change_request";

    return this._http.post(url, formData, options)
    .map((res:Response) => {
      let response = res.json();
      this._logger.log(response);     
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));    
  }

  password_reset(formData:Object): Observable<any> {
    this._logger.log("forgotpassword called.");

    let headers      = new Headers({ 'Content-Type': 'application/json' }); // ... Set content type to JSON
    let options       = new RequestOptions({ headers: headers }); // Create a request option

    let url = this._config.getConfig('apiUrl')+"daira_api/password_reset";

    return this._http.post(url, formData, options)
    .map((res:Response) => {
      let response = res.json();
      this._logger.log(response);     
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));    
  }
}