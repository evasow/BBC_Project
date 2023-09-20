import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-modal-suivant',
  templateUrl: './modal-suivant.component.html',
  styleUrls: ['./modal-suivant.component.css']
})
export class ModalSuivantComponent {

  @Input() montantTotal!: number;
}
