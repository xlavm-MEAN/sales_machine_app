
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ShoppingService {

  uri = 'http://localhost:3003/shopping';


  constructor(private http: HttpClient) { }

  addShopping(receipt_shopping,seller_id,provider_id,price_shopping,date_shopping) {
    const obj = {
      
	  receipt_shopping:receipt_shopping,seller_id:seller_id,provider_id:provider_id,price_shopping:price_shopping,date_shopping:date_shopping
	  
    };
    console.log(obj);
    this.http.post(`${this.uri}/add`, obj)
      .subscribe(res => console.log('Done'));
  }

  getShopping() {
    return this.http.get(`${this.uri}`);
  }

  editShopping(id) {
    return this.http.get(`${this.uri}/edit/${id}`);
  }

  updateShopping(receipt_shopping,seller_id,provider_id,price_shopping,date_shopping ,id) {
    const obj = {
      
	  receipt_shopping:receipt_shopping,seller_id:seller_id,provider_id:provider_id,price_shopping:price_shopping,date_shopping:date_shopping
	  
    };
    this.http.post(`${this.uri}/update/${id}`, obj)
      .subscribe(res => console.log('Done'));
  }

  deleteShopping(id) {
    return this.http.get(`${this.uri}/delete/${id}`);
  }
  
}

