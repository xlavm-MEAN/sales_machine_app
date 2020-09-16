
import { Component, OnInit } from '@angular/core';
import { InvoiceService } from '../invoice.service';
import Invoice from '../invoice_model';
import { Router } from '@angular/router'

@Component({
  selector: 'app-invoice-get',
  templateUrl: './invoice-get.component.html',
  styleUrls: ['./invoice-get.component.css']
})
export class InvoiceGetComponent implements OnInit {
  invoice: Invoice[];
  constructor(private ms: InvoiceService, private router: Router) { }

  deleteInvoice(id) {
    this.ms.deleteInvoice(id).subscribe(res => {
      alert("Se ha eliminado correctamente la factura")
      console.log('Deleted');
      this.ngOnInit();
    });
  }

  refresh() {
    this.router.navigateByUrl('invoice')
  }
  ngOnInit() {
    this.ms.getInvoice().subscribe((data: Invoice[]) => {
      this.invoice = data;
    });
  }

}

