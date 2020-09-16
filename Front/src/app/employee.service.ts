
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class EmployeeService {

  uri = 'http://localhost:3001/employee';


  constructor(private http: HttpClient) { }

  addEmployee(employee_id,first_name,last_name,role,username,password) {
    const obj = {
      
	  employee_id:employee_id,first_name:first_name,last_name:last_name,role:role,username:username,password:password
	  
    };
    console.log(obj);
    this.http.post(`${this.uri}/add`, obj)
      .subscribe(res => console.log('Done'));
  }

  getEmployee() {
    return this.http.get(`${this.uri}`);
  }

  editEmployee(id) {
    return this.http.get(`${this.uri}/edit/${id}`);
  }

  updateEmployee(employee_id,first_name,last_name,role,username,password ,id) {
    const obj = {
      
	  employee_id:employee_id,first_name:first_name,last_name:last_name,role:role,username:username,password:password
	  
    };
    this.http.post(`${this.uri}/update/${id}`, obj)
      .subscribe(res => console.log('Done'));
  }

  deleteEmployee(id) {
    return this.http.get(`${this.uri}/delete/${id}`);
  }
  
}

