<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PenggunaanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_penggunaan' => $this->id_penggunaan,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
            'meter_awal' => $this->meter_awal,
            'meter_akhir' => $this->meter_akhir,
            'pelanggan' => $this->whenLoaded('pelanggan'),
            'created_at' => $this->created_at->format('d-m-Y H:i'),
            'updated_at' => $this->updated_at->format('d-m-Y H:i'),
        ];
    }
}
