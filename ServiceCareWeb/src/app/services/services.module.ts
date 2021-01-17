import { RouterModule } from '@angular/router';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ServicesComponent } from './views/services/services.component';
import { servicesRoutes } from './services.routing';



@NgModule({
  declarations: [ServicesComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(servicesRoutes),
  ]
})
export class ServicesModule { }
