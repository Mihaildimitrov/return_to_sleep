import { RouterModule } from '@angular/router';
import { notFoundRoutes } from './not-found.routing';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NotFoundComponent } from './views/not-found/not-found.component';



@NgModule({
  declarations: [NotFoundComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(notFoundRoutes),
  ]
})
export class NotFoundModule { }
