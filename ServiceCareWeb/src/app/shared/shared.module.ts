import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ButtonModule } from 'primeng/button';
import { TableComponent } from './components/table/table.component';



@NgModule({
  declarations: [TableComponent],
  imports: [
    CommonModule,
    ButtonModule
  ],
  exports: [
    ButtonModule
  ]
})
export class SharedModule { }
