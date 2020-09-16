
import { Component, OnInit } from '@angular/core';
import { ProviderService } from '../provider.service';
import Provider from '../provider_model';
import { Router } from '@angular/router'

@Component({
  selector: 'app-provider-get',
  templateUrl: './provider-get.component.html',
  styleUrls: ['./provider-get.component.css']
})
export class ProviderGetComponent implements OnInit {
  provider: Provider[];
  constructor(private ms: ProviderService, private router: Router) { }

  deleteProvider(id) {
    this.ms.deleteProvider(id).subscribe(res => {
      alert("Se ha eliminado correctamente el proveedor")
      console.log('Deleted');
      this.ngOnInit();
    });
  }

  refresh() {
    this.router.navigateByUrl('provider')
  }
  ngOnInit() {
    this.ms.getProvider().subscribe((data: Provider[]) => {
      this.provider = data;
    });
  }

}

