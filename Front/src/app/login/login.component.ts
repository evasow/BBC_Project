import { Component, EventEmitter, Output } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { AuthService } from '../shared/service/auth.service';
import { Router } from '@angular/router';
import { Toast, ToastrService } from 'ngx-toastr';
import { User } from '../shared/interface/user';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent {

  @Output() userSender =new EventEmitter<any>();
  
  constructor(private fb:FormBuilder, private authService: AuthService, private route: Router,
              private toastr:ToastrService
    ){}

  loginForm=this.fb.group({
    login:['', Validators.required],
    password:['', Validators.required]

  })

  onLogin(){
    this.authService.post(this.loginForm.value).subscribe((data)=>{
      console.log(data);
      if (data.data) {
        localStorage.setItem('login',JSON.stringify(data.data[0]));
        localStorage.setItem('user',JSON.stringify(data.data[1]));

        this.route.navigateByUrl("/dashboard"); 
      }
      else{
        this.showError(data.message,'Error !')
      }
      
    })
    this.loginForm.reset();
  }

  showError(message:string,title:string){
    this.toastr.error(message, title);
  }
}
