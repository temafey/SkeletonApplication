{# main.volt #}
<!DOCTYPE html>
<html>
<head>
    <title>{% block title %}{% endblock %}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {%- block head -%}

    {%- endblock -%}
    {{ assets.outputCss() }}
</head>
<body>
<div id="wrapper">
    <div id="header">
        {% if disableHeader is not defined %}
            {% include "../../Core/View/layouts/header.volt" %}
        {% endif %}
        {%- block header -%}
        {%- endblock -%}
    </div>

    <div class="container">
        {%- block content -%}
        {%- endblock -%}
    </div>

    <div id="footer">
        {% if disableFooter is not defined %}
            {% include "../../Core/View/layouts/footer.volt" %}
        {% endif %}
        {%- block footer -%}
        {%- endblock -%}
    </div>
</div>
{{ assets.outputJs() }}
</body>
</html>