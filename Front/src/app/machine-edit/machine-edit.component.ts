
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { MachineService } from '../machine.service';


@Component({
  selector: 'app-machine-edit',
  templateUrl: './machine-edit.component.html',
  styleUrls: ['./machine-edit.component.css']
})


export class MachineEditComponent implements OnInit {

  machine_editForm;
  machine: any = {};

  // tslint:disable-next-line:max-line-length
  constructor(private route: ActivatedRoute, private router: Router, private ms: MachineService, private fb: FormBuilder) { this.createForm(); }

  createForm() {
    this.machine_editForm = this.fb.group({
      
	  serial: ['', Validators.required],brand: ['', Validators.required],model: ['', Validators.required],ubication: ['', Validators.required],price_shopping: ['', Validators.required],receipt_shopping: ['', Validators.required],creation_date: ['', Validators.required],sale_date: ['', Validators.required],seller_id: ['', Validators.required],receipt_sale: ['', Validators.required],state: ['', Validators.required]
	  
    });
  }

  updateMachine(serial,brand,model,ubication,price_shopping,receipt_shopping,creation_date,sale_date,seller_id,receipt_sale,state) {
    this.route.params.subscribe(params => {
      this.ms.updateMachine(serial,brand,model,ubication,price_shopping,receipt_shopping,creation_date,sale_date,seller_id,receipt_sale,state ,params['id']);
      this.router.navigate(['machine']);
    });
    alert("Se ha editado correctamente la maquina")
  }


  ngOnInit() {
    this.route.params.subscribe(params => {
      this.ms.editMachine(params['id']).subscribe(res => {
        this.machine = res;
      });
    });
  }
}

