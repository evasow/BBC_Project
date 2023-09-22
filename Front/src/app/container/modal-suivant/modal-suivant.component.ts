import { Component, EventEmitter, Input, Output } from '@angular/core';
import { Commande } from 'src/app/shared/interface/commande';
import { InfosVente } from 'src/app/shared/interface/infos-vente';

@Component({
  selector: 'app-modal-suivant',
  templateUrl: './modal-suivant.component.html',
  styleUrls: ['./modal-suivant.component.css']
})
export class ModalSuivantComponent {

  @Input() montantTotal!: number;
  @Input() infosVente!: InfosVente[];
  @Output() venteSender=new EventEmitter<Commande>();

  emitVente(vente: any){
    // console.log(vente);
    this.venteSender.emit(vente);
    
  }
}
