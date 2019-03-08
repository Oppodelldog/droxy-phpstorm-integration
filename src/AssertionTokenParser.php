<?php
namespace DroxyDemo;

/**
 * Parser for gimme/endgimme blocks.
 */
class AssertionTokenParser extends \Twig_TokenParser
{
    /**
     * Gets the tag name associated with this token parser.
     *
     * @return string The tag name
     */
    public function getTag()
    {
        return 'assert';
    }

    /**
     * @param \Twig_Token $token
     *
     * @return bool
     */
    public function decideCacheEnd(\Twig_Token $token)
    {
        return $token->test('endassert');
    }

    /**
     * Parses a token and returns a node.
     *
     * @return \Twig_Node A Twig_Node instance
     *
     * @throws \Twig_Error_Syntax
     */
    public function parse(\Twig_Token $token)
    {
        $lineNumber = $token->getLine();
        $stream = $this->parser->getStream();
        // assign passed string (ex. article) to variable
        $viewVariable = $this->parser->getExpressionParser()->parseAssignmentExpression();
        $expectedType = $this->parser->getExpressionParser()->parseStringExpression();


        // parse optional data passed after `with` keyword
        if ($stream->nextIf(\Twig_Token::STRING_TYPE, 'type')) {
            $parameters = $this->parser->getExpressionParser()->parseExpression();
        }
        $stream->expect(\Twig_Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse([$this, 'decideCacheEnd'], true);
        $stream->expect(\Twig_Token::BLOCK_END_TYPE);

        // pass all parsed data to Node class.
        return new AssertionNode($viewVariable, $expectedType, $lineNumber, $this->getTag());
    }
}