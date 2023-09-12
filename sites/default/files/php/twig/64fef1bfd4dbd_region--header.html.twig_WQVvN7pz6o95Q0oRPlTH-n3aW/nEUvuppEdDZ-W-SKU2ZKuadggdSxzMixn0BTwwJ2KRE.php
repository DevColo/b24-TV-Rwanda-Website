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

/* themes/custom/b24/templates/regions/region--header.html.twig */
class __TwigTemplate_dbb10667dbeee40cb2c632d61c60d4f4 extends \Twig\Template
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
        echo "<!-- Topbar Start -->
    <div class=\"container-fluid d-none d-lg-block\">
        <div class=\"row align-items-center bg-dark px-lg-5\">
            <div class=\"col-lg-9\">
                <nav class=\"navbar navbar-expand-sm bg-dark p-0\">
                    <ul class=\"navbar-nav ml-n2\">
                        <li class=\"nav-item border-right border-secondary\">
                            <a class=\"nav-link text-body small\" href=\"#\">";
        // line 8
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, "now", "F j, Y"), "html", null, true);
        echo "</a>
                        </li>
                        <!-- <li class=\"nav-item border-right border-secondary\">
                            <a class=\"nav-link text-body small\" href=\"#\">Advertise</a>
                        </li> -->
                        <li class=\"nav-item border-right border-secondary\">
                            <a class=\"nav-link text-body small\" href=\"";
        // line 14
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 14, $this->source), "html", null, true);
        echo "/about-us\">Contact</a>
                        </li>
                        ";
        // line 16
        if (($context["logged_in"] ?? null)) {
            // line 17
            echo "                        <li class=\"nav-item\">
                            <a class=\"nav-link text-body small\" href=\"";
            // line 18
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 18, $this->source), "html", null, true);
            echo "/user/\">My Account</a>
                        </li>
                        ";
        } else {
            // line 21
            echo "                        <li class=\"nav-item\">
                            <a class=\"nav-link text-body small\" href=\"";
            // line 22
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 22, $this->source), "html", null, true);
            echo "/user/login\">Login</a>
                        </li>
                        ";
        }
        // line 25
        echo "                    </ul>
                </nav>
            </div>
            <div class=\"col-lg-3 text-right d-none d-md-block\">
                <nav class=\"navbar navbar-expand-sm bg-dark p-0\">
                    <ul class=\"navbar-nav ml-auto mr-n2\">
                        <li class=\"nav-item\">
                            <a class=\"nav-link text-body\" href=\"#\"><small class=\"fab fa-twitter\"></small></a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link text-body\" href=\"https://www.facebook.com/B24tvOnline?mibextid=ZbWKwL\"><small class=\"fab fa-facebook-f\"></small></a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link text-body\" href=\"https://instagram.com/b24tv.rw?utm_source=qr&igshid=ZDc4ODBmNjlmNQ%3D%3D\"><small class=\"fab fa-instagram\"></small></a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link text-body\" href=\"https://www.youtube.com/@B24TV\"><small class=\"fab fa-youtube\"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class=\"row align-items-center bg-white py-3 px-lg-5\">
            <div class=\"col-lg-4\">
                <a href=\"index.html\" class=\"navbar-brand p-0 d-none d-lg-block\">
                    <img src=\"";
        // line 50
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 50, $this->source), "html", null, true);
        echo "/";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getActiveThemePath(), "html", null, true);
        echo "/img/b24.png\" class=\"logo\">
                    <h1 class=\"m-0 display-4 text-uppercase text-primary text-logo\" style=\"color:#0e597e !important;\">B24<span class=\"text-secondary font-weight-normal\" style=\"color: #858585 !important;\">TV</span></h1>
                </a>
            </div>
            <div class=\"col-lg-8 text-center text-lg-right\">
                <!-- <a href=\"https://htmlcodex.com\"><img class=\"img-fluid\" src=\"";
        // line 55
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 55, $this->source), "html", null, true);
        echo "/";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getActiveThemePath(), "html", null, true);
        echo "/img/ads-728x90.png\" alt=\"\"></a> -->
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class=\"container-fluid p-0\">
        <nav class=\"navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5\">
            <a href=\"index.html\" class=\"navbar-brand d-block d-lg-none\" style=\"width: 75%;\">
                <img src=\"";
        // line 66
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 66, $this->source), "html", null, true);
        echo "/";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getActiveThemePath(), "html", null, true);
        echo "/img/b24.png\" style=\"width: 20%;\">
                <h1 class=\"m-0 display-4 text-uppercase text-primary text-logo\" style=\"color: #bbbbbb !important;font-size: 18px;top: 4px;left: -12px;\">B24<span class=\"text-secondary font-weight-normal\" style=\"color: #ffd400 !important;\">TV</span></h1>
            </a>
            <button type=\"button\" class=\"navbar-toggler\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse justify-content-between px-0 px-lg-3\" id=\"navbarCollapse\">
                <div class=\"navbar-nav mr-auto py-0\">
                    <a href=\"";
        // line 74
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 74, $this->source), "html", null, true);
        echo "\" class=\"nav-item nav-link active\">Home</a>
                    <div class=\"nav-item dropdown\">
                        <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">News</a>
                        <div class=\"dropdown-menu rounded-0 m-0\">
                            <a href=\"";
        // line 78
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 78, $this->source), "html", null, true);
        echo "/news/africa\" class=\"dropdown-item\">Africa</a>
                            <a href=\"";
        // line 79
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 79, $this->source), "html", null, true);
        echo "/news/business\" class=\"dropdown-item\">Business</a>
                            <a href=\"";
        // line 80
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 80, $this->source), "html", null, true);
        echo "/news/health\" class=\"dropdown-item\">Health</a>
                            <a href=\"";
        // line 81
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 81, $this->source), "html", null, true);
        echo "/news/agriculture\" class=\"dropdown-item\">Agriculture</a>
                            <a href=\"";
        // line 82
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 82, $this->source), "html", null, true);
        echo "/news/international\" class=\"dropdown-item\">International</a>
                            <a href=\"";
        // line 83
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 83, $this->source), "html", null, true);
        echo "/news/love\" class=\"dropdown-item\">Love</a>
                            <a href=\"";
        // line 84
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 84, $this->source), "html", null, true);
        echo "/news/technology\" class=\"dropdown-item\">Technology</a>
                            <a href=\"";
        // line 85
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 85, $this->source), "html", null, true);
        echo "/news/rwanda\" class=\"dropdown-item\">Rwanda</a>
                           
                        </div>
                    </div>
                     <div class=\"nav-item dropdown\">
                        <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Events</a>
                        <div class=\"dropdown-menu rounded-0 m-0\">
                            <a href=\"";
        // line 92
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 92, $this->source), "html", null, true);
        echo "/events/charity-event\" class=\"dropdown-item\">Charity event</a>
                            <a href=\"";
        // line 93
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 93, $this->source), "html", null, true);
        echo "/events/conference\" class=\"dropdown-item\">Conference</a>
                            <a href=\"";
        // line 94
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 94, $this->source), "html", null, true);
        echo "/events/festival\" class=\"dropdown-item\">Festival</a>
                            <a href=\"";
        // line 95
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 95, $this->source), "html", null, true);
        echo "/events/internal-corporate-event\" class=\"dropdown-item\">Internal corporate event</a>
                            <a href=\"";
        // line 96
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 96, $this->source), "html", null, true);
        echo "/events/networking-event\" class=\"dropdown-item\">Networking event</a>
                            <a href=\"";
        // line 97
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 97, $this->source), "html", null, true);
        echo "/events/product-launch-event\" class=\"dropdown-item\">Product launch event</a>
                            <a href=\"";
        // line 98
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 98, $this->source), "html", null, true);
        echo "/events/team-building-event\" class=\"dropdown-item\">Team building event</a>
                            <a href=\"";
        // line 99
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 99, $this->source), "html", null, true);
        echo "/events/trade-show\" class=\"dropdown-item\">Trade show</a>
                            <a href=\"";
        // line 100
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 100, $this->source), "html", null, true);
        echo "/events/workshop\" class=\"dropdown-item\">Workshop</a>
                        </div>
                    </div>

                     <div class=\"nav-item dropdown\">
                        <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Entertainment</a>
                        <div class=\"dropdown-menu rounded-0 m-0\">
                            <a href=\"";
        // line 107
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 107, $this->source), "html", null, true);
        echo "/entertainment/comedy\" class=\"dropdown-item\">Comedy</a>
                            <a href=\"";
        // line 108
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 108, $this->source), "html", null, true);
        echo "/entertainment/concert\" class=\"dropdown-item\">Concert</a>
                            <a href=\"";
        // line 109
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 109, $this->source), "html", null, true);
        echo "/entertainment/dance\" class=\"dropdown-item\">Dance</a>
                            <a href=\"";
        // line 110
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 110, $this->source), "html", null, true);
        echo "/entertainment/drama\" class=\"dropdown-item\">Drama</a>
                            <a href=\"";
        // line 111
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 111, $this->source), "html", null, true);
        echo "/entertainment/game\" class=\"dropdown-item\">Game</a>
                            <a href=\"";
        // line 112
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 112, $this->source), "html", null, true);
        echo "/entertainment/karaoke\" class=\"dropdown-item\">Karaoke</a>
                            <a href=\"";
        // line 113
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 113, $this->source), "html", null, true);
        echo "/entertainment/music\" class=\"dropdown-item\">Music</a>
                            
                           
                        </div>
                    </div>

                    <div class=\"nav-item dropdown\">
                        <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Sports</a>
                        <div class=\"dropdown-menu rounded-0 m-0\">
                            <a href=\"";
        // line 122
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 122, $this->source), "html", null, true);
        echo "/sport/basket-ball\" class=\"dropdown-item\">Basket ball</a>
                            <a href=\"";
        // line 123
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 123, $this->source), "html", null, true);
        echo "/sport/cycling\" class=\"dropdown-item\">Cycling</a>
                            <a href=\"";
        // line 124
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 124, $this->source), "html", null, true);
        echo "/sport/soccer\" class=\"dropdown-item\">Soccer</a>
                            <a href=\"";
        // line 125
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 125, $this->source), "html", null, true);
        echo "/sport/swimming\" class=\"dropdown-item\">Swimming</a>
                            <a href=\"";
        // line 126
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 126, $this->source), "html", null, true);
        echo "/sport/track-and-field\" class=\"dropdown-item\">Track and field</a>
                            <a href=\"";
        // line 127
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 127, $this->source), "html", null, true);
        echo "/sport/volley-ball\" class=\"dropdown-item\">Volley ball</a>
                            
                        </div>
                    </div>


                    <div class=\"nav-item dropdown\">
                        <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Videos</a>
                        <div class=\"dropdown-menu rounded-0 m-0\">
                            <a href=\"";
        // line 136
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 136, $this->source), "html", null, true);
        echo "/youtube-videos/comedy\" class=\"dropdown-item\">Comedy</a>
                            <a href=\"";
        // line 137
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 137, $this->source), "html", null, true);
        echo "/youtube-videos/interview\" class=\"dropdown-item\">Interview</a>
                            <a href=\"";
        // line 138
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 138, $this->source), "html", null, true);
        echo "/youtube-videos/music-video\" class=\"dropdown-item\">Music video</a>
                            <a href=\"";
        // line 139
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 139, $this->source), "html", null, true);
        echo "/youtube-videos/podcast\" class=\"dropdown-item\">Podcast</a>
                            
                        </div>
                    </div>
                    <a href=\"#\" class=\"nav-item nav-link\">Movies Store ( coming soon )</a>
                    <a href=\"";
        // line 144
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null), 144, $this->source), "html", null, true);
        echo "/about-us\" class=\"nav-item nav-link\">About Us</a>
                </div>
                <div class=\"input-group ml-auto d-none d-lg-flex\" style=\"width: 100%; max-width: 300px;\">
                    <input type=\"text\" class=\"form-control border-0\" placeholder=\"Keyword\">
                    <div class=\"input-group-append\">
                        <button class=\"input-group-text bg-primary text-dark border-0 px-3\"><i
                                class=\"fa fa-search\"></i></button>
                    </div>
                    ";
        // line 152
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["elements"] ?? null), "languagedropdownswitcher", [], "any", false, false, true, 152), 152, $this->source), "html", null, true);
        echo "
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->";
    }

    public function getTemplateName()
    {
        return "themes/custom/b24/templates/regions/region--header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  334 => 152,  323 => 144,  315 => 139,  311 => 138,  307 => 137,  303 => 136,  291 => 127,  287 => 126,  283 => 125,  279 => 124,  275 => 123,  271 => 122,  259 => 113,  255 => 112,  251 => 111,  247 => 110,  243 => 109,  239 => 108,  235 => 107,  225 => 100,  221 => 99,  217 => 98,  213 => 97,  209 => 96,  205 => 95,  201 => 94,  197 => 93,  193 => 92,  183 => 85,  179 => 84,  175 => 83,  171 => 82,  167 => 81,  163 => 80,  159 => 79,  155 => 78,  148 => 74,  135 => 66,  119 => 55,  109 => 50,  82 => 25,  76 => 22,  73 => 21,  67 => 18,  64 => 17,  62 => 16,  57 => 14,  48 => 8,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!-- Topbar Start -->
    <div class=\"container-fluid d-none d-lg-block\">
        <div class=\"row align-items-center bg-dark px-lg-5\">
            <div class=\"col-lg-9\">
                <nav class=\"navbar navbar-expand-sm bg-dark p-0\">
                    <ul class=\"navbar-nav ml-n2\">
                        <li class=\"nav-item border-right border-secondary\">
                            <a class=\"nav-link text-body small\" href=\"#\">{{ \"now\"|date('F j, Y') }}</a>
                        </li>
                        <!-- <li class=\"nav-item border-right border-secondary\">
                            <a class=\"nav-link text-body small\" href=\"#\">Advertise</a>
                        </li> -->
                        <li class=\"nav-item border-right border-secondary\">
                            <a class=\"nav-link text-body small\" href=\"{{ base_path }}/about-us\">Contact</a>
                        </li>
                        {% if logged_in %}
                        <li class=\"nav-item\">
                            <a class=\"nav-link text-body small\" href=\"{{base_path}}/user/\">My Account</a>
                        </li>
                        {% else %}
                        <li class=\"nav-item\">
                            <a class=\"nav-link text-body small\" href=\"{{base_path}}/user/login\">Login</a>
                        </li>
                        {% endif %}
                    </ul>
                </nav>
            </div>
            <div class=\"col-lg-3 text-right d-none d-md-block\">
                <nav class=\"navbar navbar-expand-sm bg-dark p-0\">
                    <ul class=\"navbar-nav ml-auto mr-n2\">
                        <li class=\"nav-item\">
                            <a class=\"nav-link text-body\" href=\"#\"><small class=\"fab fa-twitter\"></small></a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link text-body\" href=\"https://www.facebook.com/B24tvOnline?mibextid=ZbWKwL\"><small class=\"fab fa-facebook-f\"></small></a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link text-body\" href=\"https://instagram.com/b24tv.rw?utm_source=qr&igshid=ZDc4ODBmNjlmNQ%3D%3D\"><small class=\"fab fa-instagram\"></small></a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link text-body\" href=\"https://www.youtube.com/@B24TV\"><small class=\"fab fa-youtube\"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class=\"row align-items-center bg-white py-3 px-lg-5\">
            <div class=\"col-lg-4\">
                <a href=\"index.html\" class=\"navbar-brand p-0 d-none d-lg-block\">
                    <img src=\"{{base_path}}/{{active_theme_path()}}/img/b24.png\" class=\"logo\">
                    <h1 class=\"m-0 display-4 text-uppercase text-primary text-logo\" style=\"color:#0e597e !important;\">B24<span class=\"text-secondary font-weight-normal\" style=\"color: #858585 !important;\">TV</span></h1>
                </a>
            </div>
            <div class=\"col-lg-8 text-center text-lg-right\">
                <!-- <a href=\"https://htmlcodex.com\"><img class=\"img-fluid\" src=\"{{base_path}}/{{active_theme_path()}}/img/ads-728x90.png\" alt=\"\"></a> -->
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class=\"container-fluid p-0\">
        <nav class=\"navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5\">
            <a href=\"index.html\" class=\"navbar-brand d-block d-lg-none\" style=\"width: 75%;\">
                <img src=\"{{base_path}}/{{active_theme_path()}}/img/b24.png\" style=\"width: 20%;\">
                <h1 class=\"m-0 display-4 text-uppercase text-primary text-logo\" style=\"color: #bbbbbb !important;font-size: 18px;top: 4px;left: -12px;\">B24<span class=\"text-secondary font-weight-normal\" style=\"color: #ffd400 !important;\">TV</span></h1>
            </a>
            <button type=\"button\" class=\"navbar-toggler\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse justify-content-between px-0 px-lg-3\" id=\"navbarCollapse\">
                <div class=\"navbar-nav mr-auto py-0\">
                    <a href=\"{{base_path}}\" class=\"nav-item nav-link active\">Home</a>
                    <div class=\"nav-item dropdown\">
                        <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">News</a>
                        <div class=\"dropdown-menu rounded-0 m-0\">
                            <a href=\"{{ base_path }}/news/africa\" class=\"dropdown-item\">Africa</a>
                            <a href=\"{{ base_path }}/news/business\" class=\"dropdown-item\">Business</a>
                            <a href=\"{{ base_path }}/news/health\" class=\"dropdown-item\">Health</a>
                            <a href=\"{{ base_path }}/news/agriculture\" class=\"dropdown-item\">Agriculture</a>
                            <a href=\"{{ base_path }}/news/international\" class=\"dropdown-item\">International</a>
                            <a href=\"{{ base_path }}/news/love\" class=\"dropdown-item\">Love</a>
                            <a href=\"{{ base_path }}/news/technology\" class=\"dropdown-item\">Technology</a>
                            <a href=\"{{ base_path }}/news/rwanda\" class=\"dropdown-item\">Rwanda</a>
                           
                        </div>
                    </div>
                     <div class=\"nav-item dropdown\">
                        <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Events</a>
                        <div class=\"dropdown-menu rounded-0 m-0\">
                            <a href=\"{{ base_path }}/events/charity-event\" class=\"dropdown-item\">Charity event</a>
                            <a href=\"{{ base_path }}/events/conference\" class=\"dropdown-item\">Conference</a>
                            <a href=\"{{ base_path }}/events/festival\" class=\"dropdown-item\">Festival</a>
                            <a href=\"{{ base_path }}/events/internal-corporate-event\" class=\"dropdown-item\">Internal corporate event</a>
                            <a href=\"{{ base_path }}/events/networking-event\" class=\"dropdown-item\">Networking event</a>
                            <a href=\"{{ base_path }}/events/product-launch-event\" class=\"dropdown-item\">Product launch event</a>
                            <a href=\"{{ base_path }}/events/team-building-event\" class=\"dropdown-item\">Team building event</a>
                            <a href=\"{{ base_path }}/events/trade-show\" class=\"dropdown-item\">Trade show</a>
                            <a href=\"{{ base_path }}/events/workshop\" class=\"dropdown-item\">Workshop</a>
                        </div>
                    </div>

                     <div class=\"nav-item dropdown\">
                        <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Entertainment</a>
                        <div class=\"dropdown-menu rounded-0 m-0\">
                            <a href=\"{{ base_path }}/entertainment/comedy\" class=\"dropdown-item\">Comedy</a>
                            <a href=\"{{ base_path }}/entertainment/concert\" class=\"dropdown-item\">Concert</a>
                            <a href=\"{{ base_path }}/entertainment/dance\" class=\"dropdown-item\">Dance</a>
                            <a href=\"{{ base_path }}/entertainment/drama\" class=\"dropdown-item\">Drama</a>
                            <a href=\"{{ base_path }}/entertainment/game\" class=\"dropdown-item\">Game</a>
                            <a href=\"{{ base_path }}/entertainment/karaoke\" class=\"dropdown-item\">Karaoke</a>
                            <a href=\"{{ base_path }}/entertainment/music\" class=\"dropdown-item\">Music</a>
                            
                           
                        </div>
                    </div>

                    <div class=\"nav-item dropdown\">
                        <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Sports</a>
                        <div class=\"dropdown-menu rounded-0 m-0\">
                            <a href=\"{{ base_path }}/sport/basket-ball\" class=\"dropdown-item\">Basket ball</a>
                            <a href=\"{{ base_path }}/sport/cycling\" class=\"dropdown-item\">Cycling</a>
                            <a href=\"{{ base_path }}/sport/soccer\" class=\"dropdown-item\">Soccer</a>
                            <a href=\"{{ base_path }}/sport/swimming\" class=\"dropdown-item\">Swimming</a>
                            <a href=\"{{ base_path }}/sport/track-and-field\" class=\"dropdown-item\">Track and field</a>
                            <a href=\"{{ base_path }}/sport/volley-ball\" class=\"dropdown-item\">Volley ball</a>
                            
                        </div>
                    </div>


                    <div class=\"nav-item dropdown\">
                        <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">Videos</a>
                        <div class=\"dropdown-menu rounded-0 m-0\">
                            <a href=\"{{ base_path }}/youtube-videos/comedy\" class=\"dropdown-item\">Comedy</a>
                            <a href=\"{{ base_path }}/youtube-videos/interview\" class=\"dropdown-item\">Interview</a>
                            <a href=\"{{ base_path }}/youtube-videos/music-video\" class=\"dropdown-item\">Music video</a>
                            <a href=\"{{ base_path }}/youtube-videos/podcast\" class=\"dropdown-item\">Podcast</a>
                            
                        </div>
                    </div>
                    <a href=\"#\" class=\"nav-item nav-link\">Movies Store ( coming soon )</a>
                    <a href=\"{{ base_path }}/about-us\" class=\"nav-item nav-link\">About Us</a>
                </div>
                <div class=\"input-group ml-auto d-none d-lg-flex\" style=\"width: 100%; max-width: 300px;\">
                    <input type=\"text\" class=\"form-control border-0\" placeholder=\"Keyword\">
                    <div class=\"input-group-append\">
                        <button class=\"input-group-text bg-primary text-dark border-0 px-3\"><i
                                class=\"fa fa-search\"></i></button>
                    </div>
                    {{elements.languagedropdownswitcher}}
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->", "themes/custom/b24/templates/regions/region--header.html.twig", "/var/www/html/b24/themes/custom/b24/templates/regions/region--header.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 16);
        static $filters = array("escape" => 8, "date" => 8);
        static $functions = array("active_theme_path" => 50);

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'date'],
                ['active_theme_path']
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
