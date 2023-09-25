import { ProduitLoad } from "./produit-load";

export interface ListeProduit {
    id: number,
    quantite_stock: number,
    prix_unitaire: number,
    prix_gros: number,
    produit_id: number,
    succursale_id: number,
    produit: ProduitLoad
}
