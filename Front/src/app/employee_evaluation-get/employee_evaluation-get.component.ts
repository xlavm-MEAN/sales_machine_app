
import { Component, OnInit } from '@angular/core';
import { Employee_evaluationService } from '../employee_evaluation.service';
import Employee_evaluation from '../employee_evaluation_model';
import { Router } from '@angular/router'

@Component({
  selector: 'app-employee_evaluation-get',
  templateUrl: './employee_evaluation-get.component.html',
  styleUrls: ['./employee_evaluation-get.component.css']
})
export class Employee_evaluationGetComponent implements OnInit {
  employee_evaluation: Employee_evaluation[];
  constructor(private ms: Employee_evaluationService, private router: Router) { }

  deleteEmployee_evaluation(id) {
    this.ms.deleteEmployee_evaluation(id).subscribe(res => {
      alert("Se ha eliminado correctamente la evalucación del empleado")
      console.log('Deleted');
      this.ngOnInit();
    });
  }

  refresh() {
    this.router.navigateByUrl('employee_evaluation')
  }
  ngOnInit() {
    this.ms.getEmployee_evaluation().subscribe((data: Employee_evaluation[]) => {
      this.employee_evaluation = data;
    });
  }

}

