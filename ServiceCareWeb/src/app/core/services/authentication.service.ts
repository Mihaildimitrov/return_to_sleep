import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class AuthenticationService {

  private isAuthenticatedSubject$ = new BehaviorSubject<boolean>(false);
  public isAuthenticated$ = this.isAuthenticatedSubject$.asObservable();

  constructor(private http: HttpClient) { }

  public fakesignin() {
    this.isAuthenticatedSubject$.next(true);
  }

  public signin(credentials: any) {

    let cred = {
      email: "admin@servicecare.com",
      password: "admin"
    };

    return this.http.post('http://www.sc.nsgcreative.com/auth/login', cred).pipe(map((response: any) => {
      console.log('LOGIN => ', response);
      this.isAuthenticatedSubject$.next(true);
      return response;
    }));

  }

  public signout(targetUrl?: string): void {
    this.isAuthenticatedSubject$.next(false);
  }
}
