<?php

namespace App\Console\Commands;

use App\Models\Property;
use Illuminate\Console\Command;

class ImportSprawnaAbcProperties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:sprawna-abc {--dry-run : Tylko pokaż co zostanie zaimportowane, bez zapisu do bazy}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import mieszkań z plików CSV (Sprawna ABC) budynków A, B, C do tabeli properties.';

    protected int $investmentId = 2;

    protected array $buildingMap = [
        'A' => 1,
        'B' => 2,
        'C' => 3,
    ];

    protected array $floorMap = [
        'A' => ['0' => 1, '1' => 2, '2' => 3, '3' => 4],
        'B' => ['0' => 5, '1' => 6, '2' => 7, '3' => 8],
        'C' => ['0' => 9, '1' => 10, '2' => 11],
    ];

    protected array $statusMap = [
        'ok' => 1,
        'sprzedane' => 3,
    ];

    protected array $windowMap = [
        'północ' => '1',
        'południe' => '2',
        'wschód' => '3',
        'zachód' => '4',
        'północny wschód' => '5',
        'północny zachód' => '6',
        'południowy wschód' => '7',
        'południowy zachód' => '8',
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dryRun = (bool) $this->option('dry-run');
        $numberOrder = (int) Property::where('investment_id', $this->investmentId)->max('number_order');

        $totalImported = 0;

        foreach (['A', 'B', 'C'] as $building) {
            $path = public_path("uploads/Zestawienie mieszkan - {$building}.csv");

            if (!file_exists($path)) {
                $this->error("Brak pliku: {$path}");
                continue;
            }

            $handle = fopen($path, 'r');
            // Pomiń nagłówek (i pomiń BOM jeśli występuje)
            fgets($handle);

            $rowNumber = 0;

            while (($line = fgets($handle)) !== false) {
                $line = rtrim($line, "\r\n");
                if ($line === '') {
                    continue;
                }

                $cols = str_getcsv($line, ';');
                // Budynek;Mieszkanie;Piętro;Pokoje;Metraż;Ekspozycja;Cena;m2;Uwagi;status
                [$bud, $mieszkanie, $pietro, $pokoje, $metraz, $ekspozycja, $cena, $m2, $uwagi, $status] = array_pad($cols, 10, '');

                $rowNumber++;
                $numberOrder++;

                $floorId = $this->floorMap[$building][$pietro] ?? null;
                if ($floorId === null) {
                    $this->error("Nieznane piętro '{$pietro}' dla budynku {$building}, wiersz {$rowNumber}");
                    continue;
                }

                $statusKey = mb_strtolower(trim($status));
                $statusValue = $this->statusMap[$statusKey] ?? null;
                if ($statusValue === null) {
                    $this->error("Nieznany status '{$status}' dla {$building}{$mieszkanie}");
                    continue;
                }

                $priceBrutto = (float) str_replace([' ', ','], ['', '.'], $cena);
                $priceNetto = round($priceBrutto / 1.08, 2);

                $window = $this->parseWindow($ekspozycja);
                $gardenArea = $this->parseGardenArea($uwagi);

                $number = $building . $mieszkanie;

                $data = [
                    'investment_id' => $this->investmentId,
                    'building_id' => $this->buildingMap[$building],
                    'floor_id' => $floorId,
                    'status' => $statusValue,
                    'name' => ['pl' => "Mieszkanie {$number}"],
                    'name_list' => ['pl' => 'Mieszkanie'],
                    'number' => $number,
                    'number_order' => $numberOrder,
                    'type' => 1,
                    'rooms' => (int) $pokoje,
                    'area' => $metraz,
                    'area_search' => $metraz,
                    'price' => $priceNetto,
                    'price_brutto' => $priceBrutto,
                    'vat' => 8,
                    'garden_area' => $gardenArea,
                    'window' => json_encode($window),
                    'active' => 1,
                    'promotion_price_show' => 0,
                ];

                if ($dryRun) {
                    $this->line(json_encode($data, JSON_UNESCAPED_UNICODE));
                } else {
                    Property::create($data);
                }

                $totalImported++;
            }

            fclose($handle);
        }

        $this->info(($dryRun ? '[DRY RUN] ' : '') . "Przetworzono {$totalImported} lokali.");

        return self::SUCCESS;
    }

    /**
     * Parsuje kolumnę Ekspozycja na tablicę kodów pola "window".
     */
    protected function parseWindow(string $ekspozycja): array
    {
        $ekspozycja = trim($ekspozycja);
        if ($ekspozycja === '') {
            return [];
        }

        $parts = array_map('trim', explode(',', $ekspozycja));
        $codes = [];

        foreach ($parts as $part) {
            $key = mb_strtolower($part);
            if (isset($this->windowMap[$key])) {
                $codes[] = $this->windowMap[$key];
            } else {
                $this->warn("Nieznana ekspozycja: '{$part}'");
            }
        }

        return $codes;
    }

    /**
     * Parsuje kolumnę Uwagi w poszukiwaniu "Ogród X m2" i zwraca powierzchnię ogródka.
     */
    protected function parseGardenArea(string $uwagi): ?string
    {
        if (preg_match('/Ogr[oó]d\s+([\d,.]+)\s*m2/ui', $uwagi, $matches)) {
            return str_replace(',', '.', $matches[1]);
        }

        return null;
    }
}
