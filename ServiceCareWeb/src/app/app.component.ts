import { AuthenticationService } from './core/services/authentication.service';
import { Observable } from 'rxjs';
import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {

  public isAuthenticated$: Observable<boolean>;

  constructor(private authenticationService: AuthenticationService) {
    this.isAuthenticated$ = this.authenticationService.isAuthenticated$;
  }

}
