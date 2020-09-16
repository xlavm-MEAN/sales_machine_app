
import { Component, OnInit } from '@angular/core';
import { ShoppingService } from '../shopping.service';
import Shopping from '../shopping_model';
import { Router } from '@angular/router'

@Component({
  selector: 'app-shopping-get',
  templateUrl: './shopping-get.component.html',
  styleUrls: ['./shopping-get.component.css']
})
export class ShoppingGetComponent implements OnInit {
  shopping: Shopping[];
  constructor(private ms: ShoppingService, private router: Router) { }

  deleteShopping(id) {
    this.ms.deleteShopping(id).subscribe(res => {
      alert("Se ha eliminado correctamente la compra")
      console.log('Deleted');
      this.ngOnInit();
    });
  }

  refresh() {
    this.router.navigateByUrl('shopping')
  }
  ngOnInit() {
    this.ms.getShopping().subscribe((data: Shopping[]) => {
      this.shopping = data;
    });
  }

}

