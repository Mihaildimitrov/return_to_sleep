import { IService } from './../models/service.model';
import { environment } from './../../../environments/environment';
import { map } from 'rxjs/operators';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ServicesService {

  constructor(private http: HttpClient) { }

  getAll(): Observable<IService[]> {
    return this.http.get(environment.api_services).pipe(map((response: any) => response['services'] as IService[]));
  }
}
