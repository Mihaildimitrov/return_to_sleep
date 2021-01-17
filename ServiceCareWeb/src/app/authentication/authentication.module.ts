import { RouterModule } from '@angular/router';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { authRoutes } from './authentication.routing';
import { SigninComponent } from './views/signin/signin.component';



@NgModule({
  declarations: [SigninComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(authRoutes),
  ]
})
export class AuthenticationModule { }
