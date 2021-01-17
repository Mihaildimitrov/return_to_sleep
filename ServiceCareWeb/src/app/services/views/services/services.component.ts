import { IService } from './../../models/service.model';
import { Observable } from 'rxjs';
import { ServicesService } from './../../../services/services/services.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-services',
  templateUrl: './services.component.html',
  styleUrls: ['./services.component.scss']
})
export class ServicesComponent implements OnInit {

  public services: Observable<IService[]>;

  constructor(private servicesService: ServicesService) {
    this.services = this.servicesService.getAll();
  }

  ngOnInit(): void { }

}
