import { RouterModule } from '@angular/router';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AlertsComponent } from './views/alerts/alerts.component';
import { alertsRoutes } from './alerts.routing';



@NgModule({
  declarations: [AlertsComponent],
  imports: [
    CommonModule,
    RouterModule.forChild(alertsRoutes),
  ]
})
export class AlertsModule { }
