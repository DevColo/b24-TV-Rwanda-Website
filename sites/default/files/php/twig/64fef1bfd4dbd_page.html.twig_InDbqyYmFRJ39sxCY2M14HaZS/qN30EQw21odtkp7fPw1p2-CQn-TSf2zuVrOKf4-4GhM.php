<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/b24/templates/system/page.html.twig */
class __TwigTemplate_16ec1bd837ae8135370624e8ef79762e extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 1), 1, $this->source), "html", null, true);
        echo " 

";
        // line 3
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 3), 3, $this->source), "html", null, true);
        echo "

<!-- Footer Start -->
    <div class=\"container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5\">
        <div class=\"row py-4\">
            <div class=\"col-lg-3 col-md-6 mb-5\">
                <h5 class=\"mb-4 text-white text-uppercase font-weight-bold\">Get In Touch</h5>
                <p class=\"font-weight-medium\"><i class=\"fa fa-map-marker-alt mr-2\"></i>Kicukiro, Kigali, Rwanda</p>
                <p class=\"font-weight-medium\"><i class=\"fa fa-phone-alt mr-2\"></i>+250785296570</p>
                <p class=\"font-weight-medium\"><i class=\"fa fa-envelope mr-2\"></i><a href=\"mail:info@b24.rw\">info@b24.rw</a></p>
                <h6 class=\"mt-4 mb-3 text-white text-uppercase font-weight-bold\">Follow Us</h6>
                <div class=\"d-flex justify-content-start\">
                    <!-- <a class=\"btn btn-lg btn-secondary btn-lg-square mr-2\" href=\"#\" target=\"_blank\"><i class=\"fab fa-twitter\"></i></a> -->
                    <a class=\"btn btn-lg btn-secondary btn-lg-square mr-2\" href=\"https://www.facebook.com/B24tvOnline?mibextid=ZbWKwL\" target=\"_blank\"><i class=\"fab fa-facebook-f\"></i></a>
                    <a class=\"btn btn-lg btn-secondary btn-lg-square mr-2\" href=\"https://www.tiktok.com/@b24tv.rw\" target=\"_blank\"><i class=\"fab fa-tiktok\"></i></a>
                    <a class=\"btn btn-lg btn-secondary btn-lg-square mr-2\" href=\"https://instagram.com/b24tv.rw?utm_source=qr&igshid=ZDc4ODBmNjlmNQ%3D%3D\" target=\"_blank\"><i class=\"fab fa-instagram\"></i></a>
                    <a class=\"btn btn-lg btn-secondary btn-lg-square\" href=\"https://www.youtube.com/@B24TV\" target=\"_blank\"><i class=\"fab fa-youtube\"></i></a>
                </div>
            </div>
            <div class=\"col-lg-2 col-md-6 mb-5\">
                <h5 class=\"mb-4 text-white text-uppercase font-weight-bold\">";
        // line 23
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Popular News"));
        echo "</h5>
                ";
        // line 24
        $context["popular_news"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["query"] ?? null), "entries", [], "any", false, false, true, 24), "where", [0 => ["field_featured_news" => 1]], "method", false, false, true, 24), "limit", [0 => 3], "method", false, false, true, 25), "all", [], "method", false, false, true, 26);
        // line 28
        echo "
                ";
        // line 29
        if ((array_key_exists("popular_news", $context) &&  !twig_test_empty(($context["popular_news"] ?? null)))) {
            // line 30
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["popular_news"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 31
                echo "                    <div class=\"mb-3\">
                    <div class=\"mb-2\">
                        ";
                // line 33
                if ((twig_get_attribute($this->env, $this->source, $context["item"], "field_entertainment_category", [], "any", true, true, true, 33) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["item"], "field_entertainment_category", [], "any", false, false, true, 33)))) {
                    // line 34
                    echo "                                                        ";
                    $context["category"] = t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "field_entertainment_category", [], "any", false, false, true, 34), 0, [], "any", false, false, true, 34), "entity", [], "any", false, false, true, 34), "name", [], "any", false, false, true, 34), "value", [], "any", false, false, true, 34), 34, $this->source));
                    // line 35
                    echo "                                                    ";
                } elseif ((twig_get_attribute($this->env, $this->source, $context["item"], "field_event_type", [], "any", true, true, true, 35) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["item"], "field_event_type", [], "any", false, false, true, 35)))) {
                    // line 36
                    echo "                                                        ";
                    $context["category"] = t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "field_event_type", [], "any", false, false, true, 36), 0, [], "any", false, false, true, 36), "entity", [], "any", false, false, true, 36), "name", [], "any", false, false, true, 36), "value", [], "any", false, false, true, 36), 36, $this->source));
                    // line 37
                    echo "                                                    ";
                } elseif ((twig_get_attribute($this->env, $this->source, $context["item"], "field_sport_category", [], "any", true, true, true, 37) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["item"], "field_sport_category", [], "any", false, false, true, 37)))) {
                    // line 38
                    echo "                                                        ";
                    $context["category"] = t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "field_sport_category", [], "any", false, false, true, 38), 0, [], "any", false, false, true, 38), "entity", [], "any", false, false, true, 38), "name", [], "any", false, false, true, 38), "value", [], "any", false, false, true, 38), 38, $this->source));
                    // line 39
                    echo "                                                    ";
                } elseif ((twig_get_attribute($this->env, $this->source, $context["item"], "field_news_category", [], "any", true, true, true, 39) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["item"], "field_news_category", [], "any", false, false, true, 39)))) {
                    // line 40
                    echo "                                                        ";
                    $context["category"] = t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "field_news_category", [], "any", false, false, true, 40), 0, [], "any", false, false, true, 40), "entity", [], "any", false, false, true, 40), "name", [], "any", false, false, true, 40), "value", [], "any", false, false, true, 40), 40, $this->source));
                    // line 41
                    echo "                                                    ";
                } else {
                    // line 42
                    echo "                                                        ";
                    $context["category"] = "";
                    // line 43
                    echo "                                                    ";
                }
                // line 44
                echo "                        <a class=\"badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2\" href=\"\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["category"] ?? null), 44, $this->source), "html", null, true);
                echo "</a>
                        <a class=\"text-body\" href=\"\"><small>";
                // line 45
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "created", [], "any", false, false, true, 45), "value", [], "any", false, false, true, 45), 45, $this->source), "F j, Y"), "html", null, true);
                echo "</small></a>
                    </div>
                    <a class=\"small text-body font-weight-medium\" href=\"";
                // line 47
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 47, $this->source), "html", null, true);
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "nid", [], "any", false, false, true, 47), "value", [], "any", false, false, true, 47)]), "html", null, true);
                echo "\">";
                (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 47), "value", [], "any", false, false, true, 47)) > 35)) ? (print ($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (twig_slice($this->env, t(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 47), "value", [], "any", false, false, true, 47)), 0, 35) . "..."), "html", null, true))) : (print (t(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 47), "value", [], "any", false, false, true, 47)))));
                echo "</a>
                </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 50
            echo "                ";
        }
        // line 51
        echo "                
            </div>

            <div class=\"col-lg-2 col-md-6 mb-5\">
                <h5 class=\"mb-4 text-white text-uppercase font-weight-bold\">Recent News</h5>
                ";
        // line 56
        $context["popular_news"] = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["query"] ?? null), "entries", [], "any", false, false, true, 56), "type", [0 => "news"], "method", false, false, true, 56), "where", [0 => "status 1 "], "method", false, false, true, 57), "limit", [0 => 3], "method", false, false, true, 58), "all", [], "method", false, false, true, 59);
        // line 61
        echo "
                ";
        // line 62
        if ((array_key_exists("popular_news", $context) &&  !twig_test_empty(($context["popular_news"] ?? null)))) {
            // line 63
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["popular_news"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 64
                echo "                    <div class=\"mb-3\">
                    <div class=\"mb-2\">
                        ";
                // line 66
                if ((twig_get_attribute($this->env, $this->source, $context["item"], "field_entertainment_category", [], "any", true, true, true, 66) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["item"], "field_entertainment_category", [], "any", false, false, true, 66)))) {
                    // line 67
                    echo "                                                        ";
                    $context["category"] = t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "field_entertainment_category", [], "any", false, false, true, 67), 0, [], "any", false, false, true, 67), "entity", [], "any", false, false, true, 67), "name", [], "any", false, false, true, 67), "value", [], "any", false, false, true, 67), 67, $this->source));
                    // line 68
                    echo "                                                    ";
                } elseif ((twig_get_attribute($this->env, $this->source, $context["item"], "field_event_type", [], "any", true, true, true, 68) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["item"], "field_event_type", [], "any", false, false, true, 68)))) {
                    // line 69
                    echo "                                                        ";
                    $context["category"] = t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "field_event_type", [], "any", false, false, true, 69), 0, [], "any", false, false, true, 69), "entity", [], "any", false, false, true, 69), "name", [], "any", false, false, true, 69), "value", [], "any", false, false, true, 69), 69, $this->source));
                    // line 70
                    echo "                                                    ";
                } elseif ((twig_get_attribute($this->env, $this->source, $context["item"], "field_sport_category", [], "any", true, true, true, 70) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["item"], "field_sport_category", [], "any", false, false, true, 70)))) {
                    // line 71
                    echo "                                                        ";
                    $context["category"] = t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "field_sport_category", [], "any", false, false, true, 71), 0, [], "any", false, false, true, 71), "entity", [], "any", false, false, true, 71), "name", [], "any", false, false, true, 71), "value", [], "any", false, false, true, 71), 71, $this->source));
                    // line 72
                    echo "                                                    ";
                } elseif ((twig_get_attribute($this->env, $this->source, $context["item"], "field_news_category", [], "any", true, true, true, 72) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["item"], "field_news_category", [], "any", false, false, true, 72)))) {
                    // line 73
                    echo "                                                        ";
                    $context["category"] = t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "field_news_category", [], "any", false, false, true, 73), 0, [], "any", false, false, true, 73), "entity", [], "any", false, false, true, 73), "name", [], "any", false, false, true, 73), "value", [], "any", false, false, true, 73), 73, $this->source));
                    // line 74
                    echo "                                                    ";
                } else {
                    // line 75
                    echo "                                                        ";
                    $context["category"] = "";
                    // line 76
                    echo "                                                    ";
                }
                // line 77
                echo "                        <a class=\"badge badge-success text-uppercase font-weight-semi-bold p-1 mr-2\" href=\"\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["category"] ?? null), 77, $this->source), "html", null, true);
                echo "</a>
                        <a class=\"text-body\" href=\"\"><small>";
                // line 78
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "created", [], "any", false, false, true, 78), "value", [], "any", false, false, true, 78), 78, $this->source), "F j, Y"), "html", null, true);
                echo "</small></a>
                    </div>
                    <a class=\"small text-body font-weight-medium\" href=\"";
                // line 80
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 80, $this->source), "html", null, true);
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "nid", [], "any", false, false, true, 80), "value", [], "any", false, false, true, 80)]), "html", null, true);
                echo "\">";
                (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 80), "value", [], "any", false, false, true, 80)) > 35)) ? (print ($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (twig_slice($this->env, t(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 80), "value", [], "any", false, false, true, 80)), 0, 35) . "..."), "html", null, true))) : (print (t(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, true, 80), "value", [], "any", false, false, true, 80)))));
                echo "</a>
                </div>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 83
            echo "                ";
        }
        // line 84
        echo "            </div>

            <div class=\"col-lg-5 col-md-6 mb-5\">
                <h5 class=\"mb-4 text-white text-uppercase font-weight-bold\">Categories</h5>
                <div class=\"m-n1\">
                    <a href=\"";
        // line 89
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 89, $this->source), "html", null, true);
        echo "/news/africa\" class=\"btn btn-sm btn-secondary m-1\">Africa</a>
                    <a href=\"";
        // line 90
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 90, $this->source), "html", null, true);
        echo "/news/business\" class=\"btn btn-sm btn-secondary m-1\">Business</a>
                    <a href=\"";
        // line 91
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 91, $this->source), "html", null, true);
        echo "/news/health\" class=\"btn btn-sm btn-secondary m-1\">Health</a>
                    <a href=\"";
        // line 92
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 92, $this->source), "html", null, true);
        echo "/news/agriculture\" class=\"btn btn-sm btn-secondary m-1\">Agriculture</a>
                    <a href=\"";
        // line 93
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 93, $this->source), "html", null, true);
        echo "/news/international\" class=\"btn btn-sm btn-secondary m-1\">International</a>
                    <a href=\"";
        // line 94
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 94, $this->source), "html", null, true);
        echo "/news/love\" class=\"btn btn-sm btn-secondary m-1\">Love</a>
                    <a href=\"";
        // line 95
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 95, $this->source), "html", null, true);
        echo "/news/technology\" class=\"btn btn-sm btn-secondary m-1\">Technology</a>
                    <a href=\"";
        // line 96
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 96, $this->source), "html", null, true);
        echo "/news/rwanda\" class=\"btn btn-sm btn-secondary m-1\">Rwanda</a>
                    <a href=\"";
        // line 97
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 97, $this->source), "html", null, true);
        echo "/events/charity-event\" class=\"btn btn-sm btn-secondary m-1\">Charity event</a>
                    <a href=\"";
        // line 98
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 98, $this->source), "html", null, true);
        echo "/events/conference\" class=\"btn btn-sm btn-secondary m-1\">Conference</a>
                    <a href=\"";
        // line 99
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 99, $this->source), "html", null, true);
        echo "/events/festival\" class=\"btn btn-sm btn-secondary m-1\">Festival</a>
                    <a href=\"";
        // line 100
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 100, $this->source), "html", null, true);
        echo "/events/internal-corporate-event\" class=\"btn btn-sm btn-secondary m-1\">Internal corporate event</a>
                    <a href=\"";
        // line 101
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 101, $this->source), "html", null, true);
        echo "/events/networking-event\" class=\"btn btn-sm btn-secondary m-1\">Networking event</a>
                    <a href=\"";
        // line 102
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 102, $this->source), "html", null, true);
        echo "/events/product-launch-event\" class=\"btn btn-sm btn-secondary m-1\">Product launch event</a>
                    <a href=\"";
        // line 103
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 103, $this->source), "html", null, true);
        echo "/events/team-building-event\" class=\"btn btn-sm btn-secondary m-1\">Team building event</a>
                    <a href=\"";
        // line 104
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 104, $this->source), "html", null, true);
        echo "/events/trade-show\" class=\"btn btn-sm btn-secondary m-1\">Trade show</a>
                    <a href=\"";
        // line 105
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 105, $this->source), "html", null, true);
        echo "/events/workshop\" class=\"btn btn-sm btn-secondary m-1\">Workshop</a>
                    <a href=\"";
        // line 106
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 106, $this->source), "html", null, true);
        echo "/entertainment/comedy\" class=\"btn btn-sm btn-secondary m-1\">Comedy</a>
                    <a href=\"";
        // line 107
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 107, $this->source), "html", null, true);
        echo "/entertainment/concert\" class=\"btn btn-sm btn-secondary m-1\">Concert</a>
                    <a href=\"";
        // line 108
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 108, $this->source), "html", null, true);
        echo "/entertainment/dance\" class=\"btn btn-sm btn-secondary m-1\">Dance</a>
                    <a href=\"";
        // line 109
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 109, $this->source), "html", null, true);
        echo "/entertainment/drama\" class=\"btn btn-sm btn-secondary m-1\">Drama</a>
                    <a href=\"";
        // line 110
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 110, $this->source), "html", null, true);
        echo "/entertainment/game\" class=\"btn btn-sm btn-secondary m-1\">Game</a>
                    <a href=\"";
        // line 111
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 111, $this->source), "html", null, true);
        echo "/entertainment/karaoke\" class=\"btn btn-sm btn-secondary m-1\">Karaoke</a>
                    <a href=\"";
        // line 112
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 112, $this->source), "html", null, true);
        echo "/entertainment/music\" class=\"btn btn-sm btn-secondary m-1\">Music</a>
                    <a href=\"";
        // line 113
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 113, $this->source), "html", null, true);
        echo "/sport/basket-ball\" class=\"btn btn-sm btn-secondary m-1\">Basket ball</a>
                    <a href=\"";
        // line 114
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 114, $this->source), "html", null, true);
        echo "/sport/cycling\" class=\"btn btn-sm btn-secondary m-1\">Cycling</a>
                    <a href=\"";
        // line 115
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 115, $this->source), "html", null, true);
        echo "/sport/soccer\" class=\"btn btn-sm btn-secondary m-1\">Soccer</a>
                    <a href=\"";
        // line 116
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 116, $this->source), "html", null, true);
        echo "/sport/swimming\" class=\"btn btn-sm btn-secondary m-1\">Swimming</a>
                    <a href=\"";
        // line 117
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 117, $this->source), "html", null, true);
        echo "/sport/track-and-field\" class=\"btn btn-sm btn-secondary m-1\">Track and field</a>
                    <a href=\"";
        // line 118
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 118, $this->source), "html", null, true);
        echo "/sport/volley-ball\" class=\"btn btn-sm btn-secondary m-1\">Volley ball</a>
                    <a href=\"";
        // line 119
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 119, $this->source), "html", null, true);
        echo "/youtube-videos/comedy\" class=\"btn btn-sm btn-secondary m-1\">Comedy</a>
                    <a href=\"";
        // line 120
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 120, $this->source), "html", null, true);
        echo "/youtube-videos/interview\" class=\"btn btn-sm btn-secondary m-1\">Interview</a>
                    <a href=\"";
        // line 121
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 121, $this->source), "html", null, true);
        echo "/youtube-videos/music-video\" class=\"btn btn-sm btn-secondary m-1\">Music video</a>
                    <a href=\"";
        // line 122
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 122, $this->source), "html", null, true);
        echo "/youtube-videos/podcast\" class=\"btn btn-sm btn-secondary m-1\">Podcast</a>
                </div>
            </div>
            
        </div>
    </div>
    <div class=\"container-fluid py-4 px-sm-3 px-md-5\" style=\"background: #111111;\">
        <p class=\"m-0 text-center\">&copy; <a href=\"#\">B24 TV</a>. All Rights Reserved. 
        Design by <a href=\"https://instagram.com/dadamarielle?igshid=OGQ5ZDc2ODk2ZA==\" target=\"_blank\">Marielle Mbavu</a></p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href=\"#\" class=\"btn btn-primary btn-square back-to-top\"><i class=\"fa fa-arrow-up\"></i></a>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/b24/templates/system/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  363 => 122,  359 => 121,  355 => 120,  351 => 119,  347 => 118,  343 => 117,  339 => 116,  335 => 115,  331 => 114,  327 => 113,  323 => 112,  319 => 111,  315 => 110,  311 => 109,  307 => 108,  303 => 107,  299 => 106,  295 => 105,  291 => 104,  287 => 103,  283 => 102,  279 => 101,  275 => 100,  271 => 99,  267 => 98,  263 => 97,  259 => 96,  255 => 95,  251 => 94,  247 => 93,  243 => 92,  239 => 91,  235 => 90,  231 => 89,  224 => 84,  221 => 83,  209 => 80,  204 => 78,  199 => 77,  196 => 76,  193 => 75,  190 => 74,  187 => 73,  184 => 72,  181 => 71,  178 => 70,  175 => 69,  172 => 68,  169 => 67,  167 => 66,  163 => 64,  158 => 63,  156 => 62,  153 => 61,  151 => 56,  144 => 51,  141 => 50,  129 => 47,  124 => 45,  119 => 44,  116 => 43,  113 => 42,  110 => 41,  107 => 40,  104 => 39,  101 => 38,  98 => 37,  95 => 36,  92 => 35,  89 => 34,  87 => 33,  83 => 31,  78 => 30,  76 => 29,  73 => 28,  71 => 24,  67 => 23,  44 => 3,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{{ page.header }} 

