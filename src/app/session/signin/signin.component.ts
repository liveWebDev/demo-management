import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormBuilder, FormGroup, Validators, FormControl } from '@angular/forms';
import { CustomValidators } from 'ng2-validation';
import { Logger } from "angular2-logger/core";
import { SessionService } from '../session.service';

@Component({
  selector: 'app-signin',
  templateUrl: './signin.component.html',
  styleUrls: ['./signin.component.scss']
})
export class SigninComponent implements OnInit {

  public form: FormGroup;
  constructor(private _fb: FormBuilder, private _router: Router, private _logger: Logger, private _sessionService: SessionService) {
    this._logger.log("Signin Constructor!");
  }

  ngOnInit() {
    this.form = this._fb.group ( {
      email: [null , Validators.compose ( [ Validators.required, CustomValidators.email ] )], 
      password: [null , Validators.compose ( [ Validators.required ] )]
    } );
  }

  onSubmit() {
    this._logger.log(this.form.value);
    if (this.form.valid) {
      this._sessionService.login(this.form.value).subscribe(        
        res => {
          this._logger.log("login response");
          this._logger.log(res);
          this._logger.log("this._sessionService.isLoggedIn: "+this._sessionService.isLoggedIn);
          // Navigate to the Redirect URL if exist or to dashboard
          if(this._sessionService.isLoggedIn) {
            let redirectUrl = this._sessionService.redirectUrl || '/home';
            debugger;
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
