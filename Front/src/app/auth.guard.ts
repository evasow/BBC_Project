import { CanActivateFn, Router } from '@angular/router';

export const authGuard: CanActivateFn = (route, state) => {
  let router = new Router
  const localToken=localStorage.getItem('login');
  if (localToken) {    
    return true;
  }
  router.navigate(['']);
  return false;

  
};



