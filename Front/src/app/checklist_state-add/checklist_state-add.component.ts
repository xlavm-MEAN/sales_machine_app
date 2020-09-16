
import { Component, OnInit } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  Validators
} from '@angular/forms';
import { Router } from '@angular/router'

import { Checklist_stateService } from '../checklist_state.service';

@Component({
  selector: 'app-checklist_state-add',
  templateUrl: './checklist_state-add.component.html',
  styleUrls: ['./checklist_state-add.component.css']
})
export class Checklist_stateAddComponent implements OnInit {
  dataadded = false;
  msg: String ;
  checklist_state_addForm;
  constructor(private fb: FormBuilder , private bs: Checklist_stateService,private router: Router) {
    this.createForm();
  }

  createForm() {
    this.checklist_state_addForm = this.fb.group({
      
	  checklist_id: ['', Validators.required],serial_machine: ['', Validators.required],receipt_shopping: ['', Validators.required],checklist_date: ['', Validators.required],point1: ['', Validators.required],point2: ['', Validators.required],point3: ['', Validators.required],point4: ['', Validators.required],point5: ['', Validators.required]
	  
    });
  }

  addChecklist_state (checklist_id,serial_machine,receipt_shopping,checklist_date,point1,point2,point3,point4,point5) {
  this.bs.addChecklist_state(checklist_id,serial_machine,receipt_shopping,checklist_date,point1,point2,point3,point4,point5);
  this.dataadded = true;
  this.msg = 'Data Added successfully';
  alert("Se ha creado correctamente el checklist del estado de maquina, por favor registra tú compra")
  this.router.navigateByUrl('shopping/create')
  }

  ngOnInit() {
  }

}

