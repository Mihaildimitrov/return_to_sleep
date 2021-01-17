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

  getAll() {
    return this.http.get(environment.api_services).pipe(map((response: any) => response['services']));
  }
}
