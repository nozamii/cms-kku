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

/* @gantry-admin/pages/menu/menu.html.twig */
class __TwigTemplate_05f9f0dc8640a52cfc5ea60d1b16953f397e284c05b02a515ea4c17fee8a0040 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'gantry' => [$this, 'block_gantry'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate((((($context["ajax"] ?? null) - ($context["suffix"] ?? null))) ? ("@gantry-admin/partials/ajax.html.twig") : ("@gantry-admin/partials/base.html.twig")), "@gantry-admin/pages/menu/menu.html.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_gantry($context, array $blocks = [])
    {
        // line 4
        echo "<form method=\"post\" action=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "menu", 1 => ($context["id"] ?? null)], "method"), "html", null, true);
        echo "\" data-mm-container=\"\">
    <div class=\"menu-header\">
        <span class=\"float-right\">
            <button class=\"button button-back-to-conf\">
                <i class=\"fa fa-fw fa-arrow-left\" aria-hidden=\"true\"></i> <span>";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_BACK_SETUP"), "html", null, true);
        echo "</span>
            </button>
            ";
        // line 10
        if ($this->getAttribute(($context["gantry"] ?? null), "authorize", [0 => "menu.edit", 1 => ($context["id"] ?? null)], "method")) {
            // line 11
            echo "            <button type=\"submit\" class=\"button button-primary button-save\" data-save=\"Menu\">
                <i class=\"fa fa-fw fa-check\" aria-hidden=\"true\"></i> <span>";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SAVE_MENU"), "html", null, true);
            echo "</span>
            </button>
            ";
        }
        // line 15
        echo "        </span>
        <h2 class=\"page-title\">";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_MENU_EDITOR"), "html", null, true);
        echo "</h2>
        <select placeholder=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_SELECT_ELI"), "html", null, true);
        echo "\"
                data-selectize-ajaxify=\"\"
                data-selectize=\"\"
                data-g5-ajaxify-target=\"[data-g5-content]\"
                class=\"menu-select-wrap\"
        >
            ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["menus"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["menu_name"]) {
            // line 24
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $context["menu_name"], "html", null, true);
            echo "\"
                    ";
            // line 25
            if ((($context["id"] ?? null) == $context["menu_name"])) {
                echo "selected=\"selected\"";
            }
            // line 26
            echo "                    data-data=\"";
            echo twig_escape_filter($this->env, twig_jsonencode_filter(["url" => $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "menu", 1 => $context["menu_name"]], "method")]), "html_attr");
            echo "\">
                ";
            // line 27
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["menu_name"]), "html", null, true);
            echo (((($context["default_menu"] ?? null) == $context["menu_name"])) ? (" ★") : (""));
            echo "
            </option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu_name'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "        </select>
    </div>

    ";
        // line 33
        if ( !$this->getAttribute(($context["gantry"] ?? null), "authorize", [0 => "menu.edit", 1 => ($context["id"] ?? null)], "method")) {
            // line 34
            echo "        <div class=\"alert alert-danger\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_MENU_EDIT_UNAUTHORIZED"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_MENU_EDIT_UNAUTHORIZED_PLATFORM"), "html", null, true);
            echo "</div>
    ";
        }
        // line 36
        echo "
    ";
        // line 37
        if ($this->getAttribute(($context["gantry"] ?? null), "authorize", [0 => "menu.edit", 1 => ($context["id"] ?? null)], "method")) {
            // line 38
            echo "    <div class=\"g5-mm-particles-picker\">
        <ul class=\"g-menu-addblock\">
            ";
            // line 40
            if ($this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "platform", []), "has", [0 => "modules"], "method")) {
                // line 41
                echo "            <li data-mm-blocktype=\"module\" data-mm-id=\"__module\">
                <span class=\"menu-item\">
                    <i class=\"fa fa-fw fa-hand-stop-o\" aria-hidden=\"true\"></i>
                    <span class=\"title\">";
                // line 44
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_MODULE"), "html", null, true);
                echo "</span>
                </span>
                <a class=\"config-cog\" href=\"";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "menu/select/module"], "method"), "html", null, true);
                echo "\">
                    <i aria-label=\"";
                // line 47
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_MENU_MODULE_SETTINGS"), "html", null, true);
                echo "\" class=\"fa fa-cog\" aria-hidden=\"true\"></i>
                </a>
            </li>
            ";
            } elseif ($this->getAttribute($this->getAttribute(            // line 50
($context["gantry"] ?? null), "platform", []), "has", [0 => "widgets"], "method")) {
                // line 51
                echo "            <li data-mm-blocktype=\"widget\" data-mm-id=\"__widget\">
                <span class=\"menu-item\">
                    <i class=\"fa fa-fw fa-hand-stop-o\" aria-hidden=\"true\"></i>
                    <span class=\"title\">";
                // line 54
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_WIDGET"), "html", null, true);
                echo "</span>
                </span>
                <a class=\"config-cog\" href=\"";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "menu/select/widget"], "method"), "html", null, true);
                echo "\">
                    <i aria-label=\"";
                // line 57
                echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_MENU_WIDGET_SETTINGS"), "html", null, true);
                echo "\" class=\"fa fa-cog\" aria-hidden=\"true\"></i>
                </a>
            </li>
            ";
            }
            // line 61
            echo "            <li data-mm-blocktype=\"particle\" data-mm-id=\"__particle\">
                <span class=\"menu-item\">
                    <i class=\"fa fa-fw fa-hand-stop-o\" aria-hidden=\"true\"></i>
                    <span class=\"title\">";
            // line 64
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_PARTICLE"), "html", null, true);
            echo "</span>
                </span>
                <a class=\"config-cog\" href=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute(($context["gantry"] ?? null), "route", [0 => "menu/select/particle"], "method"), "html", null, true);
            echo "\">
                    <i aria-label=\"";
            // line 67
            echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_MENU_PARTICLE_SETTINGS"), "html", null, true);
            echo "\" class=\"fa fa-cog\" aria-hidden=\"true\"></i>
                </a>
            </li>
        </ul>
    </div>
    ";
        }
        // line 73
        echo "
    <div id=\"menu-editor\"
         data-menu-ordering=\"";
        // line 75
        echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute(($context["menu"] ?? null), "ordering", [])), "html_attr");
        echo "\"
         data-menu-items=\"";
        // line 76
        echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute(($context["menu"] ?? null), "items", [])), "html_attr");
        echo "\"
         data-menu-settings=\"";
        // line 77
        echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute(($context["menu"] ?? null), "settings", [])), "html_attr");
        echo "\">
        ";
        // line 78
        if (twig_length_filter($this->env, $this->getAttribute(($context["menu"] ?? null), "items", []))) {
            // line 79
            echo "            ";
            $this->loadTemplate("menu/base.html.twig", "@gantry-admin/pages/menu/menu.html.twig", 79)->display(twig_array_merge($context, ["item" => $this->getAttribute(($context["menu"] ?? null), "root", [])]));
            // line 80
            echo "        ";
        } else {
            // line 81
            echo "            ";
            $this->loadTemplate("menu/empty.html.twig", "@gantry-admin/pages/menu/menu.html.twig", 81)->display(twig_array_merge($context, ["item" => $this->getAttribute(($context["menu"] ?? null), "root", [])]));
            // line 82
            echo "        ";
        }
        // line 83
        echo "    </div>

    <div id=\"trash\" data-mm-eraseparticle=\"\"><div class=\"trash-zone\">&times;</div><span>";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->transFilter("GANTRY5_PLATFORM_DROP_DELETE"), "html", null, true);
        echo "</span></div>
</form>
";
    }

    public function getTemplateName()
    {
        return "@gantry-admin/pages/menu/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  235 => 85,  231 => 83,  228 => 82,  225 => 81,  222 => 80,  219 => 79,  217 => 78,  213 => 77,  209 => 76,  205 => 75,  201 => 73,  192 => 67,  188 => 66,  183 => 64,  178 => 61,  171 => 57,  167 => 56,  162 => 54,  157 => 51,  155 => 50,  149 => 47,  145 => 46,  140 => 44,  135 => 41,  133 => 40,  129 => 38,  127 => 37,  124 => 36,  116 => 34,  114 => 33,  109 => 30,  99 => 27,  94 => 26,  90 => 25,  85 => 24,  81 => 23,  72 => 17,  68 => 16,  65 => 15,  59 => 12,  56 => 11,  54 => 10,  49 => 8,  41 => 4,  38 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@gantry-admin/pages/menu/menu.html.twig", "/var/www/html/administrator/components/com_gantry5/templates/pages/menu/menu.html.twig");
    }
}
