
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Employee_evaluationService } from '../employee_evaluation.service';


@Component({
  selector: 'app-employee_evaluation-edit',
  templateUrl: './employee_evaluation-edit.component.html',
  styleUrls: ['./employee_evaluation-edit.component.css']
})


export class Employee_evaluationEditComponent implements OnInit {

  employee_evaluation_editForm;
  employee_evaluation: any = {};

  // tslint:disable-next-line:max-line-length
  constructor(private route: ActivatedRoute, private router: Router, private ms: Employee_evaluationService, private fb: FormBuilder) { this.createForm(); }

  createForm() {
    this.employee_evaluation_editForm = this.fb.group({
      
	  evaluation_number: ['', Validators.required],employee_id: ['', Validators.required],result_evaluation: ['', Validators.required],point1: ['', Validators.required],point2: ['', Validators.required],point3: ['', Validators.required],point4: ['', Validators.required],point5: ['', Validators.required]
	  
    });
  }

  updateEmployee_evaluation(evaluation_number,employee_id,result_evaluation,point1,point2,point3,point4,point5) {
    this.route.params.subscribe(params => {
      this.ms.updateEmployee_evaluation(evaluation_number,employee_id,result_evaluation,point1,point2,point3,point4,point5 ,params['id']);
      this.router.navigate(['employee_evaluation']);
      alert("Se ha editado correctamente la evaluación del empleado")
    });
  }


  ngOnInit() {
    this.route.params.subscribe(params => {
      this.ms.editEmployee_evaluation(params['id']).subscribe(res => {
        this.employee_evaluation = res;
      });
    });
  }
}

