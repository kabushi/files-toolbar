<?php
/**
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */
namespace FilesToolbarTest\Collector;

use PHPUnit_Framework_TestCase;
use FilesToolbar\Collector\FilesCollector;
use Zend\Mvc\MvcEvent;

class FilesCollectorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var SessionCollector
     */
    protected $filesCollector;


    protected function setUp()
    {
        $this->filesCollector = new FilesCollector();
    }

    public function testGetName()
    {
        $this->assertEquals('files.toolbar', $this->filesCollector->getName());
    }

    public function testGetPriority()
    {
        $this->assertEquals(10, $this->filesCollector->getPriority());
    }

    public function testCallCollect()
    {
        $this->filesCollector->collect(new MvcEvent());
    }

    public function testGetFilesData()
    {
        $this->assertEquals(get_included_files(), $this->filesCollector->getFilesData());
    }

}
