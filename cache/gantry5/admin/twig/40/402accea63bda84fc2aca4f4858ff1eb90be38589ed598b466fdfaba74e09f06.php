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

/* @gantry-admin/partials/layout.html.twig */
class __TwigTemplate_864700c21d12d306ba4c41dac6646c7ce2ef2ef97dfa8edfc7aed700f97d68e5 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascript' => [$this, 'block_javascript'],
            'content' => [$this, 'block_content'],
            'gantry_content_wrapper' => [$this, 'block_gantry_content_wrapper'],
            'gantry' => [$this, 'block_gantry'],
            'footer_section' => [$this, 'block_footer_section'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@gantry-admin/partials/page.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("@gantry-admin/partials/page.html.twig", "@gantry-admin/partials/layout.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = [])
    {
        // line 4
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-admin://assets/css-compiled/g-admin.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-admin://assets/css/font-awesome.min.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    ";
        // line 6
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
    }

    // line 9
    public function block_javascript($context, array $blocks = [])
    {
        // line 10
        echo "    <script type=\"text/javascript\" defer=\"defer\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc("gantry-admin://assets/js/main.js"), "html", null, true);
        echo "\"></script>
    ";
        // line 11
        $this->loadTemplate("@gantry-admin/partials/js-translations.html.twig", "@gantry-admin/partials/layout.html.twig", 11)->display($context);
        // line 12
        echo "    ";
        $this->displayParentBlock("javascript", $context, $blocks);
        echo "
";
    }

    // line 15
    public function block_content($context, array $blocks = [])
    {
        // line 16
        echo "<div id=\"g5-container\">
    <div class=\"inner-container\">
        ";
        // line 18
        $this->displayBlock('gantry_content_wrapper', $context, $blocks);
        // line 33
        echo "    </div>
</div>
";
    }

    // line 18
    public function block_gantry_content_wrapper($context, array $blocks = [])
    {
        // line 19
        echo "            <div data-g5-content-wrapper=\"\">
                <div class=\"g-grid\">
                    <div class=\"g-block main-block\">
                        <section id=\"g-main\">
                            <div class=\"g-content\" data-g5-content=\"\">
                                ";
        // line 24
        $this->displayBlock('gantry', $context, $blocks);
        // line 27
        echo "                            </div>
                        </section>
                    </div>
                </div>
            </div>
        ";
    }

    // line 24
    public function block_gantry($context, array $blocks = [])
    {
        // line 25
        echo "                                    ";
        echo ($context["content"] ?? null);
        echo "
                                ";
    }

    // line 37
    public function block_footer_section($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "@gantry-admin/partials/layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 37,  118 => 25,  115 => 24,  106 => 27,  104 => 24,  97 => 19,  94 => 18,  88 => 33,  86 => 18,  82 => 16,  79 => 15,  72 => 12,  70 => 11,  65 => 10,  62 => 9,  56 => 6,  52 => 5,  47 => 4,  44 => 3,  34 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@gantry-admin/partials/layout.html.twig", "/var/www/html/administrator/components/com_gantry5/templates/partials/layout.html.twig");
    }
}
