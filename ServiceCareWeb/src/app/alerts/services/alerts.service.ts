import { map } from 'rxjs/operators';
import { environment } from './../../../environments/environment';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class AlertsService {

  constructor(private http: HttpClient) { }

  getAll(): Observable<any[]> {
    return this.http.get(environment.api_alert).pipe(map((response: any) => response['alerts'] as any[]));
  }
}
