
import { Component, OnInit } from '@angular/core';
import { Checklist_stateService } from '../checklist_state.service';
import Checklist_state from '../checklist_state_model';
import { Router } from '@angular/router'

@Component({
  selector: 'app-checklist_state-get',
  templateUrl: './checklist_state-get.component.html',
  styleUrls: ['./checklist_state-get.component.css']
})
export class Checklist_stateGetComponent implements OnInit {
  checklist_state: Checklist_state[];
  constructor(private ms: Checklist_stateService, private router: Router) { }

  deleteChecklist_state(id) {
    this.ms.deleteChecklist_state(id).subscribe(res => {
      console.log('Deleted');
      this.ngOnInit();
    });
  }

  refresh() {
    this.router.navigateByUrl('checklist_state')
  }
  ngOnInit() {
    this.ms.getChecklist_state().subscribe((data: Checklist_state[]) => {
      this.checklist_state = data;
    });
  }

}

