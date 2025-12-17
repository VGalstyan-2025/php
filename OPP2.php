<!DOCTYPE html>
<html>
    <body>
<!-- ստեղծենք տռանսպոռտ կլաս աբստռակտ։ պառունակում է մոդել,բռենդ,տառեթիվ,վառելիքի պառունակություն հատկություննեռը։  -->
<!-- Պառունակում է գեթ ինֆո, ոռը վեռադառցնում է ինֆոռմացիան․ տվյալնեռը սթռինգ սառքենք ու տպետք։ -->
<!-- Պառունակում ա նաև ԼԻՑՔԱՎՈՌԵԼ ՄԵԹՈԴ, ոռը ստանում ա քանակություն:  -->
<!-- ՄԵԿԵԼ ՊԵՏՔ Է ԱՍԵՆՔ ՀԵՌԱՎՈՌՈՒԹՅՈՒՆԸ ԻՆՔԸ ԱՍԻ ԻՆՉՔԱՔՆ ՎԱՌԵԼԻՔ Ա ԾԱԽՍՎԵԼՈՒ․ ՍԱ ԷԼ Է ԱՔՊՍՏՌԱԿՏ  -->
<!-- մեր նկառագռած ապստռակտ կլասից ժառանգում է car և Truck CAR-Ը ԿՈՒՆԵՆ ԴՌՆԵՌԻ ՔԱՆԱԿ, ԻՍԿ Truck ՄԱՔՍԻՄԱԼ ԲԵՌՆԱՏԱՌՈՂՈՒԹՅՈՒՆ։ -->
<!-- 100 ԿԼԻՈՄԵՏՌԻ ՎԱՌԵԼԻՔԻ ՄԻՋԻՆ ԾԱԽՍԸ 2ԻՆ Է ՊԵՏՔ Է ՀԱՇՎԻ` car և Truck -->
<!-- Վառելիքի մնացոռդ հատկություն ծնող կլասի մեջ խետք է ունենանք -->
 <!-- եռկուսն էլ ստոփից  դռավ պետք է անեն ու 250կմ ու նախոռոք հաշվառկենք, եթե չի հեռիքում վառելիը պետք է իռան   լիցքավոռենք սկսենք -->
       
        <?php
            // Աբստրակտ Transport կլաս
            abstract class Transport
            {
                protected string $model;
                protected string $brand;
                protected int $year;
                protected float $fuel;

                public function __construct(string $model, string $brand, int $year, float $fuel)
                {
                    $this->model = $model;
                    $this->brand = $brand;
                    $this->year = $year;
                    $this->fuel = $fuel;
                }

                // Get info մեթոդ
                public function getInfo(): string
                {
                    $info = "Brand: {$this->brand}, "
                        . "Model: {$this->model}, "
                        . "Year: {$this->year}, "
                        . "Fuel: {$this->fuel} լ"
                        . "<br>";

                    echo $info;
                    return $info;
                }

                // Լիցքավորել մեթոդ
                public function refuel(float $amount): void
                {
                    if ($amount <= 0) {
                        echo "Լիցքավորման քանակությունը սխալ է<br>";
                        return;
                    }
                    $this->fuel += $amount;
                    echo "Լիցքավորվեց {$amount} լ | Նոր քանակը՝ {$this->fuel} լ<br>";
                }

                abstract public function calculateFuel(float $distance): float;

                public function stop(): void
                {
                    echo "Պահանջվում է լիցքավորում, քանի որ վառելիքը չի բավարարում ճանապարհին շարունակելու համար<br>";
                }

                public function canTravel(float $distance): bool
                {
                    $fuelNeeded = $this->calculateFuel($distance);
                    if ($this->fuel < $fuelNeeded) {
                        return false;
                    }
                    return true;
                }
            }

            class Car extends Transport
            {
                private int $doors;

                public static float $fuelPer100Km = 2;

                public function __construct(
                    string $model,
                    string $brand,
                    int $year,
                    float $fuel,
                    int $doors
                ) {
                    parent::__construct($model, $brand, $year, $fuel);
                    $this->doors = $doors;
                }

                public function calculateFuel(float $distance): float
                {
                    $fuelNeeded = ($distance / 100) * self::$fuelPer100Km;
                    echo "Car → {$distance} կմ = {$fuelNeeded} լ վառելիք<br>";
                    return $fuelNeeded;
                }
            }

            class Truck extends Transport
            {
                private float $maxLoad;

                public static float $fuelPer100Km = 2;

                public function __construct(
                    string $model,
                    string $brand,
                    int $year,
                    float $fuel,
                    float $maxLoad
                ) {
                    parent::__construct($model, $brand, $year, $fuel);
                    $this->maxLoad = $maxLoad;
                }

                public function calculateFuel(float $distance): float
                {
                    $fuelNeeded = ($distance / 100) * self::$fuelPer100Km;
                    echo "Truck → {$distance} կմ = {$fuelNeeded} լ վառելիք<br>";
                    return $fuelNeeded;
                }
            }

            $car = new Car("Camry", "Toyota", 2020, 40, 4);
            $car->getInfo();

            if (!$car->canTravel(2530)) {
                $car->stop(); 
                $car->refuel(50); 
            }

            $car->calculateFuel(230); 
            $car->refuel(10);

            echo "<hr>";

            $truck = new Truck("Actros", "Mercedes", 2019, 100, 18000);
            $truck->getInfo();

            if (!$truck->canTravel(230)) {
                $truck->stop(); 
                $truck->refuel(100); 
            }

            $truck->calculateFuel(230); 
            $truck->refuel(50); 

        ?>
    </body>
</html>
