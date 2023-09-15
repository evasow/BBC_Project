import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { DashbordComponent } from './dashbord/dashbord.component';
import { ContainerComponent } from './container/container.component';

const routes: Routes = [
  {path:'dashboard', component: DashbordComponent},
  {path:'vente', component:ContainerComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
