import { Injectable } from '@angular/core'
import { Router, CanActivate } from '@angular/router'
import { AuthenticationService } from './authentication.service'

@Injectable()
export class AuthGuardService implements CanActivate {
  constructor(private auth: AuthenticationService, private router: Router) {}

  //si no está logeado lo envio al loggin
  canActivate() {
    if (!this.auth.isLoggedIn()) {
      this.router.navigateByUrl('/login')
      return false
    }
    return true
  }
  
}
