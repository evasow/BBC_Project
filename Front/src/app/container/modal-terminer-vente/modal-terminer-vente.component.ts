import { Component, EventEmitter, Input, Output } from '@angular/core';
import { Commande } from 'src/app/shared/interface/commande';
import { InfosVente } from 'src/app/shared/interface/infos-vente';

@Component({
  selector: 'app-modal-terminer-vente',
  templateUrl: './modal-terminer-vente.component.html',
  styleUrls: ['./modal-terminer-vente.component.css']
})
export class ModalTerminerVenteComponent {
  @Input() montantTotal!: number;
  @Input() infosVente!: InfosVente[];
  @Output() venteSender=new EventEmitter<Commande>();

  montantRendu: number=0;
  formData= new FormData();

  montantEncaisse(event: Event){
    let input = event.target as HTMLInputElement;
    if (+input.value>=this.montantTotal) {
      this.montantRendu=+input.value-this.montantTotal;     
    }
    else{
      this.montantRendu=0
    }
  }
  terminerVente(){
    let obj:Commande={
      "user_id":1,
      "client_id":1,
      "produits_succursale":this.infosVente
    }
    this.venteSender.emit(obj);
    console.log(obj);  
  }
}
