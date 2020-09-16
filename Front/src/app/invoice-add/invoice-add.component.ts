
import { Component, OnInit } from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  Validators
} from '@angular/forms';
import { Router } from '@angular/router'

import { InvoiceService } from '../invoice.service';

@Component({
  selector: 'app-invoice-add',
  templateUrl: './invoice-add.component.html',
  styleUrls: ['./invoice-add.component.css']
})
export class InvoiceAddComponent implements OnInit {
  dataadded = false;
  msg: String ;
  invoice_addForm;
  constructor(private fb: FormBuilder , private bs: InvoiceService,private router: Router) {
    this.createForm();
  }

  createForm() {
    this.invoice_addForm = this.fb.group({
      
	  invoice_id: ['', Validators.required],seller_id: ['', Validators.required],receipt_sale: ['', Validators.required],value: ['', Validators.required],date: ['', Validators.required]
	  
    });
  }

  addInvoice (invoice_id,seller_id,receipt_sale,value,date) {
  this.bs.addInvoice(invoice_id,seller_id,receipt_sale,value,date);
  this.router.navigateByUrl('/')
  this.dataadded = true;
  this.msg = 'Data Added successfully';
  alert("Se ha creado correctamente la factura")
  }

  ngOnInit() {
  }

}

