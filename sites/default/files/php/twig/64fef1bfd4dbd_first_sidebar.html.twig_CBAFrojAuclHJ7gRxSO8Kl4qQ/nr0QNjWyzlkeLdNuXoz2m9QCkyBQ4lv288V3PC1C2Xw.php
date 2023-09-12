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

/* themes/custom/b24/templates/first_sidebar.html.twig */
class __TwigTemplate_a6947d003cdb357149e73c40ba52186a extends \Twig\Template
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
        echo "                <div class=\"col-lg-4\">
                    <!-- Social Follow Start -->
                    <div class=\"mb-3\">
                        <div class=\"section-title mb-0\">
                            <h4 class=\"m-0 text-uppercase font-weight-bold\">Follow Us</h4>
                        </div>
                        <div class=\"bg-white border border-top-0 p-3\">
                            <a href=\"https://www.facebook.com/B24tvOnline?mibextid=ZbWKwL\" target=\"_blank\" class=\"d-block w-100 text-white text-decoration-none mb-3\" style=\"background: #39569E;\">
                                <i class=\"fab fa-facebook-f text-center py-4 mr-3\" style=\"width: 65px; background: rgba(0, 0, 0, .2);\"></i>
                                <span class=\"font-weight-medium\">Facebook</span>
                            </a>
                           <!--  <a href=\"\" class=\"d-block w-100 text-white text-decoration-none mb-3\" style=\"background: #52AAF4;\">
                                <i class=\"fab fa-twitter text-center py-4 mr-3\" style=\"width: 65px; background: rgba(0, 0, 0, .2);\"></i>
                                <span class=\"font-weight-medium\">12,345 Followers</span>
                            </a> -->
                           <!--  <a href=\"\" class=\"d-block w-100 text-white text-decoration-none mb-3\" style=\"background: #0185AE;\">
                                <i class=\"fab fa-linkedin-in text-center py-4 mr-3\" style=\"width: 65px; background: rgba(0, 0, 0, .2);\"></i>
                                <span class=\"font-weight-medium\">12,345 Connects</span>
                            </a> -->
                            <a href=\"https://instagram.com/b24tv.rw?utm_source=qr&igshid=ZDc4ODBmNjlmNQ%3D%3D\" target=\"_blank\" class=\"d-block w-100 text-white text-decoration-none mb-3\" style=\"background: #C8359D;\">
                                <i class=\"fab fa-instagram text-center py-4 mr-3\" style=\"width: 65px; background: rgba(0, 0, 0, .2);\"></i>
                                <span class=\"font-weight-medium\">Instagram</span>
                            </a>
                            <a href=\"https://www.youtube.com/@B24TV\" target=\"_blank\" class=\"d-block w-100 text-white text-decoration-none mb-3\" style=\"background: #DC472E;\">
                                <i class=\"fab fa-youtube text-center py-4 mr-3\" style=\"width: 65px; background: rgba(0, 0, 0, .2);\"></i>
                                <span class=\"font-weight-medium\">Youtube</span>
                            </a>
                            <a href=\"https://www.tiktok.com/@b24tv.rw\" target=\"_blank\" class=\"d-block w-100 text-white text-decoration-none\" style=\"background: #055570;\">
                                <i class=\"fab fa-tiktok text-center py-4 mr-3\" style=\"width: 65px; background: rgba(0, 0, 0, .2);\"></i>
                                <span class=\"font-weight-medium\">Tik Tok</span>
                            </a>
                        </div>
                    </div>
                    <!-- Social Follow End -->

                    <!-- Ads Start -->
                    <div class=\"mb-3\">
                        <div class=\"section-title mb-0\">
                            <h4 class=\"m-0 text-uppercase font-weight-bold\">Advertisement</h4>
                        </div>
                        <div class=\"bg-white text-center border border-top-0 p-3\">
                            <a href=\"\"><img class=\"img-fluid\" src=\"";
        // line 42
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null), 42, $this->source), "html", null, true);
        echo "/";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getActiveThemePath(), "html", null, true);
        echo "/img/rfmu.jpg\" alt=\"\"></a>
                        </div>
                    </div>
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class=\"mb-3\">
                        <div class=\"section-title mb-0\">
                            <h4 class=\"m-0 text-uppercase font-weight-bold\">Trending News</h4>
                        </div>
                        <div class=\"bg-white border border-top-0 p-3\">
                            ";
        // line 53
        if ((array_key_exists("trending_nodes", $context) &&  !twig_test_empty(($context["trending_nodes"] ?? null)))) {
            // line 54
            echo "                                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["trending_nodes"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["trending_news"]) {
                // line 55
                echo "                                    ";
                if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, true, true, 55), "field_news_image", [], "any", true, true, true, 55) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, false, true, 55), "field_news_image", [], "any", false, false, true, 55)))) {
                    // line 56
                    echo "                                        <div class=\"d-flex align-items-center bg-white mb-3\" style=\"height: 110px;\">
                                            <img class=\"img-fluid\" src=\"";
                    // line 57
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::fileUrlFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, false, true, 57), "field_news_image", [], "any", false, false, true, 57), 57, $this->source)), "html", null, true);
                    echo "\" alt=\"\" style=\"height:110px !important\">
                                            <div class=\"w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0\">
                                                <div class=\"mb-2\">
                                                    ";
                    // line 60
                    if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, true, true, 60), "field_entertainment_category", [], "any", true, true, true, 60) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, false, true, 60), "field_entertainment_category", [], "any", false, false, true, 60)))) {
                        // line 61
                        echo "                                                        ";
                        $context["category"] = t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, false, true, 61), "field_entertainment_category", [], "any", false, false, true, 61), 0, [], "any", false, false, true, 61), "entity", [], "any", false, false, true, 61), "name", [], "any", false, false, true, 61), "value", [], "any", false, false, true, 61), 61, $this->source));
                        // line 62
                        echo "                                                    ";
                    } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, true, true, 62), "field_event_type", [], "any", true, true, true, 62) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, false, true, 62), "field_event_type", [], "any", false, false, true, 62)))) {
                        // line 63
                        echo "                                                        ";
                        $context["category"] = t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, false, true, 63), "field_event_type", [], "any", false, false, true, 63), 0, [], "any", false, false, true, 63), "entity", [], "any", false, false, true, 63), "name", [], "any", false, false, true, 63), "value", [], "any", false, false, true, 63), 63, $this->source));
                        // line 64
                        echo "                                                    ";
                    } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, true, true, 64), "field_sport_category", [], "any", true, true, true, 64) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, false, true, 64), "field_sport_category", [], "any", false, false, true, 64)))) {
                        // line 65
                        echo "                                                        ";
                        $context["category"] = t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, false, true, 65), "field_sport_category", [], "any", false, false, true, 65), 0, [], "any", false, false, true, 65), "entity", [], "any", false, false, true, 65), "name", [], "any", false, false, true, 65), "value", [], "any", false, false, true, 65), 65, $this->source));
                        // line 66
                        echo "                                                    ";
                    } elseif ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, true, true, 66), "field_news_category", [], "any", true, true, true, 66) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, false, true, 66), "field_news_category", [], "any", false, false, true, 66)))) {
                        // line 67
                        echo "                                                        ";
                        $context["category"] = t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, false, true, 67), "field_news_category", [], "any", false, false, true, 67), 0, [], "any", false, false, true, 67), "entity", [], "any", false, false, true, 67), "name", [], "any", false, false, true, 67), "value", [], "any", false, false, true, 67), 67, $this->source));
                        // line 68
                        echo "                                                    ";
                    } else {
                        // line 69
                        echo "                                                        ";
                        $context["category"] = "";
                        // line 70
                        echo "                                                    ";
                    }
                    // line 71
                    echo "                                                    <a class=\"badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2\" href=\"#\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["category"] ?? null), 71, $this->source), "html", null, true);
                    echo "</a>
                                                    <a class=\"text-body\" href=\"\"><small>";
                    // line 72
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, false, true, 72), "created", [], "any", false, false, true, 72), "value", [], "any", false, false, true, 72), 72, $this->source), "F j, Y"), "html", null, true);
                    echo "</small></a>
                                                </div>
                                                <a class=\"h6 m-0 text-secondary text-uppercase font-weight-bold\" href=\"";
                    // line 74
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 74, $this->source), "html", null, true);
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, false, true, 74), "nid", [], "any", false, false, true, 74), "value", [], "any", false, false, true, 74)]), "html", null, true);
                    echo "\">";
                    (((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, false, true, 74), "title", [], "any", false, false, true, 74), "value", [], "any", false, false, true, 74)) > 20)) ? (print ($this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, (twig_slice($this->env, t(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, false, true, 74), "title", [], "any", false, false, true, 74), "value", [], "any", false, false, true, 74)), 0, 20) . "..."), "html", null, true))) : (print (t(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["trending_news"], "news", [], "any", false, false, true, 74), "title", [], "any", false, false, true, 74), "value", [], "any", false, false, true, 74)))));
                    echo "</a>
                                            </div>
                                        </div>
                                    ";
                }
                // line 78
                echo "                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trending_news'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 79
            echo "                            ";
        }
        // line 80
        echo "                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Newsletter Start -->
                    <div class=\"mb-3\">
                        <div class=\"section-title mb-0\">
                            <h4 class=\"m-0 text-uppercase font-weight-bold\">Newsletter</h4>
                        </div>
                        <div class=\"bg-white text-center border border-top-0 p-3\">
                            ";
        // line 90
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["messages"] ?? null), 90, $this->source), "html", null, true);
        echo "
                            <p style=\"font-size: 14px;margin-bottom: 0;text-align: left;\">";
        // line 91
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Subscribe to our news letter to receive notifications whenever we publish an article"));
        echo "</p>
                            <div class=\"input-group mb-2\" style=\"width: 100%;\">
                                ";
        // line 93
        $context["news_subscribers"] = Drupal\twig_tweak\TwigTweakExtension::drupalForm("Drupal\\b24\\Form\\B24NewsSubscribers");
        // line 94
        echo "                                ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["news_subscribers"] ?? null), 94, $this->source), "html", null, true);
        echo "
                            </div>
                            <!-- <small></small> -->
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- Tags Start -->
                    <div class=\"mb-3\">
                        <div class=\"section-title mb-0\">
                            <h4 class=\"m-0 text-uppercase font-weight-bold\">Tags</h4>
                        </div>
                        <div class=\"bg-white border border-top-0 p-3\">
                            <div class=\"d-flex flex-wrap m-n1\">
                                <a href=\"";
        // line 108
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 108, $this->source), "html", null, true);
        echo "/news\" class=\"btn btn-sm btn-outline-secondary m-1\">News</a>
                                <a href=\"";
        // line 109
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 109, $this->source), "html", null, true);
        echo "/entertainment\" class=\"btn btn-sm btn-outline-secondary m-1\">Entertainment</a>
                                <a href=\"";
        // line 110
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 110, $this->source), "html", null, true);
        echo "/sports\" class=\"btn btn-sm btn-outline-secondary m-1\">Sports</a>
                                <a href=\"";
        // line 111
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 111, $this->source), "html", null, true);
        echo "/events\" class=\"btn btn-sm btn-outline-secondary m-1\">Events</a>
                                <a href=\"";
        // line 112
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 112, $this->source), "html", null, true);
        echo "/videos\" class=\"btn btn-sm btn-outline-secondary m-1\">Videos</a>
                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>

