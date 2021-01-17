import { AppRoutingModule } from './../app-routing.module';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MainNavigationComponent } from './components/main-navigation/main-navigation.component';
import { AsideNavigationComponent } from './components/aside-navigation/aside-navigation.component';
import { SidebarModule } from 'primeng/sidebar';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { BrowserModule } from '@angular/platform-browser';


@NgModule({
  declarations: [
    MainNavigationComponent,
    AsideNavigationComponent
  ],
  imports: [
    CommonModule,
    BrowserModule,
    BrowserAnimationsModule,
    AppRoutingModule,
    SidebarModule
  ],
  exports: [
    MainNavigationComponent,
    AsideNavigationComponent
  ]
})
export class CoreModule { }
