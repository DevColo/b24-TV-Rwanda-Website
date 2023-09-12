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

/* themes/custom/b24/templates/nodes/node--news.html.twig */
class __TwigTemplate_1458dcdfa43fb8aace1c17da39659c78 extends \Twig\Template
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
        echo "<!-- Breaking News Start -->
    <div class=\"container-fluid mt-5 mb-3 pt-3\">
        <div class=\"container\">
            <div class=\"row align-items-center\">
                <div class=\"col-12\">
                    <div class=\"d-flex justify-content-between\">
                        <div class=\"section-title border-right-0 mb-0\" style=\"width: 100%; padding-right: 100px;\">
                            <h4 class=\"m-0\">";
        // line 8
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "title", [], "any", false, false, true, 8), "value", [], "any", false, false, true, 8), 8, $this->source)));
        echo "</h4>
                        </div>
                        <!-- <div class=\"owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0\"
                            style=\"width: calc(100% - 180px); padding-right: 100px;\">
                            <div class=\"text-truncate\">
                            \t<a class=\"text-secondary font-weight-semi-bold\" href=\"\">";
        // line 13
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "title", [], "any", false, false, true, 13), "value", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
        echo "</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->


    <!-- News With Sidebar Start -->
    <div class=\"container-fluid\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-8\">
                    <!-- News Detail Start -->
                    <div class=\"position-relative mb-3\">
                    \t";
        // line 31
        if ((twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_news_image", [], "any", true, true, true, 31) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_news_image", [], "any", false, false, true, 31)))) {
            // line 32
            echo "                        \t<img class=\"img-fluid w-100\" src=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::fileUrlFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_news_image", [], "any", false, false, true, 32), 32, $this->source)), "html", null, true);
            echo "\" style=\"object-fit: cover;\">
                        ";
        }
        // line 34
        echo "                        <div class=\"bg-white border border-top-0 p-4\">
                            <div class=\"mb-3\">
                            \t";
        // line 36
        if ((twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_news_category", [], "any", true, true, true, 36) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_news_category", [], "any", false, false, true, 36)))) {
            // line 37
            echo "\t\t                        \t<a class=\"badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2\"
\t\t                                    href=\"#\">";
            // line 38
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_news_category", [], "any", false, false, true, 38), 0, [], "any", false, false, true, 38), "entity", [], "any", false, false, true, 38), "name", [], "any", false, false, true, 38), "value", [], "any", false, false, true, 38), 38, $this->source)));
            echo "</a>
\t\t                        ";
        }
        // line 40
        echo "                                
                                <a class=\"text-body\" href=\"\">";
        // line 41
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["date"] ?? null), 41, $this->source), "html", null, true);
        echo "</a>
                            </div>
                            <h4 class=\"mb-3 text-secondary\">";
        // line 43
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "title", [], "any", false, false, true, 43), "value", [], "any", false, false, true, 43), 43, $this->source)));
        echo "</h4>
                            
                            ";
        // line 45
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "body", [], "any", false, true, true, 45), "value", [], "any", true, true, true, 45) &&  !twig_test_empty(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "body", [], "any", false, false, true, 45), "value", [], "any", false, false, true, 45)))) {
            // line 46
            echo "                        \t\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "body", [], "any", false, false, true, 46), 0, [], "any", false, false, true, 46), "value", [], "any", false, false, true, 46), 46, $this->source)));
            echo "
                        \t";
        }
        // line 48
        echo "
                            
                        </div>
                        <div class=\"d-flex justify-content-between bg-white border border-top-0 p-4\">
                        \t";
        // line 52
        if (($context["display_submitted"] ?? null)) {
            // line 53
            echo "                        \t\t <div class=\"d-flex align-items-center\">
                            \t";
            // line 54
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author_picture"] ?? null), 54, $this->source), "html", null, true);
            echo "
                                <!-- <img class=\"rounded-circle mr-2\" src=\"img/user.jpg\" width=\"25\" height=\"25\" alt=\"\"> -->
                                <span>";
            // line 56
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["author_name"] ?? null), 56, $this->source), "html", null, true);
            echo "</span>
                            </div>
  \t\t\t\t\t\t\t";
        }
        // line 59
        echo "
                            <div class=\"d-flex align-items-center\">
                                <!-- <span class=\"ml-3\"><i class=\"far fa-eye mr-2\"></i>12345</span> -->
                                ";
        // line 62
        if ((array_key_exists("comments", $context) &&  !twig_test_empty(($context["comments"] ?? null)))) {
            // line 63
            echo "                                <span class=\"ml-3\"><i class=\"far fa-comment mr-2\"></i>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_length_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["comments"] ?? null), 63, $this->source)), "html", null, true);
            echo "</span>
                            ";
        }
        // line 65
        echo "                                
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
                    <div class=\"mb-3\">
                        <div class=\"section-title mb-0\">
                        \t<h4 class=\"m-0 text-uppercase font-weight-bold\">
                                ";
        // line 75
        if ((array_key_exists("comments", $context) &&  !twig_test_empty(($context["comments"] ?? null)))) {
            // line 76
            echo "                                    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_length_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["comments"] ?? null), 76, $this->source)), "html", null, true);
            echo "
                                ";
        } else {
            // line 77
            echo " 
                                   0
                                ";
        }
        // line 80
        echo "                                ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Comments"));
        echo "
                            </h4>
                        </div>
                        <div class=\"bg-white border border-top-0 p-4\">
                        \t";
        // line 84
        if ((array_key_exists("comments", $context) &&  !twig_test_empty(($context["comments"] ?? null)))) {
            // line 85
            echo "\t                        \t";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["comments"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
                // line 86
                echo "\t\t                            <div class=\"media mb-4\">
\t\t                                <!-- <img src=\"img/user.jpg\" alt=\"Image\" class=\"img-fluid mr-3 mt-1\" style=\"width: 45px;\"> -->
\t\t                                <div class=\"media-body\">
\t\t                                    <h6><a class=\"text-secondary font-weight-bold\" href=\"\">";
                // line 89
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["comment"], "name", [], "any", false, false, true, 89), 89, $this->source), "html", null, true);
                echo "</a> <small><i>";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["comment"], "created", [], "any", false, false, true, 89), 89, $this->source), "F j, Y"), "html", null, true);
                echo "</i></small></h6>
