import { AppRoutingModule } from './../app-routing.module';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MainNavigationComponent } from './components/main-navigation/main-navigation.component';
import { AsideNavigationComponent } from './components/aside-navigation/aside-navigation.component';



@NgModule({
  declarations: [
    MainNavigationComponent,
    AsideNavigationComponent
  ],
  imports: [
    CommonModule,
    AppRoutingModule
  ],
  exports: [
    MainNavigationComponent,
    AsideNavigationComponent
  ]
})
export class CoreModule { }
