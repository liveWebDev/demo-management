import { Inject, Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Observable } from 'rxjs/Rx';
import { environment } from '../../environments/environment';
    

@Injectable()
export class Config {

    private config: Object = null;
    private env:    Object = null;


    constructor(private http: Http) {
    }

    /**
     * Use to get the data found in the second file (config file)
     */
     public getConfig(key: any) {
         return this.config[key];
     }

    /**
     * Use to get the data found in the first file (env file)
     */
     public getEnv(key: any) {
         return this.env[key];
     }

    /**
     * This method:
     *   a) Loads "[env].json" to get all env's variables (e.g.: 'development.json')
     *   b) Load data in config object
     */
     public load() {
         return new Promise((resolve, reject) => {

             let ENV = 'development';
             if (environment.production) {
                 ENV = "production";
             }

             let request:any = null;

             switch (ENV) {
                 case 'production': {
                     request = this.http.get('src/app/config/' + ENV + '.json');
                 } break;

                 case 'development': {
                     request = this.http.get('src/app/config/' + ENV + '.json');
                 } break;

                 case 'default': {
                     console.error('Environment file is not set or invalid');
                     resolve(true);
                 } break;
             }

             if (request) {
                 request
                 .map( res => res.json() )
                 .catch((error: any) => {
                     console.error('Error reading ' + ENV + ' configuration file');
                     resolve(error);
                     return Observable.throw(error.json().error || 'Server error');
                 })
                 .subscribe((responseData) => {
                     this.config = responseData;
                     resolve(true);
                 });
             } else {
                 console.error('Env config file "env.json" is not valid');
                 resolve(true);
             }                

         });
     }
 }