\t\t                                    <p>";
                // line 90
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["comment"], "comment", [], "any", false, false, true, 90), 90, $this->source), "html", null, true);
                echo "</p>
\t\t                                    <!-- <button class=\"btn btn-sm btn-outline-secondary\">Reply</button> -->
\t\t                                </div>
\t\t                            </div>
\t                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            echo "                            ";
        }
        // line 96
        echo "                            <!-- <div class=\"media\">
                                <img src=\"img/user.jpg\" alt=\"Image\" class=\"img-fluid mr-3 mt-1\" style=\"width: 45px;\">
                                <div class=\"media-body\">
                                    <h6><a class=\"text-secondary font-weight-bold\" href=\"\">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                    <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                        accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                    <button class=\"btn btn-sm btn-outline-secondary\">Reply</button>
                                    <div class=\"media mt-4\">
                                        <img src=\"img/user.jpg\" alt=\"Image\" class=\"img-fluid mr-3 mt-1\"
                                            style=\"width: 45px;\">
                                        <div class=\"media-body\">
                                            <h6><a class=\"text-secondary font-weight-bold\" href=\"\">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                            <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor
                                                labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed
                                                eirmod ipsum.</p>
                                            <button class=\"btn btn-sm btn-outline-secondary\">Reply</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class=\"mb-3\">
                        <div class=\"section-title mb-0\">
                            <h4 class=\"m-0 text-uppercase font-weight-bold\">";
        // line 123
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Leave a comment"));
        echo "</h4>
                        </div>
                        <div class=\"bg-white border border-top-0 p-4\">
                        \t";
        // line 126
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["messages"] ?? null), 126, $this->source), "html", null, true);
        echo "
                        \t";
        // line 127
        $context["news_comment"] = Drupal\twig_tweak\TwigTweakExtension::drupalForm("Drupal\\b24\\Form\\B24NewsComment");
        // line 128
        echo "                            ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["news_comment"] ?? null), 128, $this->source), "html", null, true);
        echo "
                        </div>
                    </div>
                    <!-- Comment Form End -->
                </div>

                ";
        // line 134
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::drupalBlock("first_sidebar_lock"), "html", null, true);
        echo "

            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->

