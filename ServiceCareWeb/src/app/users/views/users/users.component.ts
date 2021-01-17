import { IUser } from './../../models/user.mdoel';
import { UsersService } from './../../services/users.service';
import { Observable } from 'rxjs';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-users',
  templateUrl: './users.component.html',
  styleUrls: ['./users.component.scss']
})
export class UsersComponent implements OnInit {

  public users: Observable<IUser[]>;

  constructor(private usersService: UsersService) {
    this.users = this.usersService.getAll();
  }

  ngOnInit(): void {
  }

}
