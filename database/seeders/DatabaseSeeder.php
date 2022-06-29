<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Location;
use App\Models\Performer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    private array $events = [
        ['name' => 'Esemény', 'date' => '2022-06-29 20:00', 'desc' => 'Esemény leírás...', 'price' => 100],
        ['name' => 'Esemény', 'date' => '2022-06-29 21:00', 'desc' => 'Esemény leírás...', 'price' => 110],
        ['name' => 'Esemény', 'date' => '2022-06-29 22:00', 'desc' => 'Esemény leírás...', 'price' => 120],
        ['name' => 'Esemény', 'date' => '2022-06-30 20:00', 'desc' => 'Esemény leírás...', 'price' => 100],
        ['name' => 'Esemény', 'date' => '2022-06-30 21:00', 'desc' => 'Esemény leírás...', 'price' => 110],
        ['name' => 'Esemény', 'date' => '2022-06-30 22:00', 'desc' => 'Esemény leírás...', 'price' => 120],
        ['name' => 'Esemény', 'date' => '2022-07-01 20:00', 'desc' => 'Esemény leírás...', 'price' => 120],
        ['name' => 'Esemény', 'date' => '2022-07-01 21:00', 'desc' => 'Esemény leírás...', 'price' => 110],
        ['name' => 'Esemény', 'date' => '2022-07-01 22:00', 'desc' => 'Esemény leírás...', 'price' => 120],
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->events as $event) {
            $rndString = Str::random(5);
            $event['name'] .= " {$rndString}";
            $event = new Event($event);
            $event->save();
            $performer = new Performer(['name' => "Performer1 {$rndString}", 'event_id' => $event->id]);
            $performer->save();
            $performer = new Performer(['name' => "Performer2 {$rndString}", 'event_id' => $event->id]);
            $performer->save();
            $location = new Location(['name' => "Lokáció {$rndString}"]);
            $location->save();
            $event->location_id = $location->id;
            $event->save();
        }
        $event = new Event(['name' => 'Esemény with same location', 'date' => '2022-06-29 22:00', 'desc' => 'Esemény leírás...', 'price' => 120]);
        $event->location_id = $location?->id ?? null;
        $event->save();
    }
}
