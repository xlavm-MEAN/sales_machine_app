
import { Component, OnInit } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  Validators
} from '@angular/forms';
import { Router } from '@angular/router'

import { EmployeeService } from '../employee.service';

@Component({
  selector: 'app-employee-add',
  templateUrl: './employee-add.component.html',
  styleUrls: ['./employee-add.component.css']
})
export class EmployeeAddComponent implements OnInit {
  dataadded = false;
  msg: String;
  employee_addForm;
  constructor(private fb: FormBuilder, private bs: EmployeeService,private router: Router) {
    this.createForm();
  }

  createForm() {
    this.employee_addForm = this.fb.group({

      employee_id: ['', Validators.required], first_name: ['', Validators.required], last_name: ['', Validators.required], role: ['', Validators.required], username: ['', Validators.required], password: ['', Validators.required]

    });
  }

  addEmployee(employee_id, first_name, last_name, role, username, password) {
    this.bs.addEmployee(employee_id, first_name, last_name, role, username, password);
    this.router.navigateByUrl('/')
    this.dataadded = true;
    this.msg = 'Data Added successfully';
    alert("Se ha creado correctamento el empleado")
  }

  ngOnInit() {
  }

}