<style type=\"text/css\">
    #news-subscribers{
      display: inline-flex;
    }
     #news-subscribers label{
        display: none;
    }
</style>";
    }

    public function getTemplateName()
    {
        return "themes/custom/b24/templates/first_sidebar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  235 => 112,  231 => 111,  227 => 110,  223 => 109,  219 => 108,  201 => 94,  199 => 93,  194 => 91,  190 => 90,  178 => 80,  175 => 79,  169 => 78,  159 => 74,  154 => 72,  149 => 71,  146 => 70,  143 => 69,  140 => 68,  137 => 67,  134 => 66,  131 => 65,  128 => 64,  125 => 63,  122 => 62,  119 => 61,  117 => 60,  111 => 57,  108 => 56,  105 => 55,  100 => 54,  98 => 53,  82 => 42,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("                <div class=\"col-lg-4\">
                    <!-- Social Follow Start -->
                    <div class=\"mb-3\">
                        <div class=\"section-title mb-0\">
                            <h4 class=\"m-0 text-uppercase font-weight-bold\">Follow Us</h4>
                        </div>
                        <div class=\"bg-white border border-top-0 p-3\">
                            <a href=\"https://www.facebook.com/B24tvOnline?mibextid=ZbWKwL\" target=\"_blank\" class=\"d-block w-100 text-white text-decoration-none mb-3\" style=\"background: #39569E;\">
                                <i class=\"fab fa-facebook-f text-center py-4 mr-3\" style=\"width: 65px; background: rgba(0, 0, 0, .2);\"></i>
                                <span class=\"font-weight-medium\">Facebook</span>
                            </a>
                           <!--  <a href=\"\" class=\"d-block w-100 text-white text-decoration-none mb-3\" style=\"background: #52AAF4;\">
                                <i class=\"fab fa-twitter text-center py-4 mr-3\" style=\"width: 65px; background: rgba(0, 0, 0, .2);\"></i>
                                <span class=\"font-weight-medium\">12,345 Followers</span>
                            </a> -->
                           <!--  <a href=\"\" class=\"d-block w-100 text-white text-decoration-none mb-3\" style=\"background: #0185AE;\">
                                <i class=\"fab fa-linkedin-in text-center py-4 mr-3\" style=\"width: 65px; background: rgba(0, 0, 0, .2);\"></i>
                                <span class=\"font-weight-medium\">12,345 Connects</span>
                            </a> -->
                            <a href=\"https://instagram.com/b24tv.rw?utm_source=qr&igshid=ZDc4ODBmNjlmNQ%3D%3D\" target=\"_blank\" class=\"d-block w-100 text-white text-decoration-none mb-3\" style=\"background: #C8359D;\">
                                <i class=\"fab fa-instagram text-center py-4 mr-3\" style=\"width: 65px; background: rgba(0, 0, 0, .2);\"></i>
                                <span class=\"font-weight-medium\">Instagram</span>
                            </a>
                            <a href=\"https://www.youtube.com/@B24TV\" target=\"_blank\" class=\"d-block w-100 text-white text-decoration-none mb-3\" style=\"background: #DC472E;\">
                                <i class=\"fab fa-youtube text-center py-4 mr-3\" style=\"width: 65px; background: rgba(0, 0, 0, .2);\"></i>
                                <span class=\"font-weight-medium\">Youtube</span>
                            </a>
                            <a href=\"https://www.tiktok.com/@b24tv.rw\" target=\"_blank\" class=\"d-block w-100 text-white text-decoration-none\" style=\"background: #055570;\">
                                <i class=\"fab fa-tiktok text-center py-4 mr-3\" style=\"width: 65px; background: rgba(0, 0, 0, .2);\"></i>
                                <span class=\"font-weight-medium\">Tik Tok</span>
                            </a>
                        </div>
                    </div>
                    <!-- Social Follow End -->

                    <!-- Ads Start -->
                    <div class=\"mb-3\">
                        <div class=\"section-title mb-0\">
                            <h4 class=\"m-0 text-uppercase font-weight-bold\">Advertisement</h4>
                        </div>
                        <div class=\"bg-white text-center border border-top-0 p-3\">
                            <a href=\"\"><img class=\"img-fluid\" src=\"{{base_url}}/{{active_theme_path()}}/img/rfmu.jpg\" alt=\"\"></a>
                        </div>
                    </div>
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class=\"mb-3\">
                        <div class=\"section-title mb-0\">
                            <h4 class=\"m-0 text-uppercase font-weight-bold\">Trending News</h4>
                        </div>
                        <div class=\"bg-white border border-top-0 p-3\">
                            {% if trending_nodes is defined and trending_nodes is not empty %}
                                {% for trending_news in trending_nodes %}
                                    {% if trending_news.news.field_news_image is defined and trending_news.news.field_news_image is not empty %}
                                        <div class=\"d-flex align-items-center bg-white mb-3\" style=\"height: 110px;\">
                                            <img class=\"img-fluid\" src=\"{{trending_news.news.field_news_image|file_url}}\" alt=\"\" style=\"height:110px !important\">
                                            <div class=\"w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0\">
                                                <div class=\"mb-2\">
                                                    {% if trending_news.news.field_entertainment_category is defined and trending_news.news.field_entertainment_category is not empty %}
                                                        {% set category = trending_news.news.field_entertainment_category.0.entity.name.value|t %}
                                                    {% elseif trending_news.news.field_event_type is defined and trending_news.news.field_event_type is not empty %}
                                                        {% set category = trending_news.news.field_event_type.0.entity.name.value|t %}
                                                    {% elseif trending_news.news.field_sport_category is defined and trending_news.news.field_sport_category is not empty %}
                                                        {% set category = trending_news.news.field_sport_category.0.entity.name.value|t %}
                                                    {% elseif trending_news.news.field_news_category is defined and trending_news.news.field_news_category is not empty %}
                                                        {% set category = trending_news.news.field_news_category.0.entity.name.value|t %}
                                                    {% else %}
                                                        {% set category = '' %}
                                                    {% endif %}
                                                    <a class=\"badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2\" href=\"#\">{{ category }}</a>
                                                    <a class=\"text-body\" href=\"\"><small>{{ trending_news.news.created.value|date('F j, Y') }}</small></a>
                                                </div>
                                                <a class=\"h6 m-0 text-secondary text-uppercase font-weight-bold\" href=\"{{base_path}}{{ path('entity.node.canonical', {'node': trending_news.news.nid.value}) }}\">{{ trending_news.news.title.value|length > 20 ? trending_news.news.title.value|t|slice(0, 20) ~ '...' : trending_news.news.title.value|t }}</a>
                                            </div>
                                        </div>
                                    {% endif %}
                                {% endfor %}
                            {% endif %}
                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Newsletter Start -->
                    <div class=\"mb-3\">
                        <div class=\"section-title mb-0\">
                            <h4 class=\"m-0 text-uppercase font-weight-bold\">Newsletter</h4>
                        </div>
                        <div class=\"bg-white text-center border border-top-0 p-3\">
                            {{messages}}
                            <p style=\"font-size: 14px;margin-bottom: 0;text-align: left;\">{{'Subscribe to our news letter to receive notifications whenever we publish an article'|t}}</p>
                            <div class=\"input-group mb-2\" style=\"width: 100%;\">
                                {% set news_subscribers = drupal_form('Drupal\\\\b24\\\\Form\\\\B24NewsSubscribers') %}
                                {{ news_subscribers }}
                            </div>
                            <!-- <small></small> -->
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- Tags Start -->
                    <div class=\"mb-3\">
                        <div class=\"section-title mb-0\">
                            <h4 class=\"m-0 text-uppercase font-weight-bold\">Tags</h4>
                        </div>
                        <div class=\"bg-white border border-top-0 p-3\">
                            <div class=\"d-flex flex-wrap m-n1\">
                                <a href=\"{{base_path}}/news\" class=\"btn btn-sm btn-outline-secondary m-1\">News</a>
                                <a href=\"{{base_path}}/entertainment\" class=\"btn btn-sm btn-outline-secondary m-1\">Entertainment</a>
                                <a href=\"{{base_path}}/sports\" class=\"btn btn-sm btn-outline-secondary m-1\">Sports</a>
                                <a href=\"{{base_path}}/events\" class=\"btn btn-sm btn-outline-secondary m-1\">Events</a>
                                <a href=\"{{base_path}}/videos\" class=\"btn btn-sm btn-outline-secondary m-1\">Videos</a>
                            </div>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>

<style type=\"text/css\">
    #news-subscribers{
      display: inline-flex;
    }
     #news-subscribers label{
        display: none;
    }
</style>", "themes/custom/b24/templates/first_sidebar.html.twig", "/var/www/html/b24/themes/custom/b24/templates/first_sidebar.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 53, "for" => 54, "set" => 61);
        static $filters = array("escape" => 42, "file_url" => 57, "t" => 61, "date" => 72, "length" => 74, "slice" => 74);
        static $functions = array("active_theme_path" => 42, "path" => 74, "drupal_form" => 93);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for', 'set'],
                ['escape', 'file_url', 't', 'date', 'length', 'slice'],
                ['active_theme_path', 'path', 'drupal_form']
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
