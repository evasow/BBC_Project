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
import { ModalSuivantComponent } from './container/modal-suivant/modal-suivant.component';
import { ModalTerminerVenteComponent } from './container/modal-terminer-vente/modal-terminer-vente.component';
import { ModalVenteOtherComponent } from './modal-vente-other/modal-vente-other.component';
import { ListProduitComponent } from './list-produit/list-produit.component';

import { ToastrModule } from 'ngx-toastr';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { LoginComponent } from './login/login.component';


@NgModule({
  declarations: [
    AppComponent,
    NavBarComponent,
    ContainerComponent,
    TableVenteComponent,
    ProduitVenteComponent,
    DashbordComponent,
    ModalVenteComponent,
    ModalSuivantComponent,
    ModalTerminerVenteComponent,
    ModalVenteOtherComponent,
    ListProduitComponent,
    LoginComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    ToastrModule.forRoot(),
    BrowserAnimationsModule

  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
