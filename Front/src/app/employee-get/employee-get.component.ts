
import { Component, OnInit } from '@angular/core';
import { EmployeeService } from '../employee.service';
import Employee from '../employee_model';
import { Router } from '@angular/router'

@Component({
  selector: 'app-employee-get',
  templateUrl: './employee-get.component.html',
  styleUrls: ['./employee-get.component.css']
})
export class EmployeeGetComponent implements OnInit {
  employee: Employee[];
  constructor(private ms: EmployeeService, private router: Router) { }

  deleteEmployee(id) {
    this.ms.deleteEmployee(id).subscribe(res => {
      alert("Se ha eliminado correctamente el empleado")
      console.log('Deleted');
      this.ngOnInit();
    });
  }

  refresh() {
    this.router.navigateByUrl('employee')
  }

  ngOnInit() {
    this.ms.getEmployee().subscribe((data: Employee[]) => {
      this.employee = data;
    });
  }

}

