
import { Component, OnInit } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  Validators
} from '@angular/forms';
import { Router } from '@angular/router'
import { Employee_contractService } from '../employee_contract.service';

@Component({
  selector: 'app-employee_contract-add',
  templateUrl: './employee_contract-add.component.html',
  styleUrls: ['./employee_contract-add.component.css']
})
export class Employee_contractAddComponent implements OnInit {
  dataadded = false;
  msg: String ;
  employee_contract_addForm;
  constructor(private fb: FormBuilder , private bs: Employee_contractService,private router: Router) {
    this.createForm();
  }

  createForm() {
    this.employee_contract_addForm = this.fb.group({
      
	  number_contract: ['', Validators.required],employee_id: ['', Validators.required],clause_one: ['', Validators.required],clause_two: ['', Validators.required],clause_tree: ['', Validators.required],observations: ['', Validators.required]
	  
    });
  }

  addEmployee_contract (number_contract,employee_id,clause_one,clause_two,clause_tree,observations) {
  this.bs.addEmployee_contract(number_contract,employee_id,clause_one,clause_two,clause_tree,observations);
  this.router.navigateByUrl('/')
  this.dataadded = true;
  this.msg = 'Data Added successfully';
  alert("Se ha creado correctamento el contrato")
  }

  ngOnInit() {
  }

}

