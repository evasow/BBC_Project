import { Injectable } from '@angular/core';
import { RestFullService } from './rest-full.service';
import { Commande } from '../interface/commande';
import { environment } from 'src/environments/environment.development';

@Injectable({
  providedIn: 'root'
})
export class CommandeService extends RestFullService<Commande> {
  
  override getResourceUrl(){
    return environment.url+'/commandes'
  }
}
