
import { Component, OnInit } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  Validators
} from '@angular/forms';
import { Router } from '@angular/router'

import { SaleService } from '../sale.service';

@Component({
  selector: 'app-sale-add',
  templateUrl: './sale-add.component.html',
  styleUrls: ['./sale-add.component.css']
})
export class SaleAddComponent implements OnInit {
  dataadded = false;
  msg: String;
  sale_addForm;
  constructor(private fb: FormBuilder, private bs: SaleService, private router: Router) {
    this.createForm();
  }

  createForm() {
    this.sale_addForm = this.fb.group({

      receipt_sale: ['', Validators.required], seller_id: ['', Validators.required], invoice_id: ['', Validators.required], sale_date: ['', Validators.required], sale_value: ['', Validators.required]

    });
  }

  addSale(receipt_sale, seller_id, invoice_id, sale_date, sale_value) {
    this.bs.addSale(receipt_sale, seller_id, invoice_id, sale_date, sale_value);
    this.dataadded = true;
    this.msg = 'Data Added successfully';
    alert("La venta se ha hecho correctamente, por favor genera la factura")
    this.router.navigateByUrl('invoice/create')
  }

  ngOnInit() {
  }

}

