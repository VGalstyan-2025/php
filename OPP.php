<?php
class Computer {
    public $name;
    public $ram;
    protected $memory;
    private $processor;

    public function setProc($p) {
        $this->processor = $p;
    }
    public function getProc() {
        return $this->processor;
    }

    function __construct($m, $p) {
        $this->memory = $m;
        $this->processor = $p;
    }

    public function on() {
        echo "Hello {$this->processor}";
    }

    public function off() {
        echo "Bye";
    }

    public function getMemory() {
        return $this->memory;
    }
}

$a = new Computer(128, "i7");
$b = new Computer(512, "i9");
$c = new Computer(256, "i5");

$a->setProc("i3");
$a->ram = 8;
$a->name = "Apple";

$b->ram = 4;
$b->name = "Dell";

$c->ram = 16;
$c->name = "HP";

echo "<html>
<head>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style='text-align: center;'>Computers</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>RAM</th>
            <th>Processor</th>
            <th>Memory</th>
        </tr>";

echo "<tr>
        <td>{$a->name}</td>
        <td>{$a->ram} GB</td>
        <td>{$a->getProc()}</td>
        <td>{$a->getMemory()} GB</td>
    </tr>";

echo "<tr>
        <td>{$b->name}</td>
        <td>{$b->ram} GB</td>
        <td>{$b->getProc()}</td>
        <td>{$b->getMemory()} GB</td>
    </tr>";

echo "<tr>
        <td>{$c->name}</td>
        <td>{$c->ram} GB</td>
        <td>{$c->getProc()}</td>
        <td>{$c->getMemory()} GB</td>
    </tr>";

echo "</table>
</body>
</html>";
?>
