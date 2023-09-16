import { Component } from '@angular/core';
import { ProduitVenteService } from '../shared/service/produit-vente.service';

@Component({
  selector: 'app-container',
  templateUrl: './container.component.html',
  styleUrls: ['./container.component.css']
})
export class ContainerComponent {
  searchProd: string="";
  nonProduit:boolean = false;
    constructor(private produitService:ProduitVenteService){}

    ngOnInit(){
      //
    }

    searchProduitByCode(event:Event)
    {
      let input=event.target as HTMLInputElement;
      console.log(input.value);
      
      this.produitService.search(input.value).subscribe(data =>{
        if (data.data[0]===null) {
          this.nonProduit = true;
        }
        else{
          this.nonProduit = false
        }
          console.log(data);
      })
    }
}
