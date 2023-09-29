import { Injectable } from '@angular/core';
import { RestFullService } from './rest-full.service';
import { Auth } from '../interface/auth';
import { environment } from 'src/environments/environment.development';

@Injectable({
  providedIn: 'root'
})
export class AuthService extends RestFullService<Auth> {

  override getResourceUrl(){
    return environment.url+'/login'
  }


}
