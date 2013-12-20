<!DOCTYPE html>
<html>
<head>
    <title>{% block title %}{% endblock %}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {%- block head -%}

    {%- endblock -%}
    {{ assets.outputCss() }}
    {{ assets.outputJs() }}
</head>
<body style="padding: 25px;"><div id="console"><h2>Тестовое приложение</h2></div>
<script type="text/javascript">
    {%- block content -%}
    {%- endblock -%}

    Ext.onReady(function() {
        Ext.tip.QuickTipManager.init();

        {% include "layouts/config.volt" %}
        {% include "layouts/require.volt" %}
        {% include "layouts/application.volt" %}
    });
</script>
<div id="grid2"></div>
</body>
</html>