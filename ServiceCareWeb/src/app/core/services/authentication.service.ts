import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthenticationService {

  private isAuthenticatedSubject$ = new BehaviorSubject<boolean>(false);
  public isAuthenticated$ = this.isAuthenticatedSubject$.asObservable();

  constructor() { }

  public signin(targetUrl?: string): void {
    this.isAuthenticatedSubject$.next(true);
  }

  public signout(targetUrl?: string): void {
    this.isAuthenticatedSubject$.next(false);
  }
}
