import { Observable } from 'rxjs';
import { AlertsService } from './../../services/alerts.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-alerts',
  templateUrl: './alerts.component.html',
  styleUrls: ['./alerts.component.scss']
})
export class AlertsComponent implements OnInit {

  public alerts: Observable<any[]>;

  constructor(private alertsService: AlertsService) {
    this.alerts = this.alertsService.getAll();
  }

  ngOnInit(): void {
  }

}
