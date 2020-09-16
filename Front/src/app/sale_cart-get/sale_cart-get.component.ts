
import { Component, OnInit } from '@angular/core';
import { Sale_cartService } from '../sale_cart.service';
import Sale_cart from '../sale_cart_model';

@Component({
  selector: 'app-sale_cart-get',
  templateUrl: './sale_cart-get.component.html',
  styleUrls: ['./sale_cart-get.component.css']
})
export class Sale_cartGetComponent implements OnInit {
  sale_cart: Sale_cart[];
  constructor(private ms: Sale_cartService) { }

  deleteSale_cart(id) {
    this.ms.deleteSale_cart(id).subscribe(res => {
      
      console.log('Deleted');
      this.ngOnInit();
    });
  }

  refresh() {
    location.reload();
  }
  ngOnInit() {
    this.ms.getSale_cart().subscribe((data: Sale_cart[]) => {
      this.sale_cart = data;
    });
  }

}

