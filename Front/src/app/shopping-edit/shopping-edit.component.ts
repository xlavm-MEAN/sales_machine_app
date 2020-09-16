
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { ShoppingService } from '../shopping.service';


@Component({
  selector: 'app-shopping-edit',
  templateUrl: './shopping-edit.component.html',
  styleUrls: ['./shopping-edit.component.css']
})


export class ShoppingEditComponent implements OnInit {

  shopping_editForm;
  shopping: any = {};

  // tslint:disable-next-line:max-line-length
  constructor(private route: ActivatedRoute, private router: Router, private ms: ShoppingService, private fb: FormBuilder) { this.createForm(); }

  createForm() {
    this.shopping_editForm = this.fb.group({
      
	  receipt_shopping: ['', Validators.required],seller_id: ['', Validators.required],provider_id: ['', Validators.required],price_shopping: ['', Validators.required],date_shopping: ['', Validators.required]
	  
    });
  }

  updateShopping(receipt_shopping,seller_id,provider_id,price_shopping,date_shopping) {
    this.route.params.subscribe(params => {
      this.ms.updateShopping(receipt_shopping,seller_id,provider_id,price_shopping,date_shopping ,params['id']);
      this.router.navigate(['shopping']);
    });
    alert("Se ha editado correctamente la compra")
  }


  ngOnInit() {
    this.route.params.subscribe(params => {
      this.ms.editShopping(params['id']).subscribe(res => {
        this.shopping = res;
      });
    });
  }
}

