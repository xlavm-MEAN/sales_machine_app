
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class Employee_evaluationService {

  uri = 'http://localhost:3001/employee_evaluation';


  constructor(private http: HttpClient) { }

  addEmployee_evaluation(evaluation_number,employee_id,result_evaluation,point1,point2,point3,point4,point5) {
    const obj = {
      
	  evaluation_number:evaluation_number,employee_id:employee_id,result_evaluation:result_evaluation,point1:point1,point2:point2,point3:point3,point4:point4,point5:point5
	  
    };
    console.log(obj);
    this.http.post(`${this.uri}/add`, obj)
      .subscribe(res => console.log('Done'));
  }

  getEmployee_evaluation() {
    return this.http.get(`${this.uri}`);
  }

  editEmployee_evaluation(id) {
    return this.http.get(`${this.uri}/edit/${id}`);
  }

  updateEmployee_evaluation(evaluation_number,employee_id,result_evaluation,point1,point2,point3,point4,point5 ,id) {
    const obj = {
      
	  evaluation_number:evaluation_number,employee_id:employee_id,result_evaluation:result_evaluation,point1:point1,point2:point2,point3:point3,point4:point4,point5:point5
	  
    };
    this.http.post(`${this.uri}/update/${id}`, obj)
      .subscribe(res => console.log('Done'));
  }

  deleteEmployee_evaluation(id) {
    return this.http.get(`${this.uri}/delete/${id}`);
  }
  
}

