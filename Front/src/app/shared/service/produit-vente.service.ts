import { Injectable } from '@angular/core';
import { RestFullService } from './rest-full.service';
import { ProduitLoad } from '../interface/produit-load';
import { environment } from 'src/environments/environment.development';

@Injectable({
  providedIn: 'root'
})
export class ProduitVenteService extends RestFullService<ProduitLoad>{

  override getResourceUrl(){
    return environment.url+'/produits'
  }
}