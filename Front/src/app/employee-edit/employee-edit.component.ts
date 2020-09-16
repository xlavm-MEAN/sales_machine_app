
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { EmployeeService } from '../employee.service';


@Component({
  selector: 'app-employee-edit',
  templateUrl: './employee-edit.component.html',
  styleUrls: ['./employee-edit.component.css']
})


export class EmployeeEditComponent implements OnInit {

  employee_editForm;
  employee: any = {};

  // tslint:disable-next-line:max-line-length
  constructor(private route: ActivatedRoute, private router: Router, private ms: EmployeeService, private fb: FormBuilder) { this.createForm(); }

  createForm() {
    this.employee_editForm = this.fb.group({
      
	  employee_id: ['', Validators.required],first_name: ['', Validators.required],last_name: ['', Validators.required],role: ['', Validators.required],username: ['', Validators.required],password: ['', Validators.required]
	  
    });
  }

  updateEmployee(employee_id,first_name,last_name,role,username,password) {
    this.route.params.subscribe(params => {
      this.ms.updateEmployee(employee_id,first_name,last_name,role,username,password ,params['id']);
      this.router.navigate(['employee']);
    });
    alert("Se ha editado correctamente el empleado")
  }


  ngOnInit() {
    this.route.params.subscribe(params => {
      this.ms.editEmployee(params['id']).subscribe(res => {
        this.employee = res;
      });
    });
  }
}

