
import { Component, OnInit } from '@angular/core';
import { Employee_contractService } from '../employee_contract.service';
import Employee_contract from '../employee_contract_model';
import { Router } from '@angular/router'

@Component({
  selector: 'app-employee_contract-get',
  templateUrl: './employee_contract-get.component.html',
  styleUrls: ['./employee_contract-get.component.css']
})
export class Employee_contractGetComponent implements OnInit {
  employee_contract: Employee_contract[];
  constructor(private ms: Employee_contractService, private router: Router) { }

  deleteEmployee_contract(id) {
    this.ms.deleteEmployee_contract(id).subscribe(res => {
      alert("Se ha eliminado correctamente el contrato")
      console.log('Deleted');
      this.ngOnInit();
    });
  }

  refresh() {
    this.router.navigateByUrl('employee_contract')
  }
  ngOnInit() {
    this.ms.getEmployee_contract().subscribe((data: Employee_contract[]) => {
      this.employee_contract = data;
    });
  }

}

