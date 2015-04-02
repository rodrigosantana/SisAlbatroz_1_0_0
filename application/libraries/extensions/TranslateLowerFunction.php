<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TranslateFunction
 *
 * @author Zis
 */

use Doctrine\ORM\Query\Lexer;

class TranslateLowerFunction extends Doctrine\ORM\Query\AST\Functions\FunctionNode {
        public $stringPrimary;
        public $stringSecondary;
        public $stringThird;

    /**
     * @override
     */
    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        return "TRANSLATE(LOWER(".$sqlWalker->walkSimpleArithmeticExpression($this->stringPrimary). "), 
            '".$this->stringSecondary->value."', '".$this->stringThird->value."')";
    }

    /**
     * @override
     */
    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {   
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->stringPrimary = $parser->StringPrimary();
        $parser->match(Lexer::T_COMMA);
        $this->stringSecondary = $parser->StringPrimary();
        $parser->match(Lexer::T_COMMA);
        $this->stringThird = $parser->StringPrimary();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
}

?>
