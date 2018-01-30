import {Component} from '@angular/core';
import {Router}    from '@angular/router';
import {Location} from '@angular/common';
import {FormGroup, AbstractControl, FormBuilder, Validators} from '@angular/forms';
import { BaImageLoaderService, BaThemePreloader, BaThemeSpinner } from '../theme/services';
import { Logger } from "angular2-logger/core";
import { AuthService } from '../auth/auth.service';

import 'style-loader!./login.scss';

@Component({
  selector: 'login',
  templateUrl: './login.html',
})
export class Login {

  public form:FormGroup;
  public email:AbstractControl;
  public password:AbstractControl;
  public submitted:boolean = false;
  public message:string;
  constructor(fb:FormBuilder, 
    private _router: Router, 
    private _authService: AuthService, 
    private _logger: Logger, 
    private _spinner: BaThemeSpinner) {
    
    this._logger.log("constructor called");    

    this.form = fb.group({
      'email': ['', Validators.compose([Validators.required, Validators.minLength(3)])],
      'password': ['', Validators.compose([Validators.required, Validators.minLength(3)])]
    });

    this.email = this.form.controls['email'];
    this.password = this.form.controls['password'];
  }

  ngOnInit() {
    this._logger.log("ngOnInit called");    
  }

  public onSubmit(formData:Object):void {
    this.submitted = true;
    if (this.form.valid) {
      // your code goes here
      this._logger.log(formData);
      this._authService.login(formData).subscribe(        
        res => {
          this._logger.log("login response");
          this._logger.log(res);
          this.message = res.message;
          this._logger.log("this._authService.isLoggedIn: "+this._authService.isLoggedIn);
          // Navigate to the Redirect URL if exist or to dashboard
          if(this._authService.isLoggedIn) {
            let redirectUrl = this._authService.redirectUrl || '/daira';
            this._router.navigate([redirectUrl]);
          }
          return false;
        },
        err => {
          this._logger.error("login error");
          this._logger.error(err);
        }
        );
    }
  }
}
