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

/* @particles/menu.html.twig */
class __TwigTemplate_fbcd6847df006fa1791650bf83f7af7e8207f985041cc0588f77efafcf5b5609 extends \Twig\Template
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
        try {            // line 2
            echo "    ";
            $context["menu"] = $this->getAttribute($this->getAttribute(($context["gantry"] ?? null), "menu", []), "instance", [0 => ($context["particle"] ?? null)], "method");
        } catch (\Exception $e) {
            if ($context['gantry']->debug()) throw $e;
            GANTRY_DEBUGGER && method_exists('Gantry\Debugger', 'addException') && \Gantry\Debugger::addException($e);
            $context['e'] = $e;
            // line 4
            echo "    <div class=\"alert alert-error\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["e"] ?? null), "getMessage", []), "html", null, true);
            echo "</div>
";
        }
        // line 6
        echo "
";
        // line 14
        echo "
";
        // line 23
        echo "
";
        // line 32
        echo "
";
        // line 117
        echo "
";
        // line 134
        echo "
";
        // line 142
        echo "
";
        // line 155
        echo "
";
        // line 156
        $context["macro"] = $this;
        // line 157
        echo "
";
        // line 158
        if ($this->getAttribute($this->getAttribute(($context["menu"] ?? null), "root", []), "count", [], "method")) {
            // line 159
            echo "    <nav class=\"g-main-nav\"";
            echo (($this->getAttribute(($context["particle"] ?? null), "mobileTarget", [])) ? (" data-g-mobile-target") : (""));
            echo " data-g-hover-expand=\"";
            echo (((($this->getAttribute(($context["particle"] ?? null), "hoverExpand", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["particle"] ?? null), "hoverExpand", []), "true")) : ("true"))) ? ("true") : ("false"));
            echo "\">
        <ul class=\"g-toplevel\">
            ";
            // line 161
            echo $context["macro"]->getdisplayItems($this->getAttribute(($context["menu"] ?? null), "root", []), ($context["menu"] ?? null), $context);
            echo "
        </ul>
    </nav>
";
        }
    }

    // line 7
    public function getgetCustomWidth($__item__ = null, $__menu__ = null, $__mode__ = null, $__dropdown_type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "item" => $__item__,
            "menu" => $__menu__,
            "mode" => $__mode__,
            "dropdown_type" => $__dropdown_type__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 8
            if ((((($this->getAttribute(($context["item"] ?? null), "width", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["item"] ?? null), "width", []), "auto")) : ("auto")) != "auto") &&  !((($context["dropdown_type"] ?? null) == "fullwidth") && ($this->getAttribute(($context["item"] ?? null), "level", []) > 1)))) {
                // line 9
                if ((($context["mode"] ?? null) == "item")) {
                    echo " style=\"position: relative;\"";
                } elseif ((                // line 10
($context["mode"] ?? null) == "submenu")) {
                    echo " style=\"width:";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "width", []), "html", null, true);
                    echo ";\" data-g-item-width=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "width", []), "html", null, true);
                    echo "\"";
                }
            }
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 15
    public function getdisplayParticle($__item__ = null, $__context__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "item" => $__item__,
            "context" => $__context__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 16
            echo "    ";
            $context["context"] = twig_array_merge(($context["context"] ?? null), ["particle" => $this->getAttribute($this->getAttribute(($context["item"] ?? null), "options", []), "particle", [])]);
            // line 17
            echo "    ";
            $context["classes"] = $this->getAttribute($this->getAttribute($this->getAttribute(($context["item"] ?? null), "options", []), "block", []), "class", []);
            // line 18
            echo "    <div class=\"menu-item-particle";
            ((($context["classes"] ?? null)) ? (print (twig_escape_filter($this->env, (" " . ($context["classes"] ?? null)), "html", null, true))) : (print ("")));
            echo "\">
        ";
            // line 19
            $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = null;
            try {
                $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 =                 $this->loadTemplate([0 => (("particles/" . $this->getAttribute(($context["item"] ?? null), "particle", [])) . ".html.twig"), 1 => (("@particles/" . $this->getAttribute(($context["item"] ?? null), "particle", [])) . ".html.twig")], "@particles/menu.html.twig", 19);
            } catch (LoaderError $e) {
                // ignore missing template
            }
            if ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) {
                $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4->display(twig_to_array(                // line 20
($context["context"] ?? null)));
            }
            // line 21
            echo "    </div>
