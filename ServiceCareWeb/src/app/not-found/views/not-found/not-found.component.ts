import { AuthenticationService } from './../../../core/services/authentication.service';
import { Observable } from 'rxjs';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-not-found',
  templateUrl: './not-found.component.html',
  styleUrls: ['./not-found.component.scss']
})
export class NotFoundComponent implements OnInit {

  public isAuthenticated$: Observable<boolean>;

  constructor(private authenticationService: AuthenticationService) {
    this.isAuthenticated$ = this.authenticationService.isAuthenticated$;
  }

  ngOnInit(): void {
  }

}
