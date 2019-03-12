<?php

/*
 * Copyright 2018 Q.One Technologies GmbH, Essen
 * This file is part of QOnePrivacyBundle.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
 * of the Software, and to permit persons to whom the Software is furnished to do
 * so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
 * IN THE SOFTWARE.
 */

namespace QOne\PrivacyBundle\Tests\Unit\Policy;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use PHPUnit\Framework\MockObject\MockObject;
use QOne\PrivacyBundle\Mapping\MetadataRegistry;
use QOne\PrivacyBundle\Policy\NullPolicy;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class NullPolicyTest extends TestCase
{
    /** @var ObjectManager|MockObject */
    protected $om;

    /** @var MetadataRegistry|MockObject */
    protected $metadataRegistry;

    /** @var ManagerRegistry|MockObject */
    private $managerRegistry;

    public function setUp()
    {
        parent::setUp();

        $this->om = $this->createMock(ObjectManager::class);
        $this->metadataRegistry = $this->createMock(MetadataRegistry::class);
        $this->managerRegistry = $this->createMock(ManagerRegistry::class);
    }

    public function testTransformFieldValue()
    {
        $policy = $this->getPolicy();

        $object = (object) [];

        $value = $policy->transformFieldValue($object, 'name', 'value');

        $this->assertNull($value);
    }

    private function getPolicy()
    {
        return new NullPolicy($this->managerRegistry, $this->metadataRegistry);
    }
}
