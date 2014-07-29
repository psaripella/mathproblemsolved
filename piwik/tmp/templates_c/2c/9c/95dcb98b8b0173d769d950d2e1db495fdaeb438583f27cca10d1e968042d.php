<?php

/* _piwikTag.twig */
class __TwigTemplate_2c9c95dcb98b8b0173d769d950d2e1db495fdaeb438583f27cca10d1e968042d extends Twig_Template
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
        // line 2
        echo "
";
        // line 3
        if ((($this->getContext($context, "piwikUrl") == "http://demo.piwik.org/") || $this->getContext($context, "debugTrackVisitsInsidePiwikUI"))) {
            // line 4
            echo "    <div class=\"clear\"></div>
    <!-- Piwik -->
    <script type=\"text/javascript\">
    var _paq = _paq || [];
    _paq.push(['setTrackerUrl', 'piwik.php']);
    _paq.push(['setSiteId', 1]);
    _paq.push(['setCookieDomain', '*.piwik.org']);
    // set the domain the visitor landed on, in the Custom Variable
    _paq.push([function () {
    if (!this.getCustomVariable(1)) {
        this.setCustomVariable(1, \"Domain landed\", document.domain);
    }
    }]);
    // Set the selected Piwik language in a custom var
    _paq.push(['setCustomVariable', 2, \"Demo language\", piwik.languageName]);
    _paq.push(['setDocumentTitle', document.domain + \"/\" + document.title]);
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);

    (function() {
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
    g.defer=true; g.async=true; g.src='js/piwik.js'; s.parentNode.insertBefore(g,s);
    })();
    </script>
    <!-- End Piwik Code -->
";
        }
    }

    public function getTemplateName()
    {
        return "_piwikTag.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 52,  120 => 49,  111 => 44,  64 => 18,  86 => 26,  80 => 24,  78 => 24,  61 => 17,  97 => 33,  95 => 30,  91 => 31,  57 => 23,  101 => 32,  58 => 16,  63 => 6,  165 => 64,  153 => 62,  151 => 61,  136 => 52,  130 => 50,  128 => 49,  106 => 43,  102 => 42,  98 => 40,  71 => 20,  44 => 12,  35 => 9,  26 => 4,  90 => 28,  82 => 22,  69 => 8,  49 => 27,  39 => 8,  33 => 6,  59 => 15,  52 => 5,  48 => 13,  21 => 3,  28 => 5,  24 => 4,  132 => 36,  113 => 44,  108 => 28,  104 => 33,  96 => 25,  92 => 16,  88 => 30,  79 => 33,  77 => 27,  70 => 15,  62 => 25,  46 => 9,  31 => 6,  27 => 5,  23 => 4,  19 => 2,  134 => 43,  131 => 42,  127 => 34,  124 => 47,  121 => 32,  114 => 45,  112 => 19,  107 => 42,  105 => 15,  100 => 26,  87 => 9,  84 => 26,  81 => 25,  74 => 21,  72 => 21,  68 => 44,  66 => 19,  60 => 12,  55 => 15,  53 => 13,  50 => 14,  41 => 9,  38 => 2,  36 => 7,  32 => 5,  30 => 6,  22 => 3,  56 => 13,  54 => 15,  51 => 11,  47 => 11,  45 => 9,  42 => 9,  40 => 11,  37 => 10,  34 => 3,  29 => 4,);
    }
}
