import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule,ReactiveFormsModule } from '@angular/forms';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavBarComponent } from './nav-bar/nav-bar.component';
import { ContainerComponent } from './container/container.component';
import { TableVenteComponent } from './container/table-vente/table-vente.component';
import { ProduitVenteComponent } from './produit-vente/produit-vente.component';
import { DashbordComponent } from './dashbord/dashbord.component';
import { ModalVenteComponent } from './container/modal-vente/modal-vente.component';


@NgModule({
  declarations: [
    AppComponent,
    NavBarComponent,
    ContainerComponent,
    TableVenteComponent,
    ProduitVenteComponent,
    DashbordComponent,
    ModalVenteComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule

  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
