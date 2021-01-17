import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-main-navigation',
  templateUrl: './main-navigation.component.html',
  styleUrls: ['./main-navigation.component.scss']
})
export class MainNavigationComponent implements OnInit {

  public mobileMenu: boolean = false;

  constructor() { }

  ngOnInit(): void {
  }

  public openProfile() {

  }
  
  public logout() {

  }

}
