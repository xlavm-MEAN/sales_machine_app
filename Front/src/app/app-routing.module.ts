
import {NgModule} from '@angular/core';
import {Routes , RouterModule} from '@angular/router';



import { Checklist_stateAddComponent } from './checklist_state-add/checklist_state-add.component';
import { Checklist_stateEditComponent } from './checklist_state-edit/checklist_state-edit.component';
import { Checklist_stateGetComponent } from './checklist_state-get/checklist_state-get.component';

import { InventaryAddComponent } from './inventary-add/inventary-add.component';
import { InventaryEditComponent } from './inventary-edit/inventary-edit.component';
import { InventaryGetComponent } from './inventary-get/inventary-get.component';

import { MachineAddComponent } from './machine-add/machine-add.component';
import { MachineEditComponent } from './machine-edit/machine-edit.component';
import { MachineGetComponent } from './machine-get/machine-get.component';

import { ProviderAddComponent } from './provider-add/provider-add.component';
import { ProviderEditComponent } from './provider-edit/provider-edit.component';
import { ProviderGetComponent } from './provider-get/provider-get.component';

import { ShoppingAddComponent } from './shopping-add/shopping-add.component';
import { ShoppingEditComponent } from './shopping-edit/shopping-edit.component';
import { ShoppingGetComponent } from './shopping-get/shopping-get.component';




const routes = [
    
	
	{
        path: 'checklist_state/create',
        component: Checklist_stateAddComponent
    },
    {
        path: 'checklist_state',
        component: Checklist_stateGetComponent
    } ,
    {
        path: 'checklist_state/edit/:id',
        component: Checklist_stateEditComponent
    },

	{
        path: 'inventary/create',
        component: InventaryAddComponent
    },
    {
        path: 'inventary',
        component: InventaryGetComponent
    } ,
    {
        path: 'inventary/edit/:id',
        component: InventaryEditComponent
    },

	{
        path: 'machine/create',
        component: MachineAddComponent
    },
    {
        path: 'machine',
        component: MachineGetComponent
    } ,
    {
        path: 'machine/edit/:id',
        component: MachineEditComponent
    },

	{
        path: 'provider/create',
        component: ProviderAddComponent
    },
    {
        path: 'provider',
        component: ProviderGetComponent
    } ,
    {
        path: 'provider/edit/:id',
        component: ProviderEditComponent
    },

	{
        path: 'shopping/create',
        component: ShoppingAddComponent
    },
    {
        path: 'shopping',
        component: ShoppingGetComponent
    } ,
    {
        path: 'shopping/edit/:id',
        component: ShoppingEditComponent
    },

	
];

@NgModule({
    imports: [RouterModule.forRoot(routes)] ,
    exports: [RouterModule]
})

export class AppRoutingModule {
}

