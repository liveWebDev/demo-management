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
export class AppsService {
  public remoteUrl ="http://erbium.ch/backend/api/";
  constructor( 
    private _http: Http, 
    private _localstorage: LocalStorage, 
    private _config: Config, 
    private _logger: Logger) {
    this._logger.log("AppsService constructor called");    
  }

  public getAllTransporters(page:string): Observable<any> {
    this._logger.log("getUsers called.");

    let url = this.remoteUrl+"transports?page="+page;
    let user_token = this._localstorage.getObject('user_token');
    let token = user_token.access_token;

    let headers      = new Headers({ 'Content-Type': 'application/json' }); // ... Set content type to JSON
    headers.append('Authorization', 'Bearer '+token);
    //let options       = new RequestOptions({ headers: headers }); // Create a request option

    return this._http.get(url, {headers: headers})
    .map((res:Response) => {
      let response = res.json();
      this._logger.log(response);
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));    
  }

  public getTransporter(formData:Object): Observable<any> {
    this._logger.log("getUsers called.");

    let url = this.remoteUrl+"transports/"+formData['id'];
    let user_token = this._localstorage.getObject('user_token');
    let token = user_token.access_token;

    let headers      = new Headers({ 'Content-Type': 'application/json' }); // ... Set content type to JSON
    headers.append('Authorization', 'Bearer '+token);
    //let options       = new RequestOptions({ headers: headers }); // Create a request option

    return this._http.get(url, {headers: headers})
    .map((res:Response) => {
      let response = res.json();
      this._logger.log(response);
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));    
  }

  public addTransporter(formData:Object): Observable<any> {
    this._logger.log("addTransporter called.");

    let url = this.remoteUrl+"transports";
    let user_token = this._localstorage.getObject('user_token');
    let token = user_token.access_token;

    let headers      = new Headers({ 'Content-Type': 'application/json' }); // ... Set content type to JSON
    headers.append('Authorization', 'Bearer '+token);
    let options       = new RequestOptions({ headers: headers });
    formData['user_id'] = user_token.user.id;
    
    return this._http.post(url, formData, options)
    .map((res:Response) => {
      let response = res.json();
      this._logger.log(response);
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));    
  }

  public updateTransporter(formData:Object): Observable<any> {
    this._logger.log("addTransporter called.");

    let url = this.remoteUrl+"transports/"+formData['id'];
    let user_token = this._localstorage.getObject('user_token');
    let token = user_token.access_token;

    let headers      = new Headers({ 'Content-Type': 'application/json' }); // ... Set content type to JSON
    headers.append('Authorization', 'Bearer '+token);
    let options       = new RequestOptions({ headers: headers });
    formData['_method'] = "PUT";
    formData['user_id'] =  user_token.user.id;    
    return this._http.post(url, formData, options)
    .map((res:Response) => {
      let response = res.json();
      this._logger.log(response);
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));    
  }

  public pickAndstart(formData:Object): Observable<any> {
    this._logger.log("pickAndstart called.");
    let url = this.remoteUrl+"transports/pick-start/"+formData['id'];
    let user_token = this._localstorage.getObject('user_token');
    let token = user_token.access_token;
    let headers      = new Headers({ 'Content-Type': 'application/json' }); // ... Set content type to JSON
    headers.append('Authorization', 'Bearer '+token);
    let options       = new RequestOptions({ headers: headers });
    formData['forklift_id'] = user_token.user['id'];
    return this._http.post(url, formData, options)
    .map((res:Response) => {
      let response = res.json();
      this._logger.log(response);
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));
  }

  public getRamps (): Observable<any>{
      this._logger.log("getRamps called.");

    let url = this.remoteUrl+"rampe";
    let user_token = this._localstorage.getObject('user_token');
    let token = user_token.access_token;

    let headers      = new Headers({ 'Content-Type': 'application/json' }); // ... Set content type to JSON
    headers.append('Authorization', 'Bearer '+token);
    return this._http.get(url,{headers: headers})
    .map((res:Response) => {
      let response = res.json();
      this._logger.log(response);
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));
  }

  public getForkLift (): Observable<any>{
      this._logger.log("getRamps called.");

    let url = this.remoteUrl+"forklifts";
    let user_token = this._localstorage.getObject('user_token');
    let token = user_token.access_token;

    let headers      = new Headers({ 'Content-Type': 'application/json' }); // ... Set content type to JSON
    headers.append('Authorization', 'Bearer '+token);
    return this._http.get(url,{headers: headers})
    .map((res:Response) => {
      let response = res.json();
      this._logger.log(response);
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));
  }

  public updateForklist (formData): Observable<any>{
    this._logger.log("pickAndstart called.");
    let url = this.remoteUrl+"forklifts/"+formData['id'];
    let user_token = this._localstorage.getObject('user_token');
    let token = user_token.access_token;
    let headers      = new Headers({ 'Content-Type': 'application/json' }); // ... Set content type to JSON
    headers.append('Authorization', 'Bearer '+token);
    let options       = new RequestOptions({ headers: headers });
    formData['forklift_id'] = user_token.user['id'];
    return this._http.post(url, formData, options)
    .map((res:Response) => {
      let response = res.json();
      this._logger.log(response);
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));
  }

  public uploadForkliftImage (formData,id): Observable<any>{
     this._logger.log("pickAndstart called.");
    let url = this.remoteUrl+"forklifts/images-update/"+id;
    let user_token = this._localstorage.getObject('user_token');
    let token = user_token.access_token;
    let headers      = new Headers({ 'Content-Type': 'multipart/form-data' }); // ... Set content type to JSON
    headers.append('Authorization', 'Bearer '+token);
    let options       = new RequestOptions({ headers: headers });
    //formData['picture'] = [formData['picture']];
    return this._http.post(url, formData, options)
    .map((res:Response) => {
      let response = res.json();
      this._logger.log(response);
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));
  }


  public uploadForkliftSignature (formData,id): Observable<any>{
     this._logger.log("pickAndstart called.");
    let url = this.remoteUrl+"forklifts/update/signature/"+id;
    let user_token = this._localstorage.getObject('user_token');
    let token = user_token.access_token;
    let headers      = new Headers({ 'Content-Type': undefined, withCredentials:true}); // ... Set content type to JSON
    headers.append('Authorization', 'Bearer '+token);
    let options       = new RequestOptions({ headers: headers });
    return this._http.post(url, formData, options)
    .map((res:Response) => {
      let response = res.json();
      this._logger.log(response);
      return response;
    }) 
    .catch((error:any) => Observable.throw(error.json().error || 'Server error'));
  }

}