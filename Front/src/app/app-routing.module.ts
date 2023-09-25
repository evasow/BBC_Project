import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { DashbordComponent } from './dashbord/dashbord.component';
import { ContainerComponent } from './container/container.component';
import { ProduitVenteComponent } from './produit-vente/produit-vente.component';
import { ListProduitComponent } from './list-produit/list-produit.component';

const routes: Routes = [
  {path:'dashboard', component: DashbordComponent},
  {path:'vente', component:ContainerComponent},
  {path:'produit', component:ProduitVenteComponent},
  {path:'liste-produits', component:ListProduitComponent},


  
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
