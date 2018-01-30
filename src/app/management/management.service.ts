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
export class ManagementService {

  private _user: Object = null;

  constructor( private _http: Http, private _localstorage: LocalStorage, private _config: Config, private _logger: Logger) {
    this._logger.log("ManegementService constructor called");    
  }

  public setUser(data: any) {
    this._logger.log("setUser data");
    this._logger.log(data);
    return this._user = data;
  }

  public getUser() {
    return this._user;
  }

  public getUsers(): Observable<any> {
    this._logger.log("getUsers called.");

    let url = "https://erbium.ch/backend/api/users";
    let user_token = this._localstorage.getObject('user_token');
    let token = user_token.access_token;

    let headers      = new Headers({ 'Content-Type': 'application/json' }); // ... Set content type to JSON
    headers.append('Authorization', 'Bearer '+token);
    //let options       = new RequestOptions({ headers: headers }); // Create a request option

    return this._http.get(url, {headers: headers})
    .map((res:Response) => {
      let response = res.json();
      this._logger.log(response);
      if(response && response.success) {
        /*let final = [];
        let users = response.data;
        let Arrlength = response.data.length;
        if(Arrlength) {
          for (var i = 0; i < Arrlength; i++) {
            final.push({
              "firstname": users[i].first_name,
              "lastname": users[i].last_name,
              "sbu": users[i].sbu,
              "email": users[i].email,
              "type": users[i].type
            });
          }
          response.data = final;
          this._logger.log(final);
        }*/
      }
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));    
  }

  public updateUser(formData:Object): Observable<any> {
    this._logger.log("updateUser called.");

    let url = "https://erbium.ch/backend/api/user/update/"+formData['id'];
    let user_token = this._localstorage.getObject('user_token');
    let token = user_token.access_token;

    let headers      = new Headers({ 'Content-Type': 'application/json' }); // ... Set content type to JSON
    headers.append('Authorization', 'Bearer '+token);
    let options       = new RequestOptions({ headers: headers });

    return this._http.put(url, formData, options)
    .map((res:Response) => {
      let response = res.json();
      this._logger.log(response);
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));    
  }
}