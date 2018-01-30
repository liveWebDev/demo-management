import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Logger } from "angular2-logger/core";
import { ManagementService } from '../management.service';

@Component({
  selector: 'app-userlist',
  templateUrl: './userlist.component.html',
  styleUrls: ['./userlist.component.scss']
})
export class UserListComponent implements OnInit {
  rows = [];
  count = 0;
  offset = 0;
  limit = 10;

  constructor(private _router: Router, private _logger: Logger, private _managementService: ManagementService) {
    this._logger.log("UserListComponent Constructor!");
  }

  ngOnInit() {
    this.page(this.offset, this.limit);
  }

  page(offset, limit) {
    this._logger.log("offset, limit", offset, limit);
    this.fetch((results) => {
      this.count = results.length;

      const start = offset * limit;
      const end = start + limit;
      const rows = [...this.rows];

      for (let i = start; i < end; i++) {
        rows[i] = results[i];
      }

      this.rows = rows;
      this._logger.log('Page Results', start, end, rows);
    });
  }

  fetch(cb) {
    this._managementService.getUsers().subscribe(        
      res => {
        this._logger.log("getUsers response");
        this._logger.log(res);
        cb(res.data.data);        
      },
      err => {
        this._logger.error("login error");
        this._logger.error(err);
      }
      );
  }

  onPage(event) {
    console.log('Page Event', event);
    this.page(event.offset, event.limit);
  }

  onDetail(row: any) {
    this._logger.log(row);
    this._managementService.setUser(row);
    this._router.navigate(['/management/useredit']);
  }

  onDelete(row: any) {
    this._logger.log(row);
  }
}
