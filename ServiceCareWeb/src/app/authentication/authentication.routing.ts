import { SignupComponent } from './views/signup/signup.component';
import { SigninComponent } from './views/signin/signin.component';
import { Routes } from '@angular/router';

export const authRoutes: Routes = [
    { path: "signin", component: SigninComponent },
    { path: "signup", component: SignupComponent },
];
