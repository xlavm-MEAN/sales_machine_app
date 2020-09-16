
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Employee_contractService } from '../employee_contract.service';


@Component({
  selector: 'app-employee_contract-edit',
  templateUrl: './employee_contract-edit.component.html',
  styleUrls: ['./employee_contract-edit.component.css']
})


export class Employee_contractEditComponent implements OnInit {

  employee_contract_editForm;
  employee_contract: any = {};

  // tslint:disable-next-line:max-line-length
  constructor(private route: ActivatedRoute, private router: Router, private ms: Employee_contractService, private fb: FormBuilder) { this.createForm(); }

  createForm() {
    this.employee_contract_editForm = this.fb.group({
      
	  number_contract: ['', Validators.required],employee_id: ['', Validators.required],clause_one: ['', Validators.required],clause_two: ['', Validators.required],clause_tree: ['', Validators.required],observations: ['', Validators.required]
	  
    });
  }

  updateEmployee_contract(number_contract,employee_id,clause_one,clause_two,clause_tree,observations) {
    this.route.params.subscribe(params => {
      this.ms.updateEmployee_contract(number_contract,employee_id,clause_one,clause_two,clause_tree,observations ,params['id']);
      this.router.navigate(['employee_contract']);
      alert("Se ha editado correctamente el contrato")
    });
  }


  ngOnInit() {
    this.route.params.subscribe(params => {
      this.ms.editEmployee_contract(params['id']).subscribe(res => {
        this.employee_contract = res;
      });
    });
  }
}

