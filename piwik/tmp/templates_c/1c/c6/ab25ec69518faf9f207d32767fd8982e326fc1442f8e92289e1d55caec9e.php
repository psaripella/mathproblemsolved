<?php

/* macros.twig */
class __TwigTemplate_1cc6ab25ec69518faf9f207d32767fd8982e326fc1442f8e92289e1d55caec9e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 18
        echo "
";
    }

    // line 1
    public function getlogoHtml($_metadata = null, $_alt = "")
    {
        $context = $this->env->mergeGlobals(array(
            "metadata" => $_metadata,
            "alt" => $_alt,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "    ";
            if ($this->getAttribute($this->getContext($context, "metadata", true), "logo", array(), "array", true, true)) {
                // line 3
                echo "        ";
                if ($this->getAttribute($this->getContext($context, "metadata", true), "logoWidth", array(), "array", true, true)) {
                    // line 4
                    echo "            ";
                    ob_start();
                    echo "width=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "metadata"), "logoWidth", array(), "array"), "html", null, true);
                    echo "\"";
                    $context["width"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 5
                    echo "        ";
                }
                // line 6
                echo "        ";
                if ($this->getAttribute($this->getContext($context, "metadata", true), "logoHeight", array(), "array", true, true)) {
                    // line 7
                    echo "            ";
                    ob_start();
                    echo "height=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "metadata"), "logoHeight", array(), "array"), "html", null, true);
                    echo "\"";
                    $context["height"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 8
                    echo "        ";
                }
                // line 9
                echo "        ";
                if ($this->getAttribute($this->getContext($context, "metadata", true), "logoWidth", array(), "array", true, true)) {
                    // line 10
                    echo "            ";
                    ob_start();
                    echo "width=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "metadata"), "logoWidth", array(), "array"), "html", null, true);
                    echo "\"";
                    $context["width"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 11
                    echo "        ";
                }
                // line 12
                echo "        ";
                if ((!twig_test_empty($this->getContext($context, "alt")))) {
                    // line 13
                    echo "            ";
                    ob_start();
                    echo "title='";
                    echo twig_escape_filter($this->env, $this->getContext($context, "alt"), "html", null, true);
                    echo "' alt='";
                    echo twig_escape_filter($this->env, $this->getContext($context, "alt"), "html", null, true);
                    echo "'";
                    $context["alt"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 14
                    echo "        ";
                }
                // line 15
                echo "        <img ";
                echo twig_escape_filter($this->env, $this->getContext($context, "alt"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, ((array_key_exists("width", $context)) ? (_twig_default_filter($this->getContext($context, "width"), "")) : ("")), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, ((array_key_exists("height", $context)) ? (_twig_default_filter($this->getContext($context, "height"), "")) : ("")), "html", null, true);
                echo " src='";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "metadata"), "logo", array(), "array"), "html", null, true);
                echo "' />
    ";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 19
    public function getinlineHelp($_text = null)
    {
        $context = $this->env->mergeGlobals(array(
            "text" => $_text,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 20
            echo "    <div class=\"ui-inline-help\" >
        ";
            // line 21
            echo $this->getContext($context, "text");
            echo "
    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "macros.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 21,  93 => 15,  81 => 13,  78 => 12,  75 => 11,  68 => 10,  65 => 9,  62 => 8,  55 => 7,  52 => 6,  42 => 4,  39 => 3,  36 => 2,  24 => 1,  19 => 18,  822 => 305,  816 => 303,  809 => 302,  803 => 301,  799 => 300,  795 => 299,  792 => 298,  784 => 293,  778 => 289,  773 => 288,  765 => 287,  761 => 286,  757 => 284,  749 => 282,  746 => 281,  743 => 280,  738 => 278,  732 => 276,  729 => 275,  726 => 274,  724 => 273,  716 => 268,  711 => 266,  703 => 262,  698 => 260,  694 => 259,  689 => 257,  683 => 254,  678 => 253,  671 => 249,  664 => 248,  662 => 247,  654 => 243,  650 => 242,  645 => 241,  641 => 240,  636 => 239,  632 => 238,  627 => 236,  622 => 234,  617 => 231,  611 => 229,  605 => 227,  602 => 226,  600 => 225,  594 => 222,  587 => 218,  581 => 217,  571 => 210,  565 => 209,  559 => 206,  553 => 205,  548 => 203,  544 => 202,  538 => 201,  533 => 199,  529 => 198,  523 => 197,  518 => 195,  512 => 194,  507 => 192,  501 => 191,  496 => 189,  491 => 187,  487 => 186,  481 => 185,  476 => 183,  471 => 181,  466 => 179,  462 => 178,  453 => 172,  446 => 168,  443 => 167,  438 => 165,  434 => 164,  428 => 162,  423 => 161,  421 => 160,  416 => 158,  410 => 157,  406 => 156,  400 => 155,  394 => 152,  384 => 145,  380 => 144,  375 => 142,  371 => 141,  361 => 135,  358 => 134,  353 => 132,  349 => 130,  347 => 129,  342 => 128,  340 => 127,  332 => 123,  326 => 120,  320 => 118,  318 => 117,  313 => 115,  308 => 114,  306 => 113,  301 => 111,  296 => 110,  294 => 109,  287 => 105,  281 => 102,  275 => 101,  271 => 100,  266 => 98,  262 => 97,  258 => 96,  252 => 93,  248 => 92,  242 => 89,  238 => 88,  234 => 87,  229 => 85,  224 => 83,  218 => 80,  209 => 78,  199 => 71,  192 => 67,  186 => 66,  180 => 63,  175 => 61,  169 => 60,  163 => 57,  154 => 51,  147 => 47,  142 => 46,  140 => 45,  136 => 44,  132 => 43,  127 => 42,  125 => 20,  121 => 40,  116 => 39,  114 => 19,  109 => 36,  97 => 27,  90 => 14,  86 => 22,  82 => 21,  76 => 20,  72 => 19,  66 => 18,  60 => 15,  56 => 14,  49 => 5,  45 => 9,  40 => 7,  35 => 6,  33 => 5,  31 => 4,  28 => 3,);
    }
}
