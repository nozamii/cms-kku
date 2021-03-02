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

/* menu/list.html.twig */
class __TwigTemplate_84c647efe51969e24832bd065e298ba11427ff26a8c2566efd4340ac52c23174 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $context["children"] = ((($this->getAttribute(($context["item"] ?? null), "level", []) == 1)) ? ($this->getAttribute(($context["item"] ?? null), "group", [0 => ($context["group"] ?? null)], "method")) : ($this->getAttribute(($context["item"] ?? null), "children", [])));
        // line 2
        echo "
<div class=\"submenu-level\">Level ";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "level", []), "html", null, true);
        echo "</div>
<ul class=\"submenu-items\" data-mm-base=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "path", []), "html", null, true);
        echo "\" data-mm-base-level=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "level", []), "html", null, true);
        echo "\">";
        // line 5
        if (($this->getAttribute(($context["item"] ?? null), "level", []) > 1)) {
            // line 6
            echo "        <li>
            <a class=\"menu-item menu-item-back\"
               data-g5-ajaxify=\"\"
               data-g5-ajaxify-params=\"";
            // line 9
            echo twig_escape_filter($this->env, twig_jsonencode_filter(["inline" => 1, "group" => ($context["group"] ?? null)]), "html_attr");
            echo "\"
               data-g5-ajaxify-target-parent=\".submenu-column\"
               href=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "menu", 1 => ($context["id"] ?? null), 2 => $this->getAttribute($this->getAttribute(($context["item"] ?? null), "parent", []), "path", [])], "method"), "html", null, true);
            echo "\"
            >
                ";
            // line 13
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, ($this->getAttribute(($context["item"] ?? null), "level", []) - 1)));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 14
                echo "                <i class=\"fa fa-fw fa-chevron-left\" aria-hidden=\"true\"></i> &nbsp;
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "            </a>
        </li>
    ";
        }
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["children"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 20
            echo "        <li data-mm-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["child"], "path", []), "html", null, true);
            echo "\"
            data-mm-level=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["child"], "level", []), "html", null, true);
            echo "\"
            ";
            // line 22
            if ((($this->getAttribute($context["child"], "type", []) == "particle") || ($this->getAttribute($context["child"], "type", []) == "module"))) {
                // line 23
                echo "            class=\"g-menu-item-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["child"], "type", []), "html", null, true);
                if (($this->getAttribute($this->getAttribute($this->getAttribute($context["child"], "options", []), "particle", []), "enabled", []) == false)) {
                    echo " g-menu-item-disabled";
                }
                echo "\"
            data-mm-original-type=\"";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($context["child"], "type", []), "html", null, true);
                echo "\"
            ";
            } else {
                // line 26
                echo "                class=\"";
                if (($this->getAttribute($context["child"], "enabled", []) == false)) {
                    echo "g-menu-item-disabled";
                }
                echo "\"
            ";
            }
            // line 28
            echo "        >
            ";
            // line 29
            $this->loadTemplate("menu/item.html.twig", "menu/list.html.twig", 29)->display(twig_array_merge($context, ["item" => $context["child"], "target" => ("list-" . ($context["group"] ?? null))]));
            // line 30
            echo "        </li>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "</ul>
<span class=\"submenu-reorder\"><i class=\"fa fa-fw fa-arrows-h\" aria-hidden=\"true\"></i></span>
";
    }

    public function getTemplateName()
    {
        return "menu/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 32,  131 => 30,  129 => 29,  126 => 28,  118 => 26,  113 => 24,  105 => 23,  103 => 22,  99 => 21,  94 => 20,  77 => 19,  72 => 16,  65 => 14,  61 => 13,  56 => 11,  51 => 9,  46 => 6,  44 => 5,  39 => 4,  35 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "menu/list.html.twig", "/var/www/html/administrator/components/com_gantry5/templates/menu/list.html.twig");
    }
}
