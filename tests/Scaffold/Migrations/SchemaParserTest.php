<?php namespace Scaffold\Migrations;

class SchemaParserTest extends \TestCase {
    protected $class = \Laralib\L5scaffold\Migrations\SchemaParser::class;
    protected $instance;
    public function test_can_instantiate()
    {
        #$this->instance = new SchemaParser();
        $this->instance = new $this->class;

        $this->assertEquals($this->class, get_class($this->instance));
    }

    public function test_parse_name_string()
    {
        $this->instance = new $this->class;

        $result = $this->instance->parse('name:string');

        $ar = [];
        $ar[] = [
            'name' => 'name',
            'type' => 'string',
            'arguments' => [],
            'options' => []
        ];

        $this->assertEquals($ar, $result);
    }

    public function test_parse_age_integer()
    {
        $this->instance = new $this->class;

        $result = $this->instance->parse('age:integer');

        $ar = [];
        $ar[] = [
            'name' => 'age',
            'type' => 'integer',
            'arguments' => [],
            'options' => []
        ];

        $this->assertEquals($ar, $result);
    }

    public function test_parse_age_integer_nullable()
    {
        $this->instance = new $this->class;

        $result = $this->instance->parse('age:integer:nullable');

        $ar = [];
        $ar[] = [
            'name' => 'age',
            'type' => 'integer',
            'arguments' => [],
            'options' => [
                'nullable' => true
            ]
        ];

        $this->assertEquals($ar, $result);
    }

    public function test_parse_name_string_age_integer_nullable()
    {
        $this->instance = new $this->class;

        $result = $this->instance->parse('name:string,age:integer:nullable');

        $ar = [];
        $ar[] = [
            'name' => 'name',
            'type' => 'string',
            'arguments' => [],
            'options' => []
        ];
        $ar[] = [
            'name' => 'age',
            'type' => 'integer',
            'arguments' => [],
            'options' => [
                'nullable' => true
            ]
        ];

        $this->assertEquals($ar, $result);
    }

    public function test_parse_name_string_with_space_age_integer_nullable()
    {
        $this->instance = new $this->class;

        $result = $this->instance->parse('name:string, age:integer:nullable');

        $ar = [];
        $ar[] = [
            'name' => 'name',
            'type' => 'string',
            'arguments' => [],
            'options' => []
        ];
        $ar[] = [
            'name' => 'age',
            'type' => 'integer',
            'arguments' => [],
            'options' => [
                'nullable' => true
            ]
        ];

        $this->assertEquals($ar, $result);
    }

    public function test_parse_name_string_with_args_with_space_age_integer_nullable()
    {
        $this->instance = new $this->class;

        $result = $this->instance->parse('name:string(10), age:integer:nullable');

        $ar = [];
        $ar[] = [
            'name' => 'name',
            'type' => 'string',
            'arguments' => [
                '10'
            ],
            'options' => []
        ];
        $ar[] = [
            'name' => 'age',
            'type' => 'integer',
            'arguments' => [],
            'options' => [
                'nullable' => true
            ]
        ];

        $this->assertEquals($ar, $result);
    }
}
