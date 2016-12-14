<?php
use PHPUnit\Framework\TestCase;
use Checkpoint\Checkpoint;
class CheckpointTest extends TestCase
{

    /**
     * @test
     */
    public function shouldPassThrough() {
        $checkpoint = new Checkpoint();
        $checkpoint->setCheckpoints(['\/foo', '\/bar']);
        $this->assertTrue($checkpoint->canPassThrough('/hoge'));
    }

    /**
     * @test
     */
    public function shouldNotPassThrough() {
        $checkpoint = new Checkpoint();
        $checkpoint->setCheckpoints(['\/:str']);
        $this->assertFalse($checkpoint->canPassThrough('/hoge'));
    }

    /**
     * @test
     */
    public function shouldPassThroughSafeBorders() {
        $checkpoint = new Checkpoint();
        $checkpoint->setSafeBorders(['\/foo', '\/bar']);
        $this->assertTrue($checkpoint->canPassThrough('/foo'));
        $this->assertTrue($checkpoint->canPassThrough('/bar'));
        $this->assertFalse($checkpoint->canPassThrough('/hoge'));
    }

}
