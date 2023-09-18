import { Component, EventEmitter, Input, Output } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Succursale } from '../../shared/interface/succursale';
import { InfosVente } from 'src/app/shared/interface/infos-vente';

@Component({
  selector: 'app-modal-vente',
  templateUrl: './modal-vente.component.html',
  styleUrls: ['./modal-vente.component.css']
})
export class ModalVenteComponent {
  // formInfosVente!:FormGroup;
  mntValide:boolean = false;
  benMontant:boolean = false;
  tabInfVente:InfosVente[]=[]

  @Input() produitOfSuccursale!:Succursale

  @Output() produitSender=new EventEmitter<InfosVente[]>();
  constructor (private fb:FormBuilder){}

  formInfosVente = this.fb.group({
    montant:[0,[Validators.required]],
    quantite:[0,[Validators.required]]

  })

  validerMontant(){
    let montant=this.formInfosVente.get('montant')?.value
    if (montant! < this.produitOfSuccursale.prix_unitaire)
    {
      this.mntValide=true
    }
    else{
      this.mntValide=false

    }
  }
  getColor(){
    let montant=this.formInfosVente.get('montant')?.value
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
    
    let infVal=this.formInfosVente.value as InfosVente
    this.tabInfVente.push(infVal);
    this.produitSender.emit(this.tabInfVente)
    // this.formInfosVente.reset();
    
    
  }
}
