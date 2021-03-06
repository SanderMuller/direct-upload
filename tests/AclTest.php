<?php

namespace EddTurtle\DirectUpload\Tests;

use EddTurtle\DirectUpload\Acl;
use EddTurtle\DirectUpload\Exceptions\InvalidAclException;
use PHPUnit\Framework\TestCase;

class AclTest extends TestCase
{
    public function testValid()
    {
        $object = new Acl('private');
        $this->assertTrue($object instanceof Acl);
        $this->assertTrue($object->getName() === "private");
    }

    public function testInvalid()
    {
        $this->expectException(InvalidAclException::class);
        new Acl('invalid acl type');
    }

    public function testLowerCaseName()
    {
        $object = new Acl('PRIVATE');
        $this->assertTrue($object->getName() === "private");
    }

    public function testToString()
    {
        $object = new Acl('private');
        // Note: assertEquals doesn't work as it appears equal anyway
        $this->assertTrue((string)$object === "private");
    }
}
