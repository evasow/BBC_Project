import { Component } from '@angular/core';
import { ListeProduit } from '../shared/interface/liste-produit';
import { ListProduitsService } from '../shared/service/list-produits.service';
import { Link } from '../shared/interface/link';

@Component({
  selector: 'app-list-produit',
  templateUrl: './list-produit.component.html',
  styleUrls: ['./list-produit.component.css']
})
export class ListProduitComponent {
  listeProduit:ListeProduit[]=[];
  links:Link[] = [];

  constructor(private produitService:ListProduitsService){}

  ngOnInit(){
    this.getProduitsBySuccursale()
    this.getLinks()
  }

  getProduitsBySuccursale(){
    this.produitService.all().subscribe(data=>{
      this.listeProduit=data.data
      console.log(data);
      
    })
  }
  getLinks(){
    this.produitService.all().subscribe(data=>{
      this.links=data.links!
      console.log(this.links);  
    })
  }
  paginate(link: string){
    if (link) {
      this.produitService.all(link).subscribe(data=>{
        this.listeProduit=data.data
        this.links=data.links! 
      })   
    }
  }
  searchProduit(event: Event){
    let input=event.target as HTMLInputElement
    console.log(input.value);
    this.listeProduit=this.listeProduit.filter(d=>d.produit.libelle!==input.value)
    
  }
}
