import { Caracteristique } from "./caracteristique";
import { Succursale } from "./succursale";

export interface ProduitLoad {
    id?:number;
    photo: string;
    libelle: string;
    description?: string;
    code?:number;
    caracteristiques?:Caracteristique[];
    succursales?:Succursale[];
}
