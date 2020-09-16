
import { Component, OnInit } from '@angular/core';
import { MachineService } from '../machine.service';
import Machine from '../machine_model';
import { Router } from '@angular/router'

@Component({
  selector: 'app-machine-get',
  templateUrl: './machine-get.component.html',
  styleUrls: ['./machine-get.component.css']
})
export class MachineGetComponent implements OnInit {
  machine: Machine[];
  constructor(private ms: MachineService, private router: Router) { }

  deleteMachine(id) {
    this.ms.deleteMachine(id).subscribe(res => {
      alert("Se ha eliminado correctamente la maquina")
      console.log('Deleted');
      this.ngOnInit();
    });
  }

  refresh() {
    this.router.navigateByUrl('machine')
  }
  ngOnInit() {
    this.ms.getMachine().subscribe((data: Machine[]) => {
      this.machine = data;
    });
  }

}

