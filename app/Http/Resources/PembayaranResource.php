<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PembayaranResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_pembayaran' => $this->id_pembayaran,
            'tanggal_pembayaran' => $this->tanggal_pembayaran,
            'bulan_bayar' => $this->bulan_bayar,
            'biaya_admin' => $this->biaya_admin,
            'total_bayar' => $this->total_bayar,
            'tagihan' => $this->whenLoaded('tagihan'),
            'pelanggan' => $this->whenLoaded('pelanggan'),
            'user' => $this->whenLoaded('user'),
            'created_at' => $this->created_at->format('d-m-Y H:i'),
            'updated_at' => $this->updated_at->format('d-m-Y H:i'),
        ];
    }
}
