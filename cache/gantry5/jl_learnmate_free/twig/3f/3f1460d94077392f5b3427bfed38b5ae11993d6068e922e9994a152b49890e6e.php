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

/* @particles/backtotop.html.twig */
class __TwigTemplate_0a7d33a1495f703a0bb480bdf3d8fc9b7e279ff3396cbea249e7507c89254f97 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'javascript_footer' => [$this, 'block_javascript_footer'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "@nucleus/partials/particle.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("@nucleus/partials/particle.html.twig", "@particles/backtotop.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_javascript_footer($context, array $blocks = [])
    {
        // line 4
        echo "  ";
        $this->getAttribute(($context["gantry"] ?? null), "load", [0 => "jquery"], "method");
        // line 5
        echo "  <script>
  jQuery(function(\$) {
    var a = document.createElement('a');
    a.className += 'back-to-top';
    a.title = 'Back to top';
    a.innerHTML = '";
        // line 10
        if ($this->getAttribute(($context["particle"] ?? null), "icon", [])) {
            echo "<i class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["particle"] ?? null), "icon", []), "html", null, true);
            echo "\"></i> ";
        } else {
            echo " &uarr; ";
        }
        echo "';

    document.getElementsByTagName('body')[0].appendChild(a);
      if (\$('.back-to-top').length) {
          var scrollTrigger = 100, // px
              backToTop = function() {
                  var scrollTop = \$(window).scrollTop();
                  if (scrollTop > scrollTrigger) {
                      \$('.back-to-top').removeClass('backHide');
                  } else {
                      \$('.back-to-top').addClass('backHide');
                  }
              };
          backToTop();
          \$(window).on('scroll', function() {
              backToTop();
          });
          \$('.back-to-top').on('click', function(e) {
              e.preventDefault();
              \$('html,body').animate({
                  scrollTop: 0
              }, 700);
          });
      }
    });
  </script>
";
    }

    public function getTemplateName()
    {
        return "@particles/backtotop.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 10,  45 => 5,  42 => 4,  39 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@particles/backtotop.html.twig", "/var/www/html/templates/jl_learnmate_free/custom/particles/backtotop.html.twig");
    }
}
