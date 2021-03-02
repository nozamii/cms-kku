<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @nucleus/page_head.html.twig */
class __TwigTemplate_9f1f88b9206c83548e947015a6e166bb5d32f800c8fd58a8b8770968754b1fd2 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'head_stylesheets' => [$this, 'block_head_stylesheets'],
            'head_platform' => [$this, 'block_head_platform'],
            'head_overrides' => [$this, 'block_head_overrides'],
            'head_meta' => [$this, 'block_head_meta'],
            'head_title' => [$this, 'block_head_title'],
            'head_application' => [$this, 'block_head_application'],
            'head_ie_stylesheets' => [$this, 'block_head_ie_stylesheets'],
            'head' => [$this, 'block_head'],
            'head_custom' => [$this, 'block_head_custom'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "debugger", []), "assets", [], "method");
        // line 2
        $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "loadAtoms", [], "method");
        // line 4
        $assetFunction = $this->env->getFunction('parse_assets')->getCallable();
        $assetVariables = ["priority" => 10];
        if ($assetVariables && !is_array($assetVariables)) {
            throw new UnexpectedValueException('{% scripts with x %}: x is not an array');
        }
        $location = "head";
        if ($location && !is_string($location)) {
            throw new UnexpectedValueException('{% scripts in x %}: x is not a string');
        }
        $priority = isset($assetVariables['priority']) ? $assetVariables['priority'] : 0;
        ob_start();
        // line 5
        echo "    ";
        $this->displayBlock('head_stylesheets', $context, $blocks);
        // line 15
        $this->displayBlock('head_platform', $context, $blocks);
        // line 16
        echo "
    ";
        // line 17
        $this->displayBlock('head_overrides', $context, $blocks);
        $content = ob_get_clean();
        $assetFunction($content, $location, $priority);
        // line 24
        echo "<head>
    ";
        // line 25
        echo twig_join_filter($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", []), "getHtml", [0 => "head_top"], "method"), "
    ");
        echo "
    ";
        // line 26
        $this->displayBlock('head_meta', $context, $blocks);
        // line 52
        $this->displayBlock('head_title', $context, $blocks);
        // line 56
        echo "
    ";
        // line 57
        $this->displayBlock('head_application', $context, $blocks);
        // line 61
        echo "
    ";
        // line 62
        $this->displayBlock('head_ie_stylesheets', $context, $blocks);
        // line 70
        $this->displayBlock('head', $context, $blocks);
        // line 71
        echo "    ";
        $this->displayBlock('head_custom', $context, $blocks);
        // line 76
        echo "    ";
        echo twig_join_filter($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", []), "getHtml", [0 => "head_bottom"], "method"), "
    ");
        echo "
</head>
";
    }

    // line 5
    public function block_head_stylesheets($context, array $blocks = [])
    {
        // line 6
        if ((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "enable", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", [], "any", false, true), "page", [], "any", false, true), "fontawesome", [], "any", false, true), "enable", []), 1)) : (1))) {
            // line 7
            echo "            <link rel=\"stylesheet\" href=\"gantry-assets://css/font-awesome.min.css\" type=\"text/css\"/>
        ";
        }
        // line 9
        echo "        <link rel=\"stylesheet\" href=\"gantry-engine://css-compiled/nucleus.css\" type=\"text/css\"/>
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", [], "any", false, true), "configuration", [], "any", false, true), "css", [], "any", false, true), "persistent", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", [], "any", false, true), "configuration", [], "any", false, true), "css", [], "any", false, true), "persistent", []), $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "configuration", []), "css", []), "files", []))) : ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "configuration", []), "css", []), "files", []))));
        foreach ($context['_seq'] as $context["_key"] => $context["scss"]) {
            // line 11
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $context["scss"], "html", null, true);
            echo ".scss\" type=\"text/css\"/>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['scss'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "    ";
    }

    // line 15
    public function block_head_platform($context, array $blocks = [])
    {
    }

    // line 17
    public function block_head_overrides($context, array $blocks = [])
    {
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "theme", []), "configuration", []), "css", []), "overrides", []));
        foreach ($context['_seq'] as $context["_key"] => $context["scss"]) {
            // line 19
            echo "        <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, $context["scss"], "html", null, true);
            echo ".scss\" type=\"text/css\"/>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['scss'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "    ";
    }

    // line 26
    public function block_head_meta($context, array $blocks = [])
    {
        // line 27
        echo "        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
        ";
        // line 29
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "head", []), "meta", [])) {
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "head", []), "meta", []));
            foreach ($context['_seq'] as $context["_key"] => $context["attributes"]) {
                // line 31
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["attributes"]);
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 32
                    echo "                    ";
                    if ((is_string($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["key"]) && is_string($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = "og:") && ('' === $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 || 0 === strpos($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4, $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144)))) {
                        // line 33
                        echo "                    <meta property=\"";
                        echo twig_escape_filter($this->env, $context["key"]);
                        echo "\" content=\"";
                        echo twig_escape_filter($this->env, $context["value"]);
                        echo "\" />
                    ";
                    } else {
                        // line 35
                        echo "                    <meta name=\"";
                        echo twig_escape_filter($this->env, $context["key"]);
                        echo "\" content=\"";
                        echo twig_escape_filter($this->env, $context["value"]);
                        echo "\" />
                    ";
                    }
                    // line 37
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attributes'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 40
        echo twig_join_filter($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "document", []), "getHtml", [0 => "head_meta"], "method"), "
    ");
        echo "

        ";
        // line 42
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "assets", []), "favicon", [])) {
            // line 43
            echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "assets", []), "favicon", [])), "html", null, true);
            echo "\" />
        ";
        }
        // line 45
        echo "
        ";
        // line 46
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "assets", []), "touchicon", [])) {
            // line 47
            echo "        <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "assets", []), "touchicon", [])), "html", null, true);
            echo "\">
        <link rel=\"icon\" sizes=\"192x192\" href=\"";
            // line 48
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "assets", []), "touchicon", [])), "html", null, true);
            echo "\">
        ";
        }
        // line 50
        echo "    ";
    }

    // line 52
    public function block_head_title($context, array $blocks = [])
    {
        // line 53
        echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>Title</title>";
    }

    // line 57
    public function block_head_application($context, array $blocks = [])
    {
        // line 58
        echo twig_join_filter($this->getAttribute(($context["gantry"] ?? null), "styles", [0 => "head"], "method"), "
");
        echo "
        ";
        // line 59
        echo twig_join_filter($this->getAttribute(($context["gantry"] ?? null), "scripts", [0 => "head"], "method"), "
");
    }

    // line 62
    public function block_head_ie_stylesheets($context, array $blocks = [])
    {
        // line 63
        echo "<!--[if (gte IE 8)&(lte IE 9)]>
        <script type=\"text/javascript\" src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-assets://js/html5shiv-printshiv.min.js"), "html", null, true);
        echo "\"></script>
        <link rel=\"stylesheet\" href=\"";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-engine://css/nucleus-ie9.css"), "html", null, true);
        echo "\" type=\"text/css\"/>
        <script type=\"text/javascript\" src=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-assets://js/matchmedia.polyfill.js"), "html", null, true);
        echo "\"></script>
        <![endif]-->
    ";
    }

    // line 70
    public function block_head($context, array $blocks = [])
    {
    }

    // line 71
    public function block_head_custom($context, array $blocks = [])
    {
        // line 72
        echo "        ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "head", []), "head_bottom", [])) {
            // line 73
            echo "        ";
            echo $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "config", []), "page", []), "head", []), "head_bottom", []);
            echo "
        ";
        }
        // line 75
        echo "    ";
    }

    public function getTemplateName()
    {
        return "@nucleus/page_head.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  294 => 75,  288 => 73,  285 => 72,  282 => 71,  277 => 70,  270 => 66,  266 => 65,  262 => 64,  259 => 63,  256 => 62,  251 => 59,  246 => 58,  243 => 57,  238 => 53,  235 => 52,  231 => 50,  226 => 48,  221 => 47,  219 => 46,  216 => 45,  210 => 43,  208 => 42,  202 => 40,  191 => 37,  183 => 35,  175 => 33,  172 => 32,  168 => 31,  164 => 30,  162 => 29,  158 => 27,  155 => 26,  151 => 21,  143 => 19,  139 => 18,  136 => 17,  131 => 15,  127 => 13,  119 => 11,  115 => 10,  112 => 9,  108 => 7,  106 => 6,  103 => 5,  94 => 76,  91 => 71,  89 => 70,  87 => 62,  84 => 61,  82 => 57,  79 => 56,  77 => 52,  75 => 26,  70 => 25,  67 => 24,  63 => 17,  60 => 16,  58 => 15,  55 => 5,  43 => 4,  41 => 2,  39 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@nucleus/page_head.html.twig", "/var/www/html/media/gantry5/engines/nucleus/templates/page_head.html.twig");
    }
}
