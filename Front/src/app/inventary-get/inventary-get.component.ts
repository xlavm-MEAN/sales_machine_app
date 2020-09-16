
import { Component, OnInit } from '@angular/core';
import { InventaryService } from '../inventary.service';
import Inventary from '../inventary_model';
import { Router } from '@angular/router'

@Component({
  selector: 'app-inventary-get',
  templateUrl: './inventary-get.component.html',
  styleUrls: ['./inventary-get.component.css']
})
export class InventaryGetComponent implements OnInit {
  inventary: Inventary[];
  constructor(private ms: InventaryService, private router: Router) { }

  deleteInventary(id) {
    this.ms.deleteInventary(id).subscribe(res => {
      alert("Se ha eliminado correctamente el inventario")
      console.log('Deleted');
      this.ngOnInit();
    });
  }

  refresh() {
    this.router.navigateByUrl('inventary')
  }
  ngOnInit() {
    this.ms.getInventary().subscribe((data: Inventary[]) => {
      this.inventary = data;
    });
  }

}

