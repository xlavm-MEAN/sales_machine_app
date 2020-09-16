
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class InvoiceService {

  uri = 'http://localhost:3002/invoice';


  constructor(private http: HttpClient) { }

  addInvoice(invoice_id,seller_id,receipt_sale,value,date) {
    const obj = {
      
	  invoice_id:invoice_id,seller_id:seller_id,receipt_sale:receipt_sale,value:value,date:date
	  
    };
    console.log(obj);
    this.http.post(`${this.uri}/add`, obj)
      .subscribe(res => console.log('Done'));
  }

  getInvoice() {
    return this.http.get(`${this.uri}`);
  }

  editInvoice(id) {
    return this.http.get(`${this.uri}/edit/${id}`);
  }

  updateInvoice(invoice_id,seller_id,receipt_sale,value,date ,id) {
    const obj = {
      
	  invoice_id:invoice_id,seller_id:seller_id,receipt_sale:receipt_sale,value:value,date:date
	  
    };
    this.http.post(`${this.uri}/update/${id}`, obj)
      .subscribe(res => console.log('Done'));
  }

  deleteInvoice(id) {
    return this.http.get(`${this.uri}/delete/${id}`);
  }
  
}

