<?php

namespace App\Console\Commands;

use App\Models\Property;
use Illuminate\Console\Command;

class ImportSprawnaAbcGarages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:sprawna-abc-garages {--dry-run : Tylko pokaż co zostanie zaimportowane, bez zapisu do bazy}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import garaży z pliku CSV (Sprawna ABC) budynków A, B, C do tabeli properties.';

    protected int $investmentId = 2;

    protected array $buildingMap = [
        'A' => 1,
        'B' => 2,
        'C' => 3,
    ];

    protected array $floorMap = [
        'A' => 14,
        'B' => 13,
        'C' => 12,
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dryRun = (bool) $this->option('dry-run');
        $numberOrder = (int) Property::where('investment_id', $this->investmentId)->max('number_order');

        $path = public_path('uploads/Zestawienie mieszkan - Garaze.csv');

        if (!file_exists($path)) {
            $this->error("Brak pliku: {$path}");
            return self::FAILURE;
        }

        $handle = fopen($path, 'r');
        fgets($handle); // pomiń nagłówek

        $imported = 0;
        $skipped = 0;

        while (($line = fgets($handle)) !== false) {
            $line = rtrim($line, "\r\n");
            if ($line === '') {
                continue;
            }

            $cols = str_getcsv($line, ';');
            // Budynek;Garaż;Cena
            [$building, $garaz, $cena] = array_pad($cols, 3, '');

            $cenaClean = str_replace([' ', ','], ['', '.'], $cena);
            if (!is_numeric($cenaClean)) {
                $skipped++;
                continue;
            }

            $priceBrutto = (float) $cenaClean;
            $priceNetto = round($priceBrutto / 1.23, 2);

            $number = $building . $garaz;
            $numberOrder++;

            $data = [
                'investment_id' => $this->investmentId,
                'building_id' => $this->buildingMap[$building],
                'floor_id' => $this->floorMap[$building],
                'status' => 1,
                'name' => ['pl' => "Miejsce parkingowe {$number}"],
                'name_list' => ['pl' => 'Miejsce parkingowe'],
                'number' => $number,
                'number_order' => $numberOrder,
                'type' => 4,
                'rooms' => 0,
                'area' => '',
                'area_search' => 0,
                'price' => $priceNetto,
                'price_brutto' => $priceBrutto,
                'vat' => 23,
                'active' => 1,
                'promotion_price_show' => 0,
            ];

            if ($dryRun) {
                $this->line(json_encode($data, JSON_UNESCAPED_UNICODE));
            } else {
                Property::create($data);
            }

            $imported++;
        }

        fclose($handle);

        $this->info(($dryRun ? '[DRY RUN] ' : '') . "Zaimportowano {$imported} garaży, pominięto {$skipped} (bez ceny).");

        return self::SUCCESS;
    }
}
