import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormBuilder, FormGroup, Validators, FormControl } from '@angular/forms';
import { CustomValidators } from 'ng2-validation';
import { Logger } from "angular2-logger/core";
import { SessionService } from '../session.service';

@Component({
  selector: 'app-forgot',
  templateUrl: './forgot.component.html',
  styleUrls: ['./forgot.component.scss']
})
export class ForgotComponent implements OnInit {

  public form: FormGroup;
  constructor(private _fb: FormBuilder, private _router: Router, private _logger: Logger, private _sessionService: SessionService) {
    this._logger.log("Forgot Constructor!");
  }

  ngOnInit() {
    this.form = this._fb.group ( {
      email: [ null, Validators.compose( [ Validators.required, CustomValidators.email ] ) ]
    } );
  }

  onSubmit() {
    this._logger.log(this.form.value);
    if (this.form.valid) {
      this._sessionService.forgot(this.form.value).subscribe(        
        res => {
          this._logger.log("login response");
          this._logger.log(res);
          if(res && res.success) {
            // Navigate to the signin page
            this._router.navigate ( ['/session/signin'] );
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
