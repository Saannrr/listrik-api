<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PelangganResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
          'id_pelanggan' => $this->id_pelanggan,
            'username' => $this->username,
            'nomor_kwh' => $this->nomor_kwh,
            'nama_pelanggan' => $this->nama_pelanggan,
            'alamat' => $this->alamat,
            'tarif' => $this->whenLoaded('tarif'),
            'created_at' => $this->created_at->format('d-m-Y H:i'),
            'updated_at' => $this->updated_at->format('d-m-Y H:i'),
        ];
    }
}
