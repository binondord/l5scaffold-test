<?php namespace Scaffold\Commands;

use Laralib\L5scaffold\Commands\ScaffoldModelCommand;

class ScaffoldModelCommandTest extends \TestCase {
    protected $class = ScaffoldModelCommand::class;
    protected $instance;
    protected $input;
    protected $output;
    protected $file;
    protected $composer;
    protected $inputMock;
    protected $i = \Symfony\Component\Console\Input\InputInterface::class;
    protected $o = \Symfony\Component\Console\Output\OutputInterface::class;

    public function setUp()
    {
        #$this->markTestSkipped();
        $this->input = app(\Symfony\Component\Console\Input\ArgvInput::class);
        $this->output = app(\Symfony\Component\Console\Output\ConsoleOutput::class);
        $this->file = app(\Illuminate\Filesystem\Filesystem::class);
        $this->composer = app(\Illuminate\Foundation\Composer::class);

        $this->inputMock = \Mockery::mock($this->i.'[validate]');
        $this->inputMock->shouldReceive('validate')
            ->once()
            ->andReturn(true);
        app()->bind($this->i, $this->input);
        app()->bind($this->o, $this->output);
    }

    public function test_can_instanstiate()
    {
        $cmd = \Mockery::mock($this->class.'[argument]',[$this->file, $this->composer]);
        $cmd->shouldReceive('argument')
                ->with('nameaa')
                ->once()
                ->andReturn('Sample');

        $this->instance = $cmd;
        $cmd->run($this->inputMock, $this->output);

        #dd($this->instance);

        #$this->assertEquals($this->class, get_class($this->instance));
    }
}
