
import { Component, OnInit } from '@angular/core';
import { SaleService } from '../sale.service';
import Sale from '../sale_model';
import { Router } from '@angular/router'

@Component({
  selector: 'app-sale-get',
  templateUrl: './sale-get.component.html',
  styleUrls: ['./sale-get.component.css']
})
export class SaleGetComponent implements OnInit {
  sale: Sale[];
  constructor(private ms: SaleService , private router: Router) { }

  deleteSale(id) {
    this.ms.deleteSale(id).subscribe(res => {
      alert("Se ha eliminado correctamente la venta")
      console.log('Deleted');
      this.ngOnInit();
    });
  }

  refresh() {
    this.router.navigateByUrl('sale')
  }
  ngOnInit() {
    this.ms.getSale().subscribe((data: Sale[]) => {
      this.sale = data;
    });
  }

}

