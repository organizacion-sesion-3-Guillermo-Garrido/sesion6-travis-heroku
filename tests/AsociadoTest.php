<?php
use PHPUnit\Framework\TestCase;
use cursophp7\app\entity\Asociado;

class AsociadoTest extends TestCase
{
    private $asociado;
 
    protected function setUp(): void
    {
        $this->asociado = new Asociado();
    }
 
    protected function tearDown(): void
    {
        $this->asociado = NULL;
    }
 
    public function testGetNombre(): void
    {
        $result = $this->asociado->getNombre();
        $this->assertIsString($result);
    } 
    public function testSetNombre(): void
    {
        $result = $this->asociado->setNombre('Test');
        $this->assertEquals($this->asociado::class, Asociado::class);
        $this->assertEquals($this->asociado->getNombre(), 'Test');
    } 
}
