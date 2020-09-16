
import { Component, OnInit } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  Validators
} from '@angular/forms';
import { Router } from '@angular/router'

import { ProviderService } from '../provider.service';

@Component({
  selector: 'app-provider-add',
  templateUrl: './provider-add.component.html',
  styleUrls: ['./provider-add.component.css']
})
export class ProviderAddComponent implements OnInit {
  dataadded = false;
  msg: String ;
  provider_addForm;
  constructor(private fb: FormBuilder , private bs: ProviderService,private router: Router) {
    this.createForm();
  }

  createForm() {
    this.provider_addForm = this.fb.group({
      
	  provider_id: ['', Validators.required],social_reason: ['', Validators.required],adress: ['', Validators.required],telephone: ['', Validators.required]
	  
    });
  }

  addProvider (provider_id,social_reason,adress,telephone) {
  this.bs.addProvider(provider_id,social_reason,adress,telephone);
  this.router.navigateByUrl('/')
  this.dataadded = true;
  this.msg = 'Data Added successfully';
  alert("Se ha creado correctamento el proveedor")
  }

  ngOnInit() {
  }

}

