import { Component, ElementRef, ViewChild } from '@angular/core';
import { ProduitVenteService } from '../shared/service/produit-vente.service';
import { ProduitLoad } from '../shared/interface/produit-load';
import { environment } from 'src/environments/environment.development';
import { Succursale } from '../shared/interface/succursale';
import { InfosVente } from '../shared/interface/infos-vente';
import { FormBuilder } from '@angular/forms';
import { Commande } from '../shared/interface/commande';
import { CommandeService } from '../shared/service/commande.service';
import { ModalVenteComponent } from './modal-vente/modal-vente.component';
import { TableVenteComponent } from './table-vente/table-vente.component';
import { ToastrService } from 'ngx-toastr';
import { User } from '../shared/interface/user';

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

  user:User=JSON.parse(localStorage.getItem('user')!);

  @ViewChild('modalVente') modalVente! : ModalVenteComponent
  @ViewChild('tableVente') tableVente! :TableVenteComponent
  

    constructor(private toastr: ToastrService, private produitService:ProduitVenteService, private fb:FormBuilder,private commandeService:CommandeService){}

    formTotalMontant=this.fb.group({
      remise:[],
      montant_total:[{value:0, disabled :true}]
    })

    ngOnInit(){
      // this.showSuccess('azertyu','awa')
      this.produitVente=environment.defaulProduit;
      this.produitOfSuccursale=environment.produitOfSuccursale
    }
    
    showSuccess(message:string,title:string) {
      this.toastr.success(message, title);
    }
    searchProduitByCode(event:Event)
    {
      let input=event.target as HTMLInputElement;

      this.nonProduit = false
      this.produitOfSuccursale=environment.produitOfSuccursale
      this.produitVente=environment.defaulProduit;
      if (input.value.length >3) {
        this.produitService.search(environment.url+'/produits/'+input.value+'/succursale/'+this.user.succursale_id).subscribe(data =>{;
          console.log(data)
          if (data.data[0]==null) {
            this.nonProduit = true;
          }
          else{
            // if (this.produitOfSuccursale) {
              this.produitVente = data.data[0];
              // this.nonProduit = false
              this.produitOfSuccursale=this.searchProduitSuccursale(data.data[0].produit_succursales!, this.succursale);
              console.log(this.produitVente);
              // console.log(this.produitOfSuccursale); 
            // }
          }  
        })     
      } 
    }
    ajouterCommande(commande:Commande){
      this.commandeService.post(commande).subscribe(data =>{
        console.log(data);
        this.showSuccess(data.message,'Ajout Commande')
      })
      console.log(commande);
      this.produitVente.produit_succursales![0].quantite_stock=
      this.produitVente.produit_succursales![0].quantite_stock-this.infosVente[0].quantite
      this.infosVente=[];
      this.produitVente=environment.defaulProduit
      this.formTotalMontant.reset();
      
    }
    searchProduitSuccursale(tab:Succursale[], libelle:string){

        return tab.filter(data =>data.nom==libelle)[0]
    }

    calculMontantTotal(tab:InfosVente[]){
      return tab.reduce((acc,value)=>{
        return acc + (value.prix*value.quantite);
      },0)
    }

    ajouterProduit(produit:InfosVente[])
    {
      console.log(this.tableVente.formTableVente.get("montant_total")?.value);
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
    venteOtherSucc(succ:Succursale, event:Event){
      let divModal = this.modalVente.modalVente.nativeElement;
      console.log(divModal);
      
      divModal.classList.remove("hidden");
      divModal.setAttribute("aria-hidden","false");
      this.produitOfSuccursale=succ
      console.log(succ);
    } 
    updateMontant(){
      let remise = this.formTotalMontant.get("remise")?.value;
      let mnt = this.formTotalMontant.get("montant_total")?.value;
      if (remise) {
        this.formTotalMontant.get("montant_total")?.setValue(mnt!-(remise/100*mnt!)); 
      }
      else{
        this.formTotalMontant.get("montant_total")?.setValue(mnt!+(remise!/100*mnt!)); 
      }
      // console.log(remise);
      // console.log(mnt);
      // console.log(mnt!-(remise!*mnt!/100));
    }   
}