{{ page.content}}

<!-- Footer Start -->
    <div class=\"container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5\">
        <div class=\"row py-4\">
            <div class=\"col-lg-3 col-md-6 mb-5\">
                <h5 class=\"mb-4 text-white text-uppercase font-weight-bold\">Get In Touch</h5>
                <p class=\"font-weight-medium\"><i class=\"fa fa-map-marker-alt mr-2\"></i>Kicukiro, Kigali, Rwanda</p>
                <p class=\"font-weight-medium\"><i class=\"fa fa-phone-alt mr-2\"></i>+250785296570</p>
                <p class=\"font-weight-medium\"><i class=\"fa fa-envelope mr-2\"></i><a href=\"mail:info@b24.rw\">info@b24.rw</a></p>
                <h6 class=\"mt-4 mb-3 text-white text-uppercase font-weight-bold\">Follow Us</h6>
                <div class=\"d-flex justify-content-start\">
                    <!-- <a class=\"btn btn-lg btn-secondary btn-lg-square mr-2\" href=\"#\" target=\"_blank\"><i class=\"fab fa-twitter\"></i></a> -->
                    <a class=\"btn btn-lg btn-secondary btn-lg-square mr-2\" href=\"https://www.facebook.com/B24tvOnline?mibextid=ZbWKwL\" target=\"_blank\"><i class=\"fab fa-facebook-f\"></i></a>
                    <a class=\"btn btn-lg btn-secondary btn-lg-square mr-2\" href=\"https://www.tiktok.com/@b24tv.rw\" target=\"_blank\"><i class=\"fab fa-tiktok\"></i></a>
                    <a class=\"btn btn-lg btn-secondary btn-lg-square mr-2\" href=\"https://instagram.com/b24tv.rw?utm_source=qr&igshid=ZDc4ODBmNjlmNQ%3D%3D\" target=\"_blank\"><i class=\"fab fa-instagram\"></i></a>
                    <a class=\"btn btn-lg btn-secondary btn-lg-square\" href=\"https://www.youtube.com/@B24TV\" target=\"_blank\"><i class=\"fab fa-youtube\"></i></a>
                </div>
            </div>
            <div class=\"col-lg-2 col-md-6 mb-5\">
                <h5 class=\"mb-4 text-white text-uppercase font-weight-bold\">{{'Popular News'|t}}</h5>
                {% set popular_news = query.entries
                   .where({field_featured_news: 1 })
                   .limit(3)
                    .all() %}

                {% if popular_news is defined and popular_news is not empty %}
                    {% for item in popular_news %}
                    <div class=\"mb-3\">
                    <div class=\"mb-2\">
                        {% if item.field_entertainment_category is defined and item.field_entertainment_category is not empty %}
                                                        {% set category = item.field_entertainment_category.0.entity.name.value|t %}
                                                    {% elseif item.field_event_type is defined and item.field_event_type is not empty %}
                                                        {% set category = item.field_event_type.0.entity.name.value|t %}
                                                    {% elseif item.field_sport_category is defined and item.field_sport_category is not empty %}
                                                        {% set category = item.field_sport_category.0.entity.name.value|t %}
                                                    {% elseif item.field_news_category is defined and item.field_news_category is not empty %}
                                                        {% set category = item.field_news_category.0.entity.name.value|t %}
                                                    {% else %}
                                                        {% set category = '' %}
                                                    {% endif %}
                        <a class=\"badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2\" href=\"\">{{category}}</a>
                        <a class=\"text-body\" href=\"\"><small>{{ item.created.value|date('F j, Y') }}</small></a>
                    </div>
                    <a class=\"small text-body font-weight-medium\" href=\"{{base_path}}{{ path('entity.node.canonical', {'node': item.nid.value}) }}\">{{ item.title.value|length > 35 ? item.title.value|t|slice(0, 35) ~ '...' : item.title.value|t }}</a>
                </div>
                    {% endfor %}
                {% endif %}
                
            </div>

            <div class=\"col-lg-2 col-md-6 mb-5\">
                <h5 class=\"mb-4 text-white text-uppercase font-weight-bold\">Recent News</h5>
                {% set popular_news = query.entries
                   .type('news')
                   .where('status 1 ')
                   .limit(3)
                    .all() %}

                {% if popular_news is defined and popular_news is not empty %}
                    {% for item in popular_news %}
                    <div class=\"mb-3\">
                    <div class=\"mb-2\">
                        {% if item.field_entertainment_category is defined and item.field_entertainment_category is not empty %}
                                                        {% set category = item.field_entertainment_category.0.entity.name.value|t %}
                                                    {% elseif item.field_event_type is defined and item.field_event_type is not empty %}
                                                        {% set category = item.field_event_type.0.entity.name.value|t %}
                                                    {% elseif item.field_sport_category is defined and item.field_sport_category is not empty %}
                                                        {% set category = item.field_sport_category.0.entity.name.value|t %}
                                                    {% elseif item.field_news_category is defined and item.field_news_category is not empty %}
                                                        {% set category = item.field_news_category.0.entity.name.value|t %}
                                                    {% else %}
                                                        {% set category = '' %}
                                                    {% endif %}
                        <a class=\"badge badge-success text-uppercase font-weight-semi-bold p-1 mr-2\" href=\"\">{{category}}</a>
                        <a class=\"text-body\" href=\"\"><small>{{ item.created.value|date('F j, Y') }}</small></a>
                    </div>
                    <a class=\"small text-body font-weight-medium\" href=\"{{base_path}}{{ path('entity.node.canonical', {'node': item.nid.value}) }}\">{{ item.title.value|length > 35 ? item.title.value|t|slice(0, 35) ~ '...' : item.title.value|t }}</a>
                </div>
                    {% endfor %}
                {% endif %}
            </div>

            <div class=\"col-lg-5 col-md-6 mb-5\">
                <h5 class=\"mb-4 text-white text-uppercase font-weight-bold\">Categories</h5>
                <div class=\"m-n1\">
                    <a href=\"{{ base_url }}/news/africa\" class=\"btn btn-sm btn-secondary m-1\">Africa</a>
                    <a href=\"{{ base_url }}/news/business\" class=\"btn btn-sm btn-secondary m-1\">Business</a>
                    <a href=\"{{ base_url }}/news/health\" class=\"btn btn-sm btn-secondary m-1\">Health</a>
                    <a href=\"{{ base_url }}/news/agriculture\" class=\"btn btn-sm btn-secondary m-1\">Agriculture</a>
                    <a href=\"{{ base_url }}/news/international\" class=\"btn btn-sm btn-secondary m-1\">International</a>
                    <a href=\"{{ base_url }}/news/love\" class=\"btn btn-sm btn-secondary m-1\">Love</a>
                    <a href=\"{{ base_url }}/news/technology\" class=\"btn btn-sm btn-secondary m-1\">Technology</a>
                    <a href=\"{{ base_url }}/news/rwanda\" class=\"btn btn-sm btn-secondary m-1\">Rwanda</a>
                    <a href=\"{{ base_url }}/events/charity-event\" class=\"btn btn-sm btn-secondary m-1\">Charity event</a>
                    <a href=\"{{ base_url }}/events/conference\" class=\"btn btn-sm btn-secondary m-1\">Conference</a>
                    <a href=\"{{ base_url }}/events/festival\" class=\"btn btn-sm btn-secondary m-1\">Festival</a>
                    <a href=\"{{ base_url }}/events/internal-corporate-event\" class=\"btn btn-sm btn-secondary m-1\">Internal corporate event</a>
                    <a href=\"{{ base_url }}/events/networking-event\" class=\"btn btn-sm btn-secondary m-1\">Networking event</a>
                    <a href=\"{{ base_url }}/events/product-launch-event\" class=\"btn btn-sm btn-secondary m-1\">Product launch event</a>
                    <a href=\"{{ base_url }}/events/team-building-event\" class=\"btn btn-sm btn-secondary m-1\">Team building event</a>
                    <a href=\"{{ base_url }}/events/trade-show\" class=\"btn btn-sm btn-secondary m-1\">Trade show</a>
                    <a href=\"{{ base_url }}/events/workshop\" class=\"btn btn-sm btn-secondary m-1\">Workshop</a>
                    <a href=\"{{ base_url }}/entertainment/comedy\" class=\"btn btn-sm btn-secondary m-1\">Comedy</a>
                    <a href=\"{{ base_url }}/entertainment/concert\" class=\"btn btn-sm btn-secondary m-1\">Concert</a>
                    <a href=\"{{ base_url }}/entertainment/dance\" class=\"btn btn-sm btn-secondary m-1\">Dance</a>
                    <a href=\"{{ base_url }}/entertainment/drama\" class=\"btn btn-sm btn-secondary m-1\">Drama</a>
                    <a href=\"{{ base_url }}/entertainment/game\" class=\"btn btn-sm btn-secondary m-1\">Game</a>
                    <a href=\"{{ base_url }}/entertainment/karaoke\" class=\"btn btn-sm btn-secondary m-1\">Karaoke</a>
                    <a href=\"{{ base_url }}/entertainment/music\" class=\"btn btn-sm btn-secondary m-1\">Music</a>
                    <a href=\"{{ base_url }}/sport/basket-ball\" class=\"btn btn-sm btn-secondary m-1\">Basket ball</a>
                    <a href=\"{{ base_url }}/sport/cycling\" class=\"btn btn-sm btn-secondary m-1\">Cycling</a>
                    <a href=\"{{ base_url }}/sport/soccer\" class=\"btn btn-sm btn-secondary m-1\">Soccer</a>
                    <a href=\"{{ base_url }}/sport/swimming\" class=\"btn btn-sm btn-secondary m-1\">Swimming</a>
                    <a href=\"{{ base_url }}/sport/track-and-field\" class=\"btn btn-sm btn-secondary m-1\">Track and field</a>
                    <a href=\"{{ base_url }}/sport/volley-ball\" class=\"btn btn-sm btn-secondary m-1\">Volley ball</a>
                    <a href=\"{{ base_url }}/youtube-videos/comedy\" class=\"btn btn-sm btn-secondary m-1\">Comedy</a>
                    <a href=\"{{ base_url }}/youtube-videos/interview\" class=\"btn btn-sm btn-secondary m-1\">Interview</a>
                    <a href=\"{{ base_url }}/youtube-videos/music-video\" class=\"btn btn-sm btn-secondary m-1\">Music video</a>
                    <a href=\"{{ base_url }}/youtube-videos/podcast\" class=\"btn btn-sm btn-secondary m-1\">Podcast</a>
                </div>
            </div>
            
        </div>
    </div>
    <div class=\"container-fluid py-4 px-sm-3 px-md-5\" style=\"background: #111111;\">
        <p class=\"m-0 text-center\">&copy; <a href=\"#\">B24 TV</a>. All Rights Reserved. 
        Design by <a href=\"https://instagram.com/dadamarielle?igshid=OGQ5ZDc2ODk2ZA==\" target=\"_blank\">Marielle Mbavu</a></p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href=\"#\" class=\"btn btn-primary btn-square back-to-top\"><i class=\"fa fa-arrow-up\"></i></a>
", "themes/custom/b24/templates/system/page.html.twig", "/var/www/html/b24/themes/custom/b24/templates/system/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 24, "if" => 29, "for" => 30);
        static $filters = array("escape" => 1, "t" => 23, "date" => 45, "length" => 47, "slice" => 47);
        static $functions = array("path" => 47);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'for'],
                ['escape', 't', 'date', 'length', 'slice'],
                ['path']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
