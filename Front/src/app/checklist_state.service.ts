
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class Checklist_stateService {

  uri = 'http://localhost:3003/checklist_state';


  constructor(private http: HttpClient) { }

  addChecklist_state(checklist_id,serial_machine,receipt_shopping,checklist_date,point1,point2,point3,point4,point5) {
    const obj = {
      
	  checklist_id:checklist_id,serial_machine:serial_machine,receipt_shopping:receipt_shopping,checklist_date:checklist_date,point1:point1,point2:point2,point3:point3,point4:point4,point5:point5
	  
    };
    console.log(obj);
    this.http.post(`${this.uri}/add`, obj)
      .subscribe(res => console.log('Done'));
  }

  getChecklist_state() {
    return this.http.get(`${this.uri}`);
  }

  editChecklist_state(id) {
    return this.http.get(`${this.uri}/edit/${id}`);
  }

  updateChecklist_state(checklist_id,serial_machine,receipt_shopping,checklist_date,point1,point2,point3,point4,point5 ,id) {
    const obj = {
      
	  checklist_id:checklist_id,serial_machine:serial_machine,receipt_shopping:receipt_shopping,checklist_date:checklist_date,point1:point1,point2:point2,point3:point3,point4:point4,point5:point5
	  
    };
    this.http.post(`${this.uri}/update/${id}`, obj)
      .subscribe(res => console.log('Done'));
  }

  deleteChecklist_state(id) {
    return this.http.get(`${this.uri}/delete/${id}`);
  }
  
}

