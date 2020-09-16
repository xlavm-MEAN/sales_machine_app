
import { Component, OnInit } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  Validators
} from '@angular/forms';
import { Router } from '@angular/router'

import { InventaryService } from '../inventary.service';

@Component({
  selector: 'app-inventary-add',
  templateUrl: './inventary-add.component.html',
  styleUrls: ['./inventary-add.component.css']
})
export class InventaryAddComponent implements OnInit {
  dataadded = false;
  msg: String ;
  inventary_addForm;
  constructor(private fb: FormBuilder , private bs: InventaryService,private router: Router) {
    this.createForm();
  }

  createForm() {
    this.inventary_addForm = this.fb.group({
      
	  inventary_id: ['', Validators.required],machine_serial: ['', Validators.required],total_value: ['', Validators.required],inventary_date: ['', Validators.required]
	  
    });
  }

  addInventary (inventary_id,machine_serial,total_value,inventary_date) {
  this.bs.addInventary(inventary_id,machine_serial,total_value,inventary_date);
  this.router.navigateByUrl('/')
  this.dataadded = true;
  this.msg = 'Data Added successfully';
  alert("Se ha creado correctamento el inventario")
  }

  ngOnInit() {
  }

}

