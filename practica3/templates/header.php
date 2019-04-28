<header>
    <img src = "img/logo.svg">
    <h1>SALA TEABAG</h1>
    <ul>
        <!--menu-->
        {% for n in menu %}
            <li><a href="#">{{n}}</a></li>
        {% endfor %}
    </ul> 
</header>
