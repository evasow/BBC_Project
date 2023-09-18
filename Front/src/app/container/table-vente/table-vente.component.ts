import { Component, Input } from '@angular/core';
import { InfosVente } from 'src/app/shared/interface/infos-vente';
import { ProduitLoad } from 'src/app/shared/interface/produit-load';
import { Succursale } from 'src/app/shared/interface/succursale';

@Component({
  selector: 'app-table-vente',
  templateUrl: './table-vente.component.html',
  styleUrls: ['./table-vente.component.css']
})
export class TableVenteComponent {
  @Input() infosVente:InfosVente[] = [];
  @Input() produitVente!:ProduitLoad

  removeInfVente(item:InfosVente){
    console.log(item);
    
    this.infosVente= this.infosVente.filter(elt=>elt !==item);
  }
}