";
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 24
    public function getdisplayTitle($__item__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "item" => $__item__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 25
            echo "    ";
            if (( !$this->getAttribute(($context["item"] ?? null), "icon_only", []) ||  !($this->getAttribute(($context["item"] ?? null), "image", []) || $this->getAttribute(($context["item"] ?? null), "icon", [])))) {
                // line 26
                echo "        <span class=\"g-menu-item-title\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "title", []), "html", null, true);
                echo "</span>
        ";
                // line 27
                if ($this->getAttribute(($context["item"] ?? null), "subtitle", [])) {
                    // line 28
                    echo "            <span class=\"g-menu-item-subtitle\">";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "subtitle", []), "html", null, true);
                    echo "</span>
        ";
                }
                // line 30
                echo "    ";
            }
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 33
    public function getdisplayItem($__item__ = null, $__menu__ = null, $__context__ = null, $__dropdown_type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "item" => $__item__,
            "menu" => $__menu__,
            "context" => $__context__,
            "dropdown_type" => $__dropdown_type__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 34
            echo "    ";
            $context["self"] = $this;
            // line 35
            echo "    ";
            if ((($this->getAttribute(($context["item"] ?? null), "type", []) == "particle") &&  !$this->getAttribute($this->getAttribute($this->getAttribute(($context["item"] ?? null), "options", []), "particle", []), "enabled", []))) {
                // line 36
                echo "        ";
                $context["enabled"] = 0;
                // line 37
                echo "    ";
            }
            // line 38
            echo "    ";
            if ((($this->getAttribute(($context["item"] ?? null), "visible", []) && $this->getAttribute(($context["item"] ?? null), "enabled", [])) && (((isset($context["enabled"]) || array_key_exists("enabled", $context))) ? (_twig_default_filter(($context["enabled"] ?? null), 1)) : (1)))) {
                // line 39
                echo "        ";
                $context["title"] = ((($this->getAttribute(($context["item"] ?? null), "icon_only", []) || $this->getAttribute(($context["item"] ?? null), "link_title", []))) ? (((" title=\"" . twig_escape_filter($this->env, (($this->getAttribute(($context["item"] ?? null), "link_title", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["item"] ?? null), "link_title", []), $this->getAttribute(($context["item"] ?? null), "title", []))) : ($this->getAttribute(($context["item"] ?? null), "title", []))))) . "\"")) : (""));
                // line 40
                echo "        ";
                $context["label"] = ((($this->getAttribute(($context["item"] ?? null), "icon_only", []) && ($this->getAttribute(($context["item"] ?? null), "image", []) || $this->getAttribute(($context["item"] ?? null), "icon", [])))) ? (((" aria-label=\"" . twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "title", []))) . "\"")) : (""));
                // line 41
                echo "        ";
                $context["active"] = (($this->getAttribute(($context["menu"] ?? null), "isActive", [0 => ($context["item"] ?? null)], "method")) ? (" active") : (""));
                // line 42
                echo "        ";
                $context["dropdown"] = ((($this->getAttribute(($context["item"] ?? null), "level", []) == 1)) ? ((" g-" . $this->getAttribute(($context["item"] ?? null), "getDropdown", [], "method"))) : (""));
                // line 43
                echo "        ";
                $context["parent"] = (($this->getAttribute(($context["item"] ?? null), "children", [])) ? (" g-parent") : (""));
                // line 44
                echo "        ";
                $context["target"] = (((($this->getAttribute(($context["item"] ?? null), "target", []) != "_self") || $this->getAttribute($this->getAttribute(($context["context"] ?? null), "particle", []), "forceTarget", []))) ? (((" target=\"" . twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "target", []))) . "\"")) : (""));
                // line 45
                echo "        ";
                $context["rel"] = $this->getAttribute(($context["item"] ?? null), "rel", []);
                // line 46
                echo "
        ";
                // line 47
                if (($this->getAttribute(($context["item"] ?? null), "target", []) == "_blank")) {
                    // line 48
                    echo "            ";
                    if (!twig_in_filter("noopener", ($context["rel"] ?? null))) {
                        // line 49
                        echo "                ";
                        $context["rel"] = ((($context["rel"] ?? null)) ? ((($context["rel"] ?? null) . " ")) : (($context["rel"] ?? null)));
                        // line 50
                        echo "                ";
                        $context["rel"] = (($context["rel"] ?? null) . "noopener");
                        // line 51
                        echo "            ";
                    }
                    // line 52
                    echo "            ";
                    if (!twig_in_filter("noreferrer", ($context["rel"] ?? null))) {
                        // line 53
                        echo "                ";
                        $context["rel"] = ((($context["rel"] ?? null)) ? ((($context["rel"] ?? null) . " ")) : (($context["rel"] ?? null)));
                        // line 54
                        echo "                ";
                        $context["rel"] = (($context["rel"] ?? null) . "noreferrer");
                        // line 55
                        echo "            ";
                    }
                    // line 56
                    echo "        ";
                }
                // line 57
                echo "
        ";
                // line 58
                $context["listAttributes"] = $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->attributeArrayFilter($this->getAttribute(($context["item"] ?? null), "attributes", []));
                // line 59
                echo "        ";
                $context["linkAttributes"] = "";
                // line 60
                echo "        
        ";
                // line 61
                if ($this->getAttribute(($context["item"] ?? null), "link_attributes", [])) {
                    // line 62
                    echo "            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["item"] ?? null), "link_attributes", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["attribute"]) {
                        // line 63
                        echo "                ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["attribute"]);
                        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                            // line 64
                            echo "                    ";
                            if (($context["key"] == "rel")) {
                                // line 65
                                echo "                        ";
                                $context['_parent'] = $context;
                                $context['_seq'] = twig_ensure_traversable(twig_split_filter($this->env, $context["value"], " "));
                                foreach ($context['_seq'] as $context["_key"] => $context["hVal"]) {
                                    // line 66
                                    echo "                            ";
                                    if (!twig_in_filter($context["hVal"], ($context["rel"] ?? null))) {
                                        // line 67
                                        echo "                                ";
                                        $context["rel"] = ((($context["rel"] ?? null)) ? ((($context["rel"] ?? null) . " ")) : (($context["rel"] ?? null)));
                                        // line 68
                                        echo "                                ";
                                        $context["rel"] = (($context["rel"] ?? null) . $context["hVal"]);
                                        // line 69
                                        echo "                            ";
                                    }
                                    // line 70
                                    echo "                        ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hVal'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 71
                                echo "                    ";
                            } else {
                                // line 72
                                echo "                        ";
                                $context["linkAttributes"] = (((((($context["linkAttributes"] ?? null) . " ") . twig_escape_filter($this->env, $context["key"])) . "=\"") . twig_escape_filter($this->env, $context["value"], "html_attr")) . "\"");
                                // line 73
                                echo "                    ";
                            }
                            // line 74
                            echo "                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 75
                        echo "            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attribute'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 76
                    echo "        ";
                }
                // line 77
                echo "
        ";
                // line 78
                $context["rel"] = ((($context["rel"] ?? null)) ? (((" rel=\"" . twig_escape_filter($this->env, ($context["rel"] ?? null), "html_attr")) . "\"")) : (""));
                // line 79
                echo "        
        <li class=\"g-menu-item g-menu-item-type-";
                // line 80
                echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "type", []), "html", null, true);
                echo " g-menu-item-";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "id", []), "html", null, true);
                if ( !$this->getAttribute(($context["item"] ?? null), "dropdown_hide", [])) {
                    echo twig_escape_filter($this->env, ($context["parent"] ?? null), "html", null, true);
                }
                echo twig_escape_filter($this->env, ($context["active"] ?? null), "html", null, true);
                echo twig_escape_filter($this->env, ($context["dropdown"] ?? null), "html", null, true);
                echo " ";
                if (($this->getAttribute(($context["item"] ?? null), "url", []) && $this->getAttribute(($context["item"] ?? null), "children", []))) {
                    if ( !$this->getAttribute(($context["item"] ?? null), "dropdown_hide", [])) {
                        echo "g-menu-item-link-parent";
                    }
                }
                echo " ";
                echo twig_escape_filter($this->env, (($this->getAttribute(($context["item"] ?? null), "class", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["item"] ?? null), "class", []), "")) : ("")), "html", null, true);
                echo "\"";
                // line 81
                echo $context["self"]->getgetCustomWidth(($context["item"] ?? null), ($context["menu"] ?? null), "item", ($context["dropdown"] ?? null));
                // line 82
                if ((($this->getAttribute($this->getAttribute(($context["context"] ?? null), "particle", [], "any", false, true), "renderTitles", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["context"] ?? null), "particle", [], "any", false, true), "renderTitles", []), 0)) : (0))) {
                    echo " title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "title", []), "html", null, true);
                    echo "\"";
                }
                echo ($context["listAttributes"] ?? null);
                echo ">
            ";
                // line 83
                if ($this->getAttribute(($context["item"] ?? null), "url", [])) {
                    echo "<a class=\"g-menu-item-container";
                    (($this->getAttribute(($context["item"] ?? null), "anchor_class", [])) ? (print (twig_escape_filter($this->env, (" " . $this->getAttribute(($context["item"] ?? null), "anchor_class", [])), "html", null, true))) : (print ("")));
                    echo "\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "url", []), "html", null, true);
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "hash", []), "html", null, true);
                    echo "\"";
                    echo ((((($context["title"] ?? null) . ($context["label"] ?? null)) . ($context["target"] ?? null)) . ($context["rel"] ?? null)) . ($context["linkAttributes"] ?? null));
                    echo ">
            ";
                } else {
                    // line 84
                    echo "<div class=\"g-menu-item-container";
                    (($this->getAttribute(($context["item"] ?? null), "anchor_class", [])) ? (print (twig_escape_filter($this->env, (" " . $this->getAttribute(($context["item"] ?? null), "anchor_class", [])), "html", null, true))) : (print ("")));
                    echo "\" data-g-menuparent=\"\"";
                    echo ($context["label"] ?? null);
                    echo ">";
                }
                // line 85
                echo "                ";
                if ($this->getAttribute(($context["item"] ?? null), "image", [])) {
                    // line 86
                    echo "                    <img src=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Gantry\Component\Twig\TwigExtension')->urlFunc($this->getAttribute(($context["item"] ?? null), "image", [])), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "title", []), "html", null, true);
                    echo "\" />
                ";
                } elseif ($this->getAttribute(                // line 87
($context["item"] ?? null), "icon", [])) {
                    // line 88
                    echo "                    <i class=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "icon", []), "html", null, true);
                    echo "\" aria-hidden=\"true\"></i>
                ";
                }
                // line 90
                echo "                ";
                if ($this->getAttribute(($context["item"] ?? null), "url", [])) {
                    // line 91
                    echo "                    <span class=\"g-menu-item-content\">
                        ";
                    // line 92
                    echo $context["self"]->getdisplayTitle(($context["item"] ?? null));
                    echo "
                    </span>
                    ";
                    // line 94
                    if (($this->getAttribute(($context["item"] ?? null), "children", []) &&  !$this->getAttribute(($context["item"] ?? null), "dropdown_hide", []))) {
                        // line 95
                        echo "<span class=\"g-menu-parent-indicator\" data-g-menuparent=\"\"></span>";
                    }
                    // line 97
                    echo "                ";
                } else {
                    // line 98
                    echo "                    ";
                    if (($this->getAttribute(($context["item"] ?? null), "type", []) == "particle")) {
                        // line 99
                        echo "                        ";
                        echo $context["self"]->getdisplayParticle(($context["item"] ?? null), ($context["context"] ?? null));
                        echo "
                    ";
                    } elseif (($this->getAttribute(                    // line 100
($context["item"] ?? null), "type", []) == "heading")) {
                        // line 101
                        echo "                        <span class=\"g-nav-header g-menu-item-content\"";
                        echo ($context["title"] ?? null);
                        echo ">";
                        echo $context["self"]->getdisplayTitle(($context["item"] ?? null));
                        echo "</span>
                    ";
                    } else {
                        // line 103
                        echo "                        <span class=\"g-separator g-menu-item-content\"";
                        echo ($context["title"] ?? null);
                        echo ">";
                        echo $context["self"]->getdisplayTitle(($context["item"] ?? null));
                        echo "</span>
                    ";
                    }
                    // line 105
                    echo "                        ";
                    if (($this->getAttribute(($context["item"] ?? null), "children", []) &&  !$this->getAttribute(($context["item"] ?? null), "dropdown_hide", []))) {
                        // line 106
                        echo "<span class=\"g-menu-parent-indicator\"></span>";
                    }
                    // line 108
                    echo "                ";
                }
                // line 109
                echo "            ";
                if ($this->getAttribute(($context["item"] ?? null), "url", [])) {
                    echo "</a>
            ";
                } else {
                    // line 110
                    echo "</div>";
                }
                // line 111
                echo "            ";
                if ($this->getAttribute(($context["item"] ?? null), "children", [])) {
                    // line 112
                    echo $context["self"]->getdisplaySubmenu(($context["item"] ?? null), ($context["menu"] ?? null), ($context["context"] ?? null), ($context["dropdown_type"] ?? null));
                }
                // line 114
                echo "        </li>
    ";
            }
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 118
    public function getdisplayContainers($__item__ = null, $__menu__ = null, $__context__ = null, $__dropdown_type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "item" => $__item__,
            "menu" => $__menu__,
            "context" => $__context__,
            "dropdown_type" => $__dropdown_type__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 119
            echo "    ";
            $context["self"] = $this;
            // line 120
            echo "    <div class=\"g-grid\">
        ";
            // line 121
            $context["groups"] = ((($this->getAttribute(($context["item"] ?? null), "getDropdown", [], "method") == "standard")) ? ([0 => ($context["item"] ?? null)]) : ($this->getAttribute(($context["item"] ?? null), "groups", [])));
            // line 122
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["groups"] ?? null));
            foreach ($context['_seq'] as $context["column"] => $context["items"]) {
                // line 123
                echo "        <div class=\"g-block ";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('toGrid')->getCallable(), [$this->getAttribute(($context["item"] ?? null), "columnWidth", [0 => $context["column"]], "method")]), "html", null, true);
                echo "\">
            <ul class=\"g-sublevel\">
                <li class=\"g-level-";
                // line 125
                echo twig_escape_filter($this->env, $this->getAttribute(($context["item"] ?? null), "level", []), "html", null, true);
                echo " g-go-back\">
                    <a class=\"g-menu-item-container\" href=\"#\" data-g-menuparent=\"\"><span>Back</span></a>
                </li>
                ";
                // line 128
                echo $context["self"]->getdisplayItems($context["items"], ($context["menu"] ?? null), ($context["context"] ?? null), ($context["dropdown_type"] ?? null));
                echo "
            </ul>
        </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['column'], $context['items'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 132
            echo "    </div>
";
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 135
    public function getdisplayItems($__items__ = null, $__menu__ = null, $__context__ = null, $__dropdown_type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "items" => $__items__,
            "menu" => $__menu__,
            "context" => $__context__,
            "dropdown_type" => $__dropdown_type__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 136
            echo "    ";
            $context["self"] = $this;
            // line 137
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 138
                echo "        ";
                if (($this->getAttribute($context["item"], "level", []) == 1)) {
                    $context["dropdown_type"] = $this->getAttribute($context["item"], "dropdown", []);
                }
                // line 139
                echo "        ";
                echo $context["self"]->getdisplayItem($context["item"], ($context["menu"] ?? null), ($context["context"] ?? null), ($context["dropdown_type"] ?? null));
                echo "
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    // line 143
    public function getdisplaySubmenu($__item__ = null, $__menu__ = null, $__context__ = null, $__dropdown_type__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "item" => $__item__,
            "menu" => $__menu__,
            "context" => $__context__,
            "dropdown_type" => $__dropdown_type__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start(function () { return ''; });
        try {
            // line 144
            echo "    ";
            $context["self"] = $this;
            // line 145
            echo "    ";
            if ( !$this->getAttribute(($context["item"] ?? null), "dropdown_hide", [])) {
                // line 146
                echo "        ";
                $context["animation"] = (($this->getAttribute($this->getAttribute($this->getAttribute(($context["context"] ?? null), "gantry", [], "any", false, true), "config", [], "any", false, true), "get", [0 => "styles.menu.animation"], "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["context"] ?? null), "gantry", [], "any", false, true), "config", [], "any", false, true), "get", [0 => "styles.menu.animation"], "method"), "g-fade")) : ("g-fade"));
                // line 147
                echo "        ";
                if (((((twig_length_filter($this->env, $this->getAttribute(($context["item"] ?? null), "groups", [])) == 1) && ( !($context["dropdown_type"] ?? null) == "fullwidth")) || (($context["dropdown_type"] ?? null) == "standard")) || (((($this->getAttribute(($context["item"] ?? null), "width", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["item"] ?? null), "width", []), "auto")) : ("auto")) != "auto") && (($context["dropdown_type"] ?? null) == "fullwidth")))) {
                    $context["dropdown_dir"] = ("g-dropdown-" . (($this->getAttribute(($context["item"] ?? null), "dropdown_dir", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["item"] ?? null), "dropdown_dir", []), "right")) : ("right")));
                }
                // line 148
                echo "        <ul class=\"g-dropdown g-inactive ";
                echo twig_escape_filter($this->env, ($context["animation"] ?? null), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, ($context["dropdown_dir"] ?? null), "html", null, true);
                echo "\"";
                echo $context["self"]->getgetCustomWidth(($context["item"] ?? null), ($context["menu"] ?? null), "submenu", ($context["dropdown_type"] ?? null));
                echo ">
            <li class=\"g-dropdown-column\">
                ";
                // line 150
                echo $context["self"]->getdisplayContainers(($context["item"] ?? null), ($context["menu"] ?? null), ($context["context"] ?? null), ($context["dropdown_type"] ?? null));
                echo "
            </li>
        </ul>
    ";
            }
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@particles/menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  700 => 150,  690 => 148,  685 => 147,  682 => 146,  679 => 145,  676 => 144,  661 => 143,  639 => 139,  634 => 138,  629 => 137,  626 => 136,  611 => 135,  595 => 132,  585 => 128,  579 => 125,  573 => 123,  568 => 122,  566 => 121,  563 => 120,  560 => 119,  545 => 118,  528 => 114,  525 => 112,  522 => 111,  519 => 110,  513 => 109,  510 => 108,  507 => 106,  504 => 105,  496 => 103,  488 => 101,  486 => 100,  481 => 99,  478 => 98,  475 => 97,  472 => 95,  470 => 94,  465 => 92,  462 => 91,  459 => 90,  453 => 88,  451 => 87,  444 => 86,  441 => 85,  434 => 84,  422 => 83,  413 => 82,  411 => 81,  393 => 80,  390 => 79,  388 => 78,  385 => 77,  382 => 76,  376 => 75,  370 => 74,  367 => 73,  364 => 72,  361 => 71,  355 => 70,  352 => 69,  349 => 68,  346 => 67,  343 => 66,  338 => 65,  335 => 64,  330 => 63,  325 => 62,  323 => 61,  320 => 60,  317 => 59,  315 => 58,  312 => 57,  309 => 56,  306 => 55,  303 => 54,  300 => 53,  297 => 52,  294 => 51,  291 => 50,  288 => 49,  285 => 48,  283 => 47,  280 => 46,  277 => 45,  274 => 44,  271 => 43,  268 => 42,  265 => 41,  262 => 40,  259 => 39,  256 => 38,  253 => 37,  250 => 36,  247 => 35,  244 => 34,  229 => 33,  213 => 30,  207 => 28,  205 => 27,  200 => 26,  197 => 25,  185 => 24,  169 => 21,  166 => 20,  158 => 19,  153 => 18,  150 => 17,  147 => 16,  134 => 15,  112 => 10,  109 => 9,  107 => 8,  92 => 7,  83 => 161,  75 => 159,  73 => 158,  70 => 157,  68 => 156,  65 => 155,  62 => 142,  59 => 134,  56 => 117,  53 => 32,  50 => 23,  47 => 14,  44 => 6,  38 => 4,  31 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "@particles/menu.html.twig", "/var/www/html/media/gantry5/engines/nucleus/particles/menu.html.twig");
    }
}
