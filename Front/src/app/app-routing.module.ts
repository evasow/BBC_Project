import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { DashbordComponent } from './dashbord/dashbord.component';
import { ContainerComponent } from './container/container.component';
import { ProduitVenteComponent } from './produit-vente/produit-vente.component';
import { ListProduitComponent } from './list-produit/list-produit.component';
import { LoginComponent } from './login/login.component';
import { authGuard } from './auth.guard';

const routes: Routes = [
  {path:'dashboard', component: DashbordComponent, canActivate:[authGuard]},
  {path:'vente', component:ContainerComponent,canActivate:[authGuard]},
  {path:'produit', component:ProduitVenteComponent,canActivate:[authGuard]},
  {path:'liste-produits', component:ListProduitComponent,canActivate:[authGuard]},
  {path:'', component:LoginComponent},



  
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
