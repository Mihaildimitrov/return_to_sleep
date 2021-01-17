import { AuthenticationService } from './../../../core/services/authentication.service';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormControl, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-signin',
  templateUrl: './signin.component.html',
  styleUrls: ['./signin.component.scss']
})
export class SigninComponent implements OnInit {

  signInForm = new FormGroup({
    email: new FormControl('admin@servicecare.com', [
      Validators.required,
      Validators.email
    ]),
    password: new FormControl('admin')
  });
  signInFormIsDirty: boolean = false;
  signInFormWrogCredentials: boolean = false;
  signInFormLoggingNow: boolean = false

  constructor(
    private router: Router,
    private authenticationService: AuthenticationService
  ) { }

  ngOnInit(): void {
  }

  get getFormFieldRef() { return this.signInForm.controls; }

  signInUser() {
    this.signInFormLoggingNow = true;
    this.signInFormIsDirty = true;
    this.signInFormWrogCredentials = false;

    if (this.signInForm.value.email !== "" && this.signInForm.value.password !== '') {

      this.authenticationService.signin(this.signInForm.value.email, this.signInForm.value.password).subscribe({
        next: (res: any) => {
          console.log(res);
          this.signInFormLoggingNow = false;
          this.router.navigate(['/dashboard']);
        },
        error: (error) => {
          this.signInFormLoggingNow = false;
          this.signInFormWrogCredentials = true;
        },
      });

    }
  }

  public fakesignin() {
    this.authenticationService.fakesignin();
    this.router.navigate(['dashboard']);
  }

}
