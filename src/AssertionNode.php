<?php

namespace DroxyDemo;

/**
 * Gimme twig node.
 */
class AssertionNode extends \Twig_Node
{
    private static $count = 1;

    /**
     * AssertionNode constructor.
     *
     * @param \Twig_Node $annotation
     * @param \Twig_Node_Expression|null $parameters
     * @param \Twig_Node $body
     * @param int $lineno
     * @param null $tag
     */
    public function __construct(
        \Twig_Node $viewVariable,
        \Twig_Node_Expression_Constant $expectedType = null,
        $lineno,
        $tag = null
    )
    {
        $nodes = [
            'viewVariable' => $viewVariable,
            'expectedType' => $expectedType,
        ];
        parent::__construct($nodes, [], $lineno, $tag);
    }

    /**
     * {@inheritdoc}
     */
    public function compile(\Twig_Compiler $compiler)
    {
        $i = self::$count++;
        $compiler
            ->addDebugInfo($this)
            ->write('if(get_class(')
            ->subcompile($this->getNode('viewVariable'))
            ->raw(')==')
            ->subcompile($this->getNode('expectedType'))
            ->raw('){' . "\n")
            ->indent()
            ->raw("echo 'OMG, you have got it!!!!!';\n")
            ->outdent()
            ->raw('}' . "\n")
            ->raw('else{' . "\n")
            ->indent()
            ->raw("echo 'assertion mismatch'; return; \n")
            ->outdent()
            ->raw('}' . "\n");
    }
}
