
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Checklist_stateService } from '../checklist_state.service';


@Component({
  selector: 'app-checklist_state-edit',
  templateUrl: './checklist_state-edit.component.html',
  styleUrls: ['./checklist_state-edit.component.css']
})


export class Checklist_stateEditComponent implements OnInit {

  checklist_state_editForm;
  checklist_state: any = {};

  // tslint:disable-next-line:max-line-length
  constructor(private route: ActivatedRoute, private router: Router, private ms: Checklist_stateService, private fb: FormBuilder) { this.createForm(); }

  createForm() {
    this.checklist_state_editForm = this.fb.group({
      
	  checklist_id: ['', Validators.required],serial_machine: ['', Validators.required],receipt_shopping: ['', Validators.required],checklist_date: ['', Validators.required],point1: ['', Validators.required],point2: ['', Validators.required],point3: ['', Validators.required],point4: ['', Validators.required],point5: ['', Validators.required]
	  
    });
  }

  updateChecklist_state(checklist_id,serial_machine,receipt_shopping,checklist_date,point1,point2,point3,point4,point5) {
    this.route.params.subscribe(params => {
      this.ms.updateChecklist_state(checklist_id,serial_machine,receipt_shopping,checklist_date,point1,point2,point3,point4,point5 ,params['id']);
      this.router.navigate(['checklist_state']);
    });
    alert("Se ha editado correctamente el checklist de estado")
  }


  ngOnInit() {
    this.route.params.subscribe(params => {
      this.ms.editChecklist_state(params['id']).subscribe(res => {
        this.checklist_state = res;
      });
    });
  }
}

