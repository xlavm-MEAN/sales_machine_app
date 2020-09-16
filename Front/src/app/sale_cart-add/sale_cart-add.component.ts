
import { Component, OnInit } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  Validators
} from '@angular/forms';

import { Sale_cartService } from '../sale_cart.service';

@Component({
  selector: 'app-sale_cart-add',
  templateUrl: './sale_cart-add.component.html',
  styleUrls: ['./sale_cart-add.component.css']
})
export class Sale_cartAddComponent implements OnInit {
  dataadded = false;
  msg: String ;
  sale_cart_addForm;
  constructor(private fb: FormBuilder , private bs: Sale_cartService) {
    this.createForm();
  }

  createForm() {
    this.sale_cart_addForm = this.fb.group({
      
	  receipt_sale: ['', Validators.required],seller_id: ['', Validators.required],invoice_id: ['', Validators.required],sale_date: ['', Validators.required],sale_value: ['', Validators.required]
	  
    });
  }

  addSale_cart (receipt_sale,seller_id,invoice_id,sale_date,sale_value) {
  this.bs.addSale_cart(receipt_sale,seller_id,invoice_id,sale_date,sale_value);
  location.reload();
  this.dataadded = true;
  this.msg = 'Data Added successfully';
  }

  ngOnInit() {
  }

}

