import { Caracteristique } from "./caracteristique";
import { Succursale } from "./succursale";

export interface ProduitLoad {
    id_produit?:number;
    id_produit_succ?:number;
    photo: string;
    libelle: string;
    description?: string;
    code?:number;
    caracteristiques?:Caracteristique[];
    produit_succursales?:Succursale[];
}
