<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class UfValue extends Component
{
    public $ufValue;
    public $date;
    public $isReal;


    public function __construct()
    {
        $ufData = Cache::remember('uf_value_day', 3600, function () {
            try {
                $response = Http::timeout(4)->get('https://mindicador.cl/api/uf');
                
                if ($response->successful()) {
                    $json = $response->json();
                    if (isset($json['serie'][0])) {
                        return [
                            'value' => $json['serie'][0]['valor'],
                            'date' => date('d-m-Y', strtotime($json['serie'][0]['fecha'])),
                            'is_real' => true,
                        ];
                    }
                }
            } catch (\Exception $e) {
                Log::warning('Error consultando API de UF: ' . $e->getMessage());
            }

            return [
                'value' => 37854.29,
                'date' => date('d-m-Y'),
                'is_real' => false,
            ];
        });

        $this->ufValue = $ufData['value'];
        $this->date = $ufData['date'];
        $this->isReal = $ufData['is_real'];
    }

    public function render(): View|Closure|string
    {
        return view('components.uf-value');
    }
}
