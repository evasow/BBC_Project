import { Component, EventEmitter, Input, Output } from '@angular/core';
import { FormBuilder } from '@angular/forms';
import { InfosVente } from 'src/app/shared/interface/infos-vente';
import { ProduitLoad } from 'src/app/shared/interface/produit-load';

@Component({
  selector: 'app-table-vente',
  templateUrl: './table-vente.component.html',
  styleUrls: ['./table-vente.component.css']
})
export class TableVenteComponent {
  @Input() infosVente:InfosVente[] = [];
  @Input() produitVente!:ProduitLoad

  @Output() montantTotal=new EventEmitter<number>();
  // montantTotal:number=this.calculMontantTotal();

constructor(private fb:FormBuilder){}

  totalMontant:number=0
  formTableVente=this.fb.group({
    quantite:[0],
    prix:[0],
    montant_total:[{value:0,disabled:true}],
  })

  updateMontantTotal(event:Event, item:InfosVente){
    let input=event.target as HTMLInputElement
    console.log(item);
    
    let totalMontant= +input.value*item.prix
    this.formTableVente.get('montant_total')?.setValue(totalMontant);
    console.log(totalMontant);
  }

  removeInfVente(item:InfosVente){
    console.log(item);
  
    this.infosVente= this.infosVente.filter(elt=>elt !==item);
  }
}
