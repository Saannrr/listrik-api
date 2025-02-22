<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TagihanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_tagihan' => $this->id_tagihan,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
            'jumlah_meter' => $this->jumlah_meter,
            'status' => $this->status,
            'penggunaan' => $this->whenLoaded('penggunaan'),
            'pelanggan' => $this->whenLoaded('pelanggan'),
            'created_at' => $this->created_at->format('d-m-Y H:i'),
            'updated_at' => $this->updated_at->format('d-m-Y H:i'),
        ];
    }
}
