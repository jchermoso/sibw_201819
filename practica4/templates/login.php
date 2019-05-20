{% extends 'base.html' %} {% block context %}
        <main id="content">
            <section class="login">
                <form  class="contact_form" action="/login" method="POST" name="contact_form" novalidate>
                    <div>
                        <h1>Login</h1>
                    </div>
                    <div>
                        <label for="nombre">Nombre de usuario:</label>
                        <input type="text" name="nombre" placeholder="Nombre de usuario"/>
                    </div>
                    <div>
                        <label for="pass">Contraseña:</label>
                        <input type="password" name="pass" placeholder="Contraseña"/>
                    </div>
                    <div>
                        <button class="submit">Login</button>
                    </div>
                </form>
                
                <p>¿No tienes cuenta? <a href="/registro">Regístrate</a></p>
            </section>
        </main>
{% endblock %} 
