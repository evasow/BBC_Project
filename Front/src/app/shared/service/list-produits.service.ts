import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment.development';
import { RestFullService } from './rest-full.service';
import { ListeProduit } from '../interface/liste-produit';

@Injectable({
  providedIn: 'root'
})
export class ListProduitsService extends RestFullService<ListeProduit>{
  
  override getResourceUrl(){
    return environment.url+'/produit/succursale/1'
  }
}
