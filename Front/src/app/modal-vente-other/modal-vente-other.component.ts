import { Component, EventEmitter, Input, Output } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { InfosVente } from '../shared/interface/infos-vente';
import { ProduitLoad } from '../shared/interface/produit-load';
import { Succursale } from '../shared/interface/succursale';

@Component({
  selector: 'app-modal-vente-other',
  templateUrl: './modal-vente-other.component.html',
  styleUrls: ['./modal-vente-other.component.css']
})
export class ModalVenteOtherComponent {
    // formInfosVente!:FormGroup;
    mntValide:boolean = false;

    tabInfVente:InfosVente[]=[]
  
    @Input() produitOfSuccursale!:Succursale
    @Input() produitVente!:ProduitLoad;
    @Output() produitSender=new EventEmitter<InfosVente[]>();
    constructor (private fb:FormBuilder){}


  formInfosVente = this.fb.group({
    prix:[0,[Validators.required]],
    quantite:[0,[Validators.required]],
    produit:[""],
    produit_succursale_id:[0]

  })

  validerMontant(){
    let montant=this.formInfosVente.get('prix')?.value
    if (montant! < this.produitOfSuccursale.prix_unitaire)
    {
      this.mntValide=true
    }
    else{
      this.mntValide=false

    }
  }
  getColor(){
    // console.log(this.produitVente);
    
    let montant=this.formInfosVente.get('prix')?.value
    if (montant==0 || montant==this.produitOfSuccursale.prix_unitaire) {
      return {
        "bg-sky-200":true
      }
    }
    else{
      return{
        "bg-red-500":this.mntValide,"bg-green-500":!this.mntValide
      }
    }
  }
  onInputQuantite(){
    let quantite=this.formInfosVente.get('quantite')?.value
    if (quantite! > this.produitOfSuccursale.quantite_stock) {  
      this.formInfosVente.get('quantite')?.setValue(this.produitOfSuccursale.quantite_stock)
    }
  }
  ajouterProduit(){
    
    this.formInfosVente.get('produit')?.setValue(this.produitVente.libelle)
    this.formInfosVente.get('produit_succursale_id')?.setValue(this.produitVente.id_produit_succ!)

    let infVal=this.formInfosVente.value as InfosVente
    console.log(this.produitVente);
    
    this.tabInfVente.push(infVal);
    this.produitSender.emit(this.tabInfVente)
    this.formInfosVente.reset();
    console.log(infVal);
 
  }
}
