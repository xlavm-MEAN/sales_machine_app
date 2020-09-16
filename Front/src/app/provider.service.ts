
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ProviderService {

  uri = 'http://localhost:3003/provider';


  constructor(private http: HttpClient) { }

  addProvider(provider_id,social_reason,adress,telephone) {
    const obj = {
      
	  provider_id:provider_id,social_reason:social_reason,adress:adress,telephone:telephone
	  
    };
    console.log(obj);
    this.http.post(`${this.uri}/add`, obj)
      .subscribe(res => console.log('Done'));
  }

  getProvider() {
    return this.http.get(`${this.uri}`);
  }

  editProvider(id) {
    return this.http.get(`${this.uri}/edit/${id}`);
  }

  updateProvider(provider_id,social_reason,adress,telephone ,id) {
    const obj = {
      
	  provider_id:provider_id,social_reason:social_reason,adress:adress,telephone:telephone
	  
    };
    this.http.post(`${this.uri}/update/${id}`, obj)
      .subscribe(res => console.log('Done'));
  }

  deleteProvider(id) {
    return this.http.get(`${this.uri}/delete/${id}`);
  }
  
}

