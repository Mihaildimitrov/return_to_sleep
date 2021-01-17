import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AsideNavigationComponent } from './aside-navigation.component';

describe('AsideNavigationComponent', () => {
  let component: AsideNavigationComponent;
  let fixture: ComponentFixture<AsideNavigationComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AsideNavigationComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AsideNavigationComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
