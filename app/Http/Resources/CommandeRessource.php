<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommandeRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            'reference'=> $this->reference,
            'etat'=> $this->etat,
            'distination'=> $this->distination,
            'quantité'=> $this->quantité,
            'remise'=> $this->remise,
            'montant'=> $this->montant,
            'total_hors_taxe'=> $this->total_hors_taxe,
            'total_fodac'=> $this->total_fodac,
            'total_tva'=> $this->total_tva,
            'total_timbre'=> $this->total_timbre,
            'total_ttc'=> $this->total_ttc,
            'client_id'=> $this->client,
            'fournisseur_id'=> $this->fournisseur,
            'article_id'=> $this->article,
        ];
    }
}
