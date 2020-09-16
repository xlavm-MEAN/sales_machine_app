
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { SaleService } from '../sale.service';


@Component({
  selector: 'app-sale-edit',
  templateUrl: './sale-edit.component.html',
  styleUrls: ['./sale-edit.component.css']
})


export class SaleEditComponent implements OnInit {

  sale_editForm;
  sale: any = {};

  // tslint:disable-next-line:max-line-length
  constructor(private route: ActivatedRoute, private router: Router, private ms: SaleService, private fb: FormBuilder) { this.createForm(); }

  createForm() {
    this.sale_editForm = this.fb.group({
      
	  receipt_sale: ['', Validators.required],seller_id: ['', Validators.required],invoice_id: ['', Validators.required],sale_date: ['', Validators.required],sale_value: ['', Validators.required]
	  
    });
  }

  updateSale(receipt_sale,seller_id,invoice_id,sale_date,sale_value) {
    this.route.params.subscribe(params => {
      this.ms.updateSale(receipt_sale,seller_id,invoice_id,sale_date,sale_value ,params['id']);
      this.router.navigate(['sale']);
    });
    alert("Se ha editado correctamente la venta")
  }


  ngOnInit() {
    this.route.params.subscribe(params => {
      this.ms.editSale(params['id']).subscribe(res => {
        this.sale = res;
      });
    });
  }
}