<style type=\"text/css\">
\t.field--name-user-picture>a>img{
    width: 30px;
    height: 30px;
    border-radius: 25px;
    margin-right: 8px;
}
</style>";
    }

    public function getTemplateName()
    {
        return "themes/custom/b24/templates/nodes/node--news.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  271 => 134,  261 => 128,  259 => 127,  255 => 126,  249 => 123,  220 => 96,  217 => 95,  206 => 90,  200 => 89,  195 => 86,  190 => 85,  188 => 84,  180 => 80,  175 => 77,  169 => 76,  167 => 75,  155 => 65,  149 => 63,  147 => 62,  142 => 59,  136 => 56,  131 => 54,  128 => 53,  126 => 52,  120 => 48,  114 => 46,  112 => 45,  107 => 43,  102 => 41,  99 => 40,  94 => 38,  91 => 37,  89 => 36,  85 => 34,  79 => 32,  77 => 31,  56 => 13,  48 => 8,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!-- Breaking News Start -->
    <div class=\"container-fluid mt-5 mb-3 pt-3\">
        <div class=\"container\">
            <div class=\"row align-items-center\">
                <div class=\"col-12\">
                    <div class=\"d-flex justify-content-between\">
                        <div class=\"section-title border-right-0 mb-0\" style=\"width: 100%; padding-right: 100px;\">
                            <h4 class=\"m-0\">{{ node.title.value|t }}</h4>
                        </div>
                        <!-- <div class=\"owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0\"
                            style=\"width: calc(100% - 180px); padding-right: 100px;\">
                            <div class=\"text-truncate\">
                            \t<a class=\"text-secondary font-weight-semi-bold\" href=\"\">{{ node.title.value }}</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breaking News End -->


    <!-- News With Sidebar Start -->
    <div class=\"container-fluid\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-8\">
                    <!-- News Detail Start -->
                    <div class=\"position-relative mb-3\">
                    \t{% if node.field_news_image is defined and node.field_news_image is not empty %}
                        \t<img class=\"img-fluid w-100\" src=\"{{ node.field_news_image|file_url }}\" style=\"object-fit: cover;\">
                        {% endif %}
                        <div class=\"bg-white border border-top-0 p-4\">
                            <div class=\"mb-3\">
                            \t{% if node.field_news_category is defined and node.field_news_category is not empty %}
\t\t                        \t<a class=\"badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2\"
\t\t                                    href=\"#\">{{ node.field_news_category.0.entity.name.value|t }}</a>
\t\t                        {% endif %}
                                
                                <a class=\"text-body\" href=\"\">{{ date }}</a>
                            </div>
                            <h4 class=\"mb-3 text-secondary\">{{ node.title.value|t }}</h4>
                            
                            {% if node.body.value is defined and node.body.value is not empty %}
                        \t\t{{ node.body.0.value|t }}
                        \t{% endif %}

                            
                        </div>
                        <div class=\"d-flex justify-content-between bg-white border border-top-0 p-4\">
                        \t{% if display_submitted %}
                        \t\t <div class=\"d-flex align-items-center\">
                            \t{{ author_picture }}
                                <!-- <img class=\"rounded-circle mr-2\" src=\"img/user.jpg\" width=\"25\" height=\"25\" alt=\"\"> -->
                                <span>{{ author_name }}</span>
                            </div>
  \t\t\t\t\t\t\t{% endif %}

                            <div class=\"d-flex align-items-center\">
                                <!-- <span class=\"ml-3\"><i class=\"far fa-eye mr-2\"></i>12345</span> -->
                                {% if comments is defined and comments is not empty %}
                                <span class=\"ml-3\"><i class=\"far fa-comment mr-2\"></i>{{ comments|length }}</span>
                            {% endif %}
                                
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->

                    <!-- Comment List Start -->
                    <div class=\"mb-3\">
                        <div class=\"section-title mb-0\">
                        \t<h4 class=\"m-0 text-uppercase font-weight-bold\">
                                {% if comments is defined and comments is not empty %}
                                    {{ comments|length }}
                                {% else %} 
                                   0
                                {% endif %}
                                {{'Comments'|t}}
                            </h4>
                        </div>
                        <div class=\"bg-white border border-top-0 p-4\">
                        \t{% if comments is defined and comments is not empty %}
\t                        \t{% for comment in comments %}
\t\t                            <div class=\"media mb-4\">
\t\t                                <!-- <img src=\"img/user.jpg\" alt=\"Image\" class=\"img-fluid mr-3 mt-1\" style=\"width: 45px;\"> -->
\t\t                                <div class=\"media-body\">
\t\t                                    <h6><a class=\"text-secondary font-weight-bold\" href=\"\">{{ comment.name }}</a> <small><i>{{ comment.created|date('F j, Y') }}</i></small></h6>
\t\t                                    <p>{{ comment.comment }}</p>
\t\t                                    <!-- <button class=\"btn btn-sm btn-outline-secondary\">Reply</button> -->
\t\t                                </div>
\t\t                            </div>
\t                            {% endfor %}
                            {% endif %}
                            <!-- <div class=\"media\">
                                <img src=\"img/user.jpg\" alt=\"Image\" class=\"img-fluid mr-3 mt-1\" style=\"width: 45px;\">
                                <div class=\"media-body\">
                                    <h6><a class=\"text-secondary font-weight-bold\" href=\"\">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                    <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                        accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                    <button class=\"btn btn-sm btn-outline-secondary\">Reply</button>
                                    <div class=\"media mt-4\">
                                        <img src=\"img/user.jpg\" alt=\"Image\" class=\"img-fluid mr-3 mt-1\"
                                            style=\"width: 45px;\">
                                        <div class=\"media-body\">
                                            <h6><a class=\"text-secondary font-weight-bold\" href=\"\">John Doe</a> <small><i>01 Jan 2045</i></small></h6>
                                            <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor
                                                labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed
                                                eirmod ipsum.</p>
                                            <button class=\"btn btn-sm btn-outline-secondary\">Reply</button>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <!-- Comment List End -->

                    <!-- Comment Form Start -->
                    <div class=\"mb-3\">
                        <div class=\"section-title mb-0\">
                            <h4 class=\"m-0 text-uppercase font-weight-bold\">{{'Leave a comment'|t}}</h4>
                        </div>
                        <div class=\"bg-white border border-top-0 p-4\">
                        \t{{messages}}
                        \t{% set news_comment = drupal_form('Drupal\\\\b24\\\\Form\\\\B24NewsComment') %}
                            {{ news_comment }}
                        </div>
                    </div>
                    <!-- Comment Form End -->
                </div>

                {{ drupal_block('first_sidebar_lock') }}

            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->

<style type=\"text/css\">
\t.field--name-user-picture>a>img{
    width: 30px;
    height: 30px;
    border-radius: 25px;
    margin-right: 8px;
}
</style>", "themes/custom/b24/templates/nodes/node--news.html.twig", "/var/www/html/b24/themes/custom/b24/templates/nodes/node--news.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 31, "for" => 85, "set" => 127);
        static $filters = array("t" => 8, "escape" => 13, "file_url" => 32, "length" => 63, "date" => 89);
        static $functions = array("drupal_form" => 127, "drupal_block" => 134);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for', 'set'],
                ['t', 'escape', 'file_url', 'length', 'date'],
                ['drupal_form', 'drupal_block']
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
