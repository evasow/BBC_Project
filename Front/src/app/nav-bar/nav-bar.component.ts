import { Component, Input } from '@angular/core';
import { AuthService } from '../shared/service/auth.service';
import { environment } from 'src/environments/environment.development';
import { Router } from '@angular/router';
import { User } from '../shared/interface/user';

@Component({
  selector: 'app-nav-bar',
  templateUrl: './nav-bar.component.html',
  styleUrls: ['./nav-bar.component.css']
})
export class NavBarComponent {
  @Input() succursale:string = '';
   user:User=JSON.parse(localStorage.getItem('user')!);
  constructor(private authService: AuthService,private route:Router){}

  logout(){
    localStorage.clear();
    this.route.navigateByUrl("");

    // this.authService.all(environment.url+'/logout').subscribe(data=>{
    //   console.log(data);
      
    // })
    console.log('logout');
  }
}
