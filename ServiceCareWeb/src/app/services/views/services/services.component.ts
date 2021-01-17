import { ServicesService } from './../../../services/services/services.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-services',
  templateUrl: './services.component.html',
  styleUrls: ['./services.component.scss']
})
export class ServicesComponent implements OnInit {

  constructor(private servicesService: ServicesService) { }

  ngOnInit(): void {
    this.servicesService.getAll().subscribe((responce) => {
      console.log(responce);
    });

  }

}
