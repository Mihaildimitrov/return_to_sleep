import { RouterModule } from '@angular/router';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { authRoutes } from './authentication.routing';
import { SigninComponent } from './views/signin/signin.component';
import { SignupComponent } from './views/signup/signup.component';
import { SharedModule } from 'primeng/api';
import { ReactiveFormsModule } from '@angular/forms';




@NgModule({
  declarations: [SigninComponent, SignupComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(authRoutes),
    ReactiveFormsModule,
    SharedModule
  ]
})
export class AuthenticationModule { }
