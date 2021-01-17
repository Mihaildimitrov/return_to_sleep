import { AuthenticationService } from './../../../core/services/authentication.service';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-signin',
  templateUrl: './signin.component.html',
  styleUrls: ['./signin.component.scss']
})
export class SigninComponent implements OnInit {

  constructor(
    private router: Router,
    private authenticationService: AuthenticationService
  ) {}

  ngOnInit(): void {
  }

  public signin() {
    this.authenticationService.signin({}).subscribe(res => {
      console.log('1 => ', res);
      this.router.navigate(['dashboard']);
    });
  }

  public signout() {
    this.authenticationService.signout();
    this.router.navigate(['signin']);
  }

}
