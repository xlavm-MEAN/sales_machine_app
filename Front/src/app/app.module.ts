import { BrowserModule } from '@angular/platform-browser'
import { NgModule } from '@angular/core'
import { HttpClientModule } from '@angular/common/http'
import { FormsModule } from '@angular/forms'
import { RouterModule, Routes } from '@angular/router'

import { ReactiveFormsModule } from '@angular/forms';
import { SlimLoadingBarModule } from 'ng2-slim-loading-bar';
import { Ng2SearchPipeModule } from 'ng2-search-filter';

//LOGIN
import { AppComponent } from './app.component'
import { HomeComponent } from './home/home.component'
import { LoginComponent } from './login/login.component'
import { ProfileComponent } from './profile/profile.component'
import { AuthenticationService } from './authentication.service'
import { AuthGuardService } from './auth-guard.service'
//HUMAN_RESOURCES
import { EmployeeService } from './employee.service';
import { EmployeeAddComponent } from './employee-add/employee-add.component';
import { EmployeeGetComponent } from './employee-get/employee-get.component';
import { EmployeeEditComponent } from './employee-edit/employee-edit.component';
import { Employee_contractService } from './employee_contract.service';
import { Employee_contractAddComponent } from './employee_contract-add/employee_contract-add.component';
import { Employee_contractGetComponent } from './employee_contract-get/employee_contract-get.component';
import { Employee_contractEditComponent } from './employee_contract-edit/employee_contract-edit.component';
import { Employee_evaluationService } from './employee_evaluation.service';
import { Employee_evaluationAddComponent } from './employee_evaluation-add/employee_evaluation-add.component';
import { Employee_evaluationGetComponent } from './employee_evaluation-get/employee_evaluation-get.component';
import { Employee_evaluationEditComponent } from './employee_evaluation-edit/employee_evaluation-edit.component';
//SALE
import { InvoiceService } from './invoice.service';
import { InvoiceAddComponent } from './invoice-add/invoice-add.component';
import { InvoiceGetComponent } from './invoice-get/invoice-get.component';
import { InvoiceEditComponent } from './invoice-edit/invoice-edit.component';
import { SaleService } from './sale.service';
import { SaleAddComponent } from './sale-add/sale-add.component';
import { SaleGetComponent } from './sale-get/sale-get.component';
import { SaleEditComponent } from './sale-edit/sale-edit.component';
import { Sale_cartService } from './sale_cart.service';
import { Sale_cartAddComponent } from './sale_cart-add/sale_cart-add.component';
import { Sale_cartGetComponent } from './sale_cart-get/sale_cart-get.component';
import { Sale_cartEditComponent } from './sale_cart-edit/sale_cart-edit.component';
//SHOPPING
import { Checklist_stateService } from './checklist_state.service';
import { Checklist_stateAddComponent } from './checklist_state-add/checklist_state-add.component';
import { Checklist_stateGetComponent } from './checklist_state-get/checklist_state-get.component';
import { Checklist_stateEditComponent } from './checklist_state-edit/checklist_state-edit.component';
import { InventaryService } from './inventary.service';
import { InventaryAddComponent } from './inventary-add/inventary-add.component';
import { InventaryGetComponent } from './inventary-get/inventary-get.component';
import { InventaryEditComponent } from './inventary-edit/inventary-edit.component';
import { MachineService } from './machine.service';
import { MachineAddComponent } from './machine-add/machine-add.component';
import { MachineGetComponent } from './machine-get/machine-get.component';
import { MachineEditComponent } from './machine-edit/machine-edit.component';
import { ProviderService } from './provider.service';
import { ProviderAddComponent } from './provider-add/provider-add.component';
import { ProviderGetComponent } from './provider-get/provider-get.component';
import { ProviderEditComponent } from './provider-edit/provider-edit.component';
import { ShoppingService } from './shopping.service';
import { ShoppingAddComponent } from './shopping-add/shopping-add.component';
import { ShoppingGetComponent } from './shopping-get/shopping-get.component';
import { ShoppingEditComponent } from './shopping-edit/shopping-edit.component';

