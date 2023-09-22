import { InfosVente } from "./infos-vente"

export interface Commande {
    user_id:number
    client_id:number
    produits_succursale:InfosVente[]
}
