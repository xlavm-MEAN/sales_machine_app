
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { InventaryService } from '../inventary.service';


@Component({
  selector: 'app-inventary-edit',
  templateUrl: './inventary-edit.component.html',
  styleUrls: ['./inventary-edit.component.css']
})


export class InventaryEditComponent implements OnInit {

  inventary_editForm;
  inventary: any = {};

  // tslint:disable-next-line:max-line-length
  constructor(private route: ActivatedRoute, private router: Router, private ms: InventaryService, private fb: FormBuilder) { this.createForm(); }

  createForm() {
    this.inventary_editForm = this.fb.group({
      
	  inventary_id: ['', Validators.required],machine_serial: ['', Validators.required],total_value: ['', Validators.required],inventary_date: ['', Validators.required]
	  
    });
  }

  updateInventary(inventary_id,machine_serial,total_value,inventary_date) {
    this.route.params.subscribe(params => {
      this.ms.updateInventary(inventary_id,machine_serial,total_value,inventary_date ,params['id']);
      this.router.navigate(['inventary']);
    });
    alert("Se ha editado correctamente el inventario")
  }


  ngOnInit() {
    this.route.params.subscribe(params => {
      this.ms.editInventary(params['id']).subscribe(res => {
        this.inventary = res;
      });
    });
  }
}

