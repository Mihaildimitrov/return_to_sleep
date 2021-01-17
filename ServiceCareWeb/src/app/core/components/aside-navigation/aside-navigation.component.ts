import { Component, EventEmitter, OnInit, Output } from '@angular/core';

@Component({
  selector: 'app-aside-navigation',
  templateUrl: './aside-navigation.component.html',
  styleUrls: ['./aside-navigation.component.scss']
})
export class AsideNavigationComponent implements OnInit {
  @Output() onSelected = new EventEmitter<string>();

  constructor() { }

  ngOnInit(): void {
  }

  selectMenuItem() {
    this.onSelected.emit('');
  }

}
