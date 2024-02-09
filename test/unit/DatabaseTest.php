<?php

use PHPUnit\Framework\TestCase;


final class DatabaseTest extends TestCase
{
    public function testDatabaseConnectionIsNotNull(): void
    {
        include "app/services/Database.php";
        $database = new Database();
        $this->assertNotNull($database->getConnection());
    }
}