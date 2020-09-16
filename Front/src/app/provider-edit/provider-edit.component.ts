
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { ProviderService } from '../provider.service';


@Component({
  selector: 'app-provider-edit',
  templateUrl: './provider-edit.component.html',
  styleUrls: ['./provider-edit.component.css']
})


export class ProviderEditComponent implements OnInit {

  provider_editForm;
  provider: any = {};

  // tslint:disable-next-line:max-line-length
  constructor(private route: ActivatedRoute, private router: Router, private ms: ProviderService, private fb: FormBuilder) { this.createForm(); }

  createForm() {
    this.provider_editForm = this.fb.group({
      
	  provider_id: ['', Validators.required],social_reason: ['', Validators.required],adress: ['', Validators.required],telephone: ['', Validators.required]
	  
    });
  }

  updateProvider(provider_id,social_reason,adress,telephone) {
    this.route.params.subscribe(params => {
      this.ms.updateProvider(provider_id,social_reason,adress,telephone ,params['id']);
      this.router.navigate(['provider']);
    });
    alert("Se ha editado correctamente el proveedor")
  }


  ngOnInit() {
    this.route.params.subscribe(params => {
      this.ms.editProvider(params['id']).subscribe(res => {
        this.provider = res;
      });
    });
  }
}

