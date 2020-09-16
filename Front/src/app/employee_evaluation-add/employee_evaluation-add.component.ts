
import { Component, OnInit } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  Validators
} from '@angular/forms';
import { Router } from '@angular/router'

import { Employee_evaluationService } from '../employee_evaluation.service';

@Component({
  selector: 'app-employee_evaluation-add',
  templateUrl: './employee_evaluation-add.component.html',
  styleUrls: ['./employee_evaluation-add.component.css']
})
export class Employee_evaluationAddComponent implements OnInit {
  dataadded = false;
  msg: String ;
  employee_evaluation_addForm;
  constructor(private fb: FormBuilder , private bs: Employee_evaluationService,private router: Router) {
    this.createForm();
  }

  createForm() {
    this.employee_evaluation_addForm = this.fb.group({
      
	  evaluation_number: ['', Validators.required],employee_id: ['', Validators.required],result_evaluation: ['', Validators.required],point1: ['', Validators.required],point2: ['', Validators.required],point3: ['', Validators.required],point4: ['', Validators.required],point5: ['', Validators.required]
	  
    });
  }

  addEmployee_evaluation (evaluation_number,employee_id,result_evaluation,point1,point2,point3,point4,point5) {
  this.bs.addEmployee_evaluation(evaluation_number,employee_id,result_evaluation,point1,point2,point3,point4,point5);
  this.router.navigateByUrl('/')
  this.dataadded = true;
  this.msg = 'Data Added successfully';
  alert("Se ha creado correctamento la evalucaion")
  }

  ngOnInit() {
  }

}

