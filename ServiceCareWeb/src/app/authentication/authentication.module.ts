import { RouterModule } from '@angular/router';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { authRoutes } from './authentication.routing';
import { SigninComponent } from './views/signin/signin.component';
import { SignupComponent } from './views/signup/signup.component';
import { SharedModule } from 'primeng/api';




@NgModule({
  declarations: [SigninComponent, SignupComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(authRoutes),
    SharedModule
  ]
})
export class AuthenticationModule { }
