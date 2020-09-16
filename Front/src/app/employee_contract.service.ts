
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class Employee_contractService {

  uri = 'http://localhost:3001/employee_contract';


  constructor(private http: HttpClient) { }

  addEmployee_contract(number_contract,employee_id,clause_one,clause_two,clause_tree,observations) {
    const obj = {
      
	  number_contract:number_contract,employee_id:employee_id,clause_one:clause_one,clause_two:clause_two,clause_tree:clause_tree,observations:observations
	  
    };
    console.log(obj);
    this.http.post(`${this.uri}/add`, obj)
      .subscribe(res => console.log('Done'));
  }

  getEmployee_contract() {
    return this.http.get(`${this.uri}`);
  }

  editEmployee_contract(id) {
    return this.http.get(`${this.uri}/edit/${id}`);
  }

  updateEmployee_contract(number_contract,employee_id,clause_one,clause_two,clause_tree,observations ,id) {
    const obj = {
      
	  number_contract:number_contract,employee_id:employee_id,clause_one:clause_one,clause_two:clause_two,clause_tree:clause_tree,observations:observations
	  
    };
    this.http.post(`${this.uri}/update/${id}`, obj)
      .subscribe(res => console.log('Done'));
  }

  deleteEmployee_contract(id) {
    return this.http.get(`${this.uri}/delete/${id}`);
  }
  
}

