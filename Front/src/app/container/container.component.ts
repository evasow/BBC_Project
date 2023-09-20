import { Component } from '@angular/core';
import { ProduitVenteService } from '../shared/service/produit-vente.service';
import { ProduitLoad } from '../shared/interface/produit-load';
import { environment } from 'src/environments/environment.development';
import { Succursale } from '../shared/interface/succursale';
import { InfosVente } from '../shared/interface/infos-vente';
import { FormBuilder } from '@angular/forms';

@Component({
  selector: 'app-container',
  templateUrl: './container.component.html',
  styleUrls: ['./container.component.css']
})
export class ContainerComponent {
  searchProd: string="";
  nonProduit:boolean = false;
  produitVente!:ProduitLoad;
  produitOfSuccursale!:Succursale
  infosVente!:InfosVente[]
  succursale:string ="BBC colobane";
  montantTotal:number =0

  

    constructor(private produitService:ProduitVenteService, private fb:FormBuilder){}

    formTotalMontant=this.fb.group({
      remise:[],
      montant_total:[{value:0, disabled :true}]
    })

    ngOnInit(){
      this.produitVente=environment.defaulProduit;
      this.produitOfSuccursale=environment.produitOfSuccursale
    }

    searchProduitByCode(event:Event)
    {
      let input=event.target as HTMLInputElement;

      this.nonProduit = false
      this.produitVente=environment.defaulProduit;
      if (input.value.length >3) {
        this.produitService.search(input.value).subscribe(data =>{
          if (data.data[0]===null) {
            this.nonProduit = true;
          }
          else{
            this.produitVente = data.data[0];
            this.nonProduit = false
            this.produitOfSuccursale=this.searchProduitSuccursale(data.data[0].succursales!, this.succursale);
            console.log(this.produitVente);
            console.log(this.produitOfSuccursale); 
          }  
        })     
      }
      
    }
    searchProduitSuccursale(tab:Succursale[], libelle:string){

        return tab.filter(data =>data.libelle==libelle)[0]
    }
    calculMontantTotal(tab:InfosVente[]){
      return tab.reduce((acc,value)=>{
        return acc + (value.montant*value.quantite);
      },0)
    }
    ajouterProduit(produit:InfosVente[])
    {
      this.infosVente=produit; 
      
      this.formTotalMontant.get('montant_total')?.setValue(this.calculMontantTotal(this.infosVente))
      console.log(produit);
      this.montantTotal=this.formTotalMontant.get('montant_total')?.value!;
    }
    validerMontant(){
      console.log(this.formTotalMontant);
      
      
    }
    setMontantTotal(montant:number){
        console.log(montant);
        
    }
      
}