const routes: Routes = [
  //LOGIN
  { path: 'login', component: LoginComponent },
  {
    path: '',
    component: HomeComponent,
    canActivate: [AuthGuardService]//comprueba si el usuario tiene permiso para ver el profile
  },
  {
    path: 'profile',
    component: ProfileComponent,
    canActivate: [AuthGuardService]//comprueba si el usuario tiene permiso para ver el profile
  },
  //HUMAN_RESOURCES
  {
    path: 'employee/create',
    component: EmployeeAddComponent,
    canActivate: [AuthGuardService]
  },
  {
    path: 'employee',
    component: EmployeeGetComponent,
    canActivate: [AuthGuardService]
  },
  {
    path: 'employee/edit/:id',
    component: EmployeeEditComponent
  },

  {
    path: 'employee_contract/create',
    component: Employee_contractAddComponent
  },
  {
    path: 'employee_contract',
    component: Employee_contractGetComponent
  },
  {
    path: 'employee_contract/edit/:id',
    component: Employee_contractEditComponent
  },

  {
    path: 'employee_evaluation/create',
    component: Employee_evaluationAddComponent
  },
  {
    path: 'employee_evaluation',
    component: Employee_evaluationGetComponent
  },
  {
    path: 'employee_evaluation/edit/:id',
    component: Employee_evaluationEditComponent
  },
  //SALE
  {
    path: 'invoice/create',
    component: InvoiceAddComponent
  },
  {
    path: 'invoice',
    component: InvoiceGetComponent
  },
  {
    path: 'invoice/edit/:id',
    component: InvoiceEditComponent
  },

  {
    path: 'sale/create',
    component: SaleAddComponent
  },
  {
    path: 'sale',
    component: SaleGetComponent
  },
  {
    path: 'sale/edit/:id',
    component: SaleEditComponent
  },

  {
    path: 'sale_cart/create',
    component: Sale_cartAddComponent
  },
  {
    path: 'sale_cart',
    component: Sale_cartGetComponent
  },
  {
    path: 'sale_cart/edit/:id',
    component: Sale_cartEditComponent
  },
  //SHOPPING
  {
    path: 'checklist_state/create',
    component: Checklist_stateAddComponent
  },
  {
    path: 'checklist_state',
    component: Checklist_stateGetComponent
  },
  {
    path: 'checklist_state/edit/:id',
    component: Checklist_stateEditComponent
  },

  {
    path: 'inventary/create',
    component: InventaryAddComponent
  },
  {
    path: 'inventary',
    component: InventaryGetComponent
  },
  {
    path: 'inventary/edit/:id',
    component: InventaryEditComponent
  },

  {
    path: 'machine/create',
    component: MachineAddComponent
  },
  {
    path: 'machine',
    component: MachineGetComponent
  },
  {
    path: 'machine/edit/:id',
    component: MachineEditComponent
  },

  {
    path: 'provider/create',
    component: ProviderAddComponent
  },
  {
    path: 'provider',
    component: ProviderGetComponent
  },
  {
    path: 'provider/edit/:id',
    component: ProviderEditComponent
  },

  {
    path: 'shopping/create',
    component: ShoppingAddComponent
  },
  {
    path: 'shopping',
    component: ShoppingGetComponent
  },
  {
    path: 'shopping/edit/:id',
    component: ShoppingEditComponent
  },


]

@NgModule({
  declarations: [
    //LOGIN
    AppComponent,
    LoginComponent,
    HomeComponent,
    ProfileComponent,
    //HUMAN_RESOURCES
    EmployeeAddComponent,
    EmployeeGetComponent,
    EmployeeEditComponent,
    Employee_contractAddComponent,
    Employee_contractGetComponent,
    Employee_contractEditComponent,
    Employee_evaluationAddComponent,
    Employee_evaluationGetComponent,
    Employee_evaluationEditComponent,
    //SALE
    InvoiceAddComponent,
    InvoiceGetComponent,
    InvoiceEditComponent,
    SaleAddComponent,
    SaleGetComponent,
    SaleEditComponent,
    Sale_cartAddComponent,
    Sale_cartGetComponent,
    Sale_cartEditComponent,
    //SHOPPING
    Checklist_stateAddComponent,
    Checklist_stateGetComponent,
    Checklist_stateEditComponent,
    InventaryAddComponent,
    InventaryGetComponent,
    InventaryEditComponent,
    MachineAddComponent,
    MachineGetComponent,
    MachineEditComponent,
    ProviderAddComponent,
    ProviderGetComponent,
    ProviderEditComponent,
    ShoppingAddComponent,
    ShoppingGetComponent,
    ShoppingEditComponent,
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpClientModule,
    RouterModule.forRoot(routes),
    //lo adicioné para los otros componentes diferentes al Login
    ReactiveFormsModule,
    SlimLoadingBarModule,
    Ng2SearchPipeModule
  ],
  providers: [AuthenticationService, AuthGuardService, EmployeeService, Employee_contractService, Employee_evaluationService, InvoiceService, SaleService, Sale_cartService,Checklist_stateService,InventaryService,MachineService,ProviderService,ShoppingService],
  bootstrap: [AppComponent]
})
export class AppModule { }
