
import { Component, OnInit } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  Validators
} from '@angular/forms';
import { Router } from '@angular/router'

import { ShoppingService } from '../shopping.service';

@Component({
  selector: 'app-shopping-add',
  templateUrl: './shopping-add.component.html',
  styleUrls: ['./shopping-add.component.css']
})
export class ShoppingAddComponent implements OnInit {
  dataadded = false;
  msg: String ;
  shopping_addForm;
  constructor(private fb: FormBuilder , private bs: ShoppingService,private router: Router) {
    this.createForm();
  }

  createForm() {
    this.shopping_addForm = this.fb.group({
      
	  receipt_shopping: ['', Validators.required],seller_id: ['', Validators.required],provider_id: ['', Validators.required],price_shopping: ['', Validators.required],date_shopping: ['', Validators.required]
	  
    });
  }

  addShopping (receipt_shopping,seller_id,provider_id,price_shopping,date_shopping) {
  this.bs.addShopping(receipt_shopping,seller_id,provider_id,price_shopping,date_shopping);
  this.dataadded = true;
  this.msg = 'Data Added successfully';
  alert("Se ha creado correctamente la compra, por favor registrala en el inventario")
  this.router.navigateByUrl('inventary/create')
  }

  ngOnInit() {
  }

}

