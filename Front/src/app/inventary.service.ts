
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class InventaryService {

  uri = 'http://localhost:3003/inventary';


  constructor(private http: HttpClient) { }

  addInventary(inventary_id,machine_serial,total_value,inventary_date) {
    const obj = {
      
	  inventary_id:inventary_id,machine_serial:machine_serial,total_value:total_value,inventary_date:inventary_date
	  
    };
    console.log(obj);
    this.http.post(`${this.uri}/add`, obj)
      .subscribe(res => console.log('Done'));
  }

  getInventary() {
    return this.http.get(`${this.uri}`);
  }

  editInventary(id) {
    return this.http.get(`${this.uri}/edit/${id}`);
  }

  updateInventary(inventary_id,machine_serial,total_value,inventary_date ,id) {
    const obj = {
      
	  inventary_id:inventary_id,machine_serial:machine_serial,total_value:total_value,inventary_date:inventary_date
	  
    };
    this.http.post(`${this.uri}/update/${id}`, obj)
      .subscribe(res => console.log('Done'));
  }

  deleteInventary(id) {
    return this.http.get(`${this.uri}/delete/${id}`);
  }
  
}

