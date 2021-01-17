import { RouterModule } from '@angular/router';
import { usersRoutes } from './users.routing';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { UsersComponent } from './views/users/users.component';



@NgModule({
  declarations: [UsersComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(usersRoutes),
  ]
})
export class UsersModule { }
