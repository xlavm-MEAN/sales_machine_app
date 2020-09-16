
import { Component, OnInit } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  Validators
} from '@angular/forms';
import { Router } from '@angular/router'

import { MachineService } from '../machine.service';

@Component({
  selector: 'app-machine-add',
  templateUrl: './machine-add.component.html',
  styleUrls: ['./machine-add.component.css']
})
export class MachineAddComponent implements OnInit {
  dataadded = false;
  msg: String ;
  machine_addForm;
  constructor(private fb: FormBuilder , private bs: MachineService,private router: Router) {
    this.createForm();
  }

  createForm() {
    this.machine_addForm = this.fb.group({
      
	  serial: ['', Validators.required],brand: ['', Validators.required],model: ['', Validators.required],ubication: ['', Validators.required],price_shopping: ['', Validators.required],receipt_shopping: ['', Validators.required],creation_date: ['', Validators.required],sale_date: ['', Validators.required],seller_id: ['', Validators.required],receipt_sale: ['', Validators.required],state: ['', Validators.required]
	  
    });
  }

  addMachine (serial,brand,model,ubication,price_shopping,receipt_shopping,creation_date,sale_date,seller_id,receipt_sale,state) {
  this.bs.addMachine(serial,brand,model,ubication,price_shopping,receipt_shopping,creation_date,sale_date,seller_id,receipt_sale,state);
  this.dataadded = true;
  this.msg = 'Data Added successfully';
  alert("Se ha creado correctamente la máquina, por favor llene el Checklist del estado de esta")
  this.router.navigateByUrl('checklist_state/create')
  }

  ngOnInit() {
  }

}

