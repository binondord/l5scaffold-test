<?php namespace Scaffold\Migrations;


use Laralib\L5scaffold\Migrations\NameParser;

class NameParserTest extends \TestCase {
    protected $class = \Laralib\L5scaffold\Migrations\NameParser::class;
    protected $instance;

    public function setUp()
    {
        $this->markTestSkipped();
    }

    public function test_can_instanstiate()
    {
        #$this->instance = new NameParser();
        $this->instance = new $this->class;

        $this->assertEquals($this->class, get_class($this->instance));
    }

    public function test_parse_one_word()
    {
        $this->instance = new $this->class;

        $result = $this->instance->parse('sample');

        $ar = [
            'action' => 'sample',
            'table' => ''
        ];

        $this->assertEquals($ar, $result);
    }

    public function test_parse_snake_case()
    {
        $this->instance = new $this->class;

        $result = $this->instance->parse('sample_word');

        $ar = [
            'action' => 'sample',
            'table' => 'word'
        ];

        $this->assertEquals($ar, $result);
    }

    public function test_parse_table()
    {
        $this->instance = new $this->class;

        $result = $this->instance->parse('table');

        $ar = [
            'action' => null,
            'table' => ''
        ];

        $this->assertEquals($ar, $result);
    }

    public function test_parse_table_snake_case()
    {
        $this->instance = new $this->class;

        $result = $this->instance->parse('table_snake');

        $ar = [
            'action' => 'table',
            'table' => 'snake'
        ];

        $this->assertEquals($ar, $result);
    }

    public function test_parse_snake_case_table()
    {
        $this->instance = new $this->class;

        $result = $this->instance->parse('snake_table');

        $ar = [
            'action' => 'snake',
            'table' => ''
        ];

        $this->assertEquals($ar, $result);
    }

    public function test_parse_create_snake_case_table()
    {
        $this->instance = new $this->class;

        $result = $this->instance->parse('create_snake_table');

        $ar = [
            'action' => 'create',
            'table' => 'snake'
        ];

        $this->assertEquals($ar, $result);
    }

    public function test_parse_update_snake_case_table()
    {
        $this->instance = new $this->class;

        $result = $this->instance->parse('update_snake_table');

        $ar = [
            'action' => 'add',
            'table' => 'snake'
        ];

        $this->assertEquals($ar, $result);
    }

    public function test_parse_edit_snake_case_table()
    {
        $this->instance = new $this->class;

        $result = $this->instance->parse('edit_snake_table');

        $ar = [
            'action' => 'edit',
            'table' => 'snake'
        ];

        $this->assertEquals($ar, $result);
    }

    public function test_parse_delete_snake_case_table()
    {
        $this->instance = new $this->class;

        $result = $this->instance->parse('delete_snake_table');

        $ar = [
            'action' => 'remove',
            'table' => 'snake'
        ];

        $this->assertEquals($ar, $result);
    }

    public function test_parse_drop_snake_case_table()
    {
        $this->instance = new $this->class;

        $result = $this->instance->parse('drop_snake_table');

        $ar = [
            'action' => 'remove',
            'table' => 'snake'
        ];

        $this->assertEquals($ar, $result);
    }

    public function test_parse_drop_sample_and_snake_case_table()
    {
        $this->instance = new $this->class;

        $result = $this->instance->parse('drop_sample_in_snake_on_table');
    dd($result);
        $ar = [
            'action' => 'remove',
            'table' => 'snake'
        ];

        $this->assertEquals($ar, $result);
    }
}
