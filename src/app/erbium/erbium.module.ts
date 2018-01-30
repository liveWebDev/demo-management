import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';


import { ErbiumComponent } from './erbium.component';
import { ErbiumRoutes } from './erbium.routing';

@NgModule({
	imports: [
	RouterModule.forChild(ErbiumRoutes)
	],
	declarations:[
	ErbiumComponent
	]

})

export class ErbiumModule {

}