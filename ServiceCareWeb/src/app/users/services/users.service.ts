import { IUser } from './../models/user.mdoel';
import { map } from 'rxjs/operators';
import { environment } from './../../../environments/environment';
import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class UsersService {

  constructor(private http: HttpClient) { }

  getAll(): Observable<IUser[]> {
    return this.http.get(environment.api_users).pipe(map((response: any) => response['users'] as IUser[]));
  }
}
