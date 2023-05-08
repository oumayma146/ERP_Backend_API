<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            "nom" => $this->nom,
            "prenom" => $this->prenom,
            "adresse" => $this->adresse,
            "telephone" => $this->telephone,
            "chiffre_affaire"=> $this->chiffre_affaire,
         
        ];
    }
}
