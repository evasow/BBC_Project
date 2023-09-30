import { Component } from '@angular/core';
import { FormArray, FormBuilder } from '@angular/forms';

@Component({
  selector: 'app-produit-vente',
  templateUrl: './produit-vente.component.html',
  styleUrls: ['./produit-vente.component.css']
})
export class ProduitVenteComponent {


  constructor(private fb:FormBuilder){}

  formProduits=this.fb.group({
    libelle : [""],
    code : [{value: null,disabled: true}],
    photo :  [""],
    quantite_stock :  [null], 
    prix_unitaire :  [null], 
    marque : [""],
    categorie : [""],
    prix_gros :  [null], 
    succursale_id :  [null], 
    caracteristiques : this.fb.array([])
  });

  newCaracteristiques(){
    return this.fb.group({
      caracteristiques_id : [null],
      valeur : [null],
      unite_id : [null],
    })
  }

  get caracteristiques():FormArray{
      return this.formProduits.get("caracteristiques") as FormArray;
  }

  addCaracteristique(){
    this.caracteristiques.push(this.newCaracteristiques());
  }

  removeCaracteristique(i:number){
    this.caracteristiques.removeAt(i);
  }

  onSubmitProduct(){

  }


}
