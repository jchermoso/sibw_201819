<header {% if imprimir %} class="imp" {% endif %}>
    <img src = "img/logo.svg" {% if imprimir %} class="pos_imp" {% endif %}>
    <h1>SALA TEABAG</h1>
    <ul {%if imprimir %} class="oculto" {% endif%}>
        <!--menu-->
        {% for n in menu %}
            <li><a href='{{n.ruta}}'>{{n.nombre}}</a></li>
        {% endfor %}
    </ul>
</header>
