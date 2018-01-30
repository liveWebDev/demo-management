import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormBuilder, FormGroup, Validators, FormControl } from '@angular/forms';
import { CustomValidators } from 'ng2-validation';
import { Logger } from "angular2-logger/core";
import { ManagementService } from '../management.service';

const password = new FormControl('');
const confirmPassword = new FormControl('', CustomValidators.equalTo(password));

@Component({
  selector: 'app-user-edit',
  templateUrl: './useredit.component.html',
  styleUrls: ['./useredit.component.scss']
})
export class UserEditComponent implements OnInit {

  public form: FormGroup;
  public user: any;

  constructor(private _fb: FormBuilder, private _router: Router, private _logger: Logger, private _managementService: ManagementService) {
    this._logger.log("UserEditComponent Constructor!");
  }

  ngOnInit() {
    this.user = this._managementService.getUser();

    this.form = this._fb.group( {
      first_name: [this.user['first_name'], Validators.compose([Validators.required])],
      last_name: [this.user['last_name'], Validators.compose([Validators.required])],
      email: [this.user['email'], Validators.compose([Validators.required, CustomValidators.email])],
      sbu: [this.user['sbu'], Validators.compose([Validators.required])],
      password: password,
      confirmPassword: confirmPassword,
      type: [this.user['type'].toString(), Validators.compose([Validators.required])],
      timezone: [this.user['timezone'], Validators.compose([Validators.required])],
      language: [this.user['language'], Validators.compose([Validators.required])],
      encryption: [this.user['encryption']],
      license: [this.user['license']],
      cdn: [this.user['cdn']], 
    } );
  }

  onSubmit() {
    this._logger.log("onSubmit");
    this._logger.log(this.form.value);
    if (this.form.valid) {
      this.form.value['_method'] = 'PUT';
      this.form.value['id'] = this.user['id'];
      this._managementService.updateUser(this.form.value).subscribe(        
        res => {
          this._logger.log("updateUser response");
          this._logger.log(res);
          if(res.success) {
            this._router.navigate(['/management/userlist']);          
          }
          return false;
        },
        err => {
          this._logger.error("updateUser error");
          this._logger.error(err);
        }
        );
    }
  }
}
