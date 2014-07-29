<?php

/* @CoreAdminHome/_menu.twig */
class __TwigTemplate_80fd9ca8113e42377e31e2970e1e1d2df1bac97211bacfdd4a360cd3e70531a2 extends Twig_Template
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
        // line 1
        if ((twig_length_filter($this->env, $this->getContext($context, "adminMenu")) > 1)) {
            // line 2
            echo "    <div class=\"Menu Menu--admin\">
        <ul class=\"Menu-tabList\">
        ";
            // line 4
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "adminMenu"));
            foreach ($context['_seq'] as $context["name"] => $context["submenu"]) {
                // line 5
                echo "            ";
                if ($this->getAttribute($this->getContext($context, "submenu"), "_hasSubmenu")) {
                    // line 6
                    echo "            <li>
                <span>";
                    // line 7
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getContext($context, "name"))), "html", null, true);
                    echo "</span>
                <ul>
                ";
                    // line 9
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getContext($context, "submenu"));
                    foreach ($context['_seq'] as $context["sname"] => $context["url"]) {
                        // line 10
                        echo "                    ";
                        if ((twig_slice($this->env, $this->getContext($context, "sname"), 0, 1) != "_")) {
                            // line 11
                            echo "                    <li>
                        <a href='index.php";
                            // line 12
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('urlRewriteWithParameters')->getCallable(), array($this->getAttribute($this->getContext($context, "url"), "_url"))), "html", null, true);
                            echo "'
                           ";
                            // line 13
                            if ((array_key_exists("currentAdminMenuName", $context) && ($this->getContext($context, "sname") == $this->getContext($context, "currentAdminMenuName")))) {
                                echo "class='active'";
                            }
                            echo ">";
                            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array($this->getContext($context, "sname"))), "html", null, true);
                            echo "</a>
                    </li>
                    ";
                        }
                        // line 16
                        echo "                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['sname'], $context['url'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 17
                    echo "                </ul>
            </li>
            ";
                }
                // line 20
                echo "        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['submenu'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "        </ul>
    </div>
";
        }
    }

    public function getTemplateName()
    {
        return "@CoreAdminHome/_menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 21,  75 => 20,  70 => 17,  64 => 16,  50 => 12,  32 => 6,  25 => 4,  19 => 1,  142 => 49,  132 => 15,  127 => 13,  117 => 9,  114 => 8,  104 => 54,  102 => 53,  97 => 50,  95 => 48,  92 => 47,  84 => 43,  79 => 40,  76 => 39,  74 => 38,  69 => 35,  66 => 34,  63 => 33,  54 => 13,  52 => 28,  49 => 27,  47 => 11,  43 => 24,  37 => 22,  35 => 7,  29 => 5,  21 => 2,  507 => 169,  500 => 164,  481 => 161,  469 => 159,  452 => 158,  446 => 155,  440 => 151,  436 => 149,  421 => 147,  417 => 146,  414 => 145,  412 => 144,  408 => 143,  402 => 142,  396 => 141,  391 => 139,  385 => 138,  379 => 137,  375 => 136,  369 => 135,  362 => 131,  356 => 128,  352 => 127,  349 => 126,  342 => 123,  340 => 122,  335 => 121,  333 => 120,  327 => 116,  324 => 115,  316 => 114,  312 => 112,  306 => 110,  300 => 108,  298 => 107,  293 => 105,  286 => 101,  282 => 100,  278 => 99,  276 => 98,  273 => 97,  265 => 93,  262 => 92,  258 => 91,  253 => 90,  251 => 89,  248 => 88,  246 => 87,  243 => 86,  236 => 82,  231 => 80,  226 => 78,  223 => 77,  221 => 76,  215 => 72,  196 => 69,  185 => 68,  168 => 67,  162 => 64,  156 => 60,  153 => 52,  150 => 51,  147 => 50,  144 => 49,  141 => 48,  139 => 48,  135 => 46,  129 => 14,  124 => 43,  118 => 42,  111 => 7,  105 => 35,  101 => 34,  96 => 31,  90 => 46,  87 => 27,  85 => 26,  77 => 25,  73 => 24,  65 => 19,  61 => 32,  56 => 16,  48 => 11,  44 => 10,  40 => 9,  31 => 19,  28 => 3,);
    }
}
