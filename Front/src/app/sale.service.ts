
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class SaleService {

  uri = 'http://localhost:3002/sale';


  constructor(private http: HttpClient) { }

  addSale(receipt_sale,seller_id,invoice_id,sale_date,sale_value) {
    const obj = {
      
	  receipt_sale:receipt_sale,seller_id:seller_id,invoice_id:invoice_id,sale_date:sale_date,sale_value:sale_value
	  
    };
    console.log(obj);
    this.http.post(`${this.uri}/add`, obj)
      .subscribe(res => console.log('Done'));
  }

  getSale() {
    return this.http.get(`${this.uri}`);
  }

  editSale(id) {
    return this.http.get(`${this.uri}/edit/${id}`);
  }

  updateSale(receipt_sale,seller_id,invoice_id,sale_date,sale_value ,id) {
    const obj = {
      
	  receipt_sale:receipt_sale,seller_id:seller_id,invoice_id:invoice_id,sale_date:sale_date,sale_value:sale_value
	  
    };
    this.http.post(`${this.uri}/update/${id}`, obj)
      .subscribe(res => console.log('Done'));
  }

  deleteSale(id) {
    return this.http.get(`${this.uri}/delete/${id}`);
  }
  
}

