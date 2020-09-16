
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Sale_cartService } from '../sale_cart.service';


@Component({
  selector: 'app-sale_cart-edit',
  templateUrl: './sale_cart-edit.component.html',
  styleUrls: ['./sale_cart-edit.component.css']
})


export class Sale_cartEditComponent implements OnInit {

  sale_cart_editForm;
  sale_cart: any = {};

  // tslint:disable-next-line:max-line-length
  constructor(private route: ActivatedRoute, private router: Router, private ms: Sale_cartService, private fb: FormBuilder) { this.createForm(); }

  createForm() {
    this.sale_cart_editForm = this.fb.group({
      
	  receipt_sale: ['', Validators.required],seller_id: ['', Validators.required],invoice_id: ['', Validators.required],sale_date: ['', Validators.required],sale_value: ['', Validators.required]
	  
    });
  }

  updateSale_cart(receipt_sale,seller_id,invoice_id,sale_date,sale_value) {
    this.route.params.subscribe(params => {
      this.ms.updateSale_cart(receipt_sale,seller_id,invoice_id,sale_date,sale_value ,params['id']);
      this.router.navigate(['sale_cart']);
    });
  }


  ngOnInit() {
    this.route.params.subscribe(params => {
      this.ms.editSale_cart(params['id']).subscribe(res => {
        this.sale_cart = res;
      });
    });
  }
}

