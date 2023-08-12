<?php  

// Parent class dari tiap class bangun datar
class BangunDatar
{
    public float $luas;
    public float $keliling;
    public int $skala = 1;
}

class Lingkaran extends BangunDatar
{
    public float $radius;

    public function __construct(float $rad)
    {
        $this->radius = $rad;
        $this->area($rad);
        $this->circumference($rad);
    }

    public function area(float $rad)
    {
        $this->luas = 3.14 * ($rad * $rad);
    }

    public function circumference(float $rad)
    {
        $this->keliling = 2 * 3.14 * $rad;
    }

    public function enlarge(float $scale)       // scale up
    {
        $this->skala *= $scale;
        $this->radius *= $scale;
        $this->area($this->radius);
        $this->circumference($this->radius);
    }
    
    public function shrink(float $scale)        // scale down
    {
        $this->skala /= $scale;
        $this->radius /= $scale;
        $this->area($this->radius);
        $this->circumference($this->radius);
    }
}

class Persegi extends BangunDatar
{
    public float $sisi;

    public function __construct(float $s)
    {
        $this->sisi = $s;
        $this->area($s);
        $this->circumference($s);
    }

    public function area(float $s)
    {
        $this->luas = $s * $s;
    }

    public function circumference(float $s)
    {
        $this->keliling = $s * 4;
    }

    public function enlarge(float $scale)       // scale up
    {
        $this->skala *= $scale;
        $this->sisi *= $scale;
        $this->area($this->sisi);
        $this->circumference($this->sisi);
    }
    
    public function shrink(float $scale)        // scale down
    {
        $this->skala /= $scale;
        $this->sisi /= $scale;
        $this->area($this->sisi);
        $this->circumference($this->sisi);
    }
}

class PersegiPanjang extends BangunDatar
{
    public float $panjang;
    public float $lebar;

    public function __construct(float $p, float $l)
    {
        $this->panjang = $p;
        $this->lebar = $l;
        $this->area($p, $l);
        $this->circumference($p, $l);
    }

    public function area(float $p, float $l)
    {
        $this->luas = $p * $l;
    }

    public function circumference(float $p, float $l)
    {
        $this->keliling = ($p + $l) * 2;
    }

    public function enlarge(float $scale)       // scale up
    {
        $this->skala *= $scale;
        $this->panjang *= $scale;
        $this->lebar *= $scale;
        $this->area($this->panjang, $this->lebar);
        $this->circumference($this->panjang, $this->lebar);
    }
    
    public function shrink(float $scale)        // scale down
    {
        $this->skala /= $scale;
        $this->panjang /= $scale;
        $this->lebar /= $scale;
        $this->area($this->panjang, $this->lebar);
        $this->circumference($this->panjang, $this->lebar);
    }
}

class Descriptor
{
    public static function describe(string $name, BangunDatar $attr)
    {
        echo "Bangun datar ini adalah " . $name . " yang memiliki luas " . $attr->luas . " dan keliling " . $attr->keliling . ".<br>";
    }
}

// Menyimpan informasi bangun datar
$Shapes = [
    [
        "name" => "lingkaran",
        "attr" => new Lingkaran(7),
    ],
    [
        "name" => "persegi",
        "attr" => new Persegi(5),
    ],
    [
        "name" => "persegi panjang",
        "attr" => new PersegiPanjang(10, 30),
    ]
];

echo "<br><b>Berikut adalah deskripsi dari 3 bangun datar dengan skala 1x. ( skala = 1 )</b><br>";

// Menyiapkan deskripsi setiap bangun datar dari Shapes.
for ($x = 0; $x < count($Shapes); $x++)
{
    // Menggunakan fungsi statis 'decribe' dari class Descriptor, infomasi bangun datar yang dioperkan akan segera ditampilkan.
    Descriptor::describe($Shapes[$x]["name"], $Shapes[$x]["attr"]);
}

echo "<br><b>Berikut adalah deskripsi dari 3 bangun datar yang sama dengan skala yang dinaikkan 5x. ( skala = 5 )</b><br>";

// Menyiapkan deskripsi setiap bangun datar dari Shapes, dengan skala yang dinaikkan
for ($x = 0; $x < count($Shapes); $x++)
{
    $Shapes[$x]["attr"]->enlarge(5);
    Descriptor::describe($Shapes[$x]["name"], $Shapes[$x]["attr"]);
}

echo "<br><b>Berikut adalah deskripsi dari 3 bangun datar yang telah dinaikkan 5x lalu diturunkan 4x skalanya. ( skala = 1.25 )</b><br>";

// Menyiapkan deskripsi setiap bangun datar dari Shapes, dengan skala yang diturunkan
for ($x = 0; $x < count($Shapes); $x++)
{
    $Shapes[$x]["attr"]->shrink(4);
    Descriptor::describe($Shapes[$x]["name"], $Shapes[$x]["attr"]);
}

?>