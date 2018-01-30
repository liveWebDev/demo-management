import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormBuilder, FormGroup, Validators, FormControl } from '@angular/forms';
import { CustomValidators } from 'ng2-validation';
import { Logger } from "angular2-logger/core";
import { SessionService } from '../session.service';

const password = new FormControl('', Validators.required);
const confirmPassword = new FormControl('', CustomValidators.equalTo(password));

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.scss']
})
export class SignupComponent implements OnInit {

  public form: FormGroup;
  constructor(private _fb: FormBuilder, private _router: Router, private _logger: Logger, private _sessionService: SessionService) {
    this._logger.log("Signup Constructor!");
  }

  ngOnInit() {
    this.form = this._fb.group( {
      first_name: [null, Validators.compose([Validators.required])],
      last_name: [null, Validators.compose([Validators.required])],
      email: [null, Validators.compose([Validators.required, CustomValidators.email])],
      password: password,
      confirmPassword: confirmPassword,
      //type: [null, Validators.compose([Validators.required])],
      //language: [null, Validators.compose([Validators.required])],
    } );
  }

  onSubmit() {
    this._logger.log(this.form.value);
    if (this.form.valid) {
      this.form.value['type'] = 1;
      this.form.value['language'] = 'EN';
      this.form.value['timezone'] = 'gmt+5';
      this.form.value['sbu'] = 'test';
      this.form.value['encryption'] = 'test';
      this.form.value['license'] = 'test';
      this.form.value['cdn'] = 'test';
      this._sessionService.register(this.form.value).subscribe(        
        res => {
          this._logger.log("register response");
          this._logger.log(res);
          this._logger.log("this._sessionService.isLoggedIn: "+this._sessionService.isLoggedIn);
          // Navigate to the Redirect URL if exist or to dashboard
          if(this._sessionService.isLoggedIn) {
            let redirectUrl = this._sessionService.redirectUrl || '/home';
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
