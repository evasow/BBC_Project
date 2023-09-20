import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-modal-terminer-vente',
  templateUrl: './modal-terminer-vente.component.html',
  styleUrls: ['./modal-terminer-vente.component.css']
})
export class ModalTerminerVenteComponent {
  @Input() montantTotal!: number;
  montantRendu: number=0;

  montantEncaisse(event: Event){
    let input = event.target as HTMLInputElement;
    if (+input.value>=this.montantTotal) {
      this.montantRendu=+input.value-this.montantTotal;     
    }
    else{
      this.montantRendu=0
    }
  }
}